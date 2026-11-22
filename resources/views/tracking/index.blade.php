<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelacakan Status Pesanan | KAMASAN ART</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/tracking/tracking-product.css'])
</head>
<body class="km-track-body">
    @include('layouts.navbar')

    <main class="km-track-page">
        <div class="km-track-container">

            {{-- Header & Kolom Pencarian Kode --}}
            <header class="km-track-hero">
                <span class="km-track-eyebrow">• SISTEM VERIFIKASI AUTENTIK STUDIO KAMASAN</span>
                <h1 class="km-track-title">Pelacakan Status Pesanan</h1>
                <p class="km-track-subtitle">
                    Pantau perkembangan pengerjaan mahakarya dan verifikasi pembayaran Anda secara transparan menggunakan kode pelacakan unik.
                </p>

                <form action="{{ route('tracking.show') }}" method="GET" class="km-track-search-box">
                    <div class="km-track-search-bar">
                        <div class="km-track-input-wrap">
                            <span class="km-track-icon" aria-hidden="true">❖</span>
                            <input
                                type="text"
                                name="code"
                                value="{{ session('not_found_code', '') }}"
                                placeholder="Masukkan kode pelacakan (Contoh: KM-20261121-RS1001)"
                                aria-label="Kode Pelacakan Pesanan"
                                autocomplete="off"
                                required
                            >
                        </div>
                        <button type="submit" class="km-track-btn-gold">
                            LACAK SEKARANG <span aria-hidden="true">⌕</span>
                        </button>
                    </div>

                    <div class="km-track-footnotes">
                        <span>🔒 Privasi &amp; Data Pribadi (FR-UAS-24) Terproteksi</span>
                        <span>Kode unik diberikan saat pengajuan formulir terverifikasi</span>
                    </div>
                </form>
            </header>

            {{-- Pesan Netral Jika Kode Tidak Ditemukan (FR-UAS-25) --}}
            @if(session('not_found_code'))
                <div class="km-track-alert">
                    <strong>Kode Pelacakan Tidak Ditemukan</strong>
                    <p>
                        Kode <code>{{ session('not_found_code') }}</code> tidak tercatat pada arsip studio. Pastikan penulisan kode sesuai dengan bukti pengajuan formulir Anda.
                    </p>
                </div>
            @endif

            {{-- Pilihan Simulasi Cepat (Ready Stock 100% Lunas vs PO DP 50%) --}}
            <div class="km-track-samples">
                <div class="km-samples-head">
                    <span class="km-card-kicker">◈ SIMULASI KODE PELACAKAN (TANPA DATABASE)</span>
                    <h2>Pilih Contoh Kode untuk Melihat Detail Tracking</h2>
                </div>

                <div class="km-samples-grid">
                    <article class="km-sample-card">
                        <div class="km-sample-top">
                            <span class="km-pill is-green">Ready Stock • Langsung 100% Lunas</span>
                            <code>KM-20261121-RS1001</code>
                        </div>
                        <h3>Lukisan Klasik Bima Swarga</h3>
                        <p>Skema pembayaran penuh 100% tanpa tahapan DP 50% (4 tahap kronologi).</p>
                        <a href="{{ route('tracking.show', ['code' => 'KM-20261121-RS1001']) }}" class="km-sample-link">
                            Buka Detail Tracking Ready Stock &rarr;
                        </a>
                    </article>

                    <article class="km-sample-card">
                        <div class="km-sample-top">
                            <span class="km-pill is-gold">Pre-Order • Bertahap DP 50%</span>
                            <code>KM-20261121-PO7741</code>
                        </div>
                        <h3>Plafoni Bale Kambang: Ramayana &amp; Sutasoma</h3>
                        <p>Skema pembayaran DP 50% terverifikasi dan sisa pelunasan 50% (6 tahap kronologi).</p>
                        <a href="{{ route('tracking.show', ['code' => 'KM-20261121-PO7741']) }}" class="km-sample-link">
                            Buka Detail Tracking Pre-Order &rarr;
                        </a>
                    </article>
                </div>
            </div>

        </div>
    </main>

    @include('layouts.footer')

</body>
</html>