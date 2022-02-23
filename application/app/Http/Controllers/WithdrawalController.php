<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\User;
use App\Mail\Withdrawal\withdrawalRequestUserEmail;
use App\Mail\Withdrawal\withdrawalRequestAdminNotificationEmail;
use App\Mail\Withdrawal\withdrawalCompletedUserNotificationEmail;
use App\Models\TransactionState;
use App\Models\TransferMethod;
use App\Models\Transaction;
use App\Models\Currency;
use App\Models\Wallet;
use App\Models\Withdrawal;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Models\WithdrawalMethod;
use Carbon\Carbon;
use App\Models\Notificacion;
use App\Http\Controllers\NotificacionController;
use Illuminate\Support\Facades\Storage;

class WithdrawalController extends Controller
{
    public function index(Request $request, $lang){
        if(Auth::user()->currentWallet() == null){
            return redirect(route('show.currencies', app()->getLocale()));
        }
    	$withdrawals = Withdrawal::with(['transferMethod','Status'])->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(10);
    	return view('withdrawals.index')
    	->with('withdrawals', $withdrawals);

    }

    public function payoutForm(Request $request, $lang, $wallet_id){
        if(Auth::user()->currentWallet() == null){
            return redirect(route('show.currencies', app()->getLocale()));
        }
        $wallet = Wallet::findOrFail($wallet_id);

        if($wallet_id != Auth::user()->currentWallet()->id){
            abort(404);
        } 

        $transferMethod = TransferMethod::findOrFail($wallet->transfer_method_id);

        return view('withdrawals.transfer')
        ->with('transferMethod', $transferMethod)
        ->with('wid', $wallet->id);

    }

    public function getWithdrawalRequestForm(Request $request, $method_id = false){

    	 $methods = Auth::user()->currentCurrency()->WithdrawalMethods()->get();
        if ($method_id) {

            $current_method = WithdrawalMethod::where('id', $method_id)->first();

            if ($current_method == null) {
                dd('please contact admin to link a withdrawal method to '.Auth::user()->currentCurrency()->name.' currency');
            }
        }else{
            if (isset($methods[0]) ) {
               $current_method = $methods[0];
            } else{
                dd('please contact admin to link a withdraw method to '.Auth::user()->currentCurrency()->name.' currency');
            }
        }

        
        $currencies = Currency::where('id' , '!=', Auth::user()->currentCurrency()->id)->get();

    	return view('withdrawals.withdrawalRequestForm')
    	->with('current_method', $current_method)
        ->with('currencies', $currencies)
    	->with('methods', $methods);
    }

    public function makeRequest(Request $request, $lang){
        //HERE
        
        $wallet = Wallet::findOrFail($request->wid);

        if($wallet->id != Auth::user()->currentWallet()->id){
            abort(404);
        }

        $this->validate($request, [
            'amount'   =>  'required|numeric',
        ]);

        $transferMethod = TransferMethod::findOrFail($wallet->transfer_method_id);

        if($wallet->amount < $request->amount){
            flash(__('your balance is not enouth to withdrawal '. $request->amount) , 'danger');
             return  back();
        }


        if ( $wallet->is_crypto == 1 ){
            $precision = 8 ;
        } else {
            $precision = 2;
        }


        if ( Auth::user()->account_status == 0 ) {
            flash(__('Your account is under a withdrawal request review proccess. Please wait until your request is complete in a few minutes to continue with your activities.') , 'danger');
             return  back();
        }

        $withdraw_fee = bcadd( bcmul ( ( $transferMethod->withdraw_percentage_fee / 100 ), $request->amount, $precision) , $transferMethod->withdraw_fixed_fee, $precision ) ;
    
        $withdraw_net = bcsub($request->amount, $withdraw_fee, $precision );
    	
        $withdrawal = Withdrawal::create([
            'user_id'   =>  Auth::user()->id,
            'transaction_state_id'  =>  3,
            'transfer_method_id'    =>  $transferMethod->id,
            'withdrawal_method_id'  => 1,
            'platform_id'  =>  $wallet->accont_identifier_mechanism_value,
            'send_to_platform_name' =>  $transferMethod->name,
            'gross' =>  $request->amount,
            'fee'   =>  $withdraw_fee,
            'currency_id'   =>  $transferMethod->currency_id,
            'currency_symbol'   =>  $transferMethod->currency->symbol,
            'wallet_id' => $wallet->id,
            'net'   =>   $withdraw_net,
        ]);

        // Send Alert to Admin 
        Mail::send(new withdrawalRequestAdminNotificationEmail($withdrawal, Auth::user()));

        //Send new withdraw request notification Mail to user
        Mail::send(new withdrawalRequestUserEmail( $withdrawal, Auth::user()));

        return redirect(route('withdrawal.index', app()->getLocale()));
    }

