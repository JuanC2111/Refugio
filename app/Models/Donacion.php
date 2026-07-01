<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;

    protected $table = 'donaciones';

    protected $fillable = ['user_id', 'monto', 'nombre_donante', 'correo_donante', 'estado'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}