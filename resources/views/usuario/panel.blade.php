<x-layouts.public :title="'Mi Panel - Huellitas'">

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-8">Mi Panel</h1>

        @if(session('success'))
            <div class="mb-6 bg-bosque-50 border border-bosque-200 text-bosque-800 text-sm rounded-md px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        {{-- DATOS PERSONALES --}}
        <div class="bg-white border border-bosque-100 rounded-2xl p-8 mb-10">
            <h2 class="font-display font-semibold text-xl text-bosque-900 mb-1">Mis datos personales</h2>
            <p class="text-sm text-bosque-800/60 mb-6">Mantenlos actualizados para que podamos contactarte.</p>

            <form action="{{ route('usuario.actualizarDatos') }}" method="POST" class="grid sm:grid-cols-2 gap-5">
                @csrf
                @method('PATCH')

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-bosque-900 mb-1.5">Nombre</label>
                    <input type="text" value="{{ $user->name }}" disabled
                        class="w-full rounded-md border border-bosque-100 bg-bosque-50 px-4 py-2.5 text-sm text-bosque-800/70">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-bosque-900 mb-1.5">Correo</label>
                    <input type="text" value="{{ $user->email }}" disabled
                        class="w-full rounded-md border border-bosque-100 bg-bosque-50 px-4 py-2.5 text-sm text-bosque-800/70">
                </div>

                <div>
                    <label class="block text-sm font-medium text-bosque-900 mb-1.5">DNI</label>
                    <input type="text" name="dni" value="{{ old('dni', $cliente->dni) }}"
                        class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-bosque-900 mb-1.5">Telefono</label>
                    <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono) }}"
                        class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-bosque-900 mb-1.5">Direccion</label>
                    <input type="text" name="direccion" value="{{ old('direccion', $cliente->direccion) }}"
                        class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400">
                </div>

                <div class="sm:col-span-2">
                    <button type="submit" class="bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 font-medium px-6 py-2.5 rounded-md text-sm">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>

        {{-- HISTORIAL DE SOLICITUDES --}}
        <div class="bg-white border border-bosque-100 rounded-2xl p-8">
            <h2 class="font-display font-semibold text-xl text-bosque-900 mb-1">Mis solicitudes de padrinaje</h2>
            <p class="text-sm text-bosque-800/60 mb-6">Revisa el estado de cada solicitud que has enviado.</p>

            @if($solicitudes->count())
                <div class="space-y-4">
                    @foreach($solicitudes as $s)
                        <div class="flex items-center justify-between border border-bosque-100 rounded-xl p-4">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-lg bg-bosque-50 overflow-hidden flex-shrink-0">
                                    @if($s->perro->foto)
                                        <img src="{{ asset('storage/'.$s->perro->foto) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-bosque-300">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M4.5 9.5C5.6 9.5 6.5 10.4 6.5 11.5S5.6 13.5 4.5 13.5 2.5 12.6 2.5 11.5 3.4 9.5 4.5 9.5z"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-medium text-bosque-900">{{ $s->perro->nombre }}</p>
                                    <p class="text-xs text-bosque-800/60">
                                        {{ ucfirst(str_replace('_',' ', $s->tipo_padrinaje)) }} · {{ $s->dias_paseo }}
                                    </p>
                                    <p class="text-xs text-bosque-800/40">{{ $s->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>

                            <span class="text-xs font-medium px-3 py-1.5 rounded-full
                                @if($s->estado === 'pendiente') bg-yellow-100 text-yellow-800
                                @elseif($s->estado === 'aprobada') bg-bosque-100 text-bosque-800
                                @else bg-coral-100 text-coral-800 @endif">
                                {{ ucfirst($s->estado) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-bosque-800/60">Aun no has enviado ninguna solicitud de padrinaje.</p>
            @endif
        </div>

    </section>

</x-layouts.public>