<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Maincurrency;
use App\Models\Currency;
use App\Models\Wallet;
use App\Models\Trade;
use App\Models\Closedtrade;
use Illuminate\Http\Request;

class TradeController extends Controller
{   

    public function myClosed(Request $request, $lang){
        $main_currency = Maincurrency::with('currency')->first();
        

        $currency = Currency::where('id', '!=', $main_currency->id)->get();

        $closed_trades = Closedtrade::with('trade')->where('user_id', Auth::user()->id)->paginate(10);

        return view('trade.myclosedtrades')->with([
            'currencies' => $currency,
            'closed_trades'    =>  $closed_trades,
            'maincurrency'  =>  $main_currency->currency,
        ]);
    }
    
    public function myBook(Request $request, $lang){
        $main_currency = Maincurrency::with('currency')->first();
        

        $currency = Currency::where('id', '!=', $main_currency->id)->get();

        
        $trades = Trade::with('user', 'currency', 'wallet')->where('user_id', Auth::user()->id)->orderBy('price', 'asc')->paginate(10);

        return view('trade.mypositions')->with([
            'currencies' => $currency,
            'trades'    =>  $trades,
            'maincurrency'  =>  $main_currency->currency,
        ]);
    }
    
    public function offerbook(Request $request, $lang){

    	$main_currency = Maincurrency::with('currency')->first();
    	

        $currency = Currency::where('id', '!=', $main_currency->id)->get();

    	
        $trades = Trade::with('user', 'currency', 'wallet')->where('state', 1)->orderBy('price', 'asc')->paginate(10);

    	return view('trade.offerbook')->with([
    		'currencies' => $currency,
    		'trades'	=>	$trades,
    		'maincurrency'	=>	$main_currency->currency,
    	]);
    }

    public function liquidateForm(Request $request, $lang, $id){

    	$main_currency = Maincurrency::with('currency')->first();
    	
        $currency = Currency::where('id', '!=', $main_currency->id)->get();

    	$utrade = Trade::with('user', 'currency', 'wallet')->where('id', $id)->first();

    	if($utrade == null){
    		abort(404);
    	}

    	if($utrade->state == 0){
    		flash('this positioin is closed', 'info');
            return back();
    	}


        if(Auth::user()->id == $utrade->user->id){
            $utrade->state = 0;
            flash('Listing remove from market successfully.', 'success');
            $utrade->save();
            return back();

        } 

    	$trades = Trade::with('user', 'currency', 'wallet')->where('state', 1)->orderBy('price', 'asc')->paginate(10);

    	return view('trade.liquidform')->with([
    		'currencies' => $currency,
    		'trades'	=>	$trades,
    		'maincurrency'	=>	$main_currency->currency,
    		'utrade'	=> $utrade,
    	]);
    }

    public function openPosition(Request $request, $lang){
   
    	$this->validate($request, [
    		'currency_id' =>  'required|numeric|exists:currencies,id',
    		'quantity'	=>	'required|numeric',
    		'price'	=>	'required|numeric',
    		'buy_sell'=>	'required|numeric'
    	]);

    	$main_currency = Maincurrency::with('currency')->first();

        if($main_currency->currency->id == $request->currency_id){
            flash('Something whent wrong', 'info');
            return back();
        }

    	if($request->buy_sell != 0 and $request->buy_sell != 1){
    		flash('We know you are a great hacker, but please do not try to hack us !', 'info');
    		return back();
    	}

    	$currency = Currency::where('id', $request->currency_id)->first();

    	$wallet = Wallet::where('currency_id', $request->currency_id)->where('user_id', Auth::user()->id)->first();

        $main_wallet = Wallet::where('currency_id', $main_currency->currency->id)->where('user_id', Auth::user()->id)->first();
    	
        if($wallet == null){
    		flash('You need to create a ' . $currency->name . ' wallet first .', 'danger');
    		return back();
    	}

        if($main_wallet == null){
            flash('You also need to create a ' . $main_currency->currency->name . ' wallet first .', 'danger');
            return back();
        }

    	if( $wallet->amount < $request->quantity ){
    		flash('Your  ' . $currency->name . ' wallet does\'nt have enouth funds to sell ' . $request->amount . ' ' . $currency->code , 'danger');
    		return back();
    	}

    	$trade = Trade::create([
    		'user_id' => Auth::user()->id,
    		'currency_id'	=>	$currency->id,
    		'wallet_id'	=>		$wallet->id,
    		'buy_sell'	=>	$request->buy_sell,
    		'price'	=>	$request->price,
    		'quantity'	=>	$request->quantity,
    		'status_name'	=>	'active',
    		'is_crypto'	=>	$currency->is_crypto,
    	]);

    	flash('Position opened successfully', 'success');
    	return back();

    }

