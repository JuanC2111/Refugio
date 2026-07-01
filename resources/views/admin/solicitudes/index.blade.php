<x-layouts.public :title="'Gestionar solicitudes - Huellitas'">

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <a href="{{ route('admin.dashboard') }}" class="text-sm text-bosque-700 hover:text-bosque-900 mb-2 inline-block">← Volver al dashboard</a>
        <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-8">Gestionar solicitudes</h1>

        @if(session('success'))
            <div class="mb-6 bg-bosque-50 border border-bosque-200 text-bosque-800 text-sm rounded-md px-4 py-3">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 bg-coral-50 border border-coral-200 text-coral-800 text-sm rounded-md px-4 py-3">
                {{ session('error') }}
            </div>
        @endif

        {{-- FILTROS POR ESTADO --}}
        <div class="flex gap-3 mb-8">
            <a href="{{ route('admin.solicitudes') }}"
               class="text-sm font-medium px-4 py-2 rounded-md {{ !$estado ? 'bg-bosque-900 text-bosque-50' : 'bg-white border border-bosque-200 text-bosque-800' }}">
                Todas
            </a>
            <a href="{{ route('admin.solicitudes', ['estado' => 'pendiente']) }}"
               class="text-sm font-medium px-4 py-2 rounded-md {{ $estado === 'pendiente' ? 'bg-yellow-500 text-white' : 'bg-white border border-bosque-200 text-bosque-800' }}">
                Pendientes
            </a>
            <a href="{{ route('admin.solicitudes', ['estado' => 'aprobada']) }}"
                class="text-sm font-medium px-4 py-2 rounded-md {{ $estado === 'aprobada' ? 'bg-bosque-700 text-white' : 'bg-white border border-bosque-200 text-bosque-800' }}">
                Aprobadas
            </a>
            <a href="{{ route('admin.solicitudes', ['estado' => 'rechazada']) }}"
                class="text-sm font-medium px-4 py-2 rounded-md {{ $estado === 'rechazada' ? 'bg-coral-600 text-white' : 'bg-white border border-bosque-200 text-bosque-800' }}">
                Rechazadas
            </a>
        </div>

        <div class="space-y-4">
            @forelse($solicitudes as $s)
                <div class="bg-white border border-bosque-100 rounded-2xl p-6 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-lg bg-bosque-50 overflow-hidden flex-shrink-0">
                            @if($s->perro->foto)
                                <img src="{{ asset('storage/'.$s->perro->foto) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-bosque-300 text-xs">N/A</div>
                            @endif
                        </div>
                        <div>
                            <p class="font-medium text-bosque-900">{{ $s->cliente->user->name }} <span class="text-bosque-800/50">→</span> {{ $s->perro->nombre }}</p>
                            <p class="text-xs text-bosque-800/60 mt-0.5">
                                {{ ucfirst(str_replace('_',' ', $s->tipo_padrinaje)) }} · Dias: {{ $s->dias_paseo }}
                            </p>
                            @if($s->comentario_adicional)
                                <p class="text-xs text-bosque-800/40 mt-0.5">"{{ $s->comentario_adicional }}"</p>
                            @endif
                            <p class="text-xs text-bosque-800/40 mt-0.5">{{ $s->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-xs font-medium px-3 py-1.5 rounded-full
                            @if($s->estado === 'pendiente') bg-yellow-100 text-yellow-800
                            @elseif($s->estado === 'aprobada') bg-bosque-100 text-bosque-800
                            @else bg-coral-100 text-coral-800 @endif">
                            {{ ucfirst($s->estado) }}
                        </span>

                        @if($s->estado === 'pendiente')
                            <form action="{{ route('admin.solicitudes.aprobar', $s->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-xs font-medium px-3 py-1.5 rounded-md bg-bosque-700 hover:bg-bosque-800 text-white transition">
                                    Aprobar
                                </button>
                            </form>
                            <form action="{{ route('admin.solicitudes.rechazar', $s->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-xs font-medium px-3 py-1.5 rounded-md bg-coral-500 hover:bg-coral-600 text-white transition">
                                    Rechazar
                                </button>
                            </form>
                        @else
                            <span class="text-xs text-bosque-800/40 italic">Procesada</span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-16 bg-white border border-bosque-100 rounded-2xl">
                    <p class="text-bosque-800/50">No hay solicitudes en esta categoria.</p>
                </div>
            @endforelse
        </div>

    </section>

</x-layouts.public>