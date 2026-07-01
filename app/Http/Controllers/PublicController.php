<?php

namespace App\Http\Controllers;

use App\Models\Perro;
use App\Models\Contacto;
use App\Models\Donacion;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function inicio()
    {
        $perros = Perro::where('estado', 'disponible')->latest()->take(3)->get();
        return view('public.inicio', compact('perros'));
    }

    public function catalogo()
    {
        $perros = Perro::orderBy('nombre')->get();
        return view('public.catalogo', compact('perros'));
    }

    public function padrinajeCorporativo()
    {
        return view('public.padrinaje.corporativo');
    }

    public function padrinajeUniversitario()
    {
        return view('public.padrinaje.universitario');
    }

    public function padrinajeFinSemana()
    {
        return view('public.padrinaje.finsemana');
    }

    public function contacto()
    {
        return view('public.contacto');
    }

    public function contactoStore(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email', 'max:100'],
            'mensaje' => ['required', 'string'],
            'tipo_mensaje' => ['required', 'in:consulta,visita_guiada,reporte_vulnerabilidad'],
        ]);

        Contacto::create([
            'user_id' => auth()->id(),
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'tipo_mensaje' => $request->tipo_mensaje,
            'mensaje' => $request->mensaje,
        ]);

        return back()->with('success', 'Gracias por escribirnos. Te responderemos pronto.');
    }

    public function donaciones()
    {
        return view('public.donaciones');
    }

    public function donacionStore(Request $request)
    {
        $request->validate([
            'monto' => ['required', 'numeric', 'min:1'],
            'nombre_donante' => ['nullable', 'string', 'max:100'],
            'correo_donante' => ['nullable', 'email', 'max:100'],
        ]);

        $donacion = Donacion::create([
            'user_id' => auth()->id(),
            'monto' => $request->monto,
            'nombre_donante' => $request->nombre_donante ?? (auth()->user()->name ?? 'Anonimo'),
            'correo_donante' => $request->correo_donante ?? (auth()->user()->email ?? null),
            'estado' => 'completada',
        ]);

        return redirect()->route('donaciones.gracias', $donacion->id);
    }

    public function donacionGracias(\App\Models\Donacion $donacion)
    {
        return view('public.donacion-gracias', compact('donacion'));
    }
}