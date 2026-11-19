@props(['product'])

@php
    $availability = $product['availability'] ?? 'ready'; // 'ready' | 'po' | 'sold'
    $detailUrl = \Illuminate\Support\Facades\Route::has('products.show')
        ? route('products.show', $product['slug'] ?? $product['id'] ?? 1)
        : '#';
@endphp

<div class="col-12 col-md-6 col-lg-4 catalog-product-item"
     data-category="{{ $product['category_slug'] ?? 'all' }}"
     data-availability="{{ $availability }}">
    <article class="card kamasan-card h-100 border-0 overflow-hidden {{ $availability === 'sold' ? 'kamasan-card--sold' : '' }}">
        {{-- Bagian Gambar Produk --}}
        <div class="position-relative kamasan-card-media overflow-hidden">
            <img src="{{ asset($product['image'] ?? 'assets/images/products/bima-swarga.jpg') }}"
                 alt="{{ $product['name'] ?? 'Karya Kamasan Art' }}"
                 loading="lazy"
                 decoding="async"
                 class="w-100 h-100 object-fit-cover kamasan-card-img">

            {{-- Badge Ketersediaan (Kanan Atas) --}}
            <span class="position-absolute top-0 end-0 m-3 badge rounded-pill kamasan-badge kamasan-badge--{{ $availability }}">
                <span class="kamasan-dot me-1"></span>
                {{ $product['availability_label'] ?? ($availability === 'po' ? 'Pre-Order (PO)' : ($availability === 'sold' ? 'Stok Habis' : 'Ready Stock')) }}
            </span>

            {{-- Label Kategori (Kiri Bawah) --}}
            <span class="position-absolute bottom-0 start-0 m-3 badge kamasan-cat-chip text-uppercase">
                {{ $product['category'] ?? 'Koleksi' }}
            </span>
        </div>

        {{-- Bagian Konten Kartu --}}
        <div class="card-body d-flex flex-column justify-content-between p-4">
            <div>
                <div class="d-flex justify-content-between align-items-center small kamasan-meta-top mb-2">
                    <span>{{ $product['meta_left'] ?? ($product['dimension'] ?? 'Karya Sanggar') }}</span>
                    <span class="kamasan-gold-accent fw-medium">
                        {{ $product['meta_right'] ?? ($product['highlight'] ?? 'Wayang Kamasan') }}
                    </span>
                </div>

                <h2 class="h5 kamasan-serif kamasan-card-title mb-2">
                    {{ $product['name'] ?? 'Judul Karya' }}
                </h2>

                <p class="small kamasan-muted-text kamasan-clamp-2 mb-4">
                    {{ $product['excerpt'] ?? '' }}
                </p>
            </div>

            {{-- Harga & Tombol Aksi --}}
            <div class="pt-2 border-top kamasan-divider">
                <div class="kamasan-price-caption text-uppercase mb-1">
                    {{ $product['price_note'] ?? ($availability === 'po' ? 'Estimasi Pemesanan Khusus' : ($availability === 'sold' ? 'Harga Terakhir' : 'Investasi Karya')) }}
                </div>

                <div class="kamasan-serif fs-5 fw-medium mb-3 {{ $availability === 'sold' ? 'text-decoration-line-through kamasan-muted-text' : ($availability === 'po' ? 'kamasan-secondary-gold' : 'kamasan-gold-accent') }}">
                    {{ $product['price_label'] ?? 'Hubungi Studio' }}
                </div>

                @if ($availability === 'sold')
                    <button type="button"
                            class="btn kamasan-btn-disabled w-100 py-2 text-uppercase fw-semibold"
                            disabled>
                        Stok Habis • Hubungi Atelier
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