@php
    $allProducts = $products ?? [
        [
            'id' => 1,
            'slug' => 'lukisan-wayang-bima-swarga',
            'name' => 'Lukisan Wayang Bima Swarga',
            'category' => 'Pajangan Dinding',
            'category_slug' => 'pajangan',
            'availability' => 'ready',
            'availability_label' => 'Ready: 2 unit',
            'meta_left' => 'Dimensi: 120 × 80 cm',
            'meta_right' => 'Prada Emas',
            'price_note' => 'Investasi Karya',
            'price_label' => 'Rp 12.000.000',
            'excerpt' => 'Kisah perjalanan Bima ke alam baka dalam tradisi lukis klasik Kamasan dengan pewarna alami.',
            'description' => 'Karya lukis klasik Wayang Kamasan yang mengangkat narasi Bima Swarga dengan komposisi tokoh, ornamen khas Klungkung, serta sentuhan aksen emas. Cocok sebagai koleksi ruang tamu, galeri pribadi, maupun ruang kuratorial.',
            'medium' => 'Kain kanvas/tradisional pilihan, pigmen alami & aksen prada',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/bima-swarga.jpg',
        ],
        [
            'id' => 2,
            'slug' => 'lukisan-wayang-boma-embas',
            'name' => 'Lukisan Wayang Boma Embas',
            'category' => 'Pajangan Dinding',
            'category_slug' => 'pajangan',
            'availability' => 'ready',
            'availability_label' => 'Ready: 1 unit',
            'meta_left' => 'Dimensi: 90 × 60 cm',
            'meta_right' => 'Klasik Klungkung',
            'price_note' => 'Investasi Karya',
            'price_label' => 'Rp 7.500.000',
            'excerpt' => 'Penggambaran adegan epik Boma Embas dengan detail garis halus khas sanggar Kamasan.',
            'description' => 'Menampilkan adegan klasik Boma Embas dengan tata letak karakter berlapis dan detail arsir halus. Memberikan karakter visual yang kuat untuk interior bergaya tradisional maupun modern kontemporer.',
            'medium' => 'Kain pilihan, pewarna tradisional & sentuhan prada',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/boma-embas.jpg',
        ],
        [
            'id' => 3,
            'slug' => 'lukisan-garuda-wisnu-kencana',
            'name' => 'Lukisan Wayang Garuda Wisnu Kencana',
            'category' => 'Pajangan Dinding',
            'category_slug' => 'pajangan',
            'availability' => 'ready',
            'availability_label' => 'Ready: 1 unit',
            'meta_left' => 'Dimensi: 120 × 90 cm',
            'meta_right' => 'Prada Emas 24K',
            'price_note' => 'Investasi Karya',
            'price_label' => 'Rp 13.500.000',
            'excerpt' => 'Penggambaran Dewa Wisnu mengendarai Garuda dalam sapuan pewarna tradisional dan aksen prada.',
            'description' => 'Karya bernuansa megah yang menggambarkan Dewa Wisnu bersama Garuda dengan detail figur dan motif pengiring khas tradisi Kamasan.',
            'medium' => 'Kain pilihan, pigmen alami & aksen emas',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/garuda-wisnu-kencana.jpg',
        ],
        [
            'id' => 4,
            'slug' => 'ider-ider-wayang-kamasan',
            'name' => 'Ider-Ider Pura Wayang Kamasan',
            'category' => 'Perlengkapan Upacara',
            'category_slug' => 'upacara',
            'availability' => 'ready',
            'availability_label' => 'Ready: 3 unit',
            'meta_left' => 'Dimensi: 300 × 35 cm',
            'meta_right' => 'Pelinggih & Pura',
            'price_note' => 'Investasi Karya',
            'price_label' => 'Rp 4.500.000',
            'excerpt' => 'Kain hias memanjang untuk kelengkapan upacara dan pelinggih dengan motif wayang klasik.',
            'description' => 'Ider-ider berukuran memanjang dengan rangkaian motif naratif tradisional untuk kebutuhan pelengkap upacara, bale, atau ruang adat.',
            'medium' => 'Kain upacara pilihan & pewarna tradisional',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/ider-ider.jpg',
        ],
        [
            'id' => 5,
            'slug' => 'lukisan-mandara-giri',
            'name' => 'Lukisan Pemutaran Gunung Mandara Giri',
            'category' => 'Pajangan Dinding',
            'category_slug' => 'pajangan',
            'availability' => 'po',
            'availability_label' => 'Pre-Order (PO)',
            'meta_left' => 'Dimensi: 150 × 100 cm',
            'meta_right' => 'Mahakarya Naratif',
            'price_note' => 'Estimasi Pemesanan Khusus',
            'price_label' => 'Mulai dari Rp 15.000.000',
            'excerpt' => 'Adegan kosmologi Adiparwa tentang pemutaran Gunung Mandara Giri untuk mencari Tirta Amerta.',
            'description' => 'Karya naratif berskala besar yang mengangkat kisah pemutaran Gunung Mandara Giri. Tersedia melalui sistem pre-order dengan konsultasi ukuran dan waktu pengerjaan bersama studio.',
            'medium' => 'Kain pilihan & pigmen tradisional',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/mandara-giri.jpg',
        ],
        [
            'id' => 6,
            'slug' => 'lukisan-rahwana-nyulik-sita',
            'name' => 'Lukisan Epos Ramayana: Rahwana Nyulik Sita',
            'category' => 'Pajangan Dinding',
            'category_slug' => 'pajangan',
            'availability' => 'ready',
            'availability_label' => 'Ready: 1 unit',
            'meta_left' => 'Dimensi: 110 × 75 cm',
            'meta_right' => 'Epos Ramayana',
            'price_note' => 'Investasi Karya',
            'price_label' => 'Rp 10.500.000',
            'excerpt' => 'Kisah dramatis epos Ramayana dalam gaya naratif Wayang Kamasan dengan pewarna batu alami.',
            'description' => 'Menggambarkan salah satu adegan ikonik dalam epos Ramayana dengan ketegasan garis dan komposisi cerita berurutan khas Kamasan.',
            'medium' => 'Kain pilihan & pigmen tradisional',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/rahwana-nyulik-sita.jpg',
        ],
        [
            'id' => 7,
            'slug' => 'lukisan-wayang-siwa-murti',
            'name' => 'Lukisan Wayang Siwa Murti',
            'category' => 'Pajangan Dinding',
            'category_slug' => 'pajangan',
            'availability' => 'ready',
            'availability_label' => 'Ready: 1 unit',
            'meta_left' => 'Dimensi: 100 × 70 cm',
            'meta_right' => 'Prada Emas',
            'price_note' => 'Investasi Karya',
            'price_label' => 'Rp 9.800.000',
            'excerpt' => 'Perwujudan agung Dewa Siwa dalam gaya lukis klasik Kamasan dengan komposisi simetris.',
            'description' => 'Menampilkan perwujudan Siwa Murti dengan detail atribut dan ornamen tradisional yang dikerjakan dengan ketelitian tinggi.',
            'medium' => 'Kain pilihan, pigmen alami & aksen prada',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/siwa-murti.jpg',
        ],
        [
            'id' => 8,
            'slug' => 'lukisan-wayang-siwa-sradha',
            'name' => 'Lukisan Wayang Siwa Sradha',
            'category' => 'Pajangan Dinding',
            'category_slug' => 'pajangan',
            'availability' => 'po',
            'availability_label' => 'Pre-Order (PO)',
            'meta_left' => 'Dimensi: 110 × 75 cm',
            'meta_right' => 'Pigmen Alami',
            'price_note' => 'Estimasi Pemesanan Khusus',
            'price_label' => 'Mulai dari Rp 8.500.000',
            'excerpt' => 'Karya bertema bhakti dan ajaran Siwa Sradha dengan goresan halus khas pengrajin Kamasan.',
            'description' => 'Karya dengan nuansa filosofis yang dapat dipesan sesuai kebutuhan ruang dan jadwal pengerjaan studio.',
            'medium' => 'Kain pilihan & pigmen tradisional',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/siwa-sradha.jpg',
        ],
        [
            'id' => 9,
            'slug' => 'lukisan-wayang-sutasoma',
            'name' => 'Lukisan Kakawin Sutasoma',
            'category' => 'Pajangan Dinding',
            'category_slug' => 'pajangan',
            'availability' => 'ready',
            'availability_label' => 'Ready: 2 unit',
            'meta_left' => 'Dimensi: 120 × 80 cm',
            'meta_right' => 'Cerita Klasik',
            'price_note' => 'Investasi Karya',
            'price_label' => 'Rp 11.000.000',
            'excerpt' => 'Ilustrasi epos Sutasoma yang sarat nilai dharma dan kebijaksanaan Nusantara.',
            'description' => 'Mengangkat kisah klasik Sutasoma dengan tata alur cerita yang rapi dan warna tanah yang hangat.',
            'medium' => 'Kain pilihan, pigmen alami & aksen prada',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/sutasoma.jpg',
        ],
        [
            'id' => 10,
            'slug' => 'tempat-alat-tulis-lukis-kamasan',
            'name' => 'Tempat Alat Tulis Motif Wayang Kamasan',
            'category' => 'Kriya & Souvenir',
            'category_slug' => 'kriya',
            'availability' => 'ready',
            'availability_label' => 'Ready: 6 unit',
            'meta_left' => 'Kriya Meja & Hadiah',
            'meta_right' => 'Lukis Tangan',
            'price_note' => 'Investasi Karya',
            'price_label' => 'Rp 350.000',
            'excerpt' => 'Wadah alat tulis fungsional dengan sentuhan lukisan motif tradisional khas Desa Kamasan.',
            'description' => 'Kriya fungsional untuk meja kerja atau koleksi cendera mata yang memadukan utilitas harian dengan motif klasik Wayang Kamasan.',
            'medium' => 'Material kriya pilihan & motif lukis tangan',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/tempat-alat-tulis.jpg',
        ],
        [
            'id' => 11,
            'slug' => 'vas-bunga-lukis-kamasan',
            'name' => 'Vas Bunga Dekoratif Lukis Kamasan',
            'category' => 'Kriya & Souvenir',
            'category_slug' => 'kriya',
            'availability' => 'ready',
            'availability_label' => 'Ready: 4 unit',
            'meta_left' => 'Tinggi: 35 cm',
            'meta_right' => 'Dekorasi Interior',
            'price_note' => 'Investasi Karya',
            'price_label' => 'Rp 650.000',
            'excerpt' => 'Vas bunga hias berbalut motif wayang dan ornamen tradisional Kamasan untuk interior ruangan.',
            'description' => 'Elemen dekorasi meja atau sudut ruangan yang menghadirkan sentuhan motif Kamasan dalam format kriya yang ringkas.',
            'medium' => 'Material kriya pilihan & motif lukis tangan',
            'origin' => 'Sanggar Seni Kamasan, Klungkung, Bali',
            'image' => 'assets/images/products/vas-bunga.jpg',
        ],
    ];

    if (!isset($product)) {
        $requestedSlug = request()->route('slug') ?? request()->query('slug');
        $product = collect($allProducts)->firstWhere('slug', $requestedSlug) ?? $allProducts[0];
    }

    $relatedProducts = $relatedProducts ?? collect($allProducts)
        ->reject(fn ($item) => ($item['slug'] ?? '') === ($product['slug'] ?? ''))
        ->take(3)
        ->all();

    $availability = $product['availability'] ?? 'ready';
    $catalogUrl = \Illuminate\Support\Facades\Route::has('products.index')
        ? route('products.index')
        : url('/products');

    $waNumber = '6281238904411';
    $waText = urlencode('Halo KAMASAN ART, saya ingin menanyakan detail & pemesanan karya: ' . ($product['name'] ?? 'Karya Kamasan Art'));
    $waUrl = "https://wa.me/{$waNumber}?text={$waText}";
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['name'] ?? 'Detail Karya' }} — KAMASAN ART</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Fonts: Playfair Display & Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --kamasan-bg: #161311;
            --kamasan-surface-1: #1e1b19;
            --kamasan-surface-2: #221f1d;
            --kamasan-surface-3: #2e2926;
            --kamasan-border: #4a3b2c;
            --kamasan-gold: #e9c176;
            --kamasan-gold-deep: #c5a059;
            --kamasan-gold-secondary: #e4c277;
            --kamasan-text: #e9e1dd;
            --kamasan-text-muted: #cbbbba;
            --kamasan-outline: #9a8f80;
        }

        body.kamasan-body {
            background-color: var(--kamasan-bg);
            color: var(--kamasan-text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
        }

        .kamasan-serif {
            font-family: 'Playfair Display', serif;
        }

        .kamasan-gold-accent {
            color: var(--kamasan-gold);
        }

        .kamasan-secondary-gold {
            color: var(--kamasan-gold-secondary);
        }

        .kamasan-muted-text {
            color: var(--kamasan-text-muted);
        }

        .kamasan-outline-text {
            color: var(--kamasan-outline);
        }

        .kamasan-eyebrow {
            color: var(--kamasan-gold-deep);
            font-size: 0.75rem;
            letter-spacing: 0.18em;
            font-weight: 600;
        }

        .kamasan-back-link {
            color: var(--kamasan-text-muted);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s ease;
        }

        .kamasan-back-link:hover {
            color: var(--kamasan-gold);
        }

        .kamasan-detail-media {
            background-color: var(--kamasan-surface-2);
            border: 1px solid var(--kamasan-border);
            border-radius: 0.75rem;
            aspect-ratio: 4 / 5;
            overflow: hidden;
        }

        .kamasan-detail-panel {
            background-color: var(--kamasan-surface-1);
            border: 1px solid var(--kamasan-border);
            border-radius: 0.75rem;
        }

        .kamasan-spec-box {
            background-color: var(--kamasan-surface-2);
            border: 1px solid var(--kamasan-border);
            border-radius: 0.5rem;
        }

        .kamasan-divider {
            border-color: var(--kamasan-border) !important;
        }

        .kamasan-badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.45rem 0.85rem;
            border: 1px solid transparent;
        }

        .kamasan-badge--ready {
            background-color: rgba(22, 40, 29, 0.92);
            color: #d5e8d9;
            border-color: #2a4a33;
        }

        .kamasan-badge--po {
            background-color: rgba(46, 31, 17, 0.92);
            color: #f0d19f;
            border-color: #5e3d1e;
        }

        .kamasan-badge--sold {
            background-color: rgba(147, 0, 10, 0.9);
            color: #ffdad6;
            border-color: #ffb4ab;
        }

        .kamasan-btn-primary {
            background-color: var(--kamasan-gold-deep);
            color: var(--kamasan-bg);
            border: 1px solid var(--kamasan-gold);
            font-size: 0.82rem;
            letter-spacing: 0.06em;
            border-radius: 0.5rem;
        }

        .kamasan-btn-primary:hover {
            background-color: var(--kamasan-gold);
            color: var(--kamasan-bg);
            border-color: var(--kamasan-gold);
        }

        .kamasan-btn-secondary {
            background-color: transparent;
            color: var(--kamasan-text);
            border: 1px solid var(--kamasan-border);
            font-size: 0.82rem;
            letter-spacing: 0.05em;
            border-radius: 0.5rem;
        }

        .kamasan-btn-secondary:hover {
            color: var(--kamasan-gold);
            border-color: var(--kamasan-gold-deep);
        }
    </style>
