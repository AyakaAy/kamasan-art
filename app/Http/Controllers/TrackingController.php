<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingController extends Controller
{
    private function sampleOrders(): array
    {
        return [
            // Simulasi 1: Ready Stock (Langsung 100% Lunas — Skip DP 50%)
            'KM-20261121-RS1001' => [
                'code' => 'KM-20261121-RS1001',
                'type' => 'ready_stock',
                'type_label' => 'Ready Stock (Langsung 100% Lunas)',
                'product_name' => 'Lukisan Klasik Bima Swarga',
                'product_category' => 'PAJANGAN DINDING',
                'dimensions' => '90 x 60 cm • Kain Belacu Halus',
                'image' => 'assets/images/products/bima-swarga.jpg',
                'quantity' => 1,
                'masked_buyer' => 'I M*** W*****',
                'created_at' => '20 November 2026',
                'estimate' => 'Siap Dikirim (Karya Ready Stock)',
                'delivery_method' => 'Pengiriman Kurir / Ekspedisi',
                'destination' => 'Denpasar Barat, Bali',
                'status_badge' => 'Sedang Dikemas',
                'status_title' => 'Tahap 3 dari 4: Inspeksi Kualitas & Pengemasan Karya',
                'status_desc' => 'Kurator studio sedang memeriksa kondisi akhir pigmen warna, kelengkapan Sertifikat Keaslian Kamasan, dan pengemasan pelindung.',
                'payment_badge' => 'Lunas 100% (Tanpa DP)',
                'payment_title' => 'Pembayaran Penuh 100% Terverifikasi (Lunas)',
                'total_price' => 'Rp 4.500.000',
                'dp_amount' => null,
                'balance_amount' => null,
                'paid_date' => '21 Nov 2026',
                'active_step' => 3,
                'total_steps' => 4,
                'steps' => [
                    [
                        'num' => 1,
                        'title' => 'Pengajuan Pesanan Ready Stock Diterima',
                        'time' => '20 Nov 2026 • 10:15 WITA',
                        'desc' => 'Formulir pemesanan 1 unit Lukisan Klasik Bima Swarga diterima studio. Kode pelacakan unik diterbitkan.',
                        'state' => 'completed',
                    ],
                    [
                        'num' => 2,
                        'title' => 'Konfirmasi Stok & Pelunasan Penuh 100% (Skip DP 50%)',
                        'time' => '21 Nov 2026 • 14:20 WITA',
                        'desc' => 'Transfer pembayaran penuh Rp 4.500.000 diverifikasi manual oleh admin studio tanpa melalui tahapan DP 50%.',
                        'state' => 'completed',
                    ],
                    [
                        'num' => 3,
                        'title' => 'Inspeksi Kualitas & Pengemasan Karya',
                        'time' => 'Est. Kirim: 23 Nov 2026',
                        'desc' => 'Pemeriksaan fisik karya oleh kurator studio, penyegelan sertifikat keaslian Kamasan Klungkung, dan pengemasan aman.',
                        'note' => 'Dokumentasi foto karya sebelum dikemas dikirimkan ke WhatsApp pemesan.',
                        'state' => 'active',
                    ],
                    [
                        'num' => 4,
                        'title' => 'Penyerahan / Pengiriman Karya Selesai',
                        'time' => 'Tahap Berikutnya',
                        'desc' => 'Karya diserahkan melalui Pengiriman Kurir / Ekspedisi menuju area tujuan.',
                        'state' => 'upcoming',
                    ],
                ],
            ],

            // Simulasi 2: Pre-Order (Bertahap DP 50% & Sisa Pelunasan 50%)
            'KM-20261121-PO7741' => [
                'code' => 'KM-20261121-PO7741',
                'type' => 'pre_order',
                'type_label' => 'Pre-Order Kustom (PO Sangging)',
                'product_name' => 'Plafoni Bale Kambang: Ramayana & Sutasoma',
                'product_category' => 'PO MAHAKARYA SANGGING',
                'dimensions' => '320 x 180 cm • Kain Blacu Tebal & Prada Emas',
                'image' => 'assets/images/products/bima-swarga.jpg',
                'quantity' => 1,
                'masked_buyer' => 'I** B**** O**',
                'created_at' => '28 Oktober 2026',
                'estimate' => '45 Hari Kerja (Est. 15 Des 2026)',
                'delivery_method' => 'Antar Langsung & Pemasangan Studio',
                'destination' => 'Kawasan Sanur, Denpasar Selatan',
                'status_badge' => 'Sedang Dikerjakan',
                'status_title' => 'Tahap 4 dari 6: Pengerjaan Mahakarya oleh Sangging',
                'status_desc' => 'Empu lukis Kamasan sedang menggoreskan narasi wayang menggunakan pigmen batu alami tradisional dan sentuhan prada emas.',
                'payment_badge' => 'DP Lunas / Menunggu Pelunasan',
                'payment_title' => 'DP 50% Terverifikasi • Menunggu Pelunasan (Balance Due)',
                'total_price' => 'Rp 28.500.000',
                'dp_amount' => 'Rp 14.250.000',
                'balance_amount' => 'Rp 14.250.000',
                'paid_date' => '30 Okt 2026',
                'active_step' => 4,
                'total_steps' => 6,
                'steps' => [
                    [
                        'num' => 1,
                        'title' => 'Pengajuan & Konsultasi Spesifikasi',
                        'time' => '28 Okt 2026 • 10:15 WITA',
                        'desc' => 'Formulir kustomisasi diterima studio. Kurator meneliti dimensi ruang plafon dan kecocokan ornamen klasik.',
                        'state' => 'completed',
                    ],
                    [
                        'num' => 2,
                        'title' => 'Kesepakatan Harga Final & Estimasi via WhatsApp',
                        'time' => '29 Okt 2026 • 16:00 WITA',
                        'desc' => 'Diskusi ukuran 3.2m x 1.8m, bahan kain blacu tebal, dan kesepakatan nilai final Rp 28.500.000 disetujui kedua pihak.',
                        'state' => 'completed',
                    ],
                    [
                        'num' => 3,
                        'title' => 'Verifikasi Pembayaran DP 50%',
                        'time' => '30 Okt 2026 • 14:35 WITA',
                        'desc' => 'Transfer DP Rp 14.250.000 diverifikasi manual oleh studio. Surat mandat pengerjaan diserahkan ke sangging.',
                        'state' => 'completed',
                    ],
                    [
                        'num' => 4,
                        'title' => 'Pengerjaan Mahakarya oleh Empu Sangging',
                        'time' => 'Est. Selesai: 15 Des 2026',
                        'desc' => 'Proses penggoresan narasi Ramayana & Sutasoma, pewarnaan pigmen mineral oker alami, serta penempelan prada emas asli.',
                        'note' => 'Dokumentasi progres berkala dikirim ke WhatsApp kolektor.',
                        'state' => 'active',
                    ],
                    [
                        'num' => 5,
                        'title' => 'Pelunasan 50% (Sisa Pembayaran)',
                        'time' => 'Tahap Berikutnya',
                        'desc' => 'Ditagihkan sesudah karya selesai difoto secara menyeluruh dan dikonfirmasi sebelum penyerahan (Rp 14.250.000).',
                        'state' => 'upcoming',
                    ],
                    [
                        'num' => 6,
                        'title' => 'Pengantaran & Pemasangan Langsung di Lokasi',
                        'time' => 'Tahap Berikutnya',
                        'desc' => 'Pemasangan di lokasi oleh tim studio Kamasan, penandatanganan berita acara serah terima, dan penyerahan sertifikat keaslian karya.',
                        'state' => 'upcoming',
                    ],
                ],
            ],
        ];
    }

    public function index()
    {
        return view('tracking.index', [
            'samples' => $this->sampleOrders(),
        ]);
    }

    public function show(Request $request)
    {
        $code = strtoupper(trim((string) $request->query('code', '')));
        $orders = $this->sampleOrders();

        if ($code === '' || ! isset($orders[$code])) {
            return redirect()
                ->route('tracking.index')
                ->with('not_found_code', $code);
        }

        return view('tracking.show', [
            'order' => $orders[$code],
        ]);
    }
}