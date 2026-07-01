<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PadrinajeController;
use Illuminate\Support\Facades\Route;

// ===== RUTAS PUBLICAS =====
Route::get('/', [PublicController::class, 'inicio'])->name('inicio');
Route::get('/catalogo', [PublicController::class, 'catalogo'])->name('catalogo');

Route::get('/padrinaje/corporativo', [PublicController::class, 'padrinajeCorporativo'])->name('padrinaje.corporativo');
Route::get('/padrinaje/universitario', [PublicController::class, 'padrinajeUniversitario'])->name('padrinaje.universitario');
Route::get('/padrinaje/fin-de-semana', [PublicController::class, 'padrinajeFinSemana'])->name('padrinaje.finsemana');

Route::get('/contacto', [PublicController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [PublicController::class, 'contactoStore'])->name('contacto.store');

Route::get('/donaciones', [PublicController::class, 'donaciones'])->name('donaciones');
Route::post('/donaciones', [PublicController::class, 'donacionStore'])->name('donaciones.store');
Route::get('/donaciones/gracias/{donacion}', [PublicController::class, 'donacionGracias'])->name('donaciones.gracias');

// ===== DASHBOARD: redirige segun el rol =====
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role->nombre === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('usuario.panel');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===== RUTAS EXCLUSIVAS DEL ADMINISTRADOR =====
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/perros', [\App\Http\Controllers\Admin\PerroController::class, 'index'])->name('perros.index');
    Route::get('/perros/crear', [\App\Http\Controllers\Admin\PerroController::class, 'create'])->name('perros.create');
    Route::post('/perros', [\App\Http\Controllers\Admin\PerroController::class, 'store'])->name('perros.store');
    Route::get('/perros/{perro}/editar', [\App\Http\Controllers\Admin\PerroController::class, 'edit'])->name('perros.edit');
    Route::put('/perros/{perro}', [\App\Http\Controllers\Admin\PerroController::class, 'update'])->name('perros.update');
    Route::delete('/perros/{perro}', [\App\Http\Controllers\Admin\PerroController::class, 'destroy'])->name('perros.destroy');
    Route::get('/solicitudes', [\App\Http\Controllers\Admin\SolicitudController::class, 'index'])->name('solicitudes');
    Route::patch('/solicitudes/{solicitud}/aprobar', [\App\Http\Controllers\Admin\SolicitudController::class, 'aprobar'])->name('solicitudes.aprobar');
    Route::patch('/solicitudes/{solicitud}/rechazar', [\App\Http\Controllers\Admin\SolicitudController::class, 'rechazar'])->name('solicitudes.rechazar');
});

// ===== RUTAS EXCLUSIVAS DEL USUARIO (cliente) =====
Route::middleware(['auth', 'role:usuario'])->prefix('panel')->name('usuario.')->group(function () {
    Route::get('/', [\App\Http\Controllers\UsuarioController::class, 'panel'])->name('panel');
    Route::patch('/datos', [\App\Http\Controllers\UsuarioController::class, 'actualizarDatos'])->name('actualizarDatos');

    // Flujo de padrinaje
    Route::get('/padrinaje/{tipo}/compromiso', [PadrinajeController::class, 'compromiso'])->name('padrinaje.compromiso');
    Route::post('/padrinaje/{tipo}/compromiso', [PadrinajeController::class, 'aceptarCompromiso'])->name('padrinaje.aceptarCompromiso');
    Route::get('/padrinaje/{tipo}/seleccionar', [PadrinajeController::class, 'seleccionar'])->name('padrinaje.seleccionar');
    Route::get('/padrinaje/{tipo}/solicitar/{perro}', [PadrinajeController::class, 'solicitarFormulario'])->name('padrinaje.solicitarFormulario');
    Route::post('/padrinaje/{tipo}/solicitar/{perro}', [PadrinajeController::class, 'solicitarStore'])->name('padrinaje.solicitarStore');
});

require __DIR__.'/auth.php';