<x-layouts.public :title="'Padrinaje Universitario - Huellitas'">

    <section class="relative overflow-hidden bg-bosque-50 py-16">
        <div class="absolute -top-16 -left-16 w-64 h-64 rounded-full bg-bosque-100 opacity-60"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-xs font-medium px-4 py-1.5 rounded-full bg-bosque-900 text-bosque-50 mb-5">Padrinaje</span>
            <h1 class="font-display font-semibold text-3xl sm:text-4xl text-bosque-900 mb-4">Padrinaje Universitario</h1>
            <p class="text-bosque-800/70 max-w-2xl mx-auto leading-relaxed">
                Ideal para estudiantes y grupos universitarios que quieren generar un impacto real. Organiza paseos, dona tiempo y aprende sobre el cuidado responsable de animales con discapacidad.
            </p>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <div class="w-10 h-10 rounded-full bg-coral-100 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-coral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.42A12.083 12.083 0 0112 21a12.083 12.083 0 01-6.16-10.42L12 14z"/></svg>
                </div>
                <h3 class="font-medium text-bosque-900 mb-2">Horas de servicio</h3>
                <p class="text-sm text-bosque-800/70">Certificamos tus horas de voluntariado para fines academicos.</p>
            </div>
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <div class="w-10 h-10 rounded-full bg-coral-100 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-coral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-2.13a4 4 0 100-8 4 4 0 000 8zm6 0a4 4 0 100-8"/></svg>
                </div>
                <h3 class="font-medium text-bosque-900 mb-2">Padrinaje en grupo</h3>
                <p class="text-sm text-bosque-800/70">Forma un grupo de companeros y comparte la responsabilidad.</p>
            </div>
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <div class="w-10 h-10 rounded-full bg-coral-100 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-coral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s4.832.477 6 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <h3 class="font-medium text-bosque-900 mb-2">Aprendizaje practico</h3>
                <p class="text-sm text-bosque-800/70">Aprende sobre bienestar animal de forma directa y responsable.</p>
            </div>
        </div>

        <div class="bg-bosque-900 rounded-2xl p-10 text-center">
            <h2 class="font-display font-semibold text-2xl text-bosque-50 mb-3">¿Listo para comenzar?</h2>
            <p class="text-bosque-100 mb-6 max-w-md mx-auto">Antes de elegir un perrito, te pediremos completar un breve formulario de compromiso.</p>
            @auth
                <a href="{{ route('usuario.padrinaje.compromiso', 'universitario') }}" class="inline-block bg-coral-400 hover:bg-coral-600 transition text-white font-medium px-8 py-3 rounded-md">
                    Comenzar padrinaje universitario
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-block bg-coral-400 hover:bg-coral-600 transition text-white font-medium px-8 py-3 rounded-md">
                    Inicia sesion para comenzar
                </a>
            @endauth
        </div>
    </section>

</x-layouts.public>