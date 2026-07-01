<x-layouts.public :title="'Gracias por tu donacion - Huellitas'">

    <section class="relative overflow-hidden min-h-[70vh] flex items-center">
        <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full bg-bosque-50"></div>
        <div class="absolute bottom-10 left-10 w-40 h-40 rounded-full bg-coral-100 opacity-60"></div>
        <div class="absolute top-1/3 left-1/4 w-20 h-20 rounded-full bg-bosque-100 opacity-50"></div>

        <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">

            <div class="w-24 h-24 rounded-full bg-coral-400 flex items-center justify-center mx-auto mb-8 animate-pulse">
                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21s-7.5-4.5-9.5-9C1 8.5 2.5 5 6 5c2 0 3.5 1 4 2.5C10.5 6 12 5 14 5c3.5 0 5 3.5 3.5 7-2 4.5-9.5 9-9.5 9z"/>
                </svg>
            </div>

            <h1 class="font-display font-semibold text-4xl text-bosque-900 mb-4">¡Gracias por tu donacion!</h1>
            <p class="text-bosque-800/70 text-lg leading-relaxed mb-8">
                Tu aporte de <span class="font-semibold text-coral-600">S/ {{ number_format($donacion->monto, 2) }}</span> ayudara directamente con la alimentacion y cuidado medico de nuestros perritos en Socabaya.
            </p>

            <div class="bg-white border border-bosque-100 rounded-2xl p-6 mb-10 text-left max-w-sm mx-auto">
                <p class="text-xs text-bosque-800/50 uppercase tracking-wide mb-3">Comprobante</p>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-bosque-800/70">Donante</span>
                    <span class="font-medium text-bosque-900">{{ $donacion->nombre_donante }}</span>
                </div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-bosque-800/70">Monto</span>
                    <span class="font-medium text-bosque-900">S/ {{ number_format($donacion->monto, 2) }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-bosque-800/70">Fecha</span>
                    <span class="font-medium text-bosque-900">{{ $donacion->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('catalogo') }}" class="bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 font-medium px-6 py-3 rounded-md">
                    Conoce a los perritos
                </a>
                <a href="{{ route('inicio') }}" class="border border-bosque-900 text-bosque-900 hover:bg-bosque-50 transition font-medium px-6 py-3 rounded-md">
                    Volver al inicio
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>