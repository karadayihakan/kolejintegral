<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/png" href="{{ asset('images/integral-logo.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

        <title>{{ config('app.name', 'İntegral Yönetim Paneli | Buberka CMS') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .btn-primary {
            background-color: #51223a !important;
            border-color: #51223a !important;
        }
        .btn-primary:hover {
            background-color: #6b2d4a !important;
            border-color: #6b2d4a !important;
        }
        .btn-primary:focus, .btn-primary:active {
            background-color: #51223a !important;
            border-color: #51223a !important;
        }
    </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
              <!-- jQuery ve DataTables Scriptlerini Ekle -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

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

            <!-- Admin Footer -->
            <footer class="text-center text-muted py-3" style="font-size: 0.75rem; border-top: 1px solid #e5e7eb; margin-top: 1rem;">
                Buberka CMS &copy; {{ date('Y') }}
            </footer>
        </div>

        </body>
</html>
