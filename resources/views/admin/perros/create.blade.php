<x-layouts.public :title="'Agregar perrito - Huellitas'">

    <section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <a href="{{ route('admin.perros.index') }}" class="text-sm text-bosque-700 hover:text-bosque-900 mb-2 inline-block">← Volver a la lista</a>
        <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-8">Agregar perrito</h1>

        <form action="{{ route('admin.perros.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white border border-bosque-100 rounded-2xl p-8 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                @error('nombre') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Edad (años)</label>
                <input type="number" name="edad" min="0" max="30" value="{{ old('edad') }}" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                @error('edad') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Historia</label>
                <textarea name="historia" rows="4" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">{{ old('historia') }}</textarea>
                @error('historia') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Necesidades especiales / discapacidad (opcional)</label>
                <input type="text" name="necesidades_especiales" value="{{ old('necesidades_especiales') }}"
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Estado</label>
                <select name="estado" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                    <option value="disponible">Disponible</option>
                    <option value="apadrinado">Apadrinado</option>
                    <option value="no_disponible">No disponible</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Fotografia</label>
                <input type="file" name="foto" accept="image/*"
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-bosque-100 file:text-bosque-800 file:text-xs">
                <p class="text-xs text-bosque-800/50 mt-1.5">La imagen se recortara y ajustara automaticamente a un tamaño uniforme.</p>
                @error('foto') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 font-medium py-3 rounded-md">
                Registrar perrito
            </button>
        </form>

    </section>

</x-layouts.public>