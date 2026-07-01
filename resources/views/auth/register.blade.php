<x-layouts.public :title="'Registrarse - Huellitas'">

    <section class="relative overflow-hidden">
        <div class="absolute -top-16 -left-16 w-64 h-64 rounded-full bg-coral-100 opacity-50"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 rounded-full bg-bosque-50"></div>

        <div class="relative max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center mb-8">
                <div class="w-14 h-14 rounded-full bg-coral-400 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21s-7.5-4.5-9.5-9C1 8.5 2.5 5 6 5c2 0 3.5 1 4 2.5C10.5 6 12 5 14 5c3.5 0 5 3.5 3.5 7-2 4.5-9.5 9-9.5 9z"/>
                    </svg>
                </div>
                <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-2">Unete a Huellitas</h1>
                <p class="text-bosque-800/60 text-sm">Crea tu cuenta y empieza a cambiar vidas</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="bg-white border border-bosque-100 rounded-2xl shadow-sm p-8 space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-bosque-900 mb-1.5">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        placeholder="Tu nombre completo"
                        class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400 focus:border-bosque-400 transition">
                    @error('name') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-bosque-900 mb-1.5">Correo</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        placeholder="tucorreo@ejemplo.com"
                        class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400 focus:border-bosque-400 transition">
                    @error('email') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-bosque-900 mb-1.5">Contrasena</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        placeholder="••••••••"
                        class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400 focus:border-bosque-400 transition">
                    @error('password') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-bosque-900 mb-1.5">Confirma tu contrasena</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        placeholder="••••••••"
                        class="w-full rounded-md border border-bosque-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-bosque-400 focus:border-bosque-400 transition">
                    @error('password_confirmation') <p class="text-coral-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-coral-400 hover:bg-coral-600 transition text-white font-medium py-3 rounded-md flex items-center justify-center gap-2">
                    Crear mi cuenta
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </button>

                <div class="text-center text-sm pt-2 border-t border-bosque-50 mt-2">
                    <a href="{{ route('login') }}" class="text-bosque-700 hover:text-bosque-900 mt-3 inline-block">¿Ya tienes cuenta? <span class="font-medium underline">Inicia sesion</span></a>
                </div>
            </form>
        </div>
    </section>

</x-layouts.public>