# Jessy Rosinta, Personal Branding Website

Tugas AFL-1 Web Development. Website personal branding berbasis **Laravel 12** yang memperkenalkan profil, karya, dan tulisan Jessy Rosinta.

Portofolio memuat dua sistem yang sudah online, [TARA](https://tara-jr.com) (administrasi perjalanan dinas dan rapat luar kantor, dibangun dengan PHP native) dan [Garuda Bersinar](https://garudabersinar.com) (pendampingan rehabilitasi berkelanjutan, dibangun dengan Laravel), ditambah dua studi kasus perancangan.

## Halaman

| URL | Isi |
|---|---|
| `/` | Perkenalan, bidang minat, dua proyek unggulan, cara kerja, dua artikel terbaru |
| `/about` | Profil, pendidikan, pengalaman, keahlian |
| `/portfolio` | Semua proyek, dengan filter "Sudah online" dan "Studi kasus" |
| `/portfolio/{slug}` | Studi kasus per proyek: masalah, solusi, fitur, peran pengguna, teknologi |
| `/blog` | Lima artikel, dengan filter kategori |
| `/blog/{slug}` | Detail artikel dan rekomendasi bacaan lain |
| `/contact` | Email, GitHub, LinkedIn, dan tautan ke sistem yang sudah online |

Halaman yang tidak ada menampilkan halaman 404 buatan sendiri.

## Menjalankan

Panduan lengkap dari nol sampai unggah ke GitHub ada di [PANDUAN_LANGKAH.md](PANDUAN_LANGKAH.md). Ringkasnya:

Kebutuhan: PHP 8.2 atau lebih baru, Composer, dan browser modern. Tidak perlu database, Node.js, maupun `npm install`.

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Di Windows PowerShell, ganti `cp` dengan `Copy-Item .env.example .env`. Lalu buka http://127.0.0.1:8000.

Pemeriksaan cepat:

```bash
php artisan route:list
php artisan test
```

## Penerapan konsep Laravel

| Konsep | Lokasi | Penerapan |
|---|---|---|
| Routing | `routes/web.php` | Tujuh rute bernama, dua di antaranya berparameter: `/portfolio/{slug}` dan `/blog/{slug}` |
| Controller | `app/Http/Controllers/PageController.php` | Satu method per halaman. Slug yang tidak ditemukan menghasilkan 404 lewat `abort_if` |
| Pengambilan data | `app/Support/ContentRepository.php` | Membaca JSON, mengurutkan artikel, mencari per slug, menyaring proyek per jenis |
| View | `resources/views/pages/` | Home, About, Portfolio, detail proyek, Blog, detail artikel, Contact |
| Blade | seluruh `.blade.php` | `@extends`, `@section`, `@yield`, `@foreach`, `@forelse`, `@if`, `{{ }}` |
| Layout | `resources/views/layouts/app.blade.php` | Kerangka HTML, meta, navbar, footer, dan CSS/JS yang dipakai semua halaman |
| Blade Components | `resources/views/components/` | `navbar`, `footer`, `button`, `tag`, `status-pill`, `page-hero`, `section-heading`, `project-card`, `project-feature`, `article-card` |
| Berbagi data | `app/Providers/AppServiceProvider.php` | `View::share()` untuk `$profile` dan `$liveProjects` yang dipakai navbar, footer, dan halaman error |
| Halaman error | `resources/views/errors/404.blade.php` | Tampilan 404 yang konsisten dengan layout |
| Tes | `tests/Feature/WebsitePagesTest.php` | Semua halaman, semua detail artikel dan proyek, 404, dan jumlah data minimum |

Alur data: `Route` lalu `PageController` lalu `ContentRepository` lalu `View` lalu `Component`.

## Data dummy

Data ada di `resources/data/`. Untuk menggantinya cukup mengedit JSON, tanpa menyentuh Blade.

| File | Isi |
|---|---|
| `profile.json` | Identitas, pendidikan, pengalaman, keahlian, kontak |
| `projects.json` | 4 proyek: 2 sistem online dan 2 studi kasus. Field `type` (`live` atau `study`) menentukan filter |
| `articles.json` | 5 artikel dengan isi lengkap |

Ilustrasi proyek dan artikel ada di `public/assets/img/` berupa SVG orisinal. Isinya ilustrasi, bukan tangkapan layar aplikasi, karena TARA dan Garuda Bersinar memuat data pengguna.

## Desain

Bahasa visualnya mengambil dari dunia berkas administrasi: status berkas, stempel "Rampung", dan register. Palet memakai biru tinta, biru TARA, dan emas Garuda di atas kertas abu-biru. Huruf memakai Bricolage Grotesque untuk judul dan Public Sans untuk isi, dimuat dari Google Fonts dengan cadangan font sistem. Layout responsif untuk desktop, tablet, dan ponsel, dengan fokus keyboard yang terlihat dan animasi yang mengikuti pengaturan "kurangi gerakan".

Semua halaman tetap bisa dipakai tanpa JavaScript. Skrip di `public/assets/js/site.js` hanya menambahkan menu mobile, filter, tombol salin email, dan penanda progres baca.

## Sebelum dipublikasikan

Beberapa isi masih contoh dan perlu diganti dengan data asli di `resources/data/profile.json`:

- [ ] `contact.github` dan `contact.linkedin` masih tautan umum. Ganti dengan alamat profil sendiri.
- [ ] `contact.email` berisi email dari CV. Ganti bila tidak ingin dipublikasikan.
- [ ] `avatar.svg` di `public/assets/img/` bisa diganti foto profil.
- [ ] Pastikan tidak ada informasi yang belum boleh dipublikasikan pada deskripsi kedua sistem.

## Unggah ke GitHub

```bash
git init
git add .
git commit -m "Initial commit: personal branding website Laravel"
git branch -M main
git remote add origin https://github.com/USERNAME/personal-branding-laravel.git
git push -u origin main
```

Ganti `USERNAME` dengan username GitHub. File `.env` sudah ada di `.gitignore`, jadi tidak ikut terunggah.

## Penggunaan AI

AI digunakan sebagai alat bantu untuk merancang tampilan, menyusun struktur Laravel (routing, controller, view, layout, komponen Blade), menulis rancangan teks, dan menyusun dokumentasi ini. Seluruh kode perlu dibaca, dijalankan, dan dipahami sebelum dikumpulkan, terutama alur `Route` ke `PageController` ke `ContentRepository` ke `View`, cara kerja `@foreach` dan `@forelse`, serta cara komponen Blade menerima data lewat `@props`. Isi portofolio bersumber dari proposal inovasi TARA, laporan Tim Efektif, dan CV milik pemilik website.
