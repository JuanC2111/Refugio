@php
    $nombresTipo = [
        'corporativo' => 'Padrinaje Corporativo',
        'universitario' => 'Padrinaje Universitario',
        'fin_de_semana' => 'Padrinaje Fin de Semana',
    ];
@endphp

<x-layouts.public :title="'Solicitud de padrinaje - Huellitas'">

    <section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="text-center mb-8">
            <span class="inline-block text-xs font-medium px-4 py-1.5 rounded-full bg-bosque-900 text-bosque-50 mb-4">{{ $nombresTipo[$tipo] }}</span>
            <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-3">Solicitud para {{ $perro->nombre }}</h1>
            <p class="text-bosque-800/70">Completa estos ultimos datos para enviar tu solicitud.</p>
        </div>

        <div class="bg-white border border-bosque-100 rounded-2xl p-8 mb-6 flex gap-4 items-center">
            <div class="w-20 h-20 rounded-xl bg-bosque-50 overflow-hidden flex-shrink-0">
                @if($perro->foto)
                    <img src="{{ asset('storage/'.$perro->foto) }}" alt="{{ $perro->nombre }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-bosque-300">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M4.5 9.5C5.6 9.5 6.5 10.4 6.5 11.5S5.6 13.5 4.5 13.5 2.5 12.6 2.5 11.5 3.4 9.5 4.5 9.5z"/></svg>
                    </div>
                @endif
            </div>
            <div>
                <h3 class="font-display font-semibold text-lg text-bosque-900">{{ $perro->nombre }}</h3>
                <p class="text-xs text-bosque-800/60">{{ $perro->edad }} años</p>
            </div>
        </div>

        <form action="{{ route('usuario.padrinaje.solicitarStore', [$tipo, $perro->id]) }}" method="POST" class="bg-white border border-bosque-100 rounded-2xl p-8 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">¿Que dias podrias visitar o pasear a {{ $perro->nombre }}?</label>
                <input type="text" name="dias_paseo" placeholder="Ej: Sabados y domingos por la mañana" required
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                @error('dias_paseo') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bosque-900 mb-1.5">Comentario adicional (opcional)</label>
                <textarea name="comentario_adicional" rows="4" placeholder="Cuentanos algo mas sobre tu disponibilidad o motivacion"
                    class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400"></textarea>
                @error('comentario_adicional') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-coral-400 hover:bg-coral-600 transition text-white font-medium py-3 rounded-md">
                Enviar solicitud de padrinaje
            </button>
        </form>
    </section>

</x-layouts.public>