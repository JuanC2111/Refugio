<header class="bg-crema border-b border-bosque-100 sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">

        <a href="{{ route('inicio') }}" class="flex items-center gap-2">
            <div class="w-9 h-9 rounded-full bg-bosque-900 flex items-center justify-center">
                <svg class="w-5 h-5 text-bosque-50" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c1.5 0 3 1.5 3 3.5S13.5 19 12 19s-3-1.5-3-3.5S10.5 12 12 12zM6.5 9C7.6 9 8.5 9.9 8.5 11S7.6 13 6.5 13 4.5 12.1 4.5 11 5.4 9 6.5 9zM17.5 9c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zM9 6c.8 0 1.5.9 1.5 2S9.8 10 9 10s-1.5-.9-1.5-2S8.2 6 9 6zM15 6c.8 0 1.5.9 1.5 2s-.7 2-1.5 2-1.5-.9-1.5-2 .7-2 1.5-2z"/>
                </svg>
            </div>
            <span class="font-display font-semibold text-lg text-bosque-900">Huellitas</span>
        </a>

        <div class="hidden md:flex items-center gap-8 text-sm font-medium text-bosque-900">
            <a href="{{ route('inicio') }}" class="hover:text-coral-400 transition">Inicio</a>

            <div class="relative group">
                <button class="flex items-center gap-1 hover:text-coral-400 transition">
                    Padrinaje
                    <svg class="w-3.5 h-3.5 mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="absolute left-0 top-full pt-2 w-56 hidden group-hover:block">
                    <div class="bg-white border border-bosque-100 rounded-lg shadow-lg overflow-hidden">
                        <a href="{{ route('padrinaje.corporativo') }}" class="block px-4 py-3 text-sm hover:bg-bosque-50 transition">Padrinaje Corporativo</a>
                        <a href="{{ route('padrinaje.universitario') }}" class="block px-4 py-3 text-sm hover:bg-bosque-50 transition border-t border-bosque-50">Padrinaje Universitario</a>
                        <a href="{{ route('padrinaje.finsemana') }}" class="block px-4 py-3 text-sm hover:bg-bosque-50 transition border-t border-bosque-50">Padrinaje Fin de Semana</a>
                    </div>
                </div>
            </div>

            <a href="{{ route('catalogo') }}" class="hover:text-coral-400 transition">Catalogo</a>
            <a href="{{ route('contacto') }}" class="hover:text-coral-400 transition">Contacto</a>
        </div>

        <div class="hidden md:flex items-center gap-3">
            @auth
                <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-medium rounded-md bg-bosque-900 text-bosque-50 hover:bg-bosque-800 transition">Mi Panel</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-sm font-medium rounded-md border border-coral-400 text-coral-600 hover:bg-coral-50 transition">
                        Salir
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium rounded-md border border-bosque-900 text-bosque-900 hover:bg-bosque-50 transition">Iniciar sesion</a>
                <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium rounded-md bg-bosque-900 text-bosque-50 hover:bg-bosque-800 transition">Registrarse</a>
            @endauth
        </div>

        <button id="menu-toggle" class="md:hidden text-bosque-900">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </nav>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-bosque-100 px-4 py-4 space-y-3 text-sm font-medium text-bosque-900">
        <a href="{{ route('inicio') }}" class="block">Inicio</a>
        <a href="{{ route('padrinaje.corporativo') }}" class="block">Padrinaje Corporativo</a>
        <a href="{{ route('padrinaje.universitario') }}" class="block">Padrinaje Universitario</a>
        <a href="{{ route('padrinaje.finsemana') }}" class="block">Padrinaje Fin de Semana</a>
        <a href="{{ route('catalogo') }}" class="block">Catalogo</a>
        <a href="{{ route('contacto') }}" class="block">Contacto</a>
        <div class="pt-3 border-t border-bosque-100 flex flex-col gap-2">
            @auth
                <a href="{{ route('dashboard') }}" class="text-center px-4 py-2 rounded-md bg-bosque-900 text-bosque-50">Mi Panel</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-center px-4 py-2 rounded-md border border-coral-400 text-coral-600">
                        Salir
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-center px-4 py-2 rounded-md border border-bosque-900">Iniciar sesion</a>
                <a href="{{ route('register') }}" class="text-center px-4 py-2 rounded-md bg-bosque-900 text-bosque-50">Registrarse</a>
            @endauth
        </div>
    </div>
</header>

<script>
    document.getElementById('menu-toggle')?.addEventListener('click', function () {
        document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });
</script>