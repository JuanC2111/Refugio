<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perro extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'edad', 'historia', 'necesidades_especiales', 'foto', 'estado'];

    public function solicitudes()
    {
        return $this->hasMany(SolicitudPadrinaje::class);
    }
}