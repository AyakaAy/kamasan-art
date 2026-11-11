# Product Requirements Document (PRD)

# KAMASAN ART

**Versi:** 1.0  
**Tanggal dokumen:** 11 November 2026  
**Status:** Baseline disetujui berdasarkan diskusi kebutuhan  
**Cakupan:** UTS (website katalog) → UAS (e-commerce sederhana)  
**Target operasional:** Localhost, belum diwajibkan hosting/domain  
**Bahasa antarmuka:** Bahasa Indonesia

---

## 1. Ringkasan Eksekutif

**KAMASAN ART** adalah aplikasi web berbasis Laravel untuk memperkenalkan karya seni dan produk Wayang Kamasan sekaligus mendukung proses pemesanan. Produk dapat digunakan sebagai pajangan dinding, dekorasi plafon, perlengkapan upacara, maupun fashion. Website menyasar calon pembeli, wisatawan, masyarakat umum, dan pemilik studio sebagai administrator.

Pengembangan dibagi menjadi dua fase:

- **UTS:** website informatif/company profile dan katalog **statis**, dengan pemesanan atau konsultasi melalui WhatsApp. Tidak membutuhkan database, CRUD, checkout internal, dashboard, atau akun pembeli.
- **UAS:** e-commerce sederhana dengan database MySQL, katalog dinamis, filter, formulir pemesanan tanpa akun pembeli, pengelolaan produk dan pesanan oleh satu admin, pembayaran transfer manual yang diverifikasi admin, serta pelacakan pesanan berdasarkan kode unik.

KAMASAN ART **tidak menggunakan keranjang belanja** dan tidak menggunakan payment gateway. Tiap pesanan berisi satu jenis produk dengan quantity yang bisa ditentukan pembeli. Untuk Ready Stock, pembayaran 100% dilakukan sebelum penyerahan. Untuk Pre-Order (PO), harga final dinegosiasikan melalui WhatsApp, DP wajib 50% dan tidak dapat dikembalikan setelah dibayarkan, lalu pelunasan 50% dilakukan sesudah pengerjaan selesai tetapi sebelum barang diserahkan.

## 2. Latar Belakang dan Permasalahan

Karya seni Wayang Kamasan memiliki fungsi serta metode pemesanan yang beragam. Produk tertentu siap dibeli, sedangkan produk lain dibuat berdasarkan pengajuan pembeli. Sebagian produk memerlukan pengantaran dan pemasangan langsung. Karena itu, website katalog umum dengan checkout otomatis serta ongkos kirim baku tidak cukup merepresentasikan alur studio.

Aplikasi perlu (1) memudahkan pengunjung mengenal produk dan budaya yang terkait; (2) membantu pembeli mengajukan pesanan secara jelas; (3) membantu pemilik studio mengelola produk, stok, pembayaran, dan progres pesanan; dan (4) meminimalkan kompleksitas teknis yang tidak dibutuhkan untuk tugas kuliah.

## 3. Tujuan dan Indikator Keberhasilan

### 3.1 Tujuan

1. Menyediakan profil studio dan katalog karya yang mudah diakses.
2. Menyediakan pengalaman visual yang mencerminkan karakter klasik dan premium dari KAMASAN ART.
3. Memudahkan pengunjung menghubungi studio melalui WhatsApp pada fase UTS.
4. Memungkinkan pemesanan Ready Stock maupun PO melalui formulir pada fase UAS tanpa registrasi pembeli.
5. Memungkinkan admin mengelola produk, stok, pesanan, dan status pembayaran dengan konsisten.
6. Memungkinkan pembeli mengecek progres pesanan menggunakan kode tracking yang aman.

### 3.2 Kriteria keberhasilan per fase

| UTS | UAS |
|---|---|
| Enam halaman publik dapat diakses di localhost | Enam halaman publik menggunakan data dinamis produk sesuai kebutuhannya |
| Produk dan detail produk ditampilkan statis | CRUD produk dan upload banyak foto produk berfungsi |
| Tombol/tautan WA berfungsi dengan koneksi internet | Form pengajuan pesanan dan kode tracking berfungsi |
| Layout responsif dan animasi tidak mengganggu | Admin dapat mengelola status pesanan/pembayaran dan stok |
| Tidak memerlukan database atau autentikasi | Data persisten di MySQL dan hanya satu akun admin |

**Catatan:** Tidak ditetapkan metrik komersial seperti target omzet, traffic, atau conversion rate karena proyek direncanakan untuk demonstrasi lokal, bukan produksi publik.

## 4. Pengguna dan Hak Akses

| Aktor | Deskripsi | Hak akses |
|---|---|---|
| Pengunjung / calon pembeli | Calon pembeli, wisatawan, atau masyarakat umum | Melihat halaman publik, katalog, detail produk, galeri, kontak |
| Pembeli (tanpa akun) | Pengunjung yang mengajukan pesanan (UAS) | Mengisi form pemesanan; menerima dan menggunakan kode tracking; berdiskusi via WA |
| Admin tunggal | Pemilik studio/keluarga | Login ke dashboard; CRUD produk; mengelola stok, pesanan, status dan pembayaran |

**Aturan akses:** Tidak tersedia register/login pembeli, multi-admin, manajemen role, ataupun pendaftaran admin publik. Satu akun admin dikonfigurasi secara aman oleh developer untuk kebutuhan proyek.

## 5. Ruang Lingkup Fase

### 5.1 Matriks fase

