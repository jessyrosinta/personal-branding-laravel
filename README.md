# Personal Branding Website

**AFL-1 Web Development**

Nama: Jessy Rosinta  
NIM: 0706012424022

## Deskripsi Proyek

Website ini dibuat untuk memenuhi tugas AFL-1 mata kuliah Web Development dengan menggunakan framework Laravel.

Website ini berisi profil pribadi, latar belakang pendidikan, pengalaman, portofolio proyek, serta beberapa artikel yang berkaitan dengan teknologi dan pengembangan web.

Melalui website ini, saya mencoba menerapkan materi Laravel yang telah dipelajari, mulai dari routing, controller, view, Blade template, layout, hingga components.

## Halaman Website

Website ini memiliki beberapa halaman utama:

1. **Home** – Menampilkan perkenalan singkat, bidang yang diminati, dan beberapa proyek unggulan.
2. **About** – Berisi informasi tentang diri saya, pendidikan, pengalaman, dan keahlian.
3. **Portfolio** – Menampilkan empat proyek, termasuk TARA dan Garuda Bersinar, serta dua studi kasus.
4. **Blog** – Berisi lima artikel mengenai teknologi, pengembangan web, dan pengalaman belajar. Setiap artikel memiliki halaman detail.
5. **Contact** – Menampilkan informasi kontak dan tautan media sosial profesional.

## Implementasi Laravel

Beberapa fitur Laravel yang digunakan dalam proyek ini adalah:

- **Routing:** Mengatur alamat URL dan navigasi antarhalaman melalui `routes/web.php`.
- **Controller:** Menggunakan `PageController.php` untuk mengatur halaman dan data yang ditampilkan.
- **View dan Blade:** Menggunakan file `.blade.php` untuk menampilkan halaman dengan sintaks seperti `@foreach`, `@if`, dan `{{ }}`.
- **Layout:** Menggunakan satu layout utama agar tampilan navbar, footer, dan halaman tetap konsisten.
- **Blade Components:** Digunakan untuk membuat elemen yang dapat dipakai kembali, seperti navbar, tombol, kartu portofolio, dan kartu artikel.

Data profil, portofolio, dan blog disimpan dalam file JSON pada folder `resources/data`, sehingga kontennya dapat diubah tanpa harus mengedit setiap halaman.

## Cara Menjalankan Website

Pastikan PHP minimal versi 8.2 dan Composer sudah terinstal.

Buka terminal pada folder proyek, kemudian jalankan:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Setelah server berjalan, buka alamat berikut melalui browser:

http://127.0.0.1:8000

Untuk melihat daftar route dan menjalankan pengujian, gunakan:

```bash
php artisan route:list
php artisan test
```

## Penggunaan AI

Dalam pengerjaan tugas ini, saya menggunakan AI sebagai alat bantu untuk menyusun struktur kode, pengembangan tampilan, dan memahami penerapan fitur-fitur Laravel. Proyek ini juga menjadi sarana bagi saya untuk mempelajari hubungan antara routing, controller, view, dan Blade dalam pembuatan website.

## Penutup

Melalui tugas ini, saya dapat mempelajari bagaimana Laravel digunakan untuk membangun website dengan struktur yang lebih terorganisasi. Selain sebagai pemenuhan tugas kuliah, website ini juga dapat dikembangkan kembali sebagai portofolio pribadi.
