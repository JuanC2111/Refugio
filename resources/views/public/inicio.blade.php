<x-layouts.public :title="'Huellitas en busca de amor - Inicio'">

    {{-- HERO --}}
    <section class="relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-72 h-72 rounded-full bg-bosque-50"></div>
        <div class="absolute bottom-0 right-32 w-40 h-40 rounded-full bg-coral-100 opacity-60"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block text-xs font-medium px-4 py-1.5 rounded-full bg-bosque-900 text-bosque-50 mb-5 tracking-wide">
                    Refugio en Socabaya, Arequipa
                </span>
                <h1 class="font-display font-semibold text-4xl sm:text-5xl text-bosque-900 leading-tight mb-5">
                    Huellitas Busca De Amor
                </h1>
                <p class="text-bosque-800/80 text-base leading-relaxed mb-8 max-w-md">
                    Rescatamos y cuidamos perritos con discapacidad. Conoce su historia, apadrina o dona para darles una segunda oportunidad de vivir con dignidad.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('catalogo') }}" class="inline-flex items-center gap-2 bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 font-medium px-6 py-3 rounded-md">
                        Ver perritos
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('donaciones') }}" class="inline-flex items-center gap-2 bg-coral-400 hover:bg-coral-600 transition text-white font-medium px-6 py-3 rounded-md">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21s-7.5-4.5-9.5-9C1 8.5 2.5 5 6 5c2 0 3.5 1 4 2.5C10.5 6 12 5 14 5c3.5 0 5 3.5 3.5 7-2 4.5-9.5 9-9.5 9z"/></svg>
                        Donate Paw
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-2xl bg-coral-100 h-44 flex items-center justify-center">
                    <svg class="w-16 h-16 text-coral-600" fill="currentColor" viewBox="0 0 24 24"><path d="M4.5 9.5C5.6 9.5 6.5 10.4 6.5 11.5S5.6 13.5 4.5 13.5 2.5 12.6 2.5 11.5 3.4 9.5 4.5 9.5zM19.5 9.5c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zM8.5 5.5c1.1 0 2 1.2 2 2.7S9.6 11 8.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM15.5 5.5c1.1 0 2 1.2 2 2.7S16.6 11 15.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM12 13c2.2 0 5 1.6 5 4.2 0 1.5-1.6 2.3-3 1.7-.8-.3-1.3-.3-2-.3s-1.2 0-2 .3c-1.4 .6-3-.2-3-1.7 0-2.6 2.8-4.2 5-4.2z"/></svg>
                </div>
                <div class="rounded-2xl bg-bosque-100 h-44 flex items-center justify-center mt-8">
                    <svg class="w-16 h-16 text-bosque-700" fill="currentColor" viewBox="0 0 24 24"><path d="M4.5 9.5C5.6 9.5 6.5 10.4 6.5 11.5S5.6 13.5 4.5 13.5 2.5 12.6 2.5 11.5 3.4 9.5 4.5 9.5zM19.5 9.5c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zM8.5 5.5c1.1 0 2 1.2 2 2.7S9.6 11 8.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM15.5 5.5c1.1 0 2 1.2 2 2.7S16.6 11 15.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM12 13c2.2 0 5 1.6 5 4.2 0 1.5-1.6 2.3-3 1.7-.8-.3-1.3-.3-2-.3s-1.2 0-2 .3c-1.4 .6-3-.2-3-1.7 0-2.6 2.8-4.2 5-4.2z"/></svg>
                </div>
            </div>
        </div>
    </section>

    {{-- MISION --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="font-display font-semibold text-2xl text-bosque-900 mb-4">Nuestra mision</h2>
                <p class="text-bosque-800/80 leading-relaxed mb-4">
                    En Huellitas creemos que ningun perrito deberia quedar atras por tener una discapacidad. Rescatamos, brindamos atencion veterinaria especializada y buscamos padrinos y hogares que les den el cuidado y amor que merecen.
                </p>
                <p class="text-bosque-800/80 leading-relaxed">
                    Nuestras instalaciones en Socabaya cuentan con espacios adaptados, rampas, y un equipo dedicado al bienestar fisico y emocional de cada residente.
                </p>
            </div>
            <div class="rounded-2xl bg-bosque-900 h-64 flex items-center justify-center text-bosque-50">
            <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=800&q=80" alt="Recorrido por las instalaciones" class="w-full h-full object-cover rounded-2xl">
            </div>
        </div>
    </section>

    {{-- IMPACTO --}}
    <section class="bg-bosque-900 py-14">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <p class="text-bosque-100 text-xs font-medium tracking-wide mb-8">Nuestro impacto</p>
            <div class="grid grid-cols-3 gap-6">
                <div>
                    <p class="font-display text-3xl font-semibold text-bosque-50">{{ \App\Models\Perro::count() }}</p>
                    <p class="text-xs text-bosque-200 mt-1">Perritos rescatados</p>
                </div>
                <div>
                    <p class="font-display text-3xl font-semibold text-bosque-50">{{ \App\Models\SolicitudPadrinaje::where('estado','aprobada')->count() }}</p>
                    <p class="text-xs text-bosque-200 mt-1">Padrinos activos</p>
                </div>
                <div>
                    <p class="font-display text-3xl font-semibold text-bosque-50">{{ \App\Models\Perro::where('estado','apadrinado')->count() }}</p>
                    <p class="text-xs text-bosque-200 mt-1">Perritos apadrinados</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CATALOGO DESTACADO --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="font-display font-semibold text-2xl text-bosque-900">Conoce a algunos peludos</h2>
                <p class="text-sm text-bosque-800/60 mt-1">Cada uno con una historia distinta</p>
            </div>
            <a href="{{ route('catalogo') }}" class="text-sm font-medium text-coral-400 hover:text-coral-600 transition">Ver todos →</a>
        </div>

        @if($perros->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($perros as $perro)
                    <div class="bg-white rounded-2xl border border-bosque-100 overflow-hidden hover:shadow-md transition">
                        <div class="h-48 bg-bosque-50 overflow-hidden">
                            @if($perro->foto)
                                <img src="{{ asset('storage/'.$perro->foto) }}" alt="{{ $perro->nombre }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-bosque-300">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M4.5 9.5C5.6 9.5 6.5 10.4 6.5 11.5S5.6 13.5 4.5 13.5 2.5 12.6 2.5 11.5 3.4 9.5 4.5 9.5zM19.5 9.5c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zM8.5 5.5c1.1 0 2 1.2 2 2.7S9.6 11 8.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM15.5 5.5c1.1 0 2 1.2 2 2.7S16.6 11 15.5 11s-2-1.3-2-2.8 .9-2.7 2-2.7zM12 13c2.2 0 5 1.6 5 4.2 0 1.5-1.6 2.3-3 1.7-.8-.3-1.3-.3-2-.3s-1.2 0-2 .3c-1.4 .6-3-.2-3-1.7 0-2.6 2.8-4.2 5-4.2z"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <h3 class="font-display font-semibold text-lg text-bosque-900">{{ $perro->nombre }}</h3>
                            <p class="text-xs text-bosque-800/60 mt-1">{{ $perro->edad }} años · {{ $perro->necesidades_especiales ?? 'Sin condiciones especiales' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-bosque-800/60 text-sm">Aun no hay perritos registrados. ¡Vuelve pronto!</p>
        @endif
    </section>

</x-layouts.public>