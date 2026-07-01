<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perro;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerroController extends Controller
{
    public function index()
    {
        $perros = Perro::orderBy('created_at', 'desc')->get();
        return view('admin.perros.index', compact('perros'));
    }

    public function create()
    {
        return view('admin.perros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:50'],
            'edad' => ['required', 'integer', 'min:0', 'max:30'],
            'historia' => ['required', 'string'],
            'necesidades_especiales' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:5120'], // max 5MB
            'estado' => ['required', 'in:disponible,apadrinado,no_disponible'],
        ]);

        $rutaFoto = null;

        if ($request->hasFile('foto')) {
            $rutaFoto = $this->procesarImagen($request->file('foto'));
        }

        Perro::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'historia' => $request->historia,
            'necesidades_especiales' => $request->necesidades_especiales,
            'foto' => $rutaFoto,
            'estado' => $request->estado,
        ]);

        return redirect()->route('admin.perros.index')->with('success', 'Perrito registrado correctamente.');
    }

    public function edit(Perro $perro)
{
    return view('admin.perros.edit', compact('perro'));
}

    public function update(Request $request, Perro $perro)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:50'],
            'edad' => ['required', 'integer', 'min:0', 'max:30'],
            'historia' => ['required', 'string'],
            'necesidades_especiales' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:5120'],
            'estado' => ['required', 'in:disponible,apadrinado,no_disponible'],
        ]);

        $rutaFoto = $perro->foto;

        if ($request->hasFile('foto')) {
            // Borramos la foto anterior si existia
            if ($perro->foto && file_exists(storage_path('app/public/' . $perro->foto))) {
                unlink(storage_path('app/public/' . $perro->foto));
            }
            $rutaFoto = $this->procesarImagen($request->file('foto'));
        }

        $perro->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'historia' => $request->historia,
            'necesidades_especiales' => $request->necesidades_especiales,
            'foto' => $rutaFoto,
            'estado' => $request->estado,
        ]);

        return redirect()->route('admin.perros.index')->with('success', 'Perrito actualizado correctamente.');
    }

    public function destroy(Perro $perro)
    {
        if ($perro->foto && file_exists(storage_path('app/public/' . $perro->foto))) {
            unlink(storage_path('app/public/' . $perro->foto));
        }

        $perro->delete();

        return redirect()->route('admin.perros.index')->with('success', 'Perrito eliminado correctamente.');
    }

    /**
     * Procesa la imagen: la recorta y redimensiona a un tamaño
     * cuadrado uniforme (600x600) para que todas las fotos
     * del catalogo se vean consistentes.
     */
    private function procesarImagen($archivo): string
    {
        $manager = new ImageManager(new Driver());

        $imagen = $manager->read($archivo->getRealPath());

        // Redimensiona la imagen para que quepa completa dentro de 600x600
        // sin recortar nada, manteniendo sus proporciones originales
        $imagen->scaleDown(600, 600);

        // Creamos un lienzo cuadrado de fondo crema y colocamos la imagen centrada
        $lienzo = $manager->create(600, 600)->fill('#faf7f0');
        $lienzo->place($imagen, 'center');

        $nombreArchivo = 'perros/' . Str::random(20) . '.jpg';
        $rutaCompleta = storage_path('app/public/' . $nombreArchivo);

        if (! is_dir(dirname($rutaCompleta))) {
            mkdir(dirname($rutaCompleta), 0755, true);
        }

        $lienzo->toJpeg(85)->save($rutaCompleta);

        return $nombreArchivo;
    }
}