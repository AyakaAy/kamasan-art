<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Mengambil data katalog statis dari resources/data/products.php (jika sudah ada)
     */
    private function findProductBySlug(string $slug): array
    {
        $products = file_exists(resource_path('data/products.php'))
            ? require resource_path('data/products.php')
            : [];

        foreach ($products as $item) {
            if (($item['slug'] ?? '') === $slug) {
                return $item;
            }
        }

        // Fallback contoh jika slug dikirim dari katalog statis
        $isPo = str_contains(strtolower($slug), 'po') || str_contains(strtolower($slug), 'plafon');

        return [
            'slug' => $slug,
            'name' => Str::headline($slug),
            'category' => $isPo ? 'Dekorasi Plafon' : 'Pajangan Dinding',
            'order_type' => $isPo ? 'pre_order' : 'ready_stock',
            'price' => $isPo ? 12000000 : 4500000,
            'stock' => $isPo ? null : 3,
            'dimensions' => '90 x 60 cm',
            'material' => 'Kain Blacu & Pigmen Alam',
            'image' => 'assets/images/products/bima-swarga.jpg',
        ];
    }

    public function create(string $slug)
    {
        $site = file_exists(resource_path('data/site.php'))
            ? require resource_path('data/site.php')
            : [];

        $product = $this->findProductBySlug($slug);

        return view('orders.create', compact('product', 'site'));
    }

    public function store(Request $request, string $slug)
    {
        $product = $this->findProductBySlug($slug);
        $isReadyStock = ($product['order_type'] ?? 'ready_stock') === 'ready_stock';

        $validated = $request->validate([
            'buyer_name' => ['required', 'string', 'max:120'],
            'buyer_whatsapp' => ['required', 'string', 'regex:/^[0-9+\-\s()]{8,22}$/'],
            'quantity' => ['required', 'integer', 'min:1'],
            'preferred_delivery_method' => ['required', Rule::in(['pickup', 'courier', 'studio_delivery'])],
            'delivery_city' => ['nullable', 'string', 'max:100'],
            'address' => [
                Rule::requiredIf(fn () => in_array($request->input('preferred_delivery_method'), ['courier', 'studio_delivery'], true)),
                'nullable',
                'string',
                'max:500',
            ],
            'notes' => ['nullable', 'string', 'max:1000'],
        ], [
            'buyer_whatsapp.regex' => 'Format nomor WhatsApp tidak valid.',
            'address.required' => 'Alamat pengiriman wajib diisi untuk metode kurir atau pengantaran studio.',
        ]);

        // Generate kode unik format KM-YYYYMMDD-XXXXXXXX
        $trackingCode = 'KM-' . now()->format('Ymd') . '-' . Str::upper(Str::random(8));
        $quantity = (int) $validated['quantity'];
        $unitPrice = (float) ($product['price'] ?? $product['base_price'] ?? 0);
        $totalPrice = $isReadyStock ? ($unitPrice * $quantity) : null;

        // Susun timeline awal sesuai Ready Stock (4 tahap) vs PO (6 tahap)
        if ($isReadyStock) {
            $steps = [
                [
                    'number' => 1,
                    'title' => 'Pengajuan Pesanan Ready Stock Diterima',
                    'description' => "Formulir pemesanan {$quantity} unit \"{$product['name']}\" diterima studio. Kode pelacakan diterbitkan.",
                    'timestamp' => now()->translatedFormat('d M Y • H:i') . ' WITA',
                    'state' => 'completed',
                    'note' => null,
                ],
                [
                    'number' => 2,
                    'title' => 'Konfirmasi Stok & Pelunasan Penuh 100% (Tanpa DP)',
                    'description' => 'Menunggu konfirmasi ketersediaan stok serta verifikasi transfer pembayaran penuh 100% (skip tahapan DP 50%).',
                    'timestamp' => null,
                    'state' => 'active',
                    'note' => 'Silakan lanjutkan konfirmasi & transfer 100% melalui WhatsApp studio.',
                ],
                [
                    'number' => 3,
                    'title' => 'Inspeksi Kualitas & Pengemasan Karya',
                    'description' => 'Kurator memeriksa kondisi fisik karya, melampirkan sertifikat keaslian Kamasan, dan menyiapkan kemasan.',
                    'timestamp' => null,
                    'state' => 'upcoming',
                    'note' => null,
                ],
                [
                    'number' => 4,
                    'title' => 'Penyerahan / Pengiriman Karya Selesai',
                    'description' => 'Karya diserahkan sesuai metode penyerahan yang disepakati.',
                    'timestamp' => null,
                    'state' => 'upcoming',
                    'note' => null,
                ],
            ];
            $studioTitle = 'Tahap 2 dari 4: Menunggu Konfirmasi & Pelunasan 100%';
            $studioDesc = 'Pengajuan Anda telah tercatat. Admin studio akan mengonfirmasi detail penyerahan dan instruksi pembayaran penuh 100% (tanpa DP) via WhatsApp.';
        } else {
            $steps = [
                [
                    'number' => 1,
                    'title' => 'Pengajuan & Konsultasi Spesifikasi',
                    'description' => 'Formulir pemesanan Pre-Order diterima studio. Kurator meneliti spesifikasi karya yang diajukan.',
                    'timestamp' => now()->translatedFormat('d M Y • H:i') . ' WITA',
                    'state' => 'completed',
                    'note' => null,
                ],
                [
                    'number' => 2,
                    'title' => 'Kesepakatan Harga Final & Estimasi via WhatsApp',
                    'description' => 'Diskusi detail ukuran, bahan, estimasi waktu pengerjaan, dan penetapan nilai kontrak final bersama kurator studio.',
                    'timestamp' => null,
                    'state' => 'active',
                    'note' => 'Tim kurator akan segera menghubungi WhatsApp Anda untuk menyepakati harga final.',
                ],
                [
                    'number' => 3,
                    'title' => 'Verifikasi Pembayaran DP 50%',
                    'description' => 'Transfer DP 50% dari harga kontrak yang disepakati sebagai tanda dimulainya pengerjaan.',
                    'timestamp' => null,
                    'state' => 'upcoming',
                    'note' => null,
                ],
                [
                    'number' => 4,
                    'title' => 'Pengerjaan Mahakarya oleh Sangging Kamasan',
                    'description' => 'Proses sketsa wayang klasik, pewarnaan pigmen batu alam, dan penerapan prada emas.',
                    'timestamp' => null,
                    'state' => 'upcoming',
                    'note' => null,
                ],
                [
                    'number' => 5,
                    'title' => 'Pelunasan 50% (Sisa Pembayaran)',
                    'description' => 'Pelunasan sisa 50% dilakukan setelah karya selesai dan dikonfirmasi sebelum penyerahan.',
                    'timestamp' => null,
                    'state' => 'upcoming',
                    'note' => null,
                ],
                [
                    'number' => 6,
                    'title' => 'Pengantaran & Penyerahan Karya di Lokasi',
                    'description' => 'Penyerahan karya beserta Sertifikat Keaslian Kamasan.',
                    'timestamp' => null,
                    'state' => 'upcoming',
                    'note' => null,
                ],
            ];
            $studioTitle = 'Tahap 2 dari 6: Kesepakatan Harga Final & Estimasi via WhatsApp';
            $studioDesc = 'Formulir Pre-Order telah diterima. Kurator studio akan mendiskusikan spesifikasi, estimasi waktu pengerjaan, dan harga final sebelum pembayaran DP 50%.';
        }

        // Simpan ke session agar bisa langsung dilacak di /lacak-pesanan tanpa database
        $sessionOrders = session('kamasan_orders', []);
        $sessionOrders[$trackingCode] = [
            'tracking_code' => $trackingCode,
            'product_slug' => $product['slug'],
            'product_name' => $product['name'],
            'product_category' => $product['category'] ?? 'Karya Kamasan',
            'product_dimensions' => $product['dimensions'] ?? null,
            'product_image' => $product['image'] ?? 'assets/images/products/bima-swarga.jpg',
            'order_type' => $isReadyStock ? 'ready_stock' : 'pre_order',
            'quantity' => $quantity,
            'buyer_name' => $validated['buyer_name'],
            'delivery_method' => $validated['preferred_delivery_method'],
            'delivery_area' => $validated['preferred_delivery_method'] === 'pickup'
                ? 'Studio Made Kamasan, Klungkung'
                : ($validated['delivery_city'] ?: 'Area Pengiriman Terverifikasi'),
            'created_at' => now()->translatedFormat('d F Y'),
            'agreed_estimate' => $isReadyStock ? 'Siap Dikemas Setelah Pelunasan 100%' : 'Menunggu Kesepakatan via WA',
            'order_status' => 'pending_confirmation',
            'payment_status' => $isReadyStock ? 'unpaid' : 'dp_unpaid',
            'total_price' => $totalPrice,
            'dp_amount' => null,
            'balance_amount' => null,
            'dp_verified_at' => null,
            'paid_at' => null,
            'studio_status_title' => $studioTitle,
            'studio_status_desc' => $studioDesc,
            'steps' => $steps,
        ];
        session(['kamasan_orders' => $sessionOrders]);

        return redirect()->route('orders.success', ['trackingCode' => $trackingCode]);
    }

    public function success(string $trackingCode)
    {
        $site = file_exists(resource_path('data/site.php'))
            ? require resource_path('data/site.php')
            : [];

        $code = strtoupper(trim($trackingCode));
        $sessionOrders = session('kamasan_orders', []);
        $staticOrders = file_exists(resource_path('data/orders.php'))
            ? require resource_path('data/orders.php')
            : [];

        $order = $sessionOrders[$code] ?? $staticOrders[$code] ?? abort(404);

        return view('orders.success', compact('order', 'site'));
    }
}