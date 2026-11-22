<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KAMASAN ART — Preserving the Heritage of Kamasan Painting')</title>

    {{-- Google Fonts untuk tipografi klasik & modern --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
    @stack('styles')
</head>
<body class="km-body">

    {{-- Navbar Publik --}}
    @include('layouts.navbar')

    {{-- Konten Utama Halaman (Wajib bernama 'content') --}}
    <main id="mainContent" class="km-main-content">
        @yield('content')
    </main>

    {{-- Footer Publik --}}
    @include('layouts.footer')

    @stack('scripts')
</body>
</html>