<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPadrinaje extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_padrinaje';

    protected $fillable = [
        'cliente_id', 'perro_id', 'tipo_padrinaje',
        'dias_paseo', 'acepta_compromiso', 'comentario_adicional', 'estado'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function perro()
    {
        return $this->belongsTo(Perro::class);
    }
}