<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $fillable = ['user_id', 'notificacion', 'estatus_notificacion', 'created_at', 'updated_at'];

    public function user()
    { 
        return $this->belongsTo(\App\User::class);
    }
}
