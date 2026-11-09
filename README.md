# KAMASAN ART
### A Living Heritage — Where Tradition Becomes Art

KAMASAN ART adalah proyek pengembangan website berbasis Laravel yang bertujuan memperkenalkan seni lukis tradisional Wayang Kamasan dari Bali serta membantu studio atau pelaku UMKM dalam menampilkan karya dan produk mereka secara digital.

Website ini dirancang sebagai galeri digital dan katalog produk yang menggabungkan unsur seni tradisional dengan tampilan website modern.

---

## 1. Project Information

| Informasi | Keterangan |
|---|---|
| Nama Proyek | KAMASAN ART |
| Kategori | Website UMKM / Digital Art Gallery |
| Framework | Laravel |
| Bahasa Pemrograman | PHP |
| Frontend | Blade, Tailwind CSS, JavaScript |
| Database | Belum menggunakan database (UTS) |
| Version Control | Git & GitHub |
| Status | Development |

## 2. Project Objectives

Tujuan pengembangan KAMASAN ART:

1. Memperkenalkan seni lukis Wayang Kamasan kepada masyarakat luas.
2. Menyediakan media digital untuk menampilkan karya dan produk UMKM.
3. Menyajikan informasi mengenai sejarah dan nilai budaya Wayang Kamasan.
4. Membantu calon pembeli mengenal produk dan menghubungi studio.

## 3. Project Scope

### Fitur Utama

| Fitur | Deskripsi |
|---|---|
| Landing Page | Halaman utama yang memperkenalkan KAMASAN ART. |
| About | Informasi mengenai studio dan seni Wayang Kamasan. |
| Heritage | Informasi sejarah dan nilai budaya Wayang Kamasan. |
| Our Collection | Menampilkan daftar produk atau karya. |
| Product Detail | Menampilkan informasi detail setiap produk. |
| Contact | Informasi kontak dan cara menghubungi studio. |

### Batasan Proyek UTS

Untuk tahap UTS, website dikembangkan tanpa database.

- Data produk menggunakan array di Controller.
- Data ditampilkan menggunakan Blade.
- Tidak terdapat fitur CRUD.
- Tidak terdapat sistem autentikasi.
- Pemesanan dapat diarahkan melalui WhatsApp apabila mekanisme pemesanan studio sudah tersedia.

Pengembangan database dan fitur CRUD dapat dipertimbangkan pada tahap berikutnya sesuai kebutuhan UAS.

## 4. Team Members & Responsibilities

Pembagian tanggung jawab awal kelompok:

| Anggota | Peran | Tanggung Jawab |
|---|---|---|
| Anggota 1 | Laravel & Integration | Routing, Controller, integrasi dan pengembangan Laravel. |
| Anggota 2 | UI/UX & Frontend | Wireframe, desain antarmuka dan landing page. |
| Anggota 3 | Frontend Developer | Katalog produk, detail produk dan responsive design. |
| Anggota 4 | Content & Documentation | Pengumpulan informasi UMKM, aset gambar, dokumentasi dan belajar Blade. |

**Catatan:** Pembagian ini bersifat sementara dan dapat disesuaikan berdasarkan perkembangan kemampuan masing-masing anggota.

Setiap anggota tetap diharapkan memahami dasar Laravel, khususnya Routing, Controller, Blade, dan alur pengiriman data.

## 5. Technology Stack

Teknologi yang digunakan dalam proyek:

- **Laravel:** Backend framework.
- **PHP:** Bahasa pemrograman utama.
- **Blade:** Template engine Laravel.
- **Tailwind CSS:** Styling dan pengembangan antarmuka.
- **JavaScript:** Interaksi pada halaman website.
- **Git:** Version control.
- **GitHub:** Kolaborasi dan penyimpanan source code.

## 6. Project Structure

Struktur direktori yang direncanakan:

```text
app/
└── Http/
    └── Controllers/
        ├── HomeController.php
        ├── ProductController.php
        └── ContactController.php

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php
    ├── components/
    │   ├── navbar.blade.php
    │   └── footer.blade.php
    ├── products/
    │   ├── index.blade.php
    │   └── detail.blade.php
    ├── home.blade.php
    └── contact.blade.php

routes/
└── web.php

public/
└── images/
    ├── hero/
    ├── products/
    ├── gallery/
    ├── studio/
    └── heritage/
```

Struktur tersebut merupakan rancangan awal dan dapat berubah mengikuti kebutuhan pengembangan.

## 7. Development Workflow

Tahapan pengembangan proyek:

1. Planning dan analisis kebutuhan.
2. Observasi studio dan pengumpulan informasi.
3. Pengumpulan foto serta aset visual.
4. Pembuatan wireframe dan desain UI/UX.
5. Persiapan project Laravel.
6. Pengembangan halaman menggunakan Blade dan Tailwind CSS.
7. Integrasi Routing, Controller, dan data.
8. Testing dan debugging.
9. Evaluasi serta persiapan presentasi.

## 8. Git & GitHub Workflow

Branch yang digunakan:

```text
main
└── develop
    ├── feature/landing-page
    ├── feature/product-catalog
    ├── feature/product-detail
    └── feature/contact
```

Ketentuan kolaborasi:

- `main` digunakan untuk versi proyek yang stabil.
- `develop` digunakan untuk integrasi pekerjaan.
- Setiap anggota mengembangkan fitur melalui branch masing-masing.
- Perubahan digabungkan melalui Pull Request.
- Hindari mengubah file yang sama secara bersamaan tanpa koordinasi.
- Lakukan commit secara berkala dengan pesan yang jelas.

Contoh commit:

```bash
git add .
git commit -m "feat: create landing page"
git push origin feature/landing-page
```

## 9. Installation & Setup

### Requirements

Pastikan perangkat sudah memiliki:

- PHP
- Composer
- Node.js dan npm
- Git

### Installation

Clone repository:

```bash
git clone <REPOSITORY_URL>
```

Masuk ke direktori proyek:

```bash
cd KAMASAN-ART
```

Install dependency PHP:

```bash
composer install
```

Install dependency frontend:

```bash
npm install
```

Buat file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Jalankan development server:

```bash
php artisan serve
```

Jalankan Vite untuk frontend:

```bash
npm run dev
```

Buka website melalui:

```text
http://127.0.0.1:8000
```

## 10. Project Status

Status pengerjaan saat ini:

- [ ] Planning dan pembagian tugas.
- [ ] Observasi dan pengumpulan informasi studio.
- [ ] Pengumpulan aset visual.
- [ ] Pembuatan wireframe.
- [ ] Laravel project setup.
- [ ] Implementasi landing page.
- [ ] Implementasi katalog produk.
- [ ] Implementasi detail produk.
- [ ] Implementasi contact page.
- [ ] Testing dan debugging.
- [ ] Finalisasi proyek UTS.

---

## 11. Notes

Proyek ini dikembangkan sebagai bagian dari pembelajaran Pemrograman Web Framework menggunakan Laravel.

Informasi mengenai studio, sejarah, karya, dan produk akan disesuaikan berdasarkan hasil observasi serta konfirmasi dari pihak terkait.

Dokumentasi ini akan diperbarui mengikuti perkembangan proyek KAMASAN ART.