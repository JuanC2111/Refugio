<x-layouts.public :title="'Padrinaje Fin de Semana - Huellitas'">

    <section class="relative overflow-hidden bg-bosque-50 py-16">
        <div class="absolute -bottom-16 -right-16 w-64 h-64 rounded-full bg-bosque-100 opacity-60"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-xs font-medium px-4 py-1.5 rounded-full bg-bosque-900 text-bosque-50 mb-5">Padrinaje</span>
            <h1 class="font-display font-semibold text-3xl sm:text-4xl text-bosque-900 mb-4">Padrinaje Fin de Semana</h1>
            <p class="text-bosque-800/70 max-w-2xl mx-auto leading-relaxed">
                Perfecto si tienes un fin de semana libre y quieres dedicarlo a pasear, jugar y dar carino a uno de nuestros peludos. Un compromiso flexible con gran impacto.
            </p>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <div class="w-10 h-10 rounded-full bg-bosque-100 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-bosque-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="font-medium text-bosque-900 mb-2">Flexibilidad total</h3>
                <p class="text-sm text-bosque-800/70">Elige sabados, domingos o ambos, segun tu disponibilidad.</p>
            </div>
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <div class="w-10 h-10 rounded-full bg-bosque-100 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-bosque-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-medium text-bosque-900 mb-2">Pocas horas, gran impacto</h3>
                <p class="text-sm text-bosque-800/70">Un paseo de calidad mejora el estado fisico y emocional del perrito.</p>
            </div>
            <div class="bg-white border border-bosque-100 rounded-2xl p-6">
                <div class="w-10 h-10 rounded-full bg-bosque-100 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-bosque-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h3 class="font-medium text-bosque-900 mb-2">Sin permanencia</h3>
                <p class="text-sm text-bosque-800/70">Ideal si quieres probar antes de un compromiso mas largo.</p>
            </div>
        </div>

        <div class="bg-bosque-900 rounded-2xl p-10 text-center">
            <h2 class="font-display font-semibold text-2xl text-bosque-50 mb-3">¿Listo para comenzar?</h2>
            <p class="text-bosque-100 mb-6 max-w-md mx-auto">Antes de elegir un perrito, te pediremos completar un breve formulario de compromiso.</p>
            @auth
                <a href="{{ route('usuario.padrinaje.compromiso', 'fin_de_semana') }}" class="inline-block bg-coral-400 hover:bg-coral-600 transition text-white font-medium px-8 py-3 rounded-md">
                    Comenzar padrinaje de fin de semana
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-block bg-coral-400 hover:bg-coral-600 transition text-white font-medium px-8 py-3 rounded-md">
                    Inicia sesion para comenzar
                </a>
            @endauth
        </div>
    </section>

</x-layouts.public>