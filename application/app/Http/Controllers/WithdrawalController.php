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
use Illuminate\Http\Request;
use App\Models\WithdrawalMethod;

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
    // Radas - Inicio
    public function retiros(Request $request, $lang){
        if(Auth::user()->currentWallet() == null){
            return redirect(route('show.currencies', app()->getLocale()));
        }
    	$retiros = Withdrawal::with(['transferMethod','Status'])->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(10);
    	return view('retiros.index')
    	->with('retiros', $retiros);
    }

    public function agregarRetiro(Request $request, $lang, $id){

        $billetera = Wallet::findOrFail($id);       

        return view('retiros.agregarRetiro')
        ->with('billetera', $billetera);
    }

    public function calcularRetiro( Request $request, $laang){
         
        $billeteraEkcux = Wallet::findOrFail(Auth::user()->wallet_id); 
        $billetera = Wallet::findOrFail($request->wid); 

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
            ->with('billetera', $billetera)->with('vectorRetiro', $vectorRetiro);
    }

    public function confirmarRetiro( Request $request, $laang){
         
        $transferMethod = TransferMethod::findOrFail($request->tmid);

        $billetera = Wallet::findOrFail($request->wid); 

        $comisionesRetiro = round($request->comision_cajero + $request->comision_servicio + $request->costo_fijo_transaccion, 2);

    	$retiroRequest = Withdrawal::create([
    		'user_id'	            =>  Auth::user()->id,
    		'transaction_state_id'	=>	3,
            'withdrawal_method_id'  =>  1,
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

        Mail::send(new withdrawalRequestUserEmail( $retiroRequest, Auth::user()));

    	flash('Su retiro está en espera', 'info');

    	return  redirect(route('retiros', app()->getLocale()));
    }

    // Radas - Fin
}
