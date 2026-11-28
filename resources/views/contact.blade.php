<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak & Lokasi — {{ $studio['name'] }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/home/contact.css'])
</head>
<body>
    @include('layouts.navbar')

    <main class="km-contact-wrapper">
        <!-- Header Section -->
        <header class="km-hero">
            <div class="km-badge">Hubungi Kami</div>
            <h1>Terhubung dengan <br>
            <span>MADE KAMASAN</span>
            </h1>
            <p>
                Konsultasi pribadi, pemesanan kustom karya seni lukis tradisional Kamasan, maupun kunjungan langsung ke studio kami di Klungkung, Bali.
            </p>
            <div class="km-divider">
                <span class="km-divider-diamond"></span>
            </div>
        </header>

        <!-- Primary Consultation Banner -->
        <section class="km-cta-banner">
            <div class="km-cta-content">
                <div class="km-status-line">
                    <span class="km-status-dot"></span>
                    Online &bull; Respons Cepat Jam 09:00 - 21:00 WITA
                </div>
                <h2>Saluran Utama Konsultasi Koleksi Karya & 
                    <br> Pre-Order
                </h2>
                <p>{{ $studio['description'] }}</p>
            </div>
            <div class="km-cta-actions">
                <a href="{{ $studio['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer" class="km-btn-gold">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                    Buka Percakapan WhatsApp
                </a>
                <div class="km-direct-meta">
                    <span>WA: <strong>{{ $studio['whatsapp_formatted'] }}</strong></span>
                    <span>&bull;</span>
                    <a href="{{ $studio['instagram_url'] }}" target="_blank" rel="noopener noreferrer">
                        IG: {{ $studio['instagram'] }}
                    </a>
                </div>
            </div>
        </section>

        <!-- Studio Location & Info Section -->
        <section>
            <div class="km-section-header">
                <div class="km-eyebrow">Cagar Budaya Klungkung</div>
                <h2>Lokasi Studio & Informasi Resmi</h2>
                <p>Menyaksikan langsung goresan tinta, pewarnaan, dan detail pewayangan di bumi leluhur seni Kamasan.</p>
            </div>

            <div class="km-grid">
                <!-- Left Column: Map & Studio Identity -->
                <div class="km-card km-map-card">
                    <div class="km-map-visual">
                        <img src="{{ asset($studio['map_image']) }}" alt="Peta Lokasi {{ $studio['name'] }}">
                        <div class="km-map-overlay">
                            <div class="km-map-pin-info">
                                <div class="km-pin-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4>Studio {{ $studio['name'] }}</h4>
                                    <span>{{ $studio['short_address'] }}</span>
                                </div>
                            </div>
                            <a href="{{ $studio['google_maps_url'] }}" target="_blank" rel="noopener noreferrer" class="km-btn-map">
                                Google Maps &#8599;
                            </a>
                        </div>
                    </div>

                    <div class="km-studio-profile-box">
                        <div class="km-profile-item">
                            <h5>Nama Studio</h5>
                            <p><strong>{{ $studio['name'] }}</strong> &mdash; {{ $studio['tagline'] }}</p>
                        </div>
                        <div class="km-profile-item">
                            <h5>Jenis Usaha</h5>
                            <p>{{ $studio['business_type'] }} (Tradisional & Digital)</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Operating Hours & Full Address -->
                <div class="km-side-stack">
                    <!-- Jam Operasional -->
                    <div class="km-card km-info-card">
                        <h3 class="km-card-title">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            Jam Buka Kunjungan Studio
                        </h3>

                        @foreach($studio['operating_hours'] as $day => $hours)
                            <div class="km-schedule-row">
                                <span>{{ $day }}</span>
                                <span>{{ $hours }}</span>
                            </div>
                        @endforeach

                        <p class="km-note">
                            *Hari Raya Nyepi, Galungan, dan Kuningan studio tertutup untuk umum demi kekhidmatan upacara adat sangging.
                        </p>
                    </div>

                    <!-- Alamat Lengkap & Kontak -->
                    <div class="km-card km-info-card">
                        <h3 class="km-card-title">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            Alamat Lengkap & Kontak
                        </h3>

                        <div class="km-address-title">{{ $studio['name'] }} &mdash; {{ $studio['business_type'] }}</div>
                        <p class="km-address-text">{{ $studio['full_address'] }}</p>

                        <ul class="km-contact-list">
                            <li>
                                <span>WhatsApp</span>
                                <a href="{{ $studio['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer">
                                    {{ $studio['whatsapp_formatted'] }}
                                </a>
                            </li>
                            <li>
                                <span>Instagram</span>
                                <a href="{{ $studio['instagram_url'] }}" target="_blank" rel="noopener noreferrer">
                                    {{ $studio['instagram'] }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')
</body>
</html>