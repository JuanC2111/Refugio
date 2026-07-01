<footer class="bg-bosque-900 text-bosque-50 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid md:grid-cols-3 gap-10">

        <div>
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 rounded-full bg-bosque-50 flex items-center justify-center">
                    <svg class="w-4 h-4 text-bosque-900" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c1.5 0 3 1.5 3 3.5S13.5 19 12 19s-3-1.5-3-3.5S10.5 12 12 12zM6.5 9C7.6 9 8.5 9.9 8.5 11S7.6 13 6.5 13 4.5 12.1 4.5 11 5.4 9 6.5 9zM17.5 9c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zM9 6c.8 0 1.5.9 1.5 2S9.8 10 9 10s-1.5-.9-1.5-2S8.2 6 9 6zM15 6c.8 0 1.5.9 1.5 2s-.7 2-1.5 2-1.5-.9-1.5-2 .7-2 1.5-2z"/>
                    </svg>
                </div>
                <span class="font-display font-semibold text-lg">Huellitas</span>
            </div>
            <p class="text-sm text-bosque-100 leading-relaxed">
                Refugio dedicado a rescatar y cuidar perritos con discapacidad en Socabaya, Arequipa. Cada huellita merece un hogar lleno de amor.
            </p>
        </div>

        <div>
            <h3 class="font-medium mb-4">Enlaces</h3>
            <ul class="space-y-2 text-sm text-bosque-100">
                <li><a href="{{ route('inicio') }}" class="hover:text-coral-200 transition">Inicio</a></li>
                <li><a href="{{ route('catalogo') }}" class="hover:text-coral-200 transition">Catalogo de mascotas</a></li>
                <li><a href="{{ route('padrinaje.corporativo') }}" class="hover:text-coral-200 transition">Padrinaje</a></li>
                <li><a href="{{ route('contacto') }}" class="hover:text-coral-200 transition">Contacto</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-medium mb-4">Contacto rapido</h3>
            <form action="{{ route('contacto.store') }}" method="POST" class="space-y-2">
                @csrf
                <input type="text" name="nombre" placeholder="Tu nombre" required
                    class="w-full rounded-md bg-bosque-800 border border-bosque-600 text-sm px-3 py-2 placeholder-bosque-200 text-bosque-50 focus:outline-none focus:ring-2 focus:ring-coral-400">
                <input type="email" name="correo" placeholder="Tu correo" required
                    class="w-full rounded-md bg-bosque-800 border border-bosque-600 text-sm px-3 py-2 placeholder-bosque-200 text-bosque-50 focus:outline-none focus:ring-2 focus:ring-coral-400">
                <textarea name="mensaje" rows="2" placeholder="Tu mensaje o duda" required
                    class="w-full rounded-md bg-bosque-800 border border-bosque-600 text-sm px-3 py-2 placeholder-bosque-200 text-bosque-50 focus:outline-none focus:ring-2 focus:ring-coral-400"></textarea>
                <input type="hidden" name="tipo_mensaje" value="consulta">
                <button type="submit" class="w-full bg-coral-400 hover:bg-coral-600 transition text-bosque-50 text-sm font-medium py-2 rounded-md">
                    Enviar mensaje
                </button>
            </form>
        </div>
    </div>

    <div class="border-t border-bosque-800 py-4 text-center text-xs text-bosque-200">
        &copy; {{ date('Y') }} Huellitas en busca de amor. Socabaya, Arequipa.
    </div>
</footer>

<a href="{{ route('donaciones') }}"
    class="fixed bottom-6 right-6 z-50 bg-coral-400 hover:bg-coral-600 transition text-white font-medium px-5 py-3 rounded-full shadow-lg flex items-center gap-2">
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21s-7.5-4.5-9.5-9C1 8.5 2.5 5 6 5c2 0 3.5 1 4 2.5C10.5 6 12 5 14 5c3.5 0 5 3.5 3.5 7-2 4.5-9.5 9-9.5 9z"/></svg>
    Donate Paw
</a>