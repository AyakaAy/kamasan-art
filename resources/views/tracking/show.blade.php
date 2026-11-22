<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pelacakan {{ $order['code'] ?? 'Pesanan' }} | KAMASAN ART</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/tracking/tracking-product.css'])
</head>
<body class="km-track-body">

    {{-- 1. Navbar --}}
    @include('layouts.navbar')

    @php
        $order = $order ?? [
            'code' => 'KM-20261121-PO7741',
            'type' => 'pre_order',
            'type_label' => 'Pre-Order Kustom (PO Sangging)',
            'product_name' => 'Ider - Ider',
            'product_category' => 'Upacara Adat',
            'dimensions' => '320 x 180 cm • Kain Blacu Tebal & Prada Emas',
            'image' => 'assets/images/products/ider-ider.webp',
            'quantity' => 1,
            'masked_buyer' => 'Ma*******a',
            'created_at' => '28 Oktober 2026',
            'estimate' => '45 Hari Kerja (Est. 15 Des 2026)',
            'delivery_method' => 'Antar Langsung & Pemasangan Studio',
            'destination' => 'Kawasan Sanur, Denpasar Selatan',
            'status_badge' => 'Sedang Dikerjakan',
            'status_title' => 'Tahap 4 dari 6: Pengerjaan Mahakarya oleh Sangging',
            'status_desc' => 'Empu lukis Kamasan sedang menggoreskan narasi wayang menggunakan pigmen batu alami tradisional.',
            'payment_badge' => 'DP Lunas / Menunggu Pelunasan',
            'payment_title' => 'DP 50% Terverifikasi • Menunggu Pelunasan (Balance Due)',
            'total_price' => 'Rp 28.500.000',
            'dp_amount' => 'Rp 14.250.000',
            'balance_amount' => 'Rp 14.250.000',
            'paid_date' => '30 Okt 2026',
            'active_step' => 4,
            'total_steps' => 6,
            'steps' => [],
        ];
        $isReadyStock = ($order['type'] ?? 'ready_stock') === 'ready_stock';
    @endphp

    {{-- 2. Konten Utama Detail Tracking --}}
    <main class="km-track-page">
        <div class="km-track-container">

            {{-- Hero & Bar Pencarian Ulang --}}
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
                                value="{{ $order['code'] }}"
                                placeholder="Masukkan kode pelacakan..."
                                aria-label="Kode Pelacakan Pesanan"
                                required
                            >
                            <a href="{{ route('tracking.index') }}" class="km-clear-btn" title="Kembali ke halaman pencarian">&times;</a>
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

            {{-- Baris Atas: Status Pengerjaan & Status Pembayaran --}}
            <div class="km-track-top-grid">
                <article class="km-track-card">
                    <div class="km-card-meta">
                        <span class="km-card-kicker">❖ STATUS PENGERJAAN &amp; STUDIO</span>
                        <span class="km-pill is-gold">{{ $order['status_badge'] }}</span>
                    </div>
                    <h2 class="km-card-heading">{{ $order['status_title'] }}</h2>
                    <p class="km-card-body-text">{{ $order['status_desc'] }}</p>
                </article>

                <article class="km-track-card">
                    <div class="km-card-meta">
                        <span class="km-card-kicker">
                            ◫ {{ $isReadyStock ? 'STATUS PEMBAYARAN READY STOCK' : 'STATUS PEMBAYARAN BERTAHAP PO' }}
                        </span>
                        <span class="km-pill {{ $isReadyStock ? 'is-green' : 'is-gold' }}">
                            {{ $order['payment_badge'] }}
                        </span>
                    </div>

                    <h2 class="km-card-heading">{{ $order['payment_title'] }}</h2>

                    @if($isReadyStock)
                        {{-- Ready Stock: Langsung 100% Lunas (Skip DP 50%) --}}
                        <div class="km-ledger">
                            <div class="km-ledger-row">
                                <span>Harga Karya ({{ $order['quantity'] }} unit)</span>
                                <strong>{{ $order['total_price'] }}</strong>
                            </div>
                            <div class="km-ledger-row">
                                <span>Skema Pembayaran</span>
                                <strong>Langsung 100% Lunas (Tanpa DP 50%)</strong>
                            </div>
                            <div class="km-ledger-row is-total">
                                <span>✓ Total Terbayar ({{ $order['paid_date'] }})</span>
                                <strong class="km-gold-text">{{ $order['total_price'] }}</strong>
                            </div>
                        </div>
                        <p class="km-ledger-note">
                            ◈ Karya Ready Stock menggunakan pembayaran penuh 100% tanpa tahapan DP 50% sebelum penyerahan dilakukan.
                        </p>
                    @else
                        {{-- Pre-Order: DP 50% + Pelunasan 50% --}}
                        <div class="km-ledger">
                            <div class="km-ledger-row">
                                <span>Nilai Kontrak Disepakati (100%)</span>
                                <strong>{{ $order['total_price'] }}</strong>
                            </div>
                            <div class="km-ledger-row">
                                <span>✓ DP 50% Terbayar ({{ $order['paid_date'] }})</span>
                                <strong>{{ $order['dp_amount'] }}</strong>
                            </div>
                            <div class="km-ledger-row is-total">
                                <span>Sisa Pelunasan 50% (Balance Due)</span>
                                <strong class="km-gold-text">{{ $order['balance_amount'] }}</strong>
                            </div>
                        </div>
                        <p class="km-ledger-note">
                            ◈ Sesuai kebijakan studio (PRD 10.6), DP 50% bersifat non-refundable (hangus) sejak pembayaran DP dikonfirmasi.
                        </p>
                    @endif
                </article>
            </div>

            {{-- Baris Utama: Identitas Arsip (Kiri) & Kronologi Timeline (Kanan) --}}
            <div class="km-track-main-grid">
                <aside class="km-track-card">
                    <div class="km-archive-top">
                        <div>
                            <span class="km-card-kicker">IDENTITAS ARSIP PESANAN</span>
                            <h2 class="km-archive-code">{{ $order['code'] }}</h2>
                        </div>
                        <span class="km-pill is-outline">
                            {{ $isReadyStock ? '❖ Ready Stock' : '❖ Pre-Order' }}
                        </span>
                    </div>

                    {{-- Gambar Karya Sesuai Produk yang Dipesan --}}
                    <div class="km-artwork-box">
                        <img src="{{ asset($order['image']) }}" alt="{{ $order['product_name'] }}">
                        <div class="km-artwork-caption">
                            <span>{{ $order['product_category'] }}</span>
                            <h3>{{ $order['product_name'] }}</h3>
                            <p>{{ $order['dimensions'] }}</p>
                        </div>
                    </div>

                    <dl class="km-spec-list">
                        <div class="km-spec-item">
                            <dt>Pemesan</dt>
                            <dd>{{ $order['masked_buyer'] }}</dd>
                        </div>
                        <div class="km-spec-item">
                            <dt>Jenis Pemesanan</dt>
                            <dd>{{ $order['type_label'] }}</dd>
                        </div>
                        <div class="km-spec-item">
                            <dt>Tanggal Pengajuan</dt>
                            <dd>{{ $order['created_at'] }}</dd>
                        </div>
                        <div class="km-spec-item">
                            <dt>Estimasi Pengerjaan</dt>
                            <dd>{{ $order['estimate'] }}</dd>
                        </div>
                        <div class="km-spec-item">
                            <dt>Metode Penyerahan</dt>
                            <dd>{{ $order['delivery_method'] }}</dd>
                        </div>
                        <div class="km-spec-item">
                            <dt>Destinasi Layanan</dt>
                            <dd>{{ $order['destination'] }}</dd>
                        </div>
                    </dl>

                    <div class="km-privacy-note">
                        <span aria-hidden="true">🛡</span>
                        <p>
                            Sesuai standar keamanan privasi (FR-UAS-24), nomor kontak personal, alamat hunian privat, dan bukti transfer terenkripsi aman.
                        </p>
                    </div>

                    <div class="km-help-box">
                        <div>
                            <strong>Ada Penyesuaian Jadwal?</strong>
                            <p>Hubungi kurator logistik Kamasan Art melalui halaman Kontak studio.</p>
                        </div>
                        <a href="{{ Route::has('contact') ? route('contact') : url('/kontak') }}" class="km-help-btn">
                            ✉ BANTUAN
                        </a>
                    </div>
                </aside>

                {{-- Kolom Kanan: Kronologi Tahapan --}}
                <div class="km-track-card km-timeline-panel">
                    <div class="km-timeline-head">
                        <div>
                            <span class="km-card-kicker">
                                {{ $isReadyStock ? 'KRONOLOGI OTENTIK READY STOCK' : 'KRONOLOGI OTENTIK PRE-ORDER' }}
                            </span>
                            <h2 class="km-timeline-title">
                                {{ $isReadyStock ? 'Tahapan Verifikasi & Penyerahan Karya' : 'Tahapan Pengerjaan & Penyerahan Mahakarya' }}
                            </h2>
                        </div>
                        <span class="km-pill is-gold">
                            • Langkah {{ $order['active_step'] }} dari {{ $order['total_steps'] }} Berjalan
                        </span>
                    </div>

                    <div class="km-timeline-steps">
                        @foreach($order['steps'] as $step)
                            <div class="km-step is-{{ $step['state'] }}">
                                <div class="km-step-rail">
                                    <div class="km-step-dot">
                                        @if($step['state'] === 'completed')
                                            ✓
                                        @elseif($step['state'] === 'active')
                                            ✦
                                        @else
                                            ◫
                                        @endif
                                    </div>
                                    @if(!$loop->last)
                                        <div class="km-step-line"></div>
                                    @endif
                                </div>

                                <div class="km-step-body">
                                    <div class="km-step-header">
                                        <h3>
                                            {{ $step['num'] }}. {{ $step['title'] }}
                                            @if($step['state'] === 'active')
                                                <span class="km-active-tag">SEDANG AKTIF</span>
                                            @endif
                                        </h3>
                                        <span class="km-step-time">{{ $step['time'] }}</span>
                                    </div>

                                    <p>{{ $step['desc'] }}</p>

                                    @if(!empty($step['note']))
                                        <div class="km-step-note">◈ {{ $step['note'] }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Banner Garansi Keaslian & Cetak Bukti --}}
            <footer class="km-guarantee-banner">
                <div class="km-guarantee-left">
                    <span class="km-seal" aria-hidden="true">🏵</span>
                    <div>
                        <strong>Garansi Keaslian Kamasan Klungkung 100%</strong>
                        <p>Tiap karya digarap dengan pakem seni lukis klasik Kamasan Klungkung disertai sertifikat keaslian resmi studio.</p>
                    </div>
                </div>
                <button type="button" onclick="window.print()" class="km-print-btn">
                    🖨 Cetak Bukti Lacak
                </button>
            </footer>

        </div>
    </main>

    {{-- 3. Footer --}}
    @include('layouts.footer')

</body>
</html>