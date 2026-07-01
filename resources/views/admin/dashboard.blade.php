<x-layouts.public :title="'Panel de Administrador - Huellitas'">

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="font-display font-semibold text-3xl text-bosque-900">Panel de Administrador</h1>
                <p class="text-sm text-bosque-800/60 mt-1">Resumen general del refugio</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm font-medium px-4 py-2 rounded-md border border-coral-400 text-coral-600 hover:bg-coral-50 transition">
                    Cerrar sesion
                </button>
            </form>
        </div>

        {{-- METRICAS PRINCIPALES --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
            <div class="bg-bosque-900 rounded-2xl p-6 text-bosque-50">
                <p class="text-xs text-bosque-200 mb-2">Usuarios registrados</p>
                <p class="font-display text-3xl font-semibold">{{ $totalUsuarios }}</p>
            </div>
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <p class="text-xs text-bosque-800/60 mb-2">Perros registrados</p>
                <p class="font-display text-3xl font-semibold text-bosque-900">{{ $totalPerros }}</p>
            </div>
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <p class="text-xs text-bosque-800/60 mb-2">Solicitudes aprobadas</p>
                <p class="font-display text-3xl font-semibold text-bosque-700">{{ $solicitudesAprobadas }}</p>
            </div>
            <div class="bg-coral-50 border border-coral-100 rounded-2xl p-6">
                <p class="text-xs text-coral-700/70 mb-2">Solicitudes rechazadas</p>
                <p class="font-display text-3xl font-semibold text-coral-700">{{ $solicitudesRechazadas }}</p>
            </div>
        </div>

        {{-- EMBUDO DE SOLICITUDES --}}
        <div class="bg-white border border-bosque-100 rounded-2xl p-8 mb-10">
            <h2 class="font-display font-semibold text-xl text-bosque-900 mb-5">Control de solicitudes</h2>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.solicitudes', ['estado' => 'pendiente']) }}"
                   class="flex-1 min-w-[160px] text-center bg-yellow-50 border border-yellow-200 rounded-xl px-5 py-4 hover:shadow-md transition">
                    <p class="text-2xl font-semibold text-yellow-700">{{ $solicitudesPendientes }}</p>
                    <p class="text-xs text-yellow-700/80 mt-1">Pendientes</p>
                </a>
                <a href="{{ route('admin.solicitudes', ['estado' => 'aprobada']) }}"
                   class="flex-1 min-w-[160px] text-center bg-bosque-50 border border-bosque-200 rounded-xl px-5 py-4 hover:shadow-md transition">
                    <p class="text-2xl font-semibold text-bosque-700">{{ $solicitudesAprobadas }}</p>
                    <p class="text-xs text-bosque-700/80 mt-1">Aprobadas</p>
                </a>
                <a href="{{ route('admin.solicitudes', ['estado' => 'rechazada']) }}"
                   class="flex-1 min-w-[160px] text-center bg-coral-50 border border-coral-200 rounded-xl px-5 py-4 hover:shadow-md transition">
                    <p class="text-2xl font-semibold text-coral-700">{{ $solicitudesRechazadas }}</p>
                    <p class="text-xs text-coral-700/80 mt-1">Rechazadas</p>
                </a>
            </div>
        </div>

        {{-- ACCESOS RAPIDOS --}}
        <div class="grid sm:grid-cols-2 gap-5">
            <a href="{{ route('admin.perros.index') }}" class="bg-bosque-900 hover:bg-bosque-800 transition rounded-2xl p-6 text-bosque-50 flex items-center justify-between">
                <div>
                    <p class="font-medium">Gestionar perros</p>
                    <p class="text-xs text-bosque-200 mt-1">Agregar, ver o eliminar registros</p>
                </div>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('admin.solicitudes') }}" class="bg-coral-400 hover:bg-coral-600 transition rounded-2xl p-6 text-white flex items-center justify-between">
                <div>
                    <p class="font-medium">Gestionar solicitudes</p>
                    <p class="text-xs text-coral-100 mt-1">Aprobar o rechazar padrinajes</p>
                </div>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

    </section>

</x-layouts.public>