    public function liquidate(Request $request, $lang){
    		
        $this->validate($request, [
            'trade_id' => 'required|numeric|exists:trades,id',
            'quantity'  =>  'required|numeric',
        ]);

        $main_currency = Maincurrency::with('currency')->first();
        
        $trade = Trade::with('user', 'currency', 'wallet')->where('id', $request->trade_id)->first();

        if( $trade->user->id == Auth::user()->id)
        {
            return back();
        }

        if($trade == null){
            flash('Something went wrong with the trade', 'danger');
            return back();
        }

        $wallet = Wallet::where('user_id', Auth::user()->id)->where('currency_id', $trade->currency->id)->first();

        if($wallet == null){
            flash('You also need to create a ' . $wallet->currency->name . ' wallet first .', 'danger');
            return back();
        }

        $main_wallet = Wallet::where('user_id', Auth::user()->id)->where('currency_id', $main_currency->currency->id)->first();

        if($main_wallet == null){
            flash('You also need to create a ' . $main_currency->currency->name . ' wallet first .', 'danger');
            return back();
        }
        
        $trade_wallet = $trade->wallet ;

        
        $trade_main_wallet = Wallet::where('user_id', $trade->user->id)->where('currency_id', $main_currency->currency->id)->first();

        if($request->quantity > $trade->quantity){
            flash(' The available quantity is not enouth for the quantity you entered !  ', 'danger');
            return back();
        }

        if($trade->buy_sell == 0)
        {   
            //User is selling
            //Auth is buying
            //take coin from trade wallet ( crypto ). send main coin from main_wallet 
            

            $money_to_send = bcmul($trade->price, $request->quantity, 8);

            //check if i have enouth usd to send
            if( $main_wallet->amount < $money_to_send ){
                flash('You need at least '. $money_to_send . ' '. $main_currency->currency->code .' ' . 'to make this trade', 'danger' );
                return back();
            }
            
            //check if guy has enouth btc to give me
            if($trade_wallet->amount < $request->quantity ){
                flash($trade->user->name . ' doesn\'t have enouth '. $request->quantity .' ' . $trade->currency->code. ' ' . 'to provide for this trade', 'danger' );
                return back();
            }

            //send main 
            $main_wallet->amount = bcsub( $main_wallet->amount, $money_to_send , 8);
            $trade_main_wallet->amount = bcadd( $trade_main_wallet->amount, $money_to_send, 8);
            // receive coin
            $wallet->amount = bcadd($wallet->amount, $request->quantity, 8);
            $trade_wallet->amount = bcsub($trade_wallet->amount, $request->quantity, 8);

            $trade->quantity = bcsub($trade->quantity, $request->quantity, 8);

            $authtrade = Closedtrade::create([
                'user_id' => Auth::user()->id,
                'trade_id'  =>  $trade->id,
                'trader_id' =>  $trade->user->id,
                'is_crypto' =>  $trade->currency->is_crypto,
                'quantity'  =>  $request->quantity,
                'status_name'   =>  'Bought'
            ]);

            $tradertrade = Closedtrade::create([
                'user_id'   =>  $trade->user->id,
                'trade_id'      =>  $trade->id,
                'trader_id' =>  Auth::user()->id,
                'is_crypto' =>  $trade->currency->is_crypto,
                'quantity'  =>  $request->quantity,
                'status_name'   =>  'Sold'
            ]);

            $user = $trade->user;

            $user->RecentActivity()->save($tradertrade->Transactions()->create([
                'user_id' => $user->id,
                'entity_id'   =>  $user->id,
                'entity_name' =>   $main_currency->currency->name,
                'transaction_state_id'  =>  1, // waiting confirmation
                'money_flow'    => '+',
                'activity_title'    =>  'Sell Trade',
                'balance'   =>   $trade_main_wallet->amount,
                'currency_id'   =>   $main_currency->currency->id,
                'currency_symbol'   =>   $main_currency->currency->symbol,
                'thumb' =>  $main_currency->currency->thumb,
                'gross' =>   $money_to_send,
                'fee'   =>  0,
                'net'   =>   $money_to_send
            ]));

            $user->RecentActivity()->save($tradertrade->Transactions()->create([
                'user_id' => $user->id,
                'entity_id'   =>  $user->id,
                'entity_name' =>   $trade->currency->name,
                'transaction_state_id'  =>  1, // waiting confirmation
                'money_flow'    => '-',
                'activity_title'    =>  'Sell Trade',
                'balance'   =>   $trade_wallet->amount,
                'currency_id'   =>   $trade->currency->id,
                'currency_symbol'   =>   $trade->currency->symbol,
                'thumb' =>  $trade->currency->thumb,
                'gross' =>   $request->quantity,
                'fee'   =>  0,
                'net'   =>   $request->quantity
            ]));


            Auth::user()->RecentActivity()->save($authtrade->Transactions()->create([
                'user_id' => Auth::user()->id,
                'entity_id'   =>  Auth::user()->id,
                'entity_name' =>   $main_currency->currency->name,
                'transaction_state_id'  =>  1, // waiting confirmation
                'money_flow'    => '-',
                'activity_title'    =>  'Buy Trade',
                'balance'   =>   $main_wallet->amount,
                'currency_id'   =>   $main_currency->currency->id,
                'currency_symbol'   =>   $main_currency->currency->symbol,
                'thumb' =>  $main_currency->currency->thumb,
                'gross' =>   $money_to_send,
                'fee'   =>  0,
                'net'   =>   $money_to_send
            ]));

            Auth::user()->RecentActivity()->save($authtrade->Transactions()->create([
                'user_id' => Auth::user()->id,
                'entity_id'   =>  Auth::user()->id,
                'entity_name' =>   $trade->currency->name,
                'transaction_state_id'  =>  1, // waiting confirmation
                'money_flow'    => '+',
                'activity_title'    =>  'Buy Trade',
                'balance'   =>   $wallet->amount,
                'currency_id'   =>   $trade->currency->id,
                'currency_symbol'   =>   $trade->currency->symbol,
                'thumb' =>  $trade->currency->thumb,
                'gross' =>   $request->quantity,
                'fee'   =>  0,
                'net'   =>   $request->quantity
            ]));

            //TODO
            //make transactions
            //store closedtrade

            

        }
        elseif($trade->buy_sell == 1)
        {   
            //User is buying
            //Auth is selling
            // take main coin ( usd ) from trade user main coin wallet. send coin ( crypto ) from wallet


            $money_to_receive = bcmul($trade->price, $request->quantity, 8);

            //check if guy has enouth money to buy from me 
            if( $trade_main_wallet->amount < $money_to_receive ){
                flash($trade->user->name . 'doesn\'t have enouth '.  $main_currency->currency->code .' ' . 'to buy '.  $trade->currency->code . ' from you ', 'danger' );
                return back();
            }
            
            //check if i have enouth btc to send
            if($wallet->amount < $request->quantity ){
                flash('you do not have '. $request->quantity .' ' . $trade->currency->code. ' ' . 'to provide for this trade', 'danger' );
                return back();
            }

            // receive main
            $main_wallet->amount = bcadd( $main_wallet->amount, $money_to_receive , 8);
            $trade_main_wallet->amount = bcsub( $trade_main_wallet->amount, $money_to_receive, 8);
            
            //send coin 
            $wallet->amount = bcsub($wallet->amount, $request->quantity, 8);
            $trade_wallet->amount = bcadd($trade_wallet->amount, $request->quantity, 8);

            $trade->quantity = bcsub($trade->quantity, $request->quantity, 8);

            $authtrade = Closedtrade::create([
                'user_id' => Auth::user()->id,
                'trade_id'  =>  $trade->id,
                'trader_id' =>  $trade->user->id,
                'is_crypto' =>  $trade->currency->is_crypto,
                'quantity'  =>  $request->quantity,
                'status_name'   =>  'Sold'
            ]);

            $tradertrade = Closedtrade::create([
                'user_id'   =>  $trade->user->id,
                'trade_id'      =>  $trade->id,
                'trader_id' =>  Auth::user()->id,
                'is_crypto' =>  $trade->currency->is_crypto,
                'quantity'  =>  $request->quantity,
                'status_name'   =>  'Bought'
            ]);

            $user = $trade->user;

            $user->RecentActivity()->save($tradertrade->Transactions()->create([
                'user_id' => $user->id,
                'entity_id'   =>  $user->id,
                'entity_name' =>   $main_currency->currency->name,
                'transaction_state_id'  =>  1, // waiting confirmation
                'money_flow'    => '_',
                'activity_title'    =>  'Buy Trade',
                'balance'   =>   $trade_main_wallet->amount,
                'currency_id'   =>   $main_currency->currency->id,
                'currency_symbol'   =>   $main_currency->currency->symbol,
                'thumb' =>  $main_currency->currency->thumb,
                'gross' =>   $money_to_send,
                'fee'   =>  0,
                'net'   =>   $money_to_send
            ]));

            $user->RecentActivity()->save($tradertrade->Transactions()->create([
                'user_id' => $user->id,
                'entity_id'   =>  $user->id,
                'entity_name' =>   $trade->currency->name,
                'transaction_state_id'  =>  1, // waiting confirmation
                'money_flow'    => '+',
                'activity_title'    =>  'Buy Trade',
                'balance'   =>   $trade_wallet->amount,
                'currency_id'   =>   $trade->currency->id,
                'currency_symbol'   =>   $trade->currency->symbol,
                'thumb' =>  $trade->currency->thumb,
                'gross' =>   $request->quantity,
                'fee'   =>  0,
                'net'   =>   $request->quantity
            ]));


            Auth::user()->RecentActivity()->save($authtrade->Transactions()->create([
                'user_id' => Auth::user()->id,
                'entity_id'   =>  Auth::user()->id,
                'entity_name' =>   $main_currency->currency->name,
                'transaction_state_id'  =>  1, // waiting confirmation
                'money_flow'    => '+',
                'activity_title'    =>  'Sell Trade',
                'balance'   =>   $main_wallet->amount,
                'currency_id'   =>   $main_currency->currency->id,
                'currency_symbol'   =>   $main_currency->currency->symbol,
                'thumb' =>  $main_currency->currency->thumb,
                'gross' =>   $money_to_send,
                'fee'   =>  0,
                'net'   =>   $money_to_send
            ]));

            Auth::user()->RecentActivity()->save($authtrade->Transactions()->create([
                'user_id' => Auth::user()->id,
                'entity_id'   =>  Auth::user()->id,
                'entity_name' =>   $trade->currency->name,
                'transaction_state_id'  =>  1, // waiting confirmation
                'money_flow'    => '-',
                'activity_title'    =>  'Sell Trade',
                'balance'   =>   $wallet->amount,
                'currency_id'   =>   $trade->currency->id,
                'currency_symbol'   =>   $trade->currency->symbol,
                'thumb' =>  $trade->currency->thumb,
                'gross' =>   $request->quantity,
                'fee'   =>  0,
                'net'   =>   $request->quantity
            ]));



        }


        $wallet->save();
        $main_wallet->save();
        $trade_wallet->save();
        $trade_main_wallet->save();
        $trade->save();

       return redirect(app()->getLocale().'/home');



    }
}
