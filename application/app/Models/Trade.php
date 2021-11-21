<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
	// state atribute
	// 0 - idle
	// 1 - active
	// 2 - liquidated

    // buy_sell attribute\
    // 0 - sell
    // 1 - buy  

    protected $fillable = ['id', 'user_id', 'trader_id', 'currency_id', 'wallet_id', 'buy_sell', 'quantity', 'price', 'is_crypto', 'status_name', 'state', 'created_at', 'updated_at'];

    public function User(){
    	return $this->belongsTo(\App\User::class);
    }

    public function Trader(){
    	return $this->belongsTo(\App\User::class, 'trader_id');
    }

    public function currency (){
    	return $this->belongsTo(\App\Models\Currency::class);
    }

    public function wallet(){
    	return $this->belongsTo(\App\Models\Wallet::class);
    }

    
    public function Transactions(){
        return $this->morphMany('App\Models\Transaction', 'Transactionable');
    }
}
