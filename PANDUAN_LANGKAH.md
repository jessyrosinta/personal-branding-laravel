# Panduan Langkah demi Langkah

Dari ZIP sampai link GitHub yang siap dikumpulkan. Kerjakan berurutan. Setiap langkah punya cara memastikan bahwa langkah itu berhasil.

Perkiraan waktu: 45 sampai 60 menit, sudah termasuk membaca kode.

---

## Langkah 1. Siapkan alat

Buka terminal (Windows: PowerShell atau terminal di VS Code), lalu ketik satu per satu:

```bash
php -v
composer -V
git --version
```

**Berhasil jika** ketiganya menampilkan nomor versi, dan PHP versi **8.2 atau lebih baru**.

Jika ada yang belum terpasang:

- **Windows:** pasang [Laragon](https://laragon.org/download/) versi Full. Sekali pasang sudah berisi PHP, Composer, dan Git. Setelah itu tutup dan buka lagi terminalnya.
- **Mac:** pasang PHP dan Composer lewat Homebrew (`brew install php composer`), dan Git dari git-scm.com.
- Jika `php` tidak dikenali padahal sudah dipasang, folder PHP belum masuk ke PATH. Pakai terminal bawaan Laragon, atau restart komputer.

---

## Langkah 2. Ekstrak dan buka proyek

1. Ekstrak `AFL1_WebDev_Jessy_Laravel_v2.zip`. Hasilnya folder `jessy-portfolio-laravel`.
2. Buka folder itu di VS Code (File, lalu Open Folder).
3. Buka terminal di dalamnya (Terminal, lalu New Terminal).

**Berhasil jika** perintah `ls` (Mac/Linux) atau `dir` (Windows) menampilkan `artisan`, `composer.json`, `app`, `resources`, dan `routes`.

---

## Langkah 3. Jalankan website

```bash
composer install
```

Tunggu 1 sampai 3 menit. Composer membuat folder `vendor` berisi Laravel. Butuh internet.

Lalu salin file pengaturan dan buat kunci aplikasi:

```bash
# Mac/Linux
cp .env.example .env

# Windows PowerShell
Copy-Item .env.example .env

php artisan key:generate
```

**Berhasil jika** muncul tulisan `Application key set successfully`. Jalankan server:

```bash
php artisan serve
```

Buka **http://127.0.0.1:8000** di browser. Untuk menghentikan server, tekan `Ctrl + C` di terminal.

---

## Langkah 4. Periksa semuanya

Buka halaman berikut dan pastikan tidak ada yang error:

| Alamat | Yang dicek |
|---|---|
| `/` | Animasi alur berkas di kanan atas berjalan sampai stempel "Rampung" muncul. Dua panel proyek tampil |
| `/about` | Pendidikan, pengalaman, sertifikasi, dan keahlian tampil |
| `/portfolio` | Ada 4 proyek. Tombol filter "Sudah online" dan "Studi kasus" bekerja |
| `/portfolio/tara` dan `/portfolio/garuda-bersinar` | Halaman studi kasus lengkap |
| `/blog` | Ada 5 artikel. Filter kategori bekerja. Klik "Baca selengkapnya" pada tiap artikel |
| `/contact` | Tombol "Salin alamat" menyalin email |
| `/alamat-ngawur` | Muncul halaman "Halaman tidak ditemukan" |

**Cek tampilan ponsel:** tekan `F12` di browser, lalu `Ctrl + Shift + M` (Mac: `Cmd + Shift + M`). Pilih ukuran seperti iPhone atau lebar 390 px. Menu "Menu" di kanan atas harus bisa dibuka.

Terakhir, buka terminal baru (biarkan server tetap jalan) dan jalankan:

```bash
php artisan route:list
php artisan test
```

**Berhasil jika** `route:list` menampilkan 7 rute buatan kita, dan `php artisan test` menampilkan `Tests: 6 passed`.

> Jika tes gagal, jangan lanjut. Salin pesan error-nya ke saya, lalu kita perbaiki dulu.

---

## Langkah 5. Isi data pribadi

Buka `resources/data/profile.json`. Cari bagian paling bawah:

```json
"contact": {
  "email": "jessytobing2@gmail.com",
  "github": "https://github.com/",
  "linkedin": "https://www.linkedin.com/"
}
```

1. **github:** ganti dengan alamat profil, misalnya `https://github.com/usernamekamu`.
2. **linkedin:** buka profil LinkedIn, salin alamatnya dari address bar, lalu tempel.
3. **email:** sekarang berisi email dari CV. Ganti jika tidak ingin dipublikasikan.

Simpan, lalu refresh browser. Perubahan langsung terlihat, tanpa restart.

**Opsional, memakai foto sebagai pengganti avatar JR:**

1. Simpan foto persegi (misalnya 400 x 400 px) sebagai `public/assets/img/foto.jpg`.
2. Ganti `assets/img/avatar.svg` menjadi `assets/img/foto.jpg` pada tiga file: `resources/views/components/navbar.blade.php`, `resources/views/pages/home.blade.php`, dan `resources/views/pages/about.blade.php`. Pakai fitur Find and Replace di VS Code (`Ctrl + Shift + H`).

---

## Langkah 6. Sesuaikan bagian "Penggunaan AI" di README

Buka `README.md`, cari bagian **Penggunaan AI**. Tugas mengharuskan penjelasan penggunaan AI yang jujur. Ubah kalimatnya agar sesuai dengan yang sebenarnya terjadi.

---

## Langkah 7. Unggah ke GitHub

**7a. Buat repository kosong**

1. Masuk ke github.com, klik tanda **+** di kanan atas, lalu **New repository**.
2. Nama: `personal-branding-laravel`.
3. Pilih **Public**.
4. **Jangan** centang "Add a README file", "Add .gitignore", maupun "Choose a license". Repository harus kosong.
5. Klik **Create repository**.

**7b. Kenalkan dirimu ke Git (sekali saja per komputer)**

```bash
git config --global user.name "Jessy Rosinta"
git config --global user.email "email-akun-github-kamu@contoh.com"
```

**7c. Simpan dan unggah**

```bash
git init
git add .
git status
```

Baca hasil `git status`. **Pastikan tidak ada `.env` dan tidak ada folder `vendor/`** di daftar. Keduanya sudah ada di `.gitignore`, jadi seharusnya tidak muncul. Jika muncul, berhenti dan tanyakan.

Lanjutkan:

```bash
git commit -m "Initial commit: personal branding website Laravel"
git branch -M main
git remote add origin https://github.com/USERNAME/personal-branding-laravel.git
git push -u origin main
```

Ganti `USERNAME` dengan username GitHub-mu. Jika diminta login, ikuti jendela browser yang muncul. Jika diminta password di terminal, GitHub tidak menerima password akun. Buat **Personal Access Token** di GitHub (Settings, Developer settings, Personal access tokens, centang `repo`) dan tempel sebagai password.

> Tips: Riwayat commit ikut dinilai sebagai bukti proses belajar. Jika ingin, pisahkan jadi beberapa commit, misalnya satu untuk setup Laravel, satu untuk halaman, satu untuk README. Cukup jalankan `git add` dan `git commit` beberapa kali sebelum `git push`.

---

## Langkah 8. Periksa hasil di GitHub

Refresh halaman repository, lalu pastikan:

- [ ] README tampil rapi di bawah daftar file.
- [ ] Ada folder `app`, `resources`, `routes`, `public`, `tests`.
- [ ] **Tidak ada** file `.env` dan folder `vendor`.
- [ ] Ada `.env.example`.

---

## Langkah 9. Kumpulkan

Kumpulkan **link repository**, bentuknya `https://github.com/USERNAME/personal-branding-laravel`. Bukan hanya ZIP. Buka link itu di jendela incognito untuk memastikan repository bisa dilihat tanpa login.

---

## Langkah 10. Siap menjelaskan saat evaluasi

Tugas mewajibkan kamu bisa menjelaskan kodenya. Latih satu alur ini sampai lancar, misalnya saat pengunjung membuka `/portfolio/tara`:

| Tahap | File | Yang terjadi |
|---|---|---|
| 1. Routing | `routes/web.php` | Alamat `/portfolio/{slug}` dicocokkan, `{slug}` berisi `tara`. Rute diberi nama `portfolio.show` |
| 2. Controller | `app/Http/Controllers/PageController.php`, method `project()` | Meminta data proyek, memberi 404 bila tidak ada (`abort_if`), lalu memanggil view |
| 3. Data | `app/Support/ContentRepository.php`, method `project()` | Membaca `resources/data/projects.json` dan mencari proyek dengan slug yang cocok |
| 4. View | `resources/views/pages/project.blade.php` | Menampilkan data memakai `{{ }}`, `@foreach`, dan `@if` |
| 5. Layout | `resources/views/layouts/app.blade.php` | View memakai `@extends`. Isi halaman masuk ke `@yield('content')` |
| 6. Component | `resources/views/components/` | Bagian berulang seperti `<x-tag>`, `<x-button>`, `<x-status-pill>` dipanggil dengan data lewat `@props` |
| 7. Data bersama | `app/Providers/AppServiceProvider.php` | `View::share` mengirim `$profile` ke semua view, jadi navbar dan footer tidak perlu dikirimi data satu per satu |

**Pertanyaan yang mungkin muncul, dan jawaban singkatnya**

- *Kenapa data ditaruh di JSON, bukan langsung di Blade?* Agar Blade hanya mengatur tampilan. Menambah proyek cukup mengedit JSON, dan kartunya dibuat otomatis oleh `@foreach`.
- *Apa bedanya layout dan component?* Layout adalah kerangka seluruh halaman (satu per halaman). Component adalah potongan kecil yang bisa dipakai berulang di banyak tempat.
- *Apa fungsi `@props`?* Mendeklarasikan data apa yang diterima component, termasuk nilai bawaannya.
- *Untuk apa menamai rute?* Supaya tautan dibuat dengan `route('portfolio.show', ['slug' => ...])`. Jika alamat URL berubah, tautan di seluruh website ikut benar.
- *Kenapa pakai Repository?* Controller tidak perlu tahu data berasal dari JSON. Jika nanti pindah ke database, hanya satu file yang diganti.

**Cerita yang bisa menjadi nilai tambah:** TARA kamu bangun dengan PHP native, sedangkan Garuda Bersinar dengan Laravel. Kamu bisa menjelaskan apa yang dipermudah Laravel: routing yang rapi, layout dan component Blade, serta struktur proyek yang konsisten. Ini menunjukkan kamu mengerti alasan memakai framework, bukan hanya cara memakainya.

---

## Jika ada masalah

| Gejala | Penyebab dan solusi |
|---|---|
| `composer install` gagal menyebut ekstensi (`ext-mbstring`, `ext-fileinfo`, dan lainnya) | Ekstensi PHP belum aktif. Buka `php.ini`, hapus tanda `;` di depan baris ekstensi itu, lalu jalankan ulang. Di Laragon: menu, PHP, Extensions |
| `No application encryption key has been generated` | Jalankan `php artisan key:generate` |
| Port 8000 sedang dipakai | Jalankan `php artisan serve --port=8001`, lalu buka `http://127.0.0.1:8001` |
| Halaman error 500 dan kosong | Cek `storage/logs/laravel.log`. Pada Mac/Linux jalankan `chmod -R 775 storage bootstrap/cache` |
| Perubahan CSS tidak terlihat | Tekan `Ctrl + F5` untuk refresh tanpa cache |
| Huruf terlihat biasa saja | Font dimuat dari Google Fonts, jadi butuh internet. Tanpa internet website tetap jalan dengan font cadangan |
| `git push` ditolak (rejected) | Repository di GitHub tidak kosong. Jalankan `git pull origin main --allow-unrelated-histories`, selesaikan jika ada konflik, lalu push ulang |
| `git` meminta password terus-menerus | Pakai Personal Access Token seperti di langkah 7c |

---

## Setelah itu: memperbarui website

Setiap kali mengubah sesuatu:

```bash
git add .
git commit -m "Jelaskan perubahannya di sini"
git push
```
