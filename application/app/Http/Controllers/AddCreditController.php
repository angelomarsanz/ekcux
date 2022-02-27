<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Deposit;
use Mail;
use App\Mail\Deposit\depositRequestUserEmail;
use App\Mail\Depoist\depositRequestAdminNotificationEmail;
use App\Models\Wallet;
use App\Models\Currency;
use App\Models\DepositMethod;
use App\Models\TransferMethod;
use App\Models\Transaction;
use App\Models\Notificacion;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AddCreditController extends Controller
{
    public function AddCreditForm( $lang, $method_id = false ){
        if(Auth::user()->currentWallet() == null){
            return redirect(route('show.currencies', app()->getLocale()));
        }
        $methods = Auth::user()->currentCurrency()->DepositMethods()->get();
    	if ($method_id) {

    		$current_method = DepositMethod::where('id', $method_id)->with('currencies')->first();

    		if ($current_method == null) {
    			dd('please contact admin to link a deposit method to '.Auth::user()->currentCurrency()->name.' currency');
    		}
    	}else{
            if (isset($methods[0]) ) {
               $current_method = $methods[0];
            } else{
                dd('please contact admin to link a deposit method to '.Auth::user()->currentCurrency()->name.' currency');
            }
    	}

    	
        $currencies = Currency::where('id' , '!=', Auth::user()->currentCurrency()->id)->get();

    	return view('deposits.addCreditForm')
    	->with('current_method', $current_method)
        ->with('currencies', $currencies)
    	->with('methods', $methods);
    }

    public function depositMethods( ){
        $methods = DepositMethod::all();

        return view('deposits.methods')->with('methods', $methods);
    }

    public function depositByWallet(Request $request, $lang, $id){

        return view('deposits.transfer')
        ->with('transferMethod', Auth::user()->currentWallet()->transferMethod)->with('wid', $id);
    }

    public function depositRequest( Request $request, $laang){

    	$this->validate($request, [
    		'deposit_screenshot'	=> 'required|mimes:jpg,png,jpeg',
            'message'   =>  'required',
            'unique_transaction_id'  =>  'required',
            'tmid'  =>  'required|exists:transfer_methods,id',
            'wid' =>  'required|exists:wallets,id',
    	]);
           
        $transferMethod = TransferMethod::findOrFail($request->tmid);
        $wallet = Wallet::findOrFail($request->wid);

        if($wallet->user_id != Auth::user()->id){

            abort(404);
        }

    	if ( $request->hasFile('deposit_screenshot') ) {
    		$file = $request->file('deposit_screenshot');
    		$path = 'users/'.Auth::user()->name.'/deposits/'.preg_replace('/\s/', '', $file->getClientOriginalName());
    		Storage::put($path, $file);

    		$local_path = Storage::put($path, $file);

    		$link = Storage::url($local_path);
    	}



    	$depositRequest = Deposit::create([
    		'user_id'	=>	Auth::user()->id,
            'wallet_id' =>  $wallet->id,
            'currency_id'   =>  $transferMethod->currency_id, 
            'currency_symbol'   =>  $transferMethod->currency->symbol,
    		'transaction_state_id'	=>	3,
    		'deposit_method_id'	=>	1,
    		'gross'	=>	0,
    		'fee'	=>	0,
    		'net'	=>	0,
            'message'   =>  $request->message,
    		'transaction_receipt'	=>	$link,
    		'json_data'	=>	'{"deposit_screenshot":"'.$path.'"}',
            'transfer_method_id' => $transferMethod->id,
            'unique_transaction_id' => $request->unique_transaction_id,
    	]);

        //send notification to admin
        
        //Mail::send(new depositRequestAdminNotificationEmail( $depositRequest, Auth::user()));

        //Send new deposit request notification Mail to user
        Mail::send(new depositRequestUserEmail( $depositRequest, Auth::user()));

    	flash('Your Deposit is Waiting for a review', 'info');

    	return  redirect(route('mydeposits', app()->getLocale()));

    }
    // Redas - Inicio
    public function fondeos(Request $request, $lang){
        if(Auth::user()->currentWallet() == null){
            return redirect(route('show.currencies', app()->getLocale()));
        }
    	$deposits = Deposit::with(['transferMethod','Status'])->where('user_id', Auth::user()->id)->where('deposit_method_id', 9)->orderby('created_at', 'desc')->paginate(10);

        $transacciones = Transaction::where('user_id', Auth::user()->id)->where('activity_title', 'Fondeo')->get();

        $notificacion = new NotificacionController();

        $vectorNotificaciones = $notificacion->index();

    	return view('fondeos.index')
    	->with('deposits', $deposits)
        ->with('transacciones', $transacciones)
        ->with('vectorNotificaciones', $vectorNotificaciones);
    }
    public function agregarFondeo(Request $request, $lang, $id){

        $billetera = Wallet::findOrFail($id);       

        return view('fondeos.agregarFondeo')
        ->with('billetera', $billetera);
    }
    public function calcularFondeo( Request $request, $laang){
         
        $billeteraEkcux = Wallet::findOrFail(Auth::user()->wallet_id); 
        $billetera = Wallet::findOrFail($request->wid); 

        $tasaCambioEUsdInicial      = round($billeteraEkcux->currency->tasa_cambio * $billetera->currency->tasa_cambio, 2);
        $montoEUsdInicial           = round($request->monto_fondeo / $tasaCambioEUsdInicial, 2);  
        $comisionCajero             = round($montoEUsdInicial * $billetera->transferMethod->deposit_percentage_fee, 2);
        $comisionServicio           = round($montoEUsdInicial * $billetera->transferMethod->deposit_fixed_fee, 2);
        $costoFijoTransaccion       = $billetera->transferMethod->merchant_fixed_fee;    
        $netoARecibirEUsd           = round($montoEUsdInicial - $comisionCajero - $comisionServicio - $costoFijoTransaccion, 2);
        $tasaCambioEUsdFinal        = round($request->monto_fondeo/$netoARecibirEUsd, 2);

        $vectorFondeo = 
            [
                'monto_fondeo'                  =>  $request->monto_fondeo,
                'moneda_metodo'                 =>  $billetera->currency->code,
                'tasa_cambio_Ekcux'             =>  $billeteraEkcux->currency->tasa_cambio, 
                'tasa_cambio_metodo'            =>  $billetera->currency->tasa_cambio,
                'tasa_cambio_e-usd_inicial'     =>  $tasaCambioEUsdInicial,      
                'monto-e-usd-inicial'           =>  $montoEUsdInicial,   
                'porcentaje_comision_cajero'    =>  round($billetera->transferMethod->deposit_percentage_fee * 100, 2),
                'comision_cajero'               =>  $comisionCajero,
                'porcentaje_comision_servicio'  =>  round($billetera->transferMethod->deposit_fixed_fee * 100, 2),  
                'comision_servicio'             =>  $comisionServicio,
                'costo_fijo_transaccion'        =>  $costoFijoTransaccion,
                'neto_a_recibir_e_usd'          =>  $netoARecibirEUsd,
                'tasa_cambio_e_usd_final'       =>  $tasaCambioEUsdFinal
            ];

        return view('fondeos.calcularFondeo')
            ->with('billetera', $billetera)->with('vectorFondeo', $vectorFondeo);
    }

    public function confirmarFondeo( Request $request, $laang){
         
        $transferMethod = TransferMethod::findOrFail($request->tmid);

        $comisionesFondeo = round($request->comision_cajero + $request->comision_servicio + $request->costo_fijo_transaccion, 2);

    	$depositRequest = Deposit::create([
    		'user_id'	=>	Auth::user()->id,
            'wallet_id' =>  Auth::user()->wallet_id,
            'currency_id'   => $transferMethod->currency_id,
            'currency_symbol'   => $transferMethod->currency->symbol,
    		'transaction_state_id'	=>	3,
    		'deposit_method_id'	=>	9,
    		'gross'	=>	$request->monto_fondeo,
    		'fee'	=>	$comisionesFondeo,
    		'net'	=>	$request->neto_a_recibir_e_usd,
            'message'   =>  '',
    		'transaction_receipt'	=>	'',
    		'json_data'	=>	'',
            'transfer_method_id' => $transferMethod->id,
            'unique_transaction_id' => ''
    	]);

        $fondeo = Deposit::where(
            [
                ['user_id', Auth::user()->id],
                ['wallet_id', Auth::user()->wallet_id],
                ['currency_id', $transferMethod->currency_id],
                ['gross', $request->monto_fondeo],
                ['fee',	$comisionesFondeo],
                ['net',	$request->neto_a_recibir_e_usd],
                ['transfer_method_id', $transferMethod->id],
            ])
            ->orderby('id', 'desc')
            ->first();

        $billeteraEkcux = Wallet::findOrFail(Auth::user()->wallet_id); 

        Auth::user()->RecentActivity()->save($fondeo->Transactions()->create([
            'user_id'               =>  Auth::user()->id,
            'entity_id'             =>  $transferMethod->id,
            'entity_name'           =>  $transferMethod->name,
            'transaction_state_id'  =>  3,
            'money_flow'            => '+',
            'activity_title'        =>  'Fondeo',
            'balance'               =>  $billeteraEkcux->fiat,
            'thumb'                 =>  $transferMethod->thumbnail,
            'gross'                 =>  $request->monto_fondeo,
            'fee'                   =>  $comisionesFondeo,
            'net'                   =>  $request->neto_a_recibir_e_usd,
            'currency_id'           =>  $transferMethod->currency_id,
            'currency_symbol'       =>  $transferMethod->currency->symbol,
        ]));

        Mail::send(new depositRequestUserEmail( $depositRequest, Auth::user()));

    	flash('Su depósito está en espera', 'info');

    	return  redirect(route('fondeos', app()->getLocale()));
    }
    public function aceptarFondeo(Request $request, $lang)
    {
        $this->validate($request, [
            'tid'   => 'required|numeric',
        ]);

        $transaction = Transaction::find($request->tid);
        $deposit = Deposit::find($transaction->transactionable_id);

        $billeteraEkcux = Wallet::findOrFail(Auth::user()->wallet_id); 
        $billetera = Wallet::where('user_id', Auth::user()->id)->where('transfer_method_id', $transaction->entity_id)->first();
        $montoTotalEUsd = round($transaction->fee + $transaction->net, 2);

        if ($billeteraEkcux->fiat >= $montoTotalEUsd):
            if ($billetera != null):

                $retiroFondeo = Withdrawal::create([
                    'user_id'	            =>  Auth::user()->id,
                    'transaction_state_id'	=>	4,
                    'withdrawal_method_id'  =>  8,
                    'gross'	                =>	$transaction->gross,
                    'fee'	                =>	$transaction->fee,
                    'net'	                =>	$transaction->net,
                    'platform_id'           =>  $billetera->accont_identifier_mechanism_value,
                    'json_data'	            =>	'',
                    'currency_symbol'       =>  $deposit->currency_symbol,
                    'wallet_id'             =>  Auth::user()->wallet_id,
                    'send_to_platform_name' =>  $transaction->entity_name,
                    'currency_id'           =>  $deposit->currency_id,
                    'transfer_method_id'    =>  $deposit->transfer_method_id,
                    'unique_transaction_id' =>  '',
                    'contrapartida_id'      =>  $deposit->id
                ]);
        
                $retiroCreado = Withdrawal::where(
                    [
                        ['user_id', Auth::user()->id],
                        ['gross', $transaction->gross],
                        ['fee',	$transaction->fee],
                        ['net', $transaction->net],
                        ['platform_id', $billetera->accont_identifier_mechanism_value],
                        ['wallet_id', Auth::user()->wallet_id],
                        ['send_to_platform_name', $transaction->entity_name],
                        ['currency_id', $deposit->currency_id],
                        ['transfer_method_id', $deposit->transfer_method_id],
                    ])
                    ->orderby('id', 'desc')
                    ->first();

                $billeteraEkcux->fiat = $billeteraEkcux->fiat - $montoTotalEUsd;
                $billeteraEkcux->save();    
            
                $datosParaTransaccion = 'Monto: '.$transaction->currency_symbol.' '.number_format($transaction->gross, 2, ",", ".").'. Nro. de cuenta '.$billetera->accont_identifier_mechanism_value.' Entidad financiera '. $transaction->entity_name;

                $transaction->transaction_state_id = 4;
                $transaction->usuario_aceptante_id = Auth::user()->id;
                $transaction->fecha_hora_aceptacion = Carbon::now();
                $transaction->datos_para_transaccion = $datosParaTransaccion;
                $transaction->save();

                $deposit->transaction_state_id = 4;
                $deposit->contrapartida_id = $retiroCreado->id;
                $deposit->save();

                $notificacion = 'Fondeo aceptado por '. Auth::user()->name.'. Debes realizar un depósito o transferencia por un monto de '.$transaction->currency_symbol.' '.number_format($transaction->gross, 2, ",", ".").' en la cuenta Nro. '.$billetera->accont_identifier_mechanism_value.' de la entidad financiera '. $transaction->entity_name;
                
                Notificacion::create(
                    [
                        'user_id'	            =>  $transaction->user_id,
                        'notificacion'	        =>	$notificacion,
                        'estatus_notificacion'  =>  'Creada'
                    ]);

                flash(__('Fondeo aceptado'), 'success');
            else:
                flash(__('Usted no tiene una cuenta registrada de la entidad financiera '.$transaction->entity_name), 'danger');
            endif;
        else:
            flash(__('Usted no tiene suficiente saldo en su billetera para aceptar el fondeo de E-USD '. number_format($montoTotalEUsd, 2, ",", ".")) , 'danger');
        endif;

        return redirect(app()->getLocale().'/solicitudes/fondeos-aceptados');
    }
    public function agregarPagoFondeo(Request $request, $lang, $idTransaccion)
    {
        $transaccion = Transaction::findOrFail($idTransaccion);
        $fondeo = Deposit::findOrFail($transaccion->transactionable_id);
        return view('fondeos.agregarPagoFondeo')
            ->with('transaccion', $transaccion)
            ->with('fondeo', $fondeo);;
    }
    public function guardarPagoFondeo( Request $request, $lang){

    	$this->validate($request, [
    		'deposit_screenshot'	=> 'required|mimes:jpg,png,jpeg',
            'message'   =>  'required',
            'unique_transaction_id'  =>  'required',
            'transaccion_id'  =>  'required|exists:transactionable,id',
            'fondeo_id' =>  'required|exists:deposits,id',
    	]);
           
        $transaccion = Transaction::findOrFail($request->transaccion_id);
        $deposito = Deposit::findOrFail($request->fondeo_id);
        $retiro = Withdrawal::findOrFail($request->retiro_id);

    	if ( $request->hasFile('deposit_screenshot') ) {
    		$file = $request->file('deposit_screenshot');
    		$path = 'users/'.Auth::user()->name.'/fondeos/'.preg_replace('/\s/', '', $file->getClientOriginalName());
    		Storage::put($path, $file);

    		$local_path = Storage::put($path, $file);

    		$link = Storage::url($local_path);
    	}

        $transaccion->transaction_state_id = 6;
        $transaccion->save();

        $deposito->transaction_state_id = 6;
        $deposito->message = $request->message;
        $deposito->transaction_receipt = $link;
        $deposito->json_data = '{"fondeo_screenshot":"'.$path.'"}';
        $deposito->unique_transaction_id = $request->unique_transaction_id;
        $deposito->save();

        $retiro->transaction_state_id = 6;
        $retiro->json_data = '{"fondeo_screenshot":"'.$path.'"}';
        $retiro->unique_transaction_id = $request->unique_transaction_id;
        $retiro->recibo_transferencia = $link;
        $retiro->mensaje = $request->message;
        $retiro->save();

        $notificacion = 'Transferencia realizada en su cuenta bancaria identificada con el Nro. '.$request->unique_transaction_id;
        
        Notificacion::create(
            [
    		    'user_id'	            =>  $transaccion->usuario_aceptante_id,
    		    'notificacion'	        =>	$notificacion,
                'estatus_notificacion'  =>  'Creada'
            ]);

    	flash('Su pago está en espera de confirmación', 'info');

    	return redirect(app()->getLocale().'/fondeos');
    }
    public function confirmarTransferenciaFondeo(Request $request, $lang)
    {
        $this->validate($request, [
            'tid'   => 'required|numeric',
        ]);

        $transaction = Transaction::find($request->tid);
        $transaction->transaction_state_id = 7;
        $transaction->save();

        $deposit = Deposit::find($transaction->transactionable_id);
        $deposit->transaction_state_id = 7;
        $deposit->save();

        $retiro = Withdrawal::find($deposit->contrapartida_id);
        $retiro->transaction_state_id = 7;
        $retiro->save();
        
        $billeteraEkcux = Wallet::find($deposit->wallet_id);
        $billeteraEkcux->fiat = $billeteraEkcux->fiat + $deposit->net;
        $billeteraEkcux->save();
        
        $notificacion = 'Confirmado recibo de fondos según comprobante Nro. '. $deposit->unique_transaction_id;
       
        Notificacion::create(
            [
    		    'user_id'	            =>  $transaction->user_id,
    		    'notificacion'	        =>	$notificacion,
                'estatus_notificacion'  =>  'Creada'
            ]);

        $notificacion = 'Se abonó a su cuenta E-USD: '.number_format($deposit->net, 2, ",", ".");
    
        Notificacion::create(
            [
                'user_id'	            =>  $transaction->user_id,
                'notificacion'	        =>	$notificacion,
                'estatus_notificacion'  =>  'Creada'
            ]);

            $notificacion = 'Por favor califique a su compañero <a href="'.url('/').'/'.app()->getLocale().'/calificar/'.$transaction->id.'/leida">Calificar</a>';

            Notificacion::create(
                [
                    'user_id'	            =>  $transaction->user_id,
                    'notificacion'	        =>	$notificacion,
                    'estatus_notificacion'  =>  'Creada'
                ]);

        flash(__('Transferencia confirmada'), 'success');

        return redirect(app()->getLocale().'/calificar/'.$transaction->id);
    }
    // Redas - fin
}
