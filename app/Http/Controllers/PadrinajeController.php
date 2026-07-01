<?php

namespace App\Http\Controllers;

use App\Models\Perro;
use App\Models\SolicitudPadrinaje;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PadrinajeController extends Controller
{
    // Paso 1: Formulario de compromiso
    public function compromiso(string $tipo)
    {
        $this->validarTipo($tipo);
        return view('usuario.padrinaje.compromiso', compact('tipo'));
    }

    // Paso 1 -> Paso 2: Guarda la aceptacion del compromiso y muestra la lista de perros
    public function aceptarCompromiso(Request $request, string $tipo)
    {
        $this->validarTipo($tipo);

        $request->validate([
            'acepta' => ['required', 'accepted'],
        ]);

        session(['compromiso_aceptado_' . $tipo => true]);

        return redirect()->route('usuario.padrinaje.seleccionar', $tipo);
    }

    // Paso 2: Lista de perros disponibles para elegir
    public function seleccionar(string $tipo)
    {
        $this->validarTipo($tipo);

        if (! session('compromiso_aceptado_' . $tipo)) {
            return redirect()->route('usuario.padrinaje.compromiso', $tipo);
        }

        $perros = Perro::where('estado', 'disponible')->orderBy('nombre')->get();

        return view('usuario.padrinaje.seleccionar', compact('tipo', 'perros'));
    }

    // Paso 3: Formulario de solicitud para el perro elegido
    public function solicitarFormulario(string $tipo, Perro $perro)
    {
        $this->validarTipo($tipo);

        if (! session('compromiso_aceptado_' . $tipo)) {
            return redirect()->route('usuario.padrinaje.compromiso', $tipo);
        }

        if ($perro->estado !== 'disponible') {
            return redirect()->route('usuario.padrinaje.seleccionar', $tipo)
                ->with('error', 'Ese perrito ya no esta disponible.');
        }

        return view('usuario.padrinaje.solicitar', compact('tipo', 'perro'));
    }

    // Paso 3 -> Guardar la solicitud
    public function solicitarStore(Request $request, string $tipo, Perro $perro)
    {
        $this->validarTipo($tipo);

        $request->validate([
            'dias_paseo' => ['required', 'string', 'max:100'],
            'comentario_adicional' => ['nullable', 'string', 'max:500'],
        ]);

        $cliente = auth()->user()->cliente;

        SolicitudPadrinaje::create([
            'cliente_id' => $cliente->id,
            'perro_id' => $perro->id,
            'tipo_padrinaje' => $tipo,
            'dias_paseo' => $request->dias_paseo,
            'acepta_compromiso' => true,
            'comentario_adicional' => $request->comentario_adicional,
            'estado' => 'pendiente',
        ]);

        session()->forget('compromiso_aceptado_' . $tipo);

        return redirect()->route('usuario.panel')
            ->with('success', 'Tu solicitud de padrinaje fue enviada y esta pendiente de revision.');
    }

    private function validarTipo(string $tipo): void
    {
        abort_unless(in_array($tipo, ['corporativo', 'universitario', 'fin_de_semana']), 404);
    }
}