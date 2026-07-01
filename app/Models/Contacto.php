<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nombre', 'correo', 'tipo_mensaje', 'mensaje', 'estado'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}