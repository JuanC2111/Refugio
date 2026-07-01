<x-layouts.public :title="'Padrinaje Corporativo - Huellitas'">

    <section class="relative overflow-hidden bg-bosque-50 py-16">
        <div class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-coral-100 opacity-50"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-xs font-medium px-4 py-1.5 rounded-full bg-bosque-900 text-bosque-50 mb-5">Padrinaje</span>
            <h1 class="font-display font-semibold text-3xl sm:text-4xl text-bosque-900 mb-4">Padrinaje Corporativo</h1>
            <p class="text-bosque-800/70 max-w-2xl mx-auto leading-relaxed">
                Tu empresa puede convertirse en un aliado clave para el bienestar de nuestros perritos. El padrinaje corporativo brinda apoyo constante para gastos medicos, alimentacion y mejoras en las instalaciones del refugio.
            </p>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <div class="w-10 h-10 rounded-full bg-bosque-100 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-bosque-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg>
                </div>
                <h3 class="font-medium text-bosque-900 mb-2">Visibilidad de marca</h3>
                <p class="text-sm text-bosque-800/70">Tu empresa aparece como aliada en nuestras redes y eventos del refugio.</p>
            </div>
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <div class="w-10 h-10 rounded-full bg-bosque-100 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-bosque-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-2.13a4 4 0 100-8 4 4 0 000 8zm6 0a4 4 0 100-8"/></svg>
                </div>
                <h3 class="font-medium text-bosque-900 mb-2">Voluntariado de equipo</h3>
                <p class="text-sm text-bosque-800/70">Organiza visitas y actividades de bienestar con tus colaboradores.</p>
            </div>
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <div class="w-10 h-10 rounded-full bg-bosque-100 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-bosque-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-medium text-bosque-900 mb-2">Reportes de impacto</h3>
                <p class="text-sm text-bosque-800/70">Recibe informes periodicos sobre el progreso del perrito que apadrinas.</p>
            </div>
        </div>

        <div class="bg-bosque-900 rounded-2xl p-10 text-center">
            <h2 class="font-display font-semibold text-2xl text-bosque-50 mb-3">¿Listo para comenzar?</h2>
            <p class="text-bosque-100 mb-6 max-w-md mx-auto">Antes de elegir un perrito, te pediremos completar un breve formulario de compromiso.</p>
            @auth
                <a href="{{ route('usuario.padrinaje.compromiso', 'corporativo') }}" class="inline-block bg-coral-400 hover:bg-coral-600 transition text-white font-medium px-8 py-3 rounded-md">
                    Comenzar padrinaje corporativo
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-block bg-coral-400 hover:bg-coral-600 transition text-white font-medium px-8 py-3 rounded-md">
                    Inicia sesion para comenzar
                </a>
            @endauth
        </div>
    </section>

</x-layouts.public>