    public function confirmWithdrawal(Request $request, $lang){

        
        if (!Auth::user()->isAdministrator()) {
            abort (404);
        }


        $withdrawal = Withdrawal::with('transferMethod')->findOrFail($request->id);
        $transferMethod = TransferMethod::findOrFail($withdrawal->transfer_method_id);


        if ($withdrawal->transaction_state_id != 3 and $withdrawal->transaction_state_id != 2 ) {
            flash(__('Transaction Already completed !'), 'info' );
            //return redirect(url('/').'/admin/withdrawals/'.$withdrawal->id);

            return back();
        }

        $user = User::findOrFail($request->user_id);

        $wallet = Wallet::findOrFail($withdrawal->wallet_id);

        if ( $wallet->is_crypto == 1 ){
            $precision = 8 ;
        } else {
            $precision = 2;
        }


        if ($wallet->amount < $withdrawal->gross) {
            flash('User doesen\'t have enought funds to withdraw '.$withdrawal->gross.' $', 'danger' );

            return back();
        }

        if($request->transaction_state_id == 1 ){
            
            $wallet->amount = bcsub($wallet->amount ,$withdrawal->gross, $precision);

        } else {

            $state = TransactionState::findOrFail($request->transaction_state_id);

            dd( 'Withdrawal stil  ' . $state->name);

        }


        $user->RecentActivity()->save($withdrawal->Transactions()->create([
            'user_id' => $user->id,
            'entity_id'   =>  $user->id,
            'entity_name' =>  $transferMethod->name,
            'transaction_state_id'  =>  $request->transaction_state_id, // waiting confirmation
            'money_flow'    => '-',
            'activity_title'    =>  'Withdrawal',
            'balance'   =>   $wallet->amount,
            'thumb' =>  $transferMethod->thumbnail,
            'gross' =>  $withdrawal->gross,
            'fee'   =>  $withdrawal->fee,
            'net'   =>  $withdrawal->net,
            'currency_id'   =>  $withdrawal->currency_id,
            'currency_symbol'   =>  $withdrawal->currency_symbol,
        ]));

        
        $withdrawal->transaction_state_id = $request->transaction_state_id;

        $withdrawal->save();
        $user->account_status = 1;
        $wallet->save();
        $user->save();

        //Send Notification to User
        Mail::send(new withdrawalCompletedUserNotificationEmail($withdrawal, $user));
        
        return redirect(url('/').'/admin/dashboard/withdrawals/'.$withdrawal->id);
        
    }
    // Redas - Inicio
    public function retiros(Request $request, $lang){
        if(Auth::user()->currentWallet() == null){
            return redirect(route('show.currencies', app()->getLocale()));
        }
    	$retiros = Withdrawal::with(['transferMethod','Status'])->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(10);

        $notificacion = new NotificacionController();

        $vectorNotificaciones = $notificacion->index();

    	return view('retiros.index')
    	->with('retiros', $retiros)
        ->with('vectorNotificaciones', $vectorNotificaciones);
    }

    public function agregarRetiro(Request $request, $lang, $id){

        $billetera = Wallet::findOrFail($id); 
        
        $mensajeError = '';
        
        return view('retiros.agregarRetiro')
        ->with('billetera', $billetera)->with('mensajeError', $mensajeError);
    }

