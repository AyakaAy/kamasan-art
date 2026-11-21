@props(['product'])

@php
    $orderTypeRaw = strtolower(trim($product['order_type'] ?? 'ready_stock'));
    $isPreOrder = str_contains($orderTypeRaw, 'pre') || $orderTypeRaw === 'po';$stock = (int) ($product['stock'] ?? 0);$isOutOfStock = !$isPreOrder &&$stock <= 0;

    $availabilityKey = $isOutOfStock ? 'sold' : ($isPreOrder ? 'po' : 'ready');
    $availabilityLabel =$isOutOfStock
        ? 'Stok Habis'
        : ($isPreOrder ? 'Pre-Order' : "Ready: {$stock} unit");

    $rawPrice =$product['price'] ?? null;
    if (is_string($rawPrice) && trim($rawPrice) !== '') {
        $formattedPrice = str_starts_with(trim($rawPrice), 'Rp') ? trim($rawPrice) : 'Rp ' . trim($rawPrice);
    } elseif (is_numeric($rawPrice) && (float) $rawPrice > 0) {$formattedPrice = 'Rp ' . number_format((float) $rawPrice, 0, ',', '.'); } else {$formattedPrice = 'Hubungi Studio';
    }

    $categoryName =$product['category'] ?? 'Koleksi';
    $categorySlug = \Illuminate\Support\Str::slug($categoryName);

    $detailUrl = \Illuminate\Support\Facades\Route::has('products.show')
        ? route('products.show', $product['slug'] ?? 1) : url('/products/' . ($product['slug'] ?? 1));
@endphp

<div class="col-12 col-md-6 col-lg-4 catalog-product-item"
     data-category="{{ $categorySlug }}"
     data-availability="{{ $availabilityKey }}">
    <article class="card kamasan-card h-100 border-0 overflow-hidden {{ $isOutOfStock ? 'kamasan-card--sold' : '' }}">
        <div class="position-relative kamasan-card-media overflow-hidden">
            <img src="{{ asset($product['image'] ?? 'assets/images/products/bima-swarga.jpg') }}"
                 alt="{{ $product['name'] ?? 'Karya Kamasan Art' }}"
                 loading="lazy"
                 decoding="async"
                 class="w-100 h-100 object-fit-cover kamasan-card-img">

            <span class="position-absolute top-0 end-0 m-3 badge rounded-pill kamasan-badge kamasan-badge--{{ $availabilityKey }}">
                <span class="kamasan-dot me-1"></span>
                {{ $availabilityLabel }}
            </span>

            <span class="position-absolute bottom-0 start-0 m-3 badge kamasan-cat-chip text-uppercase">
                {{ $categoryName }}
            </span>
        </div>

        <div class="card-body d-flex flex-column justify-content-between p-4">
            <div>
                <div class="d-flex justify-content-between align-items-center small kamasan-meta-top mb-2">
                    <span>Ukuran: {{ $product['size'] ?? '-' }}</span>
                    <span class="kamasan-gold-accent fw-medium">
                        {{ $product['material'] ?? 'Kamasan Art' }}
                    </span>
                </div>

                <h2 class="h5 kamasan-serif kamasan-card-title mb-2">
                    {{ $product['name'] ?? 'Judul Karya' }}
                </h2>

                <p class="small kamasan-muted-text kamasan-clamp-2 mb-4">
                    {{ $product['description'] ?? '' }}
                </p>
            </div>

            <div class="pt-2 border-top kamasan-divider">
                <div class="kamasan-price-caption text-uppercase mb-1">
                    {{ $isPreOrder ? 'Pemesanan Pre-Order' : ($isOutOfStock ? 'Status Ketersediaan' : 'Harga Karya') }}
                </div>

                <div class="kamasan-serif fs-5 fw-medium mb-3 {{ $isOutOfStock ? 'kamasan-muted-text' : ($isPreOrder ? 'kamasan-secondary-gold' : 'kamasan-gold-accent') }}">
                    {{ $formattedPrice }}
                </div>

                @if ($isOutOfStock)
                    <button type="button"
                            class="btn kamasan-btn-disabled w-100 py-2 text-uppercase fw-semibold"
                            disabled>
                        Stok Habis
                    </button>
                @else
                    <a href="{{ $detailUrl }}"
                       class="btn kamasan-btn-primary w-100 py-2 text-uppercase fw-semibold d-inline-flex align-items-center justify-content-center gap-2">
                        <span>Lihat Detail &amp; Pesan</span>
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                @endif
            </div>
        </div>
    </article>
</div>