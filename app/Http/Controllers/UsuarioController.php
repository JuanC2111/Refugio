<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function panel()
    {
        $user = auth()->user();
        $cliente = $user->cliente;

        $solicitudes = $cliente
            ->solicitudes()
            ->with('perro')
            ->latest()
            ->get();

        return view('usuario.panel', compact('user', 'cliente', 'solicitudes'));
    }

    public function actualizarDatos(Request $request)
    {
        $request->validate([
            'dni' => ['nullable', 'string', 'max:15'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'direccion' => ['nullable', 'string', 'max:150'],
        ]);

        $cliente = auth()->user()->cliente;

        $cliente->update([
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        return back()->with('success', 'Tus datos se actualizaron correctamente.');
    }
}