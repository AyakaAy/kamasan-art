@php
    $dataFile = base_path('resources/data/products.php');
    $loadedData = file_exists($dataFile) ? include $dataFile : [];$products = $products ?? ($loadedData['products'] ?? []);
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Koleksi — KAMASAN ART</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/products/kamasan-products.css'])
</head>
<body class="kamasan-body">
    <main class="container py-5" style="max-width: 1280px;">
        <header class="text-center mx-auto mb-5" style="max-width: 720px;">
            <div class="kamasan-eyebrow text-uppercase mb-2">
                &mdash; Kurasi Karya Wayang Kamasan &mdash;
            </div>
            <h1 class="kamasan-serif display-5 fw-semibold mb-3">
                Katalog Koleksi Wayang Kamasan
            </h1>
            <p class="kamasan-muted-text fs-6 mb-0">
                Jelajahi beragam karya lukis tradisional Bali untuk pajangan dinding, upacara adat, hingga kriya &amp; aksesoris.
            </p>
        </header>

        <section class="kamasan-filter-panel p-4 mb-4" aria-label="Filter Katalog Produk">
            <div class="row g-4 align-items-lg-center justify-content-between">
                <div class="col-12 col-lg-auto">
                    <div class="kamasan-filter-label text-uppercase mb-2">Klasifikasi Karya</div>
                    <div class="d-flex flex-wrap gap-2" id="categoryFilterGroup">
                        <button type="button" class="btn kamasan-filter-btn is-active rounded-pill px-3 py-2" data-category="all">
                            Semua Kategori
                        </button>
                        <button type="button" class="btn kamasan-filter-btn rounded-pill px-3 py-2" data-category="pajangan-dinding">
                            Pajangan Dinding
                        </button>
                        <button type="button" class="btn kamasan-filter-btn rounded-pill px-3 py-2" data-category="upacara-adat">
                            Upacara Adat
                        </button>
                        <button type="button" class="btn kamasan-filter-btn rounded-pill px-3 py-2" data-category="fashion-aksesoris">
                            Fashion &amp; Aksesoris
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
                            Pre-Order
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 small kamasan-muted-text">
            <div>
                Menampilkan <strong class="kamasan-gold-accent" id="visibleProductCount">{{ count($products) }}</strong> koleksi karya
            </div>
            <div class="kamasan-filter-label text-uppercase">Kamasan Art</div>
        </div>

        <div class="row g-4" id="productCatalogGrid">
            @foreach ($products as $product)
                @include('components.product-card', ['product' => $product])
            @endforeach
        </div>

        <div class="kamasan-filter-panel text-center py-5 px-4 my-4 d-none" id="catalogEmptyState">
            <h2 class="h5 kamasan-serif mb-2">Koleksi Tidak Ditemukan</h2>
            <p class="kamasan-muted-text small mx-auto mb-4" style="max-width: 420px;">
                Belum ada karya yang sesuai dengan kombinasi filter yang dipilih. Silakan reset filter untuk melihat seluruh koleksi.
            </p>
            <button type="button" class="btn kamasan-btn-primary px-4 py-2 fw-semibold" id="resetCatalogFilters">
                Tampilkan Semua Koleksi
            </button>
        </div>

        <section class="kamasan-note-box p-4 mt-5 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <h2 class="h6 kamasan-serif kamasan-gold-accent mb-1">Informasi Keaslian &amp; Pemesanan Studio</h2>
                <p class="small kamasan-muted-text mb-0">
                    Detail ukuran, bahan, ketersediaan, serta konsultasi pemesanan dapat dilihat pada masing-masing halaman detail karya.
                </p>
            </div>
        </section>
    </main>

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