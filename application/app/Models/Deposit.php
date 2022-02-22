<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
	//protected $with =	['Method','Status'];
    protected $fillable = 
        [
            'user_id', 
            'transaction_state_id', 
            'deposit_method_id', 
            'gross', 
            'fee', 
            'net', 
            'transaction_receipt', 
            'json_data', 
            'currency_id', 
            'currency_symbol', 
            'wallet_id', 
            'message', 
            'transfer_method_id', 
            'unique_transaction_id', 
            'contrapartida_id'
        ];

    public function Transactions(){
        return $this->morphMany('App\Models\Transaction', 'Transactionable');
    }
    
    public function Method(){
    	return $this->hasOne(\App\Models\DepositMethod::class, 'id', 'deposit_method_id');
    }
    
    public function transferMethod(){
        return $this->hasOne(\App\Models\TransferMethod::class, 'id', 'transfer_method_id');
    }

    public function Status(){
        return $this->hasOne(\App\Models\TransactionState::class, 'id', 'transaction_state_id');
    }

    public function gross(){
        return $this->money_flow .' '. number_format((float)$this->gross, 2, '.', '') .  $this->currency_symbol;
    } 

    public function fee(){
        if ($this->fee > 0) {
            return  '- ' . number_format((float)$this->fee, 2, '.', '') . $this->currency_symbol;
        }
        return number_format((float)$this->fee, 2, '.', '') . $this->currency_symbol;
    }

    public function net(){
         return $this->money_flow .' '. number_format((float)$this->net, 2, '.', '') .  $this->currency_symbol;
    }

}