    public function calcularRetiro( Request $request, $laang){
         
        $billeteraEkcux = Wallet::findOrFail(Auth::user()->wallet_id); 
        $billetera = Wallet::findOrFail($request->wid); 

        $vectorRetiro = [];
        $mensajeError = '';

        if ($billeteraEkcux->fiat >= $request->monto_retiro)
        {
            $tasaCambioInicial          = round($billeteraEkcux->currency->tasa_cambio * $billetera->currency->tasa_cambio, 2);
            $montoInicial               = round($request->monto_retiro * $tasaCambioInicial, 2);  
            $comisionCajero             = round($montoInicial * $billetera->transferMethod->deposit_percentage_fee, 2);
            $comisionServicio           = round($montoInicial * $billetera->transferMethod->deposit_fixed_fee, 2);
            $costoFijoTransaccion       = round($billetera->transferMethod->merchant_fixed_fee * $tasaCambioInicial, 2);    
            $netoARecibir               = round($montoInicial - $comisionCajero - $comisionServicio - $costoFijoTransaccion, 2);
            $tasaCambioFinal            = round($netoARecibir/$request->monto_retiro, 2);

            $vectorRetiro = 
                [
                    'monto_retiro'                  =>  $request->monto_retiro,
                    'moneda_metodo'                 =>  $billetera->currency->code,
                    'tasa_cambio_Ekcux'             =>  $billeteraEkcux->currency->tasa_cambio, 
                    'tasa_cambio_metodo'            =>  $billetera->currency->tasa_cambio,
                    'tasa_cambio_inicial'           =>  $tasaCambioInicial,      
                    'monto-inicial'                 =>  $montoInicial,   
                    'porcentaje_comision_cajero'    =>  round($billetera->transferMethod->deposit_percentage_fee * 100, 2),
                    'comision_cajero'               =>  $comisionCajero,
                    'porcentaje_comision_servicio'  =>  round($billetera->transferMethod->deposit_fixed_fee * 100, 2),  
                    'comision_servicio'             =>  $comisionServicio,
                    'costo_fijo_transaccion'        =>  $costoFijoTransaccion,
                    'neto_a_recibir'                =>  $netoARecibir,
                    'tasa_cambio_final'             =>  $tasaCambioFinal
                ];
                return view('retiros.calcularRetiro')
                ->with('billetera', $billetera)->with('vectorRetiro', $vectorRetiro)->with('mensajeError', $mensajeError)->with('montoRetiro', $request->monto_retiro);
        }
        else
        {
            $mensajeError = 'El monto del retiro ' . $request->monto_retiro . ' es superior al disponible ' . $billeteraEkcux->fiat;
            return view('retiros.agregarRetiro')
            ->with('billetera', $billetera)->with('mensajeError', $mensajeError)->with('montoRetiro', $request->monto_retiro);
        }
    }

    public function confirmarRetiro( Request $request, $lang){
         
        $transferMethod = TransferMethod::findOrFail($request->tmid);

        $billetera = Wallet::findOrFail($request->wid); 

        $comisionesRetiro = round($request->comision_cajero + $request->comision_servicio + $request->costo_fijo_transaccion, 2);

    	$retiroRequest = Withdrawal::create([
    		'user_id'	            =>  Auth::user()->id,
    		'transaction_state_id'	=>	3,
            'withdrawal_method_id'  =>  8,
    		'gross'	                =>	$request->monto_retiro,
    		'fee'	                =>	$comisionesRetiro,
    		'net'	                =>	$request->neto_a_recibir,
            'platform_id'           =>  $billetera->accont_identifier_mechanism_value,
    		'json_data'	            =>	'',
            'currency_symbol'       =>  $transferMethod->currency->symbol,
            'wallet_id'             =>  Auth::user()->wallet_id,
            'send_to_platform_name' =>  $transferMethod->name,
            'currency_id'           =>  $transferMethod->currency_id,
            'transfer_method_id'    =>  $transferMethod->id,
            'unique_transaction_id' =>  ''
        ]);

        $retiro = Withdrawal::where(
            [
                ['user_id', Auth::user()->id],
                ['gross', $request->monto_retiro],
                ['fee',	$comisionesRetiro],
                ['net', $request->neto_a_recibir],
                ['platform_id', $billetera->accont_identifier_mechanism_value],
                ['wallet_id', Auth::user()->wallet_id],
                ['send_to_platform_name', $transferMethod->name],
                ['currency_id', $transferMethod->currency_id],
                ['transfer_method_id', $transferMethod->id],
            ])
            ->orderby('id', 'desc')
            ->first();

        $datosParaTransaccion = 'Monto: '.$retiro->currency_symbol.' '.number_format($retiro->net, 2,",", ".").'. Nro. de cuenta '.$retiro->platform_id.' Entidad financiera '. $retiro->send_to_platform_name;

        $billeteraEkcux = Wallet::findOrFail(Auth::user()->wallet_id); 

        Auth::user()->RecentActivity()->save($retiro->Transactions()->create([
            'user_id'                   =>  Auth::user()->id,
            'entity_id'                 =>  $transferMethod->id,
            'entity_name'               =>  $transferMethod->name,
            'transaction_state_id'      =>  3,
            'money_flow'                => '-',
            'activity_title'            =>  'Retiro',
            'balance'                   =>  $billeteraEkcux->fiat,
            'thumb'                     =>  $transferMethod->thumbnail,
            'gross'                     =>  $request->monto_retiro,
            'fee'                       =>  $comisionesRetiro,
            'net'                       =>  $request->neto_a_recibir,
            'currency_id'               =>  $transferMethod->currency_id,
            'currency_symbol'           =>  $transferMethod->currency->symbol,
            'datos_para_transaccion'    =>  $datosParaTransaccion
        ]));

        $billeteraEkcux = Wallet::findOrFail(Auth::user()->wallet_id); 
        $billeteraEkcux->fiat = $billeteraEkcux->fiat - $request->monto_retiro;
        $billeteraEkcux->save();

        Mail::send(new withdrawalRequestUserEmail( $retiroRequest, Auth::user()));

    	flash('Su retiro está en espera', 'info');

    	return  redirect(route('retiros', app()->getLocale()));
    }

