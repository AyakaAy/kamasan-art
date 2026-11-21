@php
    $dataFile = base_path('resources/data/products.php');
    $loadedData = file_exists($dataFile) ? include $dataFile : [];
    $allProducts = $products ?? ($loadedData['products'] ?? []);

    if (!isset($product)) {
        $requestedSlug = $slug ?? request()->route('slug') ?? request()->query('slug');
        $product = collect($allProducts)->firstWhere('slug', $requestedSlug) ?? ($allProducts[0] ?? []);
    }

    $relatedProducts = $relatedProducts ?? collect($allProducts)
        ->reject(fn ($item) => ($item['slug'] ?? '') === ($product['slug'] ?? ''))
        ->unique('slug')
        ->take(3)
        ->all();

    $orderTypeRaw = strtolower(trim($product['order_type'] ?? 'ready_stock'));
    $isPreOrder = str_contains($orderTypeRaw, 'pre') || $orderTypeRaw === 'po';
    $stock = (int) ($product['stock'] ?? 0);
    $isOutOfStock = !$isPreOrder && $stock <= 0;

    $availabilityKey = $isOutOfStock ? 'sold' : ($isPreOrder ? 'po' : 'ready');
    $availabilityLabel = $isOutOfStock
        ? 'Stok Habis'
        : ($isPreOrder ? 'Pre-Order' : "Ready: {$stock} unit");

    $rawPrice = $product['price'] ?? null;
    if (is_string($rawPrice) && trim($rawPrice) !== '') {
        $formattedPrice = str_starts_with(trim($rawPrice), 'Rp') ? trim($rawPrice) : 'Rp ' . trim($rawPrice);
    } elseif (is_numeric($rawPrice) && (float) $rawPrice > 0) {
        $formattedPrice = 'Rp ' . number_format((float) $rawPrice, 0, ',', '.');
    } else {
        $formattedPrice = 'Hubungi Studio';
    }

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/products/kamasan-products.css'])
</head>
<body class="kamasan-body">
    <main class="container py-5" style="max-width: 1280px;">
        <div class="mb-4">
            <a href="{{ $catalogUrl }}" class="kamasan-back-link d-inline-flex align-items-center gap-2">
                <span aria-hidden="true">&larr;</span>
                <span>Kembali ke Katalog Koleksi</span>
            </a>
        </div>

        <div class="row g-4 g-lg-5 align-items-start">
            <div class="col-12 col-lg-6">
                <div class="kamasan-detail-media">
                    <img src="{{ asset($product['image'] ?? 'assets/images/products/bima-swarga.jpg') }}"
                         alt="{{ $product['name'] ?? 'Karya Kamasan Art' }}"
                         class="w-100 h-100 object-fit-cover">
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="kamasan-detail-panel p-4 p-md-5">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                        <span class="kamasan-eyebrow text-uppercase">
                            {{ $product['category'] ?? 'Koleksi Kamasan Art' }}
                        </span>

                        <span class="badge rounded-pill kamasan-badge kamasan-badge--{{ $availabilityKey }}">
                            {{ $availabilityLabel }}
                        </span>
                    </div>

                    <h1 class="kamasan-serif display-6 fw-semibold mb-3">
                        {{ $product['name'] ?? 'Judul Karya' }}
                    </h1>

                    <p class="kamasan-muted-text mb-4">
                        {{ $product['description'] ?? '' }}
                    </p>

                    <div class="py-3 border-top border-bottom kamasan-divider mb-4">
                        <div class="small kamasan-outline-text text-uppercase mb-1" style="font-size: 0.7rem; letter-spacing: 0.1em;">
                            {{ $isPreOrder ? 'Pemesanan Pre-Order' : ($isOutOfStock ? 'Status Ketersediaan' : 'Harga Karya') }}
                        </div>
                        <div class="kamasan-serif fs-3 fw-medium {{ $isOutOfStock ? 'kamasan-outline-text' : ($isPreOrder ? 'kamasan-secondary-gold' : 'kamasan-gold-accent') }}">
                            {{ $formattedPrice }}
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-12 col-sm-6">
                            <div class="kamasan-spec-box p-3 h-100">
                                <div class="small kamasan-outline-text mb-1">Ukuran Karya</div>
                                <div class="small fw-semibold">{{ $product['size'] ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="kamasan-spec-box p-3 h-100">
                                <div class="small kamasan-outline-text mb-1">Bahan / Media</div>
                                <div class="small fw-semibold kamasan-gold-accent">{{ $product['material'] ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="kamasan-spec-box p-3 h-100">
                                <div class="small kamasan-outline-text mb-1">Kategori</div>
                                <div class="small">{{ $product['category'] ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="kamasan-spec-box p-3 h-100">
                                <div class="small kamasan-outline-text mb-1">Ketersediaan</div>
                                <div class="small">{{ $availabilityLabel }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ $waUrl }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn kamasan-btn-primary py-3 fw-semibold text-uppercase">
                            {{ $isPreOrder ? 'Konsultasi Pre-Order via WhatsApp' : ($isOutOfStock ? 'Tanyakan Karya Serupa via WhatsApp' : 'Pesan / Tanya Karya via WhatsApp') }}
                        </a>
                        <a href="{{ $catalogUrl }}" class="btn kamasan-btn-secondary py-2">
                            Jelajahi Karya Lainnya
                        </a>
                    </div>
                </div>
            </div>
        </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>