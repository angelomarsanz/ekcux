<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransferMethod;
use Auth;
use App\Models\Wallet;
use App\Models\Currency;

class WalletController extends Controller
{
    

    public function showTransferMethods(Request $request, $lang, $currency_id){
        if (Auth::check()) {
           
        	$transfer_methods = TransferMethod::where('is_active', 1)->where('currency_id',$currency_id)->paginate('10');
          
            $currency = Currency::where('id', $currency_id)->first();
            if($transfer_methods->total() == 0){
                flash(__('contact admin to add a transfer method for the currency '. $currency->name), 'danger');
                return back();
            }
        	return view('wallet.transfer_methods')->with('methods', $transfer_methods)->with('currency', $currency);
             // The user is logged in...
        }
        return redirect(app()->getLocale().'/');

    }

    public function showCreateWalletForm(Request $request, $lang, $method_id){
        if (Auth::check()) {
           
    	   $method = TransferMethod::where('id', $method_id)->first();
    	   return view('wallet.create_wallet')->with('method', $method);
        
        }
        return redirect(app()->getLocale().'/');
    }

    public function showCurrencies(Request $request, $lang){
        if (Auth::check()) {
            $currencies = Currency::whereNotIn('id', [13, 14, 15, 18])->paginate(10);
            if(count($currencies) <= 0){
                dd('contact admin to add some currencies to work with');
            }
            return  view('wallet.currencies')->with('currencies', $currencies);
        }

        return redirect(app()->getLocale().'/');
    }

    public function createWallet(Request $request){
         if (Auth::check()) {
            //TODO
         }else{
            return redirect('/en');
         }

    	$this->validate($request, [
    		'accont_identifier_mechanism_id' => 'required',
    		'transfer_method_id' => 'required|numeric|exists:transfer_methods,id',
    	]);

    	$method = TransferMethod::findOrFail($request->transfer_method_id);

    	$currency = Currency::findOrFail($method->currency_id);

        //$userWallet = Wallet::where('transfer_method_id', $request->transfer_method_id)->where('user_id', Auth::user()->id)->first();

        $currencyWallet = Wallet::with('TransferMethods')->where('currency_id', $method->currency_id)->where('user_id', Auth::user()->id)->first();

        // Redas - Inicio

        $wallet = wallet::create([
            'is_crypto' =>  $currency->is_crypto,
            'user_id'   => Auth::user()->id,
            'amount'    =>  0,
            'currency_id'   => $currency->id,
            'transfer_method_id'    => $request->transfer_method_id,
            'accont_identifier_mechanism_value' =>  $request->accont_identifier_mechanism_id,
        ]);
        $wallet->TransferMethods()->attach($method, ['user_id'=>Auth::user()->id,'adress' => $request->accont_identifier_mechanism_id]);

        // Redas - Fin

        return redirect(app()->getLocale().'/home');
    }

    // Redas - Inicio

    public function metodosFondeo(){
        if (Auth::check()) {

            $billeterasUsuario = Wallet::with('TransferMethods')->where('user_id', Auth::user()->id)->whereNotIn('transfer_method_id', [12, 17, 18])->paginate('10');

        	return view('fondeos.metodos_fondeo')->with('billeterasUsuario', $billeterasUsuario);
        }
        return redirect(app()->getLocale().'/');
    }

    public function metodosRetiro(){
        if (Auth::check()) {

            $billeterasUsuario = Wallet::with('TransferMethods')->where('user_id', Auth::user()->id)->whereNotIn('transfer_method_id', [12, 17, 18])->paginate('10');

        	return view('retiros.metodos_retiro')->with('billeterasUsuario', $billeterasUsuario);
        }
        return redirect(app()->getLocale().'/');
    }

    // Redas - fin
}
