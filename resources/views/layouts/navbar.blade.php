@php
    $isHome = request()->routeIs('home');
@endphp
@vite(['resources/css/layouts/navbar.css'])
<header id="kmNavbar" class="km-navbar {{ $isHome ? 'is-home' : 'is-solid' }}">
    <div class="km-navbar-inner">
        {{-- Identitas Brand (Tanpa Variabel Data) --}}
        <a href="{{ route('home') }}" class="km-brand" aria-label="Beranda KAMASAN ART">
            <span class="km-brand-ornament" aria-hidden="true">❖</span>
            <span class="km-brand-text">
                <strong>KAMASAN ART</strong>
                <small>SENI WAYANG KLASIK</small>
            </span>
        </a>

        {{-- Menu Navigasi Utama (Sesuai PRD 6.1) --}}
        <nav id="kmNavMenu" class="km-nav-menu" aria-label="Navigasi Utama">
            <a href="{{ route('home') }}" class="km-nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">
                Beranda
            </a>
            <a href="{{ route('about') }}" class="km-nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}">
                Tentang Kami
            </a>
            <a href="{{ route('products.index') }}" class="km-nav-link {{ request()->routeIs('products.*') ? 'is-active' : '' }}">
                Katalog
            </a>
            <a href="{{ route('gallery') }}" class="km-nav-link {{ request()->routeIs('gallery') ? 'is-active' : '' }}">
                Galeri
            </a>
            <a href="{{ route('contact') }}" class="km-nav-link {{ request()->routeIs('contact') ? 'is-active' : '' }}">
                Kontak
            </a>
            <a href="{{ route('tracking.index') }}" class="km-nav-link {{ request()->routeIs('tracking.*') ? 'is-active' : '' }}">
                Lacak Pesanan
            </a>
        </nav>

        {{-- Aksi Kanan: Ikon Login Admin & Tombol Menu Mobile --}}
        <div class="km-nav-actions">
            <a
                href="{{ route('admin.login') }}"
                class="km-admin-btn {{ request()->routeIs('admin.*') ? 'is-active' : '' }}"
                title="Login Admin"
                aria-label="Login Admin"
            >
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>

            <button
                type="button"
                id="kmNavToggle"
                class="km-hamburger"
                aria-label="Buka Menu Navigasi"
                aria-expanded="false"
                aria-controls="kmNavMenu"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('kmNavbar');
    const toggleBtn = document.getElementById('kmNavToggle');
    const navMenu = document.getElementById('kmNavMenu');

    // Ubah background navbar transparan menjadi coklat gelap saat di-scroll
    function handleScroll() {
        if (!navbar) return;
        if (window.scrollY > 30) {
            navbar.classList.add('is-scrolled');
        } else {
            navbar.classList.remove('is-scrolled');
        }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();

    // Toggle buka/tutup menu pada layar mobile
    if (toggleBtn && navMenu) {
        toggleBtn.addEventListener('click', function () {
            const isOpen = navMenu.classList.toggle('is-open');
            toggleBtn.classList.toggle('is-open', isOpen);
            toggleBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }
});
</script>