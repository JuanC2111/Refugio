@php
    $nombresTipo = [
        'corporativo' => 'Padrinaje Corporativo',
        'universitario' => 'Padrinaje Universitario',
        'fin_de_semana' => 'Padrinaje Fin de Semana',
    ];
@endphp

<x-layouts.public :title="'Elige un perrito - Huellitas'">

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        @if(session('error'))
            <div class="mb-6 bg-coral-50 border border-coral-200 text-coral-800 text-sm rounded-md px-4 py-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="text-center mb-10">
            <span class="inline-block text-xs font-medium px-4 py-1.5 rounded-full bg-bosque-900 text-bosque-50 mb-4">{{ $nombresTipo[$tipo] }}</span>
            <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-3">Elige a tu peludo</h1>
            <p class="text-bosque-800/70">Estos son los perritos disponibles para padrinaje en este momento.</p>
        </div>

        @if($perros->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($perros as $perro)
                    <div class="bg-white rounded-2xl border border-bosque-100 overflow-hidden hover:shadow-md transition flex flex-col">
                        <div class="h-48 bg-bosque-50 overflow-hidden">
                            @if($perro->foto)
                                <img src="{{ asset('storage/'.$perro->foto) }}" alt="{{ $perro->nombre }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-bosque-300">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M4.5 9.5C5.6 9.5 6.5 10.4 6.5 11.5S5.6 13.5 4.5 13.5 2.5 12.6 2.5 11.5 3.4 9.5 4.5 9.5zM19.5 9.5c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zM8.5 5.5c1.1 0 2 1.2 2 2.7S9.6 11 8.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM15.5 5.5c1.1 0 2 1.2 2 2.7S16.6 11 15.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM12 13c2.2 0 5 1.6 5 4.2 0 1.5-1.6 2.3-3 1.7-.8-.3-1.3-.3-2-.3s-1.2 0-2 .3c-1.4 .6-3-.2-3-1.7 0-2.6 2.8-4.2 5-4.2z"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="font-display font-semibold text-lg text-bosque-900 mb-1">{{ $perro->nombre }}</h3>
                            <p class="text-xs text-bosque-800/60 mb-3">{{ $perro->edad }} años</p>
                            <p class="text-sm text-bosque-800/80 leading-relaxed mb-4 flex-1">{{ Str::limit($perro->historia, 90) }}</p>
                            @if($perro->necesidades_especiales)
                                <p class="text-xs text-coral-600 font-medium mb-4">{{ $perro->necesidades_especiales }}</p>
                            @endif
                            <a href="{{ route('usuario.padrinaje.solicitarFormulario', [$tipo, $perro->id]) }}"
                                class="text-center bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 text-sm font-medium py-2.5 rounded-md">
                                Elegir a {{ $perro->nombre }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-bosque-800/60">No hay perritos disponibles en este momento. ¡Vuelve pronto!</p>
            </div>
        @endif
    </section>

</x-layouts.public>