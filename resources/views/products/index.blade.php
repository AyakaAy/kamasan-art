@php
    $products = $products ?? [
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
            'image' => 'assets/images/products/vas-bunga.jpg',
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Koleksi — KAMASAN ART</title>

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

        .kamasan-meta-top {
            color: var(--kamasan-outline);
            font-size: 0.75rem;
            letter-spacing: 0.04em;
        }

        .kamasan-eyebrow {
            color: var(--kamasan-gold-deep);
            font-size: 0.75rem;
            letter-spacing: 0.2em;
            font-weight: 600;
        }

        .kamasan-filter-panel {
            background-color: var(--kamasan-surface-1);
            border: 1px solid var(--kamasan-border);
            border-radius: 0.75rem;
        }

        .kamasan-filter-label {
            color: var(--kamasan-outline);
            font-size: 0.7rem;
            letter-spacing: 0.14em;
            font-weight: 600;
        }

        .kamasan-filter-btn {
            background-color: var(--kamasan-surface-2);
            color: var(--kamasan-text-muted);
            border: 1px solid var(--kamasan-border);
            font-size: 0.78rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .kamasan-filter-btn:hover {
            color: var(--kamasan-text);
            border-color: var(--kamasan-gold-deep);
        }

        .kamasan-filter-btn.is-active {
            background-color: var(--kamasan-gold-deep);
            color: var(--kamasan-bg);
            border-color: var(--kamasan-gold);
        }

        .kamasan-card {
            background-color: var(--kamasan-surface-2);
            border: 1px solid var(--kamasan-border) !important;
            border-radius: 0.75rem;
            transition: transform 0.2s ease, border-color 0.2s ease;
            contain: content;
        }

        .kamasan-card:hover {
            transform: translateY(-3px);
            border-color: var(--kamasan-gold-deep) !important;
        }

        .kamasan-card--sold {
            opacity: 0.85;
        }

        .kamasan-card-media {
            aspect-ratio: 4 / 5;
            background-color: var(--kamasan-surface-3);
        }

        .kamasan-card-img {
            transition: transform 0.35s ease;
        }

        .kamasan-card:hover .kamasan-card-img {
            transform: scale(1.03);
        }

        .kamasan-card--sold .kamasan-card-img {
            filter: grayscale(35%);
        }

        .kamasan-card-title {
            color: var(--kamasan-text);
        }

        .kamasan-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .kamasan-divider {
            border-color: var(--kamasan-border) !important;
        }

        .kamasan-price-caption {
            color: var(--kamasan-outline);
            font-size: 0.68rem;
            letter-spacing: 0.1em;
            font-weight: 600;
        }

        .kamasan-badge {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.42rem 0.75rem;
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

        .kamasan-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            display: inline-block;
            background-color: currentColor;
        }

        .kamasan-cat-chip {
            background-color: rgba(22, 19, 17, 0.88);
            color: var(--kamasan-text-muted);
            border: 1px solid var(--kamasan-border);
            font-size: 0.68rem;
            letter-spacing: 0.08em;
            padding: 0.35rem 0.65rem;
            border-radius: 0.375rem;
        }

        .kamasan-btn-primary {
            background-color: var(--kamasan-gold-deep);
            color: var(--kamasan-bg);
            border: 1px solid var(--kamasan-gold);
            font-size: 0.78rem;
            letter-spacing: 0.06em;
            border-radius: 0.5rem;
        }

        .kamasan-btn-primary:hover {
            background-color: var(--kamasan-gold);
            color: var(--kamasan-bg);
            border-color: var(--kamasan-gold);
        }

        .kamasan-btn-disabled {
            background-color: var(--kamasan-surface-3);
            color: var(--kamasan-outline);
            border: 1px solid var(--kamasan-border);
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            border-radius: 0.5rem;
        }

        .kamasan-note-box {
            background-color: var(--kamasan-surface-1);
            border: 1px solid var(--kamasan-border);
            border-radius: 0.75rem;
        }
    </style>
</head>
<body class="kamasan-body">
    <main class="container py-5" style="max-width: 1280px;">
        {{-- Header Katalog --}}
        <header class="text-center mx-auto mb-5" style="max-width: 720px;">
            <div class="kamasan-eyebrow text-uppercase mb-2">
                &mdash; Kurasi Karya Wayang Kamasan &mdash;
            </div>
            <h1 class="kamasan-serif display-5 fw-semibold mb-3">
                Katalog Koleksi Wayang Kamasan
            </h1>
            <p class="kamasan-muted-text fs-6 mb-0">
                Jelajahi beragam karya untuk pajangan dinding, dekorasi plafon tradisional, perlengkapan upacara, hingga busana adat.
            </p>
        </header>

        {{-- Filter Kategori & Ketersediaan (Bootstrap) --}}
        <section class="kamasan-filter-panel p-4 mb-4" aria-label="Filter Katalog Produk">
            <div class="row g-4 align-items-lg-center justify-content-between">
                <div class="col-12 col-lg-auto">
                    <div class="kamasan-filter-label text-uppercase mb-2">Klasifikasi Karya</div>
                    <div class="d-flex flex-wrap gap-2" id="categoryFilterGroup">
                        <button type="button" class="btn kamasan-filter-btn is-active rounded-pill px-3 py-2" data-category="all">
                            Semua Kategori
                        </button>
                        <button type="button" class="btn kamasan-filter-btn rounded-pill px-3 py-2" data-category="pajangan">
                            Pajangan Dinding
                        </button>
                        <button type="button" class="btn kamasan-filter-btn rounded-pill px-3 py-2" data-category="upacara">
                            Perlengkapan Upacara
                        </button>
                        <button type="button" class="btn kamasan-filter-btn rounded-pill px-3 py-2" data-category="kriya">
                            Kriya &amp; Souvenir
                        </button>
                    </div>
                </div>

                <div class="col-12 col-lg-auto">
                    <div class="kamasan-filter-label text-uppercase mb-2">Ketersediaan</div>
                    <div class="d-flex flex-wrap gap-2" id="availabilityFilterGroup">
                        <button type="button" class="btn kamasan-filter-btn is-active rounded-pill px-3 py-2" data-availability="all">
                            Semua Jenis
                        </button>
                        <button type="button" class="btn kamasan-filter-btn rounded-pill px-3 py-2" data-availability="ready">
                            Ready Stock
                        </button>
                        <button type="button" class="btn kamasan-filter-btn rounded-pill px-3 py-2" data-availability="po">
                            Pre-Order (PO)
                        </button>
                    </div>
                </div>
            </div>
        </section>

        {{-- Ringkasan Jumlah Produk --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 small kamasan-muted-text">
            <div>
                Menampilkan <strong class="kamasan-gold-accent" id="visibleProductCount">{{ count($products) }}</strong> koleksi karya
            </div>
            <div class="kamasan-filter-label text-uppercase">Kamasan Art</div>
        </div>

        {{-- Grid Kartu Produk --}}
        <div class="row g-4" id="productCatalogGrid">
            @foreach ($products as $product)
                @include('components.product-card', ['product' => $product])
            @endforeach
        </div>

        {{-- Empty State Saat Filter Tidak Cocok --}}
        <div class="kamasan-filter-panel text-center py-5 px-4 my-4 d-none" id="catalogEmptyState">
            <h2 class="h5 kamasan-serif mb-2">Koleksi Tidak Ditemukan</h2>
            <p class="kamasan-muted-text small mx-auto mb-4" style="max-width: 420px;">
                Belum ada karya yang sesuai dengan kombinasi filter yang dipilih. Silakan reset filter untuk melihat seluruh koleksi.
            </p>
            <button type="button" class="btn kamasan-btn-primary px-4 py-2 fw-semibold" id="resetCatalogFilters">
                Tampilkan Semua Koleksi
            </button>
        </div>

        {{-- Catatan Keaslian / Informasi Studio --}}
        <section class="kamasan-note-box p-4 mt-5 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <h2 class="h6 kamasan-serif kamasan-gold-accent mb-1">Informasi Keaslian &amp; Pemesanan Studio</h2>
                <p class="small kamasan-muted-text mb-0">
                    Detail ukuran, ketersediaan, serta konsultasi pemesanan dapat dilihat pada masing-masing halaman detail karya.
                </p>
            </div>
        </section>
    </main>

    {{-- Bootstrap 5 JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (function () {
            const categoryButtons = document.querySelectorAll('#categoryFilterGroup [data-category]');
            const availabilityButtons = document.querySelectorAll('#availabilityFilterGroup [data-availability]');
            const productItems = document.querySelectorAll('#productCatalogGrid .catalog-product-item');
            const visibleCountEl = document.getElementById('visibleProductCount');
            const emptyStateEl = document.getElementById('catalogEmptyState');
            const gridEl = document.getElementById('productCatalogGrid');
            const resetBtn = document.getElementById('resetCatalogFilters');

            let selectedCategory = 'all';
            let selectedAvailability = 'all';

            function setActiveButton(buttons, attrName, activeValue) {
                buttons.forEach((btn) => {
                    const isMatch = btn.getAttribute(attrName) === activeValue;
                    btn.classList.toggle('is-active', isMatch);
                });
            }

            function applyFilters() {
                let visibleCount = 0;

                productItems.forEach((item) => {
                    const itemCategory = item.getAttribute('data-category');
                    const itemAvailability = item.getAttribute('data-availability');

                    const matchesCategory = selectedCategory === 'all' || itemCategory === selectedCategory;
                    const matchesAvailability = selectedAvailability === 'all' || itemAvailability === selectedAvailability;

                    if (matchesCategory && matchesAvailability) {
                        item.classList.remove('d-none');
                        visibleCount++;
                    } else {
                        item.classList.add('d-none');
                    }
                });

                if (visibleCountEl) {
                    visibleCountEl.textContent = String(visibleCount);
                }

                if (visibleCount === 0) {
                    gridEl.classList.add('d-none');
                    emptyStateEl.classList.remove('d-none');
                } else {
                    gridEl.classList.remove('d-none');
                    emptyStateEl.classList.add('d-none');
                }
            }

            categoryButtons.forEach((btn) => {
                btn.addEventListener('click', () => {
                    selectedCategory = btn.getAttribute('data-category');
                    setActiveButton(categoryButtons, 'data-category', selectedCategory);
                    applyFilters();
                });
            });

            availabilityButtons.forEach((btn) => {
                btn.addEventListener('click', () => {
                    selectedAvailability = btn.getAttribute('data-availability');
                    setActiveButton(availabilityButtons, 'data-availability', selectedAvailability);
                    applyFilters();
                });
            });

            if (resetBtn) {
                resetBtn.addEventListener('click', () => {
                    selectedCategory = 'all';
                    selectedAvailability = 'all';
                    setActiveButton(categoryButtons, 'data-category', 'all');
                    setActiveButton(availabilityButtons, 'data-availability', 'all');
                    applyFilters();
                });
            }
        })();
    </script>
</body>
</html>