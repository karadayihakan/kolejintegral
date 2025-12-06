<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/png" href="{{ asset('images/integral-logo.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

        <title>{{ config('app.name', 'Kolej İntegral Panel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background: linear-gradient(135deg, #bc541b 0%, #c05e2e 100%) !important;">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-4 py-10"
             style="background: linear-gradient(135deg, #bc541b 0%, #c05e2e 100%) !important;">
            <div class="mb-4">
                <a href="/">
                    <img src="/images/integral-logo.png" alt="Kolej İntegral" class="object-contain drop-shadow-lg" style="width: 110px; height: 110px;">
                </a>
            </div>

            <div class="w-full sm:max-w-lg mt-4 px-8 py-8 bg-white/90 shadow-2xl overflow-hidden sm:rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
