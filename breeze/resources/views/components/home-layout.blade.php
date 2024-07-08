<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- karena template untuk frontpage, silakan Lengkapi meta tag yang lain untuk SEO --
}}
{{-- nama web sesuai konfigurasi, dapat juga dibuat dinamis --}}
<title>Home Shoes</title>
<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;6 00;700&display=swap">
<!-- Scripts -->
{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>
{{-- karena terjadi maslah pada instalasi tailwind, shg masih menggunakan CDN --}}
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw- elements/dist/css/index.min.css" />
<script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <header>
            @include('layouts.navigation')
        </header>
        <main>
            {{ $slot }}
        </main>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>