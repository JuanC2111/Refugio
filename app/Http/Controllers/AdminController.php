<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perro;
use App\Models\SolicitudPadrinaje;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsuarios = User::whereHas('role', function ($q) {
            $q->where('nombre', 'usuario');
        })->count();

        $totalPerros = Perro::count();

        $solicitudesPendientes = SolicitudPadrinaje::where('estado', 'pendiente')->count();
        $solicitudesAprobadas = SolicitudPadrinaje::where('estado', 'aprobada')->count();
        $solicitudesRechazadas = SolicitudPadrinaje::where('estado', 'rechazada')->count();

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'totalPerros',
            'solicitudesPendientes',
            'solicitudesAprobadas',
            'solicitudesRechazadas'
        ));
    }
}