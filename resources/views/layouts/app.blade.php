<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&family=fraunces:500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'sans-serif'],
                display: ['Fraunces', 'serif'],
            },
            colors: {
                bosque: {
                    50: '#EAF3DE',
                    100: '#C0DD97',
                    200: '#97C459',
                    400: '#639922',
                    600: '#3B6D11',
                    800: '#27500A',
                    900: '#173404',
                },
                coral: {
                    50: '#FAECE7',
                    100: '#F5C4B3',
                    200: '#F0997B',
                    400: '#D85A30',
                    600: '#993C1D',
                    800: '#712B13',
                    900: '#4A1B0C',
                },
                crema: '#FAF7F0',
            },
        },
    },
}
</script>
    </head>
    <body class="font-sans antialiased bg-crema">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
