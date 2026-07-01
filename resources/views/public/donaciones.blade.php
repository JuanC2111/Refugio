<x-layouts.public :title="'Donar - Huellitas'">

    <section class="relative overflow-hidden bg-coral-50 py-16">
        <div class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-coral-100"></div>
        <div class="relative max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="font-display font-semibold text-3xl sm:text-4xl text-bosque-900 mb-4">Dona y cambia una vida</h1>
            <p class="text-bosque-800/70">
                Tu aporte ayuda directamente con gastos medicos y de alimentacion de nuestros perritos, sin necesidad de un compromiso mensual.
            </p>
        </div>
    </section>

    <section class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-12">

        @if(session('success'))
            <div class="mb-6 bg-bosque-50 border border-bosque-200 text-bosque-800 text-sm rounded-md px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('donaciones.store') }}" method="POST" class="bg-white border border-bosque-100 rounded-2xl p-8 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-2">Elige un monto (S/)</label>
                <div class="grid grid-cols-3 gap-3 mb-3">
                    <button type="button" onclick="document.getElementById('monto').value=20" class="border border-bosque-200 hover:border-coral-400 transition rounded-md py-2 text-sm font-medium">S/ 20</button>
                    <button type="button" onclick="document.getElementById('monto').value=50" class="border border-bosque-200 hover:border-coral-400 transition rounded-md py-2 text-sm font-medium">S/ 50</button>
                    <button type="button" onclick="document.getElementById('monto').value=100" class="border border-bosque-200 hover:border-coral-400 transition rounded-md py-2 text-sm font-medium">S/ 100</button>
                </div>
                <input type="number" step="0.01" min="1" name="monto" id="monto" placeholder="Otro monto" value="{{ old('monto') }}" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-coral-400">
                @error('monto') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            @guest
                <div>
                    <label class="block text-sm font-medium text-bosque-900 mb-1.5">Nombre (opcional)</label>
                    <input type="text" name="nombre_donante" value="{{ old('nombre_donante') }}"
                        class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-coral-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-bosque-900 mb-1.5">Correo (opcional)</label>
                    <input type="email" name="correo_donante" value="{{ old('correo_donante') }}"
                        class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-coral-400">
                </div>
            @endguest

            <button type="submit" class="w-full bg-coral-400 hover:bg-coral-600 transition text-white font-medium py-3 rounded-md flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21s-7.5-4.5-9.5-9C1 8.5 2.5 5 6 5c2 0 3.5 1 4 2.5C10.5 6 12 5 14 5c3.5 0 5 3.5 3.5 7-2 4.5-9.5 9-9.5 9z"/></svg>
                Donar ahora
            </button>
        </form>
    </section>

</x-layouts.public>