</head>
<body class="kamasan-body">
    <main class="container py-5" style="max-width: 1280px;">
        {{-- Navigasi Kembali ke Katalog --}}
        <div class="mb-4">
            <a href="{{ $catalogUrl }}" class="kamasan-back-link d-inline-flex align-items-center gap-2">
                <span aria-hidden="true">&larr;</span>
                <span>Kembali ke Katalog Koleksi</span>
            </a>
        </div>

        {{-- Konten Utama Detail Produk --}}
        <div class="row g-4 g-lg-5 align-items-start">
            {{-- Kolom Kiri: Foto Karya --}}
            <div class="col-12 col-lg-6">
                <div class="kamasan-detail-media">
                    <img src="{{ asset($product['image'] ?? 'assets/images/products/bima-swarga.jpg') }}"
                         alt="{{ $product['name'] ?? 'Karya Kamasan Art' }}"
                         class="w-100 h-100 object-fit-cover">
                </div>
            </div>

            {{-- Kolom Kanan: Informasi & Pemesanan --}}
            <div class="col-12 col-lg-6">
                <div class="kamasan-detail-panel p-4 p-md-5">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                        <span class="kamasan-eyebrow text-uppercase">
                            {{ $product['category'] ?? 'Koleksi Kamasan Art' }}
                        </span>

                        <span class="badge rounded-pill kamasan-badge kamasan-badge--{{ $availability }}">
                            {{ $product['availability_label'] ?? ($availability === 'po' ? 'Pre-Order (PO)' : ($availability === 'sold' ? 'Stok Habis' : 'Ready Stock')) }}
                        </span>
                    </div>

                    <h1 class="kamasan-serif display-6 fw-semibold mb-3">
                        {{ $product['name'] ?? 'Judul Karya' }}
                    </h1>

                    <p class="kamasan-muted-text mb-4">
                        {{ $product['description'] ?? ($product['excerpt'] ?? '') }}
                    </p>

                    {{-- Harga --}}
                    <div class="py-3 border-top border-bottom kamasan-divider mb-4">
                        <div class="small kamasan-outline-text text-uppercase mb-1" style="font-size: 0.7rem; letter-spacing: 0.1em;">
                            {{ $product['price_note'] ?? ($availability === 'po' ? 'Estimasi Pemesanan Khusus' : 'Investasi Karya') }}
                        </div>
                        <div class="kamasan-serif fs-3 fw-medium {{ $availability === 'sold' ? 'text-decoration-line-through kamasan-outline-text' : ($availability === 'po' ? 'kamasan-secondary-gold' : 'kamasan-gold-accent') }}">
                            {{ $product['price_label'] ?? 'Hubungi Studio' }}
                        </div>
                    </div>

                    {{-- Spesifikasi Ringkas --}}
                    <div class="row g-3 mb-4">
                        <div class="col-12 col-sm-6">
                            <div class="kamasan-spec-box p-3 h-100">
                                <div class="small kamasan-outline-text mb-1">Dimensi / Format</div>
                                <div class="small fw-semibold">{{ $product['meta_left'] ?? 'Sesuai Spesifikasi Karya' }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="kamasan-spec-box p-3 h-100">
                                <div class="small kamasan-outline-text mb-1">Ciri / Pengerjaan</div>
                                <div class="small fw-semibold kamasan-gold-accent">{{ $product['meta_right'] ?? 'Wayang Kamasan' }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="kamasan-spec-box p-3 h-100">
                                <div class="small kamasan-outline-text mb-1">Media &amp; Material</div>
                                <div class="small">{{ $product['medium'] ?? 'Karya tradisional khas sanggar' }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="kamasan-spec-box p-3 h-100">
                                <div class="small kamasan-outline-text mb-1">Asal Karya</div>
                                <div class="small">{{ $product['origin'] ?? 'Kamasan, Klungkung, Bali' }}</div>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Pemesanan via WhatsApp --}}
                    <div class="d-grid gap-2">
                        <a href="{{ $waUrl }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn kamasan-btn-primary py-3 fw-semibold text-uppercase">
                            {{ $availability === 'po' ? 'Konsultasi Pre-Order via WhatsApp' : ($availability === 'sold' ? 'Tanyakan Ketersediaan Serupa via WhatsApp' : 'Pesan / Tanya Karya via WhatsApp') }}
                        </a>
                        <a href="{{ $catalogUrl }}" class="btn kamasan-btn-secondary py-2">
                            Jelajahi Karya Lainnya
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Karya Terkait --}}
        @if (!empty($relatedProducts))
            <section class="mt-5 pt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h4 kamasan-serif mb-0">Koleksi Terkait</h2>
                    <a href="{{ $catalogUrl }}" class="kamasan-back-link">Lihat semua &rarr;</a>
                </div>

                <div class="row g-4">
                    @foreach ($relatedProducts as $related)
                        @include('components.product-card', ['product' => $related])
                    @endforeach
                </div>
            </section>
        @endif
    </main>

    {{-- Bootstrap 5 JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
