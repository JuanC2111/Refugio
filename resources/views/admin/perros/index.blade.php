<x-layouts.public :title="'Gestionar perros - Huellitas'">

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex items-center justify-between mb-8">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-bosque-700 hover:text-bosque-900 mb-2 inline-block">← Volver al dashboard</a>
                <h1 class="font-display font-semibold text-3xl text-bosque-900">Gestionar perros</h1>
            </div>
            <a href="{{ route('admin.perros.create') }}" class="bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 font-medium px-5 py-2.5 rounded-md text-sm">
                + Agregar perrito
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-bosque-50 border border-bosque-200 text-bosque-800 text-sm rounded-md px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-bosque-100 rounded-2xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-bosque-50 text-bosque-800/70 text-xs">
                    <tr>
                        <th class="text-left px-5 py-3">Foto</th>
                        <th class="text-left px-5 py-3">ID</th>
                        <th class="text-left px-5 py-3">Nombre</th>
                        <th class="text-left px-5 py-3">Edad</th>
                        <th class="text-left px-5 py-3">Estado</th>
                        <th class="text-right px-5 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-bosque-50">
                    @forelse($perros as $perro)
                        <tr>
                            <td class="px-5 py-3">
                                <div class="w-12 h-12 rounded-lg bg-bosque-50 overflow-hidden">
                                    @if($perro->foto)
                                        <img src="{{ asset('storage/'.$perro->foto) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-bosque-300 text-xs">N/A</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-5 py-3 text-bosque-800/60">#{{ $perro->id }}</td>
                            <td class="px-5 py-3 font-medium text-bosque-900">{{ $perro->nombre }}</td>
                            <td class="px-5 py-3 text-bosque-800/70">{{ $perro->edad }} años</td>
                            <td class="px-5 py-3">
                                <span class="text-xs font-medium px-2.5 py-1 rounded-full
                                    @if($perro->estado === 'disponible') bg-bosque-100 text-bosque-800
                                    @elseif($perro->estado === 'apadrinado') bg-coral-100 text-coral-800
                                    @else bg-gray-100 text-gray-600 @endif">
                                    {{ ucfirst(str_replace('_',' ', $perro->estado)) }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-right">
                                <a href="{{ route('admin.perros.edit', $perro->id) }}" class="text-bosque-700 hover:text-bosque-900 text-xs font-medium mr-3">
                                    Editar
                                </a>
                                <form action="{{ route('admin.perros.destroy', $perro->id) }}" method="POST"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar a {{ $perro->nombre }}? Esta accion no se puede deshacer.');"
                                        class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-coral-600 hover:text-coral-800 text-xs font-medium">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-10 text-center text-bosque-800/50">
                                Aun no hay perritos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </section>

</x-layouts.public>