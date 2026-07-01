<x-layouts.public :title="'Catalogo de mascotas - Huellitas'">

    <section class="bg-bosque-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-3">Catalogo de mascotas</h1>
            <p class="text-bosque-800/70 max-w-xl mx-auto">
                Cada perrito tiene una historia y necesidades especiales. Conocelos y apadrina al que toque tu corazon.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($perros->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($perros as $perro)
                    <div class="bg-white rounded-2xl border border-bosque-100 overflow-hidden hover:shadow-md transition flex flex-col">
                        <div class="h-52 bg-bosque-50 overflow-hidden">
                            @if($perro->foto)
                                <img src="{{ asset('storage/'.$perro->foto) }}" alt="{{ $perro->nombre }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-bosque-300">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M4.5 9.5C5.6 9.5 6.5 10.4 6.5 11.5S5.6 13.5 4.5 13.5 2.5 12.6 2.5 11.5 3.4 9.5 4.5 9.5zM19.5 9.5c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zM8.5 5.5c1.1 0 2 1.2 2 2.7S9.6 11 8.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM15.5 5.5c1.1 0 2 1.2 2 2.7S16.6 11 15.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM12 13c2.2 0 5 1.6 5 4.2 0 1.5-1.6 2.3-3 1.7-.8-.3-1.3-.3-2-.3s-1.2 0-2 .3c-1.4 .6-3-.2-3-1.7 0-2.6 2.8-4.2 5-4.2z"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-display font-semibold text-lg text-bosque-900">{{ $perro->nombre }}</h3>
                                <span class="text-xs px-2.5 py-1 rounded-full font-medium
                                    @if($perro->estado === 'disponible') bg-bosque-100 text-bosque-800
                                    @elseif($perro->estado === 'apadrinado') bg-coral-100 text-coral-800
                                    @else bg-gray-100 text-gray-600 @endif">
                                    {{ ucfirst(str_replace('_',' ', $perro->estado)) }}
                                </span>
                            </div>
                            <p class="text-xs text-bosque-800/60 mb-3">{{ $perro->edad }} años</p>
                            <p class="text-sm text-bosque-800/80 leading-relaxed mb-4 flex-1">{{ Str::limit($perro->historia, 100) }}</p>
                            @if($perro->necesidades_especiales)
                                <p class="text-xs text-coral-600 font-medium mb-4">
                                    <svg class="w-3.5 h-3.5 inline -mt-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 6l6.5 11h-13L12 8z"/></svg>
                                    {{ $perro->necesidades_especiales }}
                                </p>
                            @endif

                            @auth
                                @if(auth()->user()->role->nombre === 'usuario' && $perro->estado === 'disponible')
                                    <a href="{{ route('padrinaje.corporativo') }}" class="text-center bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 text-sm font-medium py-2.5 rounded-md">
                                        Apadrinar a {{ $perro->nombre }}
                                    </a>
                                @endif
                            @else
                                @if($perro->estado === 'disponible')
                                    <a href="{{ route('login') }}" class="text-center border border-bosque-900 text-bosque-900 hover:bg-bosque-50 transition text-sm font-medium py-2.5 rounded-md">
                                        Inicia sesion para apadrinar
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-bosque-800/60">Aun no hay perritos registrados. ¡Vuelve pronto!</p>
            </div>
        @endif
    </section>

</x-layouts.public>