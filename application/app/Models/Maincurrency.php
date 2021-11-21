<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Maincurrency extends Model
{
	protected $table = 'maincurrency';

    protected $fillable = ['currency_id', 'created_at', 'updated_at'];

    public function currency(){
    	return $this->belongsTo(\App\Models\Currency::class);
    }
}