    public function aceptarRetiro(Request $request, $lang)
    {
        $this->validate($request, [
            'tid'   => 'required|numeric',
        ]);

        $transaction = Transaction::find($request->tid);
        $retiro = Withdrawal::find($transaction->transactionable_id);

        $billetera = Wallet::where('user_id', Auth::user()->id)->where('transfer_method_id', $transaction->entity_id)->first();

        if ($billetera != null):

            $fondeoRetiro = Deposit::create([
                'user_id'	=>	Auth::user()->id,
                'wallet_id' =>  Auth::user()->wallet_id,
                'currency_id'   => $retiro->currency_id,
                'currency_symbol'   => $retiro->currency_symbol,
                'transaction_state_id'	=>	5,
                'deposit_method_id'	=>	9,
                'gross'	=>	$transaction->gross,
                'fee'	=>	$transaction->fee,
                'net'	=>	$transaction->net,
                'message'   =>  '',
                'transaction_receipt'	=>	'',
                'json_data'	=>	'',
                'transfer_method_id' => $retiro->transfer_method_id,
                'unique_transaction_id' => ''
            ]);

            $idFondeoCreado = $fondeoRetiro->id;
        
            $transaction->transaction_state_id = 5;
            $transaction->usuario_aceptante_id = Auth::user()->id;
            $transaction->fecha_hora_aceptacion = Carbon::now();
            $transaction->save();

            $retiro->transaction_state_id = 5;
            $retiro->contrapartida_id = $idFondeoCreado;
            $retiro->save();

            $notificacion = 'Retiro aceptado por '. Auth::user()->name.'. Espera una transferencia por un monto de '.$retiro->currency_symbol.' '.number_format($retiro->net, 2, ",", ".").' en la cuenta Nro. '.$retiro->platform_id.' de la entidad financiera '. $retiro->send_to_platform_name;
            
            Notificacion::create(
                [
                    'user_id'	            =>  $transaction->user_id,
                    'notificacion'	        =>	$notificacion,
                    'estatus_notificacion'  =>  'Creada'
                ]);

            flash(__('Retiro aceptado: Debes transferir '.$retiro->currency_symbol.' '.number_format($retiro->net, 2, ",", ".").' a la cuenta Nro. '.$retiro->platform_id.' de la entidad financiera '. $retiro->send_to_platform_name), 'success');
        else:
            flash(__('Usted no tiene una cuenta registrada de la entidad financiera '.$retiro->send_to_platform_name), 'danger');
        endif;

        return redirect(app()->getLocale().'/solicitudes/retiros-aceptados');
    }
    public function agregarPagoRetiro(Request $request, $lang, $idTransaccion)
    {
        $transaccion = Transaction::findOrFail($idTransaccion);
        $retiro = Withdrawal::findOrFail($transaccion->transactionable_id);
        return view('retiros.agregarPagoRetiro')
            ->with('transaccion', $transaccion)
            ->with('retiro', $retiro);
    }
    public function guardarPagoRetiro( Request $request, $lang){

    	$this->validate($request, [
    		'deposit_screenshot'	=> 'required|mimes:jpg,png,jpeg',
            'message'   =>  'required',
            'unique_transaction_id'  =>  'required',
            'transaccion_id'  =>  'required|exists:transactionable,id',
            'retiro_id' =>  'required|exists:withdrawals,id',
    	]);
           
        $transaccion = Transaction::findOrFail($request->transaccion_id);
        $retiro = Withdrawal::findOrFail($request->retiro_id);
        $deposito = Deposit::findOrFail($request->fondeo_id);

    	if ( $request->hasFile('deposit_screenshot') ) {
    		$file = $request->file('deposit_screenshot');
    		$path = 'users/'.Auth::user()->name.'/retiros/'.preg_replace('/\s/', '', $file->getClientOriginalName());
    		Storage::put($path, $file);

    		$local_path = Storage::put($path, $file);

    		$link = Storage::url($local_path);
    	}

        $transaccion->transaction_state_id = 6;
        $transaccion->save();

        $retiro->transaction_state_id = 6;
        $retiro->json_data = '{"retiro_screenshot":"'.$path.'"}';
        $retiro->unique_transaction_id = $request->unique_transaction_id;
        $retiro->recibo_transferencia = $link;
        $retiro->mensaje = $request->message;
        $retiro->save();

        $deposito->transaction_state_id = 6;
        $deposito->message = $request->message;
        $deposito->transaction_receipt = $link;
        $deposito->json_data = '{"retiro_screenshot":"'.$path.'"}';
        $deposito->unique_transaction_id = $request->unique_transaction_id;
        $deposito->save();

        $notificacion = 'Transferencia realizada en su cuenta bancaria identificada con el Nro. '.$request->unique_transaction_id;
        
        Notificacion::create(
            [
    		    'user_id'	            =>  $transaccion->user_id,
    		    'notificacion'	        =>	$notificacion,
                'estatus_notificacion'  =>  'Creada'
            ]);

    	flash('Su pago está en espera de confirmación', 'info');

    	return redirect(app()->getLocale().'/solicitudes/retiros-aceptados');
    }
    public function confirmarTransferenciaRetiro(Request $request, $lang)
    {
        $this->validate($request, [
            'rid'   => 'required|numeric',
        ]);
        /*
        $retiro = Withdrawal::find($request->rid);
        $retiro->transaction_state_id = 7;
        $retiro->save();
        */
        $transaction = Transaction::where('transactionable_id', $request->rid)->first();
        /*
        $transaction->transaction_state_id = 7;
        $transaction->save();

        $deposit = Deposit::find($retiro->contrapartida_id);
        $deposit->transaction_state_id = 7;
        $deposit->save();
        
        $billeteraEkcux = Wallet::find($deposit->wallet_id);
        $billeteraEkcux->fiat = $billeteraEkcux->fiat + $deposit->gross;
        $billeteraEkcux->save();
        
        $notificacion = 'Confirmado recibo de fondos según comprobante Nro. '. $deposit->unique_transaction_id;
       
        Notificacion::create(
            [
    		    'user_id'	            =>  $transaction->usuario_aceptante_id,
    		    'notificacion'	        =>	$notificacion,
                'estatus_notificacion'  =>  'Creada'
            ]);

        $notificacion = 'Se abonó a su cuenta E-USD: '.number_format($deposit->gross, 2, ",", ".");
    
        Notificacion::create(
            [
                'user_id'	            =>  $transaction->usuario_aceptante_id,
                'notificacion'	        =>	$notificacion,
                'estatus_notificacion'  =>  'Creada'
            ]);
        */
        flash(__('Transferencia confirmada'), 'success');

        return redirect(app()->getLocale().'/calificar/'.$transaction->id);
    }
    // Redas - fin
}
