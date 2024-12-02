<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
            </header>

            <main class="flex flex-col items-center p-6 mx-auto mt-6 space-y-4 text-center max-w-7xl lg:p-8">
                <x-application-logo class="w-24 h-24 fill-current text-primary" />
                <x-button primary xl href="{{route('register')}}">Get started!</x-button>
            </main>
        </div>
    </body>
</html>
