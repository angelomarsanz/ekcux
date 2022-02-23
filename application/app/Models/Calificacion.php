<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $fillable = ['user_id', 'calificacion', 'comentario', 'usuario_calificador', 'transactionable_id', 'tipo_transaccion', 'created_at', 'updated_at'];

    public function user()
    { 
        return $this->belongsTo(\App\User::class);
    }
    public function transaction()
    { 
        return $this->belongsTo(\App\Transaction::class);
    }
}
