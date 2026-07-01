<x-layouts.public :title="'Iniciar sesion - Huellitas'">

    <section class="relative overflow-hidden">
        <div class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-bosque-50"></div>
        <div class="absolute bottom-10 left-10 w-32 h-32 rounded-full bg-coral-100 opacity-50"></div>

        <div class="relative max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center mb-8">
                <div class="w-14 h-14 rounded-full bg-bosque-900 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-7 h-7 text-bosque-50" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c1.5 0 3 1.5 3 3.5S13.5 19 12 19s-3-1.5-3-3.5S10.5 12 12 12zM6.5 9C7.6 9 8.5 9.9 8.5 11S7.6 13 6.5 13 4.5 12.1 4.5 11 5.4 9 6.5 9zM17.5 9c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zM9 6c.8 0 1.5.9 1.5 2S9.8 10 9 10s-1.5-.9-1.5-2S8.2 6 9 6zM15 6c.8 0 1.5.9 1.5 2s-.7 2-1.5 2-1.5-.9-1.5-2 .7-2 1.5-2z"/>
                    </svg>
                </div>
                <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-2">Bienvenido de nuevo</h1>
                <p class="text-bosque-800/60 text-sm">Inicia sesion para continuar cuidando huellitas</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="bg-white border border-bosque-100 rounded-2xl shadow-sm p-8 space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-bosque-900 mb-1.5">Correo</label>
                    <div class="relative">
                        <svg class="w-4 h-4 text-bosque-300 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                            placeholder="tucorreo@ejemplo.com"
                            class="w-full rounded-md border border-bosque-200 pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400 focus:border-bosque-400 transition">
                    </div>
                    @error('email') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-bosque-900 mb-1.5">Contrasena</label>
                    <div class="relative">
                        <svg class="w-4 h-4 text-bosque-300 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 10-8 0v2"/></svg>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full rounded-md border border-bosque-200 pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400 focus:border-bosque-400 transition">
                    </div>
                    @error('password') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded border-bosque-300 text-bosque-700 focus:ring-bosque-400">
                    <span class="text-sm text-bosque-800/80">Recuerdame</span>
                </label>

                <button type="submit" class="w-full bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 font-medium py-3 rounded-md flex items-center justify-center gap-2">
                    Iniciar sesion
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </button>

                <div class="flex items-center justify-between text-sm pt-2 border-t border-bosque-50 mt-2">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-bosque-700 hover:text-bosque-900 hover:underline mt-3">¿Olvidaste tu contrasena?</a>
                    @endif
                    <a href="{{ route('register') }}" class="text-coral-600 hover:text-coral-700 font-medium mt-3">Crear cuenta →</a>
                </div>
            </form>
        </div>
    </section>

</x-layouts.public>