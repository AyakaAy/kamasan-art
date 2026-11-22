@php
    $site = file_exists(resource_path('data/site.php'))
        ? require resource_path('data/site.php')
        : [];
@endphp
   @vite(['resources/css/layouts/footer.css'])
<footer class="kamasan-footer">
    <div class="footer-container">
        <div class="footer-grid">

            {{-- KOLOM 1: Brand, Deskripsi & Kontak --}}
            <div class="footer-col-brand">
                <div class="brand-header">
                    <div class="brand-logo-box">
                        <img src="{{ asset('assets/logo/logo.jpg') }}"
                             alt="Logo {{ $site['brand'] ?? 'MADE KAMASAN' }}"
                             class="brand-logo-img">
                    </div>
                    <h3 class="brand-title">{{ $site['brand'] ?? 'MADE KAMASAN' }}</h3>
                </div>

                <p class="brand-description">
                    Preservasi adiluhung seni lukis wayang Kamasan Bali. Karya original bernilai filosofis tinggi
                    yang digoreskan secara turun-temurun menggunakan pewarna alami dan akrilik oleh pelukis Klungkung.
                </p>

                <div class="contact-block">
                    <span class="footer-heading-gold">KONTAK LANGSUNG STUDIO WHATSAPP</span>
                    <span class="wa-link">
                        {{ $site['contact']['whatsapp'] ?? '08xxxxxxxxxx' }} (Atelier Direct)
                    </span>
                    <div class="ig-wrapper">
                        <a href="https://instagram.com/{{ ltrim($site['contact']['instagram'] ?? 'madekamasan_', '@') }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="ig-link">
                            Instagram: {{ $site['contact']['instagram'] ?? '@madekamasan_' }}
                        </a>
                    </div>
                </div>
            </div>

            {{-- KOLOM 2: Navigasi Cepat --}}
            <div class="footer-col-nav">
                <span class="footer-heading-gold">NAVIGASI CEPAT</span>
                <ul class="footer-nav-list">
                    <li>
                        <a href="{{ Route::has('home') ? route('home') : url('/') }}"
                           class="{{ request()->routeIs('home') ? 'active' : '' }}">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route::has('about') ? route('about') : url('/tentang-kami') }}"
                           class="{{ request()->routeIs('about') ? 'active' : '' }}">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route::has('products.index') ? route('products.index') : url('/katalog') }}"
                           class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
                            Katalog 
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route::has('gallery') ? route('gallery') : url('/galeri') }}"
                           class="{{ request()->routeIs('gallery') ? 'active' : '' }}">
                            Galeri &amp; Pameran
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route::has('tracking.index') ? route('tracking.index') : url('/lacak-pesanan') }}"
                           class="{{ request()->routeIs('tracking.*') ? 'active' : '' }}">
                            Lacak Pesanan
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route::has('contact') ? route('contact') : url('/kontak') }}"
                           class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                            Kontak Atelier
                        </a>
                    </li>
                </ul>
            </div>

            {{-- KOLOM 3: Atelier & Jam Buka --}}
            <div class="footer-col-studio">
                <div class="studio-section">
                    <span class="footer-heading-gold">ATELIER &amp; STUDIO</span>
                    <p class="studio-address">{{ $site['address'] ?? 'Jl. Pande Mas, Klungkung, Bali' }}</p>
                    <p class="studio-subtext">
                        {{ $site['tagline'] ?? 'Preserving the Heritage of Kamasan Painting' }} — Pusat Seni Lukis Wayang Klasik &amp; Cagar Budaya Leluhur Bali
                    </p>
                </div>

                <div class="hours-section">
                    <span class="footer-heading-gold">JAM BUKA KUNJUNGAN STUDIO</span>
                    <p class="hours-text">
                        Senin - Sabtu: 09:00 - 17:00 WITA<br>
                        Minggu &amp; Hari Raya Suci: Khusus Janji Temu Kuratorial
                    </p>
                </div>
            </div>

        </div>

        {{-- Bagian Bawah: Copyright & Heritage Badges --}}
        <div class="footer-bottom">
            <p class="copyright-text">
                &copy; {{ date('Y') }} {{ $site['brand'] ?? 'KAMASAN ART' }}. Hak Cipta Dilindungi Undang-Undang. Seluruh lukisan disertai Sertifikat Keaslian Bersegel.
            </p>

            <div class="heritage-badges">
                <span class="badge-item">WARISAN KLUNGKUNG</span>
                <span class="badge-dot">&bull;</span>
                <span class="badge-item">WAYANG KAMASAN</span>
                <span class="badge-dot">&bull;</span>
                <span class="badge-item">CLASSIC KAMASAN</span>
            </div>
        </div>
    </div>
</footer>