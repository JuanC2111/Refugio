<x-layouts.public :title="'Editar perrito - Huellitas'">

    <section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <a href="{{ route('admin.perros.index') }}" class="text-sm text-bosque-700 hover:text-bosque-900 mb-2 inline-block">← Volver a la lista</a>
        <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-8">Editar a {{ $perro->nombre }}</h1>

        @if($perro->foto)
            <div class="mb-6">
                <p class="text-sm font-medium text-bosque-900 mb-2">Foto actual</p>
                <div class="w-32 h-32 rounded-xl bg-bosque-50 overflow-hidden border border-bosque-100">
                    <img src="{{ asset('storage/'.$perro->foto) }}" class="w-full h-full object-cover">
                </div>
            </div>
        @endif

        <form action="{{ route('admin.perros.update', $perro->id) }}" method="POST" enctype="multipart/form-data"
                class="bg-white border border-bosque-100 rounded-2xl p-8 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $perro->nombre) }}" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                @error('nombre') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Edad (años)</label>
                <input type="number" name="edad" min="0" max="30" value="{{ old('edad', $perro->edad) }}" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                @error('edad') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Historia</label>
                <textarea name="historia" rows="4" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">{{ old('historia', $perro->historia) }}</textarea>
                @error('historia') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Necesidades especiales / discapacidad (opcional)</label>
                <input type="text" name="necesidades_especiales" value="{{ old('necesidades_especiales', $perro->necesidades_especiales) }}"
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Estado</label>
                <select name="estado" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                    <option value="disponible" {{ $perro->estado === 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="apadrinado" {{ $perro->estado === 'apadrinado' ? 'selected' : '' }}>Apadrinado</option>
                    <option value="no_disponible" {{ $perro->estado === 'no_disponible' ? 'selected' : '' }}>No disponible</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Nueva fotografia (opcional)</label>
                <input type="file" name="foto" accept="image/*"
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-bosque-100 file:text-bosque-800 file:text-xs">
                <p class="text-xs text-bosque-800/50 mt-1.5">Deja este campo vacio si no quieres cambiar la foto actual.</p>
                @error('foto') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 font-medium py-3 rounded-md">
                Guardar cambios
            </button>
        </form>

    </section>

</x-layouts.public>