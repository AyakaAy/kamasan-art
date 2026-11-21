@vite(['resources/css/layouts/navbar.css'])
<nav class="navbar">
    <div class="navbar-container">

        <!-- BRAND -->
        <a href="{{ route('home') }}" class="navbar-brand">
            <img
                src="{{ asset('assets/images/logo.png') }}"
                alt="KAMASAN ART"
            >

            <div class="brand-text">
                <h2>KAMASAN ART</h2>
                <span>PUSAT SENI WAYANG KLASIK</span>
            </div>
        </a>

        <!-- NAVIGATION -->
        <ul class="navbar-menu">

            <li>
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Beranda
                </a>
            </li>

            <li>
                <a href="{{ route('about') }}">Tentang Kami</a>
            </li>

            <li>
                <a href="{{ route('products.index') }}">Katalog</a>
            </li>

            <li>
                <a href="{{ route('gallery') }}">Galeri</a>
            </li>

            <li>
                <a href="{{ route('contact') }}">Kontak</a>
            </li>

            <li>
                <a href="{{ route('tracking.index') }}">Lacak Pesanan</a>
            </li>

        </ul>

        <!-- ADMIN LOGIN -->
        <a href="{{ route('login') }}"
           class="navbar-login"
           aria-label="Login Admin">
            <i class="icon-user"></i>
        </a>

    </div>
</nav>
