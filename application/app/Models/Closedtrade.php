<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Closedtrade extends Model
{
    protected $fillable = ['id', 'user_id', 'trader_id', 'trade_id', 'status_name', 'quantity', 'is_crypto', 'created_at', 'updated_at'];
    protected $table = 'closed_trades';

    public function User()
    {
    	return $this->belongsTo(\App\User::class);
    }

    public function Trader()
    {
    	return $this->belongsTo(\App\User::class, 'trader_id');
    }


    public function Trade()
    {
    	return $this->belongsTo(\App\Models\Trade::class);
    }

    public function Transactions(){
        return $this->morphMany('App\Models\Transaction', 'Transactionable');
    }
}
