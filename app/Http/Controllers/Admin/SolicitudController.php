<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SolicitudPadrinaje;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        $estado = $request->query('estado');

        $query = SolicitudPadrinaje::with(['cliente.user', 'perro'])->latest();

        if ($estado && in_array($estado, ['pendiente', 'aprobada', 'rechazada'])) {
            $query->where('estado', $estado);
        }

        $solicitudes = $query->get();

        return view('admin.solicitudes.index', compact('solicitudes', 'estado'));
    }

    public function aprobar(SolicitudPadrinaje $solicitud)
    {
        if ($solicitud->estado !== 'pendiente') {
            return back()->with('error', 'Esta solicitud ya fue procesada.');
        }

        $solicitud->update(['estado' => 'aprobada']);

        // Marcamos al perro como apadrinado
        $solicitud->perro->update(['estado' => 'apadrinado']);

        return back()->with('success', 'Solicitud aprobada correctamente.');
    }

    public function rechazar(SolicitudPadrinaje $solicitud)
    {
        if ($solicitud->estado !== 'pendiente') {
            return back()->with('error', 'Esta solicitud ya fue procesada.');
        }

        $solicitud->update(['estado' => 'rechazada']);

        return back()->with('success', 'Solicitud rechazada.');
    }
}