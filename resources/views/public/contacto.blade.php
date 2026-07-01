<x-layouts.public :title="'Contacto - Huellitas'">

    <section class="bg-bosque-50 py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-3">Contactanos</h1>
            <p class="text-bosque-800/70">
                ¿Tienes dudas, quieres agendar una visita guiada a Socabaya o necesitas reportar un caso de vulnerabilidad? Escribenos.
            </p>
        </div>
    </section>

    <section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        @if(session('success'))
            <div class="mb-6 bg-bosque-50 border border-bosque-200 text-bosque-800 text-sm rounded-md px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contacto.store') }}" method="POST" class="bg-white border border-bosque-100 rounded-2xl p-8 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                @error('nombre') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Correo</label>
                <input type="email" name="correo" value="{{ old('correo') }}" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                @error('correo') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Tipo de mensaje</label>
                <select name="tipo_mensaje" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                    <option value="consulta">Consulta general</option>
                    <option value="visita_guiada">Agendar visita guiada</option>
                    <option value="reporte_vulnerabilidad">Reportar caso de vulnerabilidad</option>
                </select>
                @error('tipo_mensaje') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Mensaje</label>
                <textarea name="mensaje" rows="5" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">{{ old('mensaje') }}</textarea>
                @error('mensaje') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 font-medium py-3 rounded-md">
                Enviar mensaje
            </button>
        </form>
    </section>

</x-layouts.public>