| Fitur | UTS | UAS |
|---|:---:|:---:|
| Beranda | Ya, statis | Ya |
| Tentang Kami | Ya, statis | Ya, tetap statis |
| Katalog Produk | Ya, data statis | Ya, data dari database |
| Detail Produk | Ya, data statis | Ya, data dari database |
| Galeri | Ya, statis | Ya, tetap statis |
| Kontak & WA | Ya | Ya |
| Filter fungsi/kategori | Tidak | Ya |
| Filter Ready Stock / PO | Tidak | Ya |
| Form pemesanan internal | Tidak | Ya |
| Nomor/kode pesanan | Tidak | Ya |
| Halaman Lacak Pesanan | Tidak | Ya |
| Login Admin & Dashboard | Tidak | Ya |
| CRUD Produk & foto produk | Tidak | Ya |
| Pengelolaan pesanan/pembayaran | Tidak | Ya |
| Pembaruan stok otomatis setelah verifikasi | Tidak | Ya |
| CRUD kategori | Tidak | Tidak |
| CRUD galeri / konten profil | Tidak | Tidak |
| Keranjang belanja | Tidak | Tidak |
| Payment gateway | Tidak | Tidak |
| Login/register pembeli | Tidak | Tidak |
| Hosting publik/domain | Tidak | Tidak diwajibkan |

### 5.2 Di luar ruang lingkup

Keranjang multibarang; checkout dan verifikasi transfer otomatis; integrasi ekspedisi dan perhitungan ongkir otomatis; fitur notifikasi WA otomatis; manajemen multi-admin/role; CMS Home/About/Contact; CRUD galeri; program diskon/voucher; ulasan, rating, dan wishlist; autentikasi pembeli; deployment publik sebagai syarat kelulusan.

## 6. Arsitektur Informasi dan Navigasi

### 6.1 Halaman publik

1. **Beranda** — hero, About Preview, Featured Products, Gallery Preview, CTA, footer.
2. **Tentang Kami** — profil studio, latar dan kisah seni Kamasan, serta informasi pengrajin (konten statis).
3. **Katalog** — daftar produk; pada UAS dilengkapi dua filter.
4. **Detail Produk** — foto, spesifikasi dan harga; CTA WA pada UTS atau pemesanan pada UAS.
5. **Galeri** — dokumentasi karya dan kegiatan studio, statis.
6. **Kontak** — informasi dan lokasi studio serta tombol WhatsApp.
7. **Lacak Pesanan (UAS)** — masukkan kode unik dan lihat status serta riwayat singkat pesanan.

**Navbar publik:** Beranda, Tentang Kami, Katalog, Galeri, Kontak; Lacak Pesanan ditambahkan pada UAS. Detail Produk dapat diakses dari katalog tanpa menu navbar tersendiri. **Tombol WhatsApp tidak berada di navbar**; akses WA utama ditempatkan pada halaman Kontak, dengan CTA terkait pada konteks produk/beranda sesuai kebutuhan fase.

### 6.2 Halaman admin (UAS)

1. **Login Admin** (halaman tersendiri, tidak ditautkan dalam navbar publik).
2. **Dashboard** — ringkasan total produk, Ready Stock, PO, total pesanan, menunggu konfirmasi, sedang diproses.
3. **Manajemen Produk** — daftar/tambah/detail/edit/hapus produk; kelola foto serta stok Ready Stock.
4. **Manajemen Pesanan** — daftar/detail, verifikasi pembayaran, pembaruan status, harga final PO, catatan kesepakatan, dan pengiriman.

Kategori tetap, stok dikelola pada Produk, sedangkan galeri dan halaman profil tidak memiliki CMS admin.

## 7. Kategori dan Data Produk

### 7.1 Kategori tetap berdasarkan fungsi

- Pajangan Dinding
- Dekorasi Plafon
- Perlengkapan Upacara
- Fashion

Setiap produk **wajib** memilih satu kategori dari daftar tersebut ketika dibuat. Admin tidak bisa membuat/mengubah/menghapus kategori melalui UI. Kategori dapat diinisialisasi sebagai data tetap (`seed`) atau enum/konfigurasi yang dikendalikan developer.

### 7.2 Jenis pemesanan

- **Ready Stock:** stok terbatas; harga tetap; pembeli dapat memesan quantity hingga stok yang tersedia.
- **Pre-Order:** tidak menggunakan batas stok tetap; pembeli dapat mengajukan quantity, termasuk lebih dari 100, namun admin wajib menyepakati kemampuan produksi dan jumlah pesanan.

**Jenis pemesanan tidak boleh diubah setelah produk dibuat.** Jika perlu menjual karya serupa dengan jenis pemesanan lain, admin membuat entri produk terpisah. Produk Ready Stock yang habis tidak otomatis berubah menjadi PO.

### 7.3 Atribut produk

| Atribut | Ready Stock | PO | Aturan |
|---|:---:|:---:|---|
| Nama produk | Wajib | Wajib | Teks |
| Foto produk | Wajib | Wajib | Mendukung beberapa foto per produk |
| Deskripsi | Wajib | Wajib | Penjelasan karya |
| Harga | Harga tetap | Harga awal / “Mulai dari” | Angka rupiah positif; final PO pada data pesanan |
| Kategori/fungsi | Wajib | Wajib | Salah satu dari 4 kategori |
| Jenis pemesanan | Wajib | Wajib | Immutable setelah dibuat |
| Jumlah stok | Wajib | Tidak berlaku | Bilangan bulat ≥ 0 |
| Ukuran/dimensi | Wajib | Wajib | Teks atau struktur dimensi yang disepakati |
| Bahan | Wajib | Wajib | Teks |
| Berat | Wajib | Wajib | Nilai dan satuan jelas |
| Estimasi pengerjaan pada produk | Tidak berlaku | **Tidak diisi** | Ditentukan lewat WhatsApp per pesanan |

**Harga di UI:** Ready Stock “Rp…”, PO “Mulai dari Rp…”. Informasi harga final PO tidak diputuskan dari harga awal produk; admin mencatat harga yang disepakati pada record pesanan.

### 7.4 Featured Products

Bagian Featured Products di beranda **ditentukan developer secara statis melalui kode**, bukan melalui dashboard. Pada UTS dapat menggunakan dataset statis. Pada UAS, rekomendasi implementasi adalah menyimpan referensi ID/slug pilihan dalam konfigurasi/kode, lalu membaca detail terkini dari database; jika produk dihapus/nonaktif, tampilkan fallback tanpa error.

