@php
    $nombresTipo = [
        'corporativo' => 'Padrinaje Corporativo',
        'universitario' => 'Padrinaje Universitario',
        'fin_de_semana' => 'Padrinaje Fin de Semana',
    ];
@endphp

<x-layouts.public :title="'Formulario de compromiso - Huellitas'">

    <section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="text-center mb-8">
            <span class="inline-block text-xs font-medium px-4 py-1.5 rounded-full bg-bosque-900 text-bosque-50 mb-4">{{ $nombresTipo[$tipo] }}</span>
            <h1 class="font-display font-semibold text-3xl text-bosque-900 mb-3">Formulario de compromiso</h1>
            <p class="text-bosque-800/70">
                Antes de elegir a tu futuro peludo, queremos asegurarnos de que entiendes la responsabilidad que implica cuidarlo.
            </p>
        </div>

        <div class="bg-white border border-bosque-100 rounded-2xl p-8">
            <ul class="space-y-4 mb-8 text-sm text-bosque-800/80">
                <li class="flex gap-3">
                    <svg class="w-5 h-5 text-bosque-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                    Me comprometo a cumplir con los dias y horarios de paseo o visita que yo mismo proponga.
                </li>
                <li class="flex gap-3">
                    <svg class="w-5 h-5 text-bosque-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                    Entiendo que este perrito puede tener necesidades especiales (movilidad reducida, condiciones medicas, etc.) y me comprometo a tratarlo con paciencia y cuidado.
                </li>
                <li class="flex gap-3">
                    <svg class="w-5 h-5 text-bosque-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                    Entiendo que mi solicitud sera revisada por el equipo del refugio y puede ser aprobada o rechazada.
                </li>
                <li class="flex gap-3">
                    <svg class="w-5 h-5 text-bosque-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                    Me comprometo a notificar al refugio si por algun motivo no puedo continuar con el padrinaje.
                </li>
            </ul>

            <form action="{{ route('usuario.padrinaje.aceptarCompromiso', $tipo) }}" method="POST">
                @csrf
                <label class="flex items-start gap-3 mb-6 cursor-pointer">
                    <input type="checkbox" name="acepta" value="1" required
                        class="mt-1 rounded border-bosque-300 text-bosque-700 focus:ring-bosque-400">
                    <span class="text-sm text-bosque-900">
                        He leido y acepto el compromiso de cuidado responsable descrito arriba.
                    </span>
                </label>
                <button type="submit" class="w-full bg-bosque-900 hover:bg-bosque-800 transition text-bosque-50 font-medium py-3 rounded-md">
                    Aceptar y elegir un perrito
                </button>
            </form>
        </div>
    </section>

</x-layouts.public>