## 8. Kebutuhan Fungsional UTS

**FR-UTS-01 — Halaman Publik:** Sistem menampilkan Beranda, Tentang Kami, Katalog, Detail Produk, Galeri, dan Kontak.

**FR-UTS-02 — Katalog Statis:** Katalog menampilkan karya dari dataset statis yang dikelola developer; tidak ada filter, pencarian, sorting, atau pengambilan dari MySQL.

**FR-UTS-03 — Detail Produk:** Pengunjung dapat membuka detail tiap produk dan melihat gambar, spesifikasi serta harga/indikasi harga yang relevan.

**FR-UTS-04 — WhatsApp:** Pengunjung dapat membuka komunikasi WhatsApp melalui tautan `wa.me`, terutama dari Kontak dan CTA produk/beranda yang relevan. Tautan hanya bekerja jika layanan dan koneksi internet tersedia.

**FR-UTS-05 — Konten Statis:** Profil, galeri, kontak, serta produk unggulan diatur melalui kode dan aset developer.

**FR-UTS-06 — Presentasi:** Desain responsif, navbar sticky, animasi halus, dan pengalaman visual sesuai bagian 13.

## 9. Kebutuhan Fungsional UAS

### 9.1 Katalog dan detail

- **FR-UAS-01:** Daftar produk dibaca dari MySQL.
- **FR-UAS-02:** Filter kategori/fungsi dan filter jenis pemesanan tersedia; keduanya dapat dikombinasikan.
- **FR-UAS-03:** Detail menampilkan semua atribut relevan, galeri multi-foto, harga tetap atau “Mulai dari”, serta jenis pemesanan.
- **FR-UAS-04:** Produk Ready Stock dengan stok 0 diberi keterangan “Stok Habis” dan tidak menerima pengajuan baru (tetap dapat ditampilkan).

### 9.2 Form pemesanan tanpa akun

- **FR-UAS-05:** Pembeli dapat memesan **langsung dari detail produk** tanpa keranjang.
- **FR-UAS-06:** Setiap pesanan memuat satu produk dan quantity bilangan bulat positif.
- **FR-UAS-07:** Field minimum: nama lengkap, nomor WhatsApp, metode penyerahan yang diinginkan, quantity, serta informasi alamat/lokasi bila relevan; catatan permintaan opsional. Detail pasti tiap field tergantung metode penyerahan.
- **FR-UAS-08:** Metode penyerahan yang bisa dipilih: ambil di studio, kurir/ekspedisi, atau antar/pasang langsung oleh pihak studio. Pemilihan bersifat preferensi; admin dapat mengusulkan perubahan melalui WhatsApp berdasarkan lokasi dan karakter produk.
- **FR-UAS-09:** Sistem memvalidasi input dan kapasitas stok untuk Ready Stock saat pengajuan, dan mengecek ulang saat konfirmasi/pembayaran agar tidak terjadi stok negatif.
- **FR-UAS-10:** Setelah form valid, sistem menyimpan pesanan dan menghasilkan kode tracking unik yang sulit ditebak; kode ditampilkan dan dapat disalin. Pengguna diingatkan untuk menyimpannya.
- **FR-UAS-11:** Pembeli mendapat arahan untuk menunggu konfirmasi admin via WhatsApp. Integrasi kirim pesan otomatis tidak diwajibkan.

### 9.3 Manajemen admin

- **FR-UAS-12:** Satu akun admin login melalui autentikasi server; route dashboard dan seluruh aksi mutasi dilindungi middleware.
- **FR-UAS-13:** Admin dapat menambah, melihat, mengubah, dan menghapus produk; foto produk dapat diunggah lebih dari satu; kategori dipilih dari nilai tetap.
- **FR-UAS-14:** Admin dapat mengelola stok Ready Stock, tetapi stok **otomatis berkurang saat pembayaran 100% diverifikasi**, bukan saat form diajukan.
- **FR-UAS-15:** Admin melihat daftar/detail pesanan, menghubungi pembeli via WhatsApp, mencatat hasil kesepakatan, dan memperbarui status pesanan.
- **FR-UAS-16:** Untuk PO, admin memasukkan **harga final** yang disepakati; sistem menghitung DP 50% dan sisa pelunasan 50%.
- **FR-UAS-17:** Admin mencatat/verifikasi pembayaran berdasarkan bukti yang dibahas melalui WhatsApp. Pembeli tidak dapat mengubah status pembayarannya sendiri.
- **FR-UAS-18:** Admin dapat mencatat estimasi pengerjaan hasil kesepakatan **pada pesanan PO**, bukan pada katalog/produk.
- **FR-UAS-19:** Admin dapat mencatat metode penyerahan final, catatan biaya pengiriman/pemasangan jika disepakati, dan detail tindak lanjut.
- **FR-UAS-20:** Dashboard menghitung enam statistik: total produk, total Ready Stock, total PO, total pesanan, pesanan menunggu konfirmasi, dan pesanan sedang diproses.
- **FR-UAS-21:** Admin dapat menyetujui pembatalan yang diajukan lewat WhatsApp dan mengubah status menjadi Dibatalkan sesuai kebijakan di bagian 10.

### 9.4 Tracking

- **FR-UAS-22:** Halaman Lacak Pesanan dapat diakses tanpa login menggunakan kode tracking unik.
- **FR-UAS-23:** Tampilan tracking meliputi kode, ringkasan produk/quantity, status pesanan terkini, status pembayaran yang relevan, dan riwayat perubahan status yang layak ditampilkan.
- **FR-UAS-24:** Detail pribadi seperti alamat lengkap, nomor WA, catatan internal admin, dan bukti pembayaran **tidak** ditampilkan pada halaman tracking publik.
- **FR-UAS-25:** Kode tidak valid menghasilkan pesan netral tanpa membocorkan data atau keberadaan pesanan lain; permintaan tracking dibatasi laju aksesnya (rate limit).

## 10. Aturan Bisnis dan Alur Transaksi

### 10.1 Status pesanan (terpisah dari pembayaran)

| Kode status yang disarankan | Label UI | Makna |
|---|---|---|
| `pending_confirmation` | Menunggu Konfirmasi | Pengajuan baru masuk |
| `confirmed` | Dikonfirmasi | Detail produk, jumlah, harga dan penyerahan disepakati |
| `processing` | Diproses | Barang disiapkan (Ready Stock) atau dibuat (PO) |
| `ready_for_handover` | Siap Diserahkan | Barang siap dikirim/diambil/diantar |
| `completed` | Selesai | Penyerahan selesai |
| `cancelled` | Dibatalkan | Dibatalkan oleh admin sesuai kebijakan |

Simpan waktu dan admin yang melakukan perubahan; tampilkan status yang sesuai di tracking. Penamaan internal dapat berubah ketika implementasi, tetapi makna dan aturan bisnis harus dipertahankan.

### 10.2 Status pembayaran Ready Stock

`unpaid` → `pending_verification` → `paid`.

**Catatan:** Status “Menunggu Verifikasi” dimasukkan secara manual oleh admin ketika pembeli mengaku telah transfer/mengirim bukti via WhatsApp; website tidak memeriksa rekening secara otomatis.

### 10.3 Status pembayaran PO

`dp_unpaid` → `dp_pending_verification` → `dp_verified` → `balance_due` → `balance_pending_verification` → `paid`.

Status `balance_due` aktif ketika produk siap ditagih pelunasannya setelah pengerjaan selesai. DP sebesar 50% dihitung dari **harga final pesanan**, bukan harga awal katalog.

### 10.4 Alur Ready Stock

1. Pembeli membuka detail produk, memilih quantity (≥1 dan tidak melebihi stok yang terlihat), lalu mengisi form.
2. Sistem mencatat pesanan dengan status Menunggu Konfirmasi dan Belum Dibayar; kode tracking diterbitkan.
3. Admin menghubungi pembeli via WhatsApp untuk mengonfirmasi detail, metode penyerahan, dan total pembayaran.
4. Pembeli transfer **100%**, lalu mengirim bukti melalui WhatsApp.
5. Admin memverifikasi secara manual. Dalam transaksi database yang aman, sistem memeriksa stok aktual lalu mengurangi stok **tepat satu kali** apabila mencukupi; status pembayaran menjadi Lunas.
6. Admin menyiapkan produk, mengatur penyerahan, dan memperbarui status sampai Selesai.

**Jika stok tidak mencukupi saat verifikasi:** sistem menolak finalisasi yang akan membuat stok negatif dan meminta admin menyelesaikan penyesuaian dengan pembeli. Jangan mencatat pembayaran sebagai Lunas sekaligus mengurangi stok bila transaksi stok gagal; diperlukan prosedur manual untuk menyelesaikan pembayaran yang sudah masuk.

### 10.5 Alur Pre-Order

1. Pembeli membuka detail PO, melihat “Mulai dari Rp…”, memilih quantity dan mengisi form.
2. Sistem menyimpan pengajuan dan kode tracking, status Menunggu Konfirmasi.
3. Admin menghubungi pembeli via WhatsApp untuk detail spesifikasi, kapasitas produksi (termasuk quantity besar), estimasi pengerjaan, harga final, metode penyerahan, serta biaya terkait.
4. Admin mencatat harga final pesanan; aplikasi menghitung **DP 50%** dan **sisa 50%**.
5. Pembeli melakukan transfer DP, bukti dikirim melalui WhatsApp; admin memverifikasi DP.
6. Setelah DP terverifikasi, admin memulai pengerjaan dan memperbarui status Diproses.
7. Setelah produk selesai, admin meminta pelunasan 50%; pembeli transfer dan admin memverifikasi.
8. Barang **baru boleh diserahkan setelah pelunasan diverifikasi**, kemudian status diperbarui hingga Selesai.

Tidak ada stok tetap untuk produk PO, tetapi tidak berarti kapasitas produksi tanpa batas. Jumlah pesanan disetujui admin sebelum pesanan dikonfirmasi.

### 10.6 Pembatalan dan kebijakan DP

- **Kanal pembatalan:** pembeli mengajukan melalui WhatsApp; hanya admin yang mengubah status di sistem.
- **Ready Stock:** pembatalan diperbolehkan **sebelum pembayaran**; sesudah pembayaran diverifikasi, pesanan **tidak dapat dibatalkan** melalui alur normal.
- **PO sebelum DP dibayar:** pengajuan pembatalan dapat disetujui admin.
- **PO setelah DP dibayar:** pembatalan dapat diproses oleh admin, **DP 50% hangus/tidak dikembalikan** sejak pembayaran DP dilakukan, termasuk apabila pekerjaan belum dimulai. Kebijakan harus disampaikan secara eksplisit kepada pembeli sebelum pembayaran DP dan dicatat bahwa pembeli menyetujuinya.
- Apabila pembayaran PO lebih dari DP telah diterima saat pembatalan, penyelesaian dana tambahan harus ditangani admin berdasarkan kesepakatan dan peraturan yang berlaku; **belum ada ketentuan refund tambahan yang disepakati**. Jangan otomatis menganggap seluruh pembayaran hangus.
- Untuk kasus kesalahan studio, gagal produksi, atau kejadian luar biasa, kebijakan penyelesaian masih perlu ditentukan sebelum penggunaan komersial sungguhan.

### 10.7 Pengiriman dan pemasangan

Metode penyerahan awal dipilih pembeli saat form: (a) ambil di studio, (b) kirim via kurir/ekspedisi, atau (c) antar langsung/pemasangan oleh pihak studio. Biaya, jadwal, dan perubahan metode ditentukan secara manual melalui WhatsApp. Tidak ada tarif atau integrasi pengiriman otomatis. Untuk pemasangan khusus (misalnya dekorasi plafon), admin mengonfirmasi kebutuhan dan kemampuan layanan.

### 10.8 Invarian sistem

1. Status pembayaran dan status pesanan adalah atribut **berbeda**.
2. Order berisi **tepat satu produk**, tetapi quantity dapat lebih dari satu.
3. `product.order_type` tidak dapat diubah setelah dibuat.
4. Quantity adalah integer positif; stok Ready Stock tidak boleh negatif.
5. Pengurangan stok Ready Stock hanya dilakukan sekali pada verifikasi pembayaran penuh yang berhasil; aksi verifikasi ulang tidak boleh mengurangi stok lagi.
6. PO tidak memiliki stok inventaris tetap; harga final dan nilai DP disimpan sebagai snapshot transaksi agar tidak berubah ketika harga katalog diperbarui.
7. PO tidak diserahkan sebelum pelunasan terverifikasi.
8. Tracking publik tidak mengekspos PII sensitif.

## 11. Rancangan Data Awal (UAS)

Rancangan berikut adalah **usulan implementasi**, bukan kewajiban nama tabel/kolom literal. Developer dapat menyesuaikan dengan konvensi Laravel selama perilakunya tetap sama.

| Entitas / tabel | Atribut penting | Relasi / catatan |
|---|---|---|
| `users` | id, name, email/login identifier, password_hash | Satu akun admin; tidak ada akun pembeli |
| `categories` (seeded/fixed) | id, name, slug | Empat kategori; UI tidak menyediakan CRUD kategori |
| `products` | id, category_id, slug, name, description, order_type, base_price, stock nullable, dimensions, material, weight, is_active, timestamps | `order_type` immutable; `stock` hanya Ready Stock |
| `product_images` | id, product_id, file_path, sort_order, alt_text | Banyak foto per produk |
| `orders` | id, tracking_code, product_id, product_name_snapshot, order_type_snapshot, quantity, buyer_name, buyer_whatsapp, preferred_delivery_method, final_delivery_method, address nullable, notes, base_price_snapshot, final_unit_price nullable, final_total_price nullable, dp_amount nullable, balance_amount nullable, order_status, payment_status, agreed_estimate nullable, timestamps | Satu pesanan satu produk; simpan snapshot transaksi |
| `order_status_histories` | id, order_id, previous_status, new_status, changed_by, note, changed_at | Untuk audit dan timeline tracking (catatan internal tidak publik) |
| `payments` atau `payment_records` | id, order_id, payment_type (full/dp/balance), amount, status, verified_at, verified_by, reference_note | Tidak perlu upload bukti; bukti lewat WA; catat verifikasi manual |
| `stock_movements` (disarankan) | id, product_id, order_id nullable, delta, reason, created_at | Audit stok dan pencegahan potongan berulang |

**Catatan penyederhanaan:** `categories` bisa diganti enum/konfigurasi jika dosen tidak mensyaratkan relasi kategori; `payments` dapat direduksi menjadi kolom terpisah pada order bila tahap implementasi sangat sederhana, asalkan histori/verifikasi dan aturan DP-lunas tetap dapat diuji. Tidak disarankan mencampur status pesanan dengan status pembayaran.

### 11.1 Validasi contoh

- Nama, nomor WA, product ID, quantity, dan metode penyerahan wajib pada form.
- Nomor WA divalidasi format wajar (tanpa mengasumsikan pengguna selalu memakai satu pola penulisan).
- Alamat/lokasi wajib bila metode kurir atau antar langsung, tetapi boleh kosong untuk ambil di studio.
- Harga dan pembayaran dalam rupiah harus nonnegatif; gunakan tipe numerik tepat (`decimal`) bukan floating-point untuk uang.
- Harga final PO harus disimpan sebelum perhitungan DP; persentase = 50%.
- Pembaruan jenis pemesanan produk harus ditolak di server, bukan sekadar disembunyikan pada form edit.
- Hapus produk yang sudah direferensikan oleh pesanan sebaiknya dilakukan melalui penonaktifan/soft delete untuk menjaga histori transaksi.

## 12. Komponen UI per Halaman

### 12.1 Beranda

Urutan final yang disepakati:

1. **Hero Section:** citra full-screen, dark overlay/shading lembut di sisi teks, headline dan CTA.
2. **About Preview:** layout hybrid gambar-teks; tautan menuju Tentang Kami.
3. **Featured Products:** pilihan produk unggulan statis melalui kode; tautan detail produk/katalog.
4. **Gallery Preview:** cuplikan visual karya; tautan menuju Galeri.
5. **CTA WhatsApp:** ajakan menghubungi studio; tidak perlu berada di navbar.
6. **Footer:** navigasi, kontak, dan informasi studio.

**Tidak ada** section khusus “Nilai/Keunggulan KAMASAN ART”. Tidak semua section menggunakan full-screen image; variasi section tanpa gambar, foto, dan hybrid merupakan bagian dari desain.

### 12.2 Katalog

- UTS: grid produk statis, tanpa filter.
- UAS: grid produk dinamis; dropdown/chips filter kategori/fungsi dan filter Ready Stock/PO; kombinasi keduanya diperbolehkan.
- Tidak ada fitur pencarian nama, sorting harga atau terbaru dalam scope yang disetujui.
- Grid menggunakan **Bootstrap Grid**; tampilan card memakai Tailwind dan Custom CSS sesuai pembagian gaya.

### 12.3 Detail Produk

- Foto utama dan foto tambahan (bila tersedia).
- Nama, deskripsi, kategori, jenis pemesanan, harga, dimensi, bahan, berat.
- Ready Stock: informasi stok dan pemilihan quantity sampai stok tersedia.
- PO: label “Mulai dari” dan keterangan harga final serta estimasi pengerjaan dikonfirmasi via WhatsApp; tidak tampil janji durasi baku.
- UTS: CTA komunikasi via WA; UAS: tombol menuju form pemesanan produk tersebut.

### 12.4 Form dan Tracking UAS

Form berada pada alur langsung dari detail produk, tanpa keranjang. Setelah berhasil, tampilkan kode pesanan yang dapat disalin dan instruksi menyimpan kode. Halaman tracking menampilkan status pesanan serta pembayaran yang relevan, tetapi mengaburkan/menghilangkan informasi pribadi.

## 13. Arah Desain dan Animasi

### 13.1 Visual identity

- **Gaya:** Dark Luxury, Classical, dengan sentuhan heritage budaya Bali.
- **Warna:** keluarga coklat (deep brown, earth brown), hitam kecoklatan untuk overlay, beige/krem gelap sebagai pendamping, **emas kecoklatan** untuk aksen/typography tertentu.
- **Tipografi:** heading serif bergaya klasik/elegan; body font yang mudah dibaca. **Nama font spesifik dan nilai HEX belum ditentukan**, jadi developer memilih lalu menguji kontrasnya.
- **Foto:** hero dan sejumlah section menggunakan visual besar/full-screen; section lain tanpa foto atau kombinasi foto dan teks.
- **Overlay:** shading/gradient gelap ke kiri atau kanan mengikuti posisi typography; hindari bar hitam solid yang memotong hero.

### 13.2 Navbar

- Transparent navbar di atas hero dengan gradient shading gelap tipis.
- **Sticky** saat scroll.
- Ketika scroll, dapat beralih ke coklat gelap semi-transparan dengan transisi lembut, tetap terasa menyatu dengan halaman.
- Tidak terdapat tombol WhatsApp pada navbar.
- Seluruh label navigasi berbahasa Indonesia.

### 13.3 Animasi GSAP

Gunakan fade-in, fade-up/slide-up, image reveal, typography reveal, hover halus, smooth scrolling, dan transisi navbar. **Tidak memakai parallax** atau animasi dramatis yang mengganggu. Animasi harus mendukung performa mobile dan menghormati `prefers-reduced-motion`; jika pengguna meminta pengurangan gerak, hilangkan/nonaktifkan animasi non-esensial.

## 14. Technology Stack dan Implementasi

| Lapisan | Teknologi / keputusan |
|---|---|
| Framework | **Laravel 13** sebagai target proyek; pastikan kompatibilitas environment aktual di `composer.json` |
| Bahasa backend | PHP sesuai kebutuhan versi Laravel terpasang |
| Template | Blade dan reusable Blade components |
| Styling utama | Tailwind CSS + Custom CSS |
| Grid katalog | Hanya bagian **Bootstrap Grid** agar minim benturan dengan Tailwind |
| Interaksi/animasi | JavaScript + GSAP, tanpa parallax |
| Database UAS | MySQL lokal |
| Bundler | Vite |
| Kolaborasi | Git dan GitHub |
| Runtime/demonstrasi | Localhost |

### 14.1 Aset dan upload

- **Aset statis:** `public/assets/images/hero/`, `about/`, `gallery/`, serta `public/assets/logos/` dan `icons/`.
- **UTS:** gambar produk statis dapat berada di `public/assets/images/products/`.
- **UAS:** foto produk yang diunggah admin dianjurkan tersimpan di `storage/app/public/products/` melalui Laravel Storage, dengan `php artisan storage:link`. Database menyimpan path relatif; file upload tidak disimpan sebagai blob di MySQL.
- Validasi ukuran, tipe MIME, dan nama file acak; kompres/resize gambar serta gunakan alt text seperlunya. Jangan menggunakan nama file pengguna mentah sebagai path publik.

### 14.2 Susunan modul yang disarankan

- `routes/web.php`: publik, login admin, dan route admin.
- `app/Http/Controllers/`: controller publik, pemesanan, tracking, serta admin produk/pesanan.
- `app/Models/`: Product, ProductImage, Order, Payment, OrderStatusHistory dan pendukung.
- `app/Http/Requests/`: validasi form produk/pesanan.
- `resources/views/layouts/`, `components/`, `pages/`, `admin/`.
- `resources/css/` dan `resources/js/` untuk Tailwind, CSS kustom, GSAP.
- `database/migrations/`, `seeders/` untuk schema dan kategori tetap.

Struktur rinci dapat mengikuti kondisi repository yang sudah berjalan dan tidak wajib persis sama.

## 15. Kebutuhan Nonfungsional

| ID | Kebutuhan | Kriteria yang dapat diuji |
|---|---|---|
| NFR-01 | Responsive Design | Halaman utama, katalog, detail, form, dan dashboard dapat digunakan tanpa horizontal overflow pada mobile, tablet, desktop |
| NFR-02 | Performance | Gambar dikompres dan diberi ukuran sesuai kebutuhan; lazy load gambar non-kritis; animasi GSAP tidak menghambat interaksi utama |
| NFR-03 | Basic SEO | Setiap halaman publik memiliki title dan meta description yang sesuai, semantic HTML, heading terstruktur, alt text pada gambar informatif |
| NFR-04 | Security | Validasi server-side, CSRF, autentikasi dan otorisasi admin, hashing password, pembatasan tracking, perlindungan PII, validasi upload |
| NFR-05 | Accessibility | Kontras teks di atas foto memadai, kontrol dapat dipakai keyboard, label form jelas, status/error mudah dipahami, reduced motion didukung |
| NFR-06 | Cross-browser | Alur utama diuji pada browser modern Chrome, Edge, Firefox, Safari sejauh perangkat uji tersedia |
| NFR-07 | Maintainability | Komponen Blade digunakan ulang, penamaan file konsisten, logika bisnis tidak ditempatkan dalam view, perubahan terkelola lewat Git |

**Catatan:** Nilai ambang spesifik (misalnya LCP, skor Lighthouse, target waktu respons) belum disepakati, sehingga tidak diklaim sebagai target numerik kontraktual. Tim dapat menambahkannya saat perencanaan testing.

## 16. Keamanan dan Privasi

1. Gunakan validasi server-side untuk seluruh form dan aksi admin; jangan hanya mengandalkan JavaScript.
2. Admin tunggal tidak berarti password sederhana; gunakan password hash, login yang dilindungi dan session yang aman.
3. Tracking memakai token/kode acak berentropi memadai, bukan ID berurutan sederhana; gunakan rate limiting untuk mencegah enumerasi.
4. Halaman tracking publik tidak menampilkan nama lengkap, alamat detail, nomor WA, bukti pembayaran, atau catatan internal.
5. Minimalkan pengumpulan data pembeli dan batasi akses ke admin; jangan menaruh nomor WA/alamat dalam log publik atau URL query.
6. File upload hanya untuk admin; batasi ukuran/tipe, simpan di path yang terkontrol.
7. Aksi verifikasi pembayaran dan pengurangan stok harus idempoten dan atomik (transaction/row locking atau strategi ekuivalen) untuk mencegah verifikasi ganda dan overselling.
8. Jika website nantinya dipublikasikan, lakukan evaluasi tambahan tentang HTTPS, backup, kebijakan privasi, retensi data, serta ketentuan konsumen sebelum go-live.

## 17. Acceptance Criteria / Uji Penerimaan

### 17.1 UTS

- **AC-UTS-01:** Keenam halaman publik dapat diakses dengan navigasi yang benar.
- **AC-UTS-02:** Katalog menampilkan produk statis dan detail masing-masing tanpa database.
- **AC-UTS-03:** Tombol WA membuka nomor/kontak yang disiapkan studio (jika perangkat online).
- **AC-UTS-04:** Navbar sticky dengan shading halus, bukan blok hitam solid; tidak ada tombol WA pada navbar.
- **AC-UTS-05:** Home berisi hero, about preview, featured products, gallery preview, CTA WA, footer; tidak ada section keunggulan khusus.
- **AC-UTS-06:** Tampilan terbaca di mobile dan desktop; motion halus dan tidak menggunakan parallax.

### 17.2 UAS — Produk

- **AC-UAS-01:** Admin tunggal berhasil login/logout; pengguna biasa tidak bisa membuka route admin.
- **AC-UAS-02:** Admin dapat CRUD produk, memilih satu dari empat kategori tetap, dan mengunggah beberapa foto.
- **AC-UAS-03:** Percobaan mengubah jenis pemesanan produk yang sudah tersimpan ditolak oleh server.
- **AC-UAS-04:** Katalog mendukung filter kategori dan filter jenis pemesanan secara bersamaan.
- **AC-UAS-05:** Harga Ready Stock tampil tetap; PO tampil “Mulai dari”; estimasi PO tidak wajib pada produk.

### 17.3 UAS — Pemesanan dan tracking

- **AC-UAS-06:** Pembeli dapat mengajukan 1 produk dengan quantity ≥1 tanpa login/keranjang dan memperoleh kode tracking.
- **AC-UAS-07:** Jumlah pesanan Ready Stock yang melampaui stok ditolak; stok 0 tidak dapat dipesan.
- **AC-UAS-08:** Quantity PO >100 dapat diajukan; admin tetap wajib menyepakati kapasitas produksi sebelum konfirmasi.
- **AC-UAS-09:** Metode ambil, kurir, dan antar/pasang tersedia; admin dapat mencatat perubahan metode final.
- **AC-UAS-10:** Tracking dengan kode valid menunjukkan progres dan pembayaran terkait; kode salah memberi respons netral; PII sensitif tidak ditampilkan.

### 17.4 UAS — Pembayaran, stok, dan pembatalan

- **AC-UAS-11:** Admin dapat mencatat verifikasi transfer penuh Ready Stock dan stok berkurang tepat sebesar quantity **sekali saja**.
- **AC-UAS-12:** Verifikasi berulang atau kondisi stok tidak cukup tidak mengurangi stok dua kali maupun membuat stok negatif.
- **AC-UAS-13:** Admin memasukkan harga final PO; sistem menghitung DP 50% dan pelunasan 50% dengan benar.
- **AC-UAS-14:** Pembayaran PO bergerak dari DP belum dibayar hingga Lunas; status pembayaran tidak disatukan dengan status pengerjaan.
- **AC-UAS-15:** PO tidak dapat ditandai telah diserahkan/selesai sebelum pelunasan diverifikasi.
- **AC-UAS-16:** Pembatalan hanya diproses melalui admin setelah komunikasi WA. Ready Stock lunas tidak dapat dibatalkan melalui alur normal; PO dengan DP terverifikasi mencatat ketentuan DP tidak kembali.
- **AC-UAS-17:** Dashboard menampilkan keenam metrik dari data aktual.

### 17.5 Uji skenario negatif penting

- Form quantity 0, negatif, desimal, atau field wajib kosong → ditolak.
- Pengunjung mencoba mengakses aksi admin → ditolak.
- Bukti pembayaran diklaim pembeli tetapi belum diverifikasi admin → status belum menjadi Lunas.
- Dua permintaan verifikasi stok berbarengan pada sisa 1 unit → tidak membuat stok negatif.
- Kode tracking salah/diulang terus-menerus → tidak membocorkan identitas pembeli; pembatasan percobaan bekerja.
- Foto upload dengan tipe tidak didukung/terlalu besar → ditolak dengan pesan validasi.

## 18. Alur Kerja Pengembangan dan Prioritas

### 18.1 Fase UTS

1. Tetapkan struktur proyek dan reusable layout.
2. Siapkan aset dan konten statis studio.
3. Bangun Beranda + navbar/footer sesuai konsep visual.
4. Implementasi Tentang Kami, Katalog, Detail Produk, Galeri, dan Kontak.
5. Tambahkan WA CTA, responsivitas, GSAP ringan, basic SEO.
6. Uji lokal lintas ukuran layar dan browser.

### 18.2 Fase UAS

1. Buat migrasi MySQL, seed kategori tetap, akun admin awal.
2. Migrasikan data katalog produk ke database dan upload multi-gambar.
3. Implementasi login admin, dashboard, CRUD produk, dan stok.
4. Implementasi filter katalog dan detail dinamis.
5. Implementasi pengajuan pesanan tanpa akun, kode tracking, admin pesanan.
6. Implementasi kesepakatan harga PO, DP/pelunasan, status pembayaran terpisah, dan validasi penyerahan.
7. Implementasi verifikasi stok atomik dan audit perubahan status.
8. Implementasi tracking publik yang aman.
9. Uji acceptance criteria, edge cases, dan demonstrasi localhost.

### 18.3 Prioritas

- **P0 (wajib UAS):** admin login, CRUD produk, kategori tetap, formulir pesanan, kode tracking, status pesanan + pembayaran terpisah, aturan stok, aturan DP/pelunasan.
- **P1 (penting):** multi-foto produk, filter gabungan, dashboard statistik, riwayat status, validasi keamanan/privasi.
- **P2 (penyempurnaan):** polish animasi, optimasi lebih lanjut, dokumentasi developer, penyempurnaan tampilan status.

Prioritas ini **usulan eksekusi**, bukan pengurangan fitur yang telah disepakati.

## 19. Dependensi, Risiko, dan Mitigasi

| Risiko/dependensi | Dampak | Mitigasi |
|---|---|---|
| Foto/teks asli studio belum lengkap | Konten demo kurang representatif | Siapkan placeholder berlisensi/izin yang jelas; ganti dengan aset final |
| Produk Ready Stock dipesan banyak pembeli sebelum transfer | Potensi stok tidak cukup saat verifikasi | Validasi ulang secara atomik; komunikasi admin sebelum menerima pembayaran |
| Harga PO berbeda dari harga mulai | Potensi salah paham | Label harga awal jelas; harga final wajib disepakati dan dicatat sebelum DP |
| DP hangus tidak dipahami pembeli | Komplain/sengketa | Informasi kebijakan eksplisit dan persetujuan sebelum DP; verifikasi kepatuhan sebelum digunakan publik |
| Pengiriman/pemasangan kompleks | Ongkos/jadwal tidak pasti | Konfirmasi manual via WA; simpan metode final/catatan biaya |
| Satu akun admin | Ketersediaan akun dan keamanan akses | Password kuat, prosedur reset melalui developer, tidak membagi kredensial sembarangan |
| Tailwind + Bootstrap | CSS saling menimpa | Impor Bootstrap Grid saja, buat aturan penamaan/style yang jelas |
| GSAP dan gambar besar | Halaman berat di mobile | Optimasi aset, animasi ringan, reduced motion |
| Belum hosting | Tidak dapat diuji sebagai layanan publik | Scope demo localhost; uji fungsi dan alur lokal |
| Versi lingkungan Laravel/PHP | Ketidakcocokan paket | Verifikasi versi aktual Composer/PHP dan dependensi GSAP/Tailwind saat setup |

## 20. Keputusan Tetap dan Hal yang Belum Ditentukan

### 20.1 Telah diputuskan

- Bahasa Indonesia; localhost; Laravel 13 sebagai target; MySQL pada UAS.
- Beranda enam section tanpa bagian khusus “keunggulan”.
- Dark Luxury Classical brown-gold, navbar sticky transparent dengan shading, GSAP tanpa parallax.
- Katalog statis UTS, dinamis+dua filter UAS.
- Satu admin, tanpa akun pembeli, tanpa keranjang, tanpa payment gateway.
- Empat kategori tetap; jenis pemesanan tidak dapat diedit.
- Ready Stock pembayaran penuh, PO harga mulai + final hasil kesepakatan, DP 50% tidak kembali sejak dibayar, pelunasan sebelum penyerahan.
- Status pembayaran dan pesanan terpisah; WA untuk komunikasi/konfirmasi; tracking via kode.
- Galeri, featured products, Home/About/Contact tetap dikelola melalui kode.

### 20.2 Detail operasional yang masih perlu disiapkan saat implementasi

1. **Konten asli:** nama/alamat studio, nomor WhatsApp, foto dan narasi final, daftar produk, harga contoh.
2. **Branding presisi:** logo, font yang dipilih, HEX palet, copywriting hero.
3. **Validasi bentuk data:** satuan berat/dimensi, batas upload file, format WA yang diterima.
4. **Kebijakan kasus luar biasa:** refund di luar DP jika terjadi kesalahan studio atau pembatalan setelah pelunasan; penanganan pembayaran masuk saat stok ternyata habis.
5. **Ketentuan admin:** kredensial awal dibuat aman; prosedur reset lokal.
6. **Rincian UX:** posisi akses tracking UAS, tata letak form dan konfirmasi kebijakan DP.

Butir ini adalah detail penyelesaian, **bukan persyaratan baru yang diam-diam dianggap telah disetujui**. Jika tugas kuliah berhenti di localhost, data demonstrasi dapat dipakai secara jelas sebagai data contoh, bukan transaksi riil.

## 21. Definition of Done

Satu fitur dianggap selesai jika: perilaku sesuai requirement dan fase, validasi server-side berjalan, alur sukses dan gagal diuji, layout responsif, error tidak mengungkap informasi sensitif, perubahan dikomit dengan pesan yang jelas, dan demo lokal dapat dijalankan ulang dari instruksi setup. Fase UTS selesai setelah AC-UTS lulus; fase UAS selesai setelah AC-UAS yang relevan lulus dan database beserta data demo dapat disiapkan ulang.

---

**Penutup:** PRD ini adalah acuan bersama tim KAMASAN ART. Perubahan scope sesudah baseline disetujui sebaiknya dicatat sebagai revisi dokumen (versi, alasan, dan dampaknya terhadap UTS/UAS) agar implementasi tetap konsisten.
