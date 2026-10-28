# KursusKu Laravel

**KursusKu** adalah website informasi kursus digital yang dikembangkan menggunakan Laravel. Website ini dirancang dengan tampilan modern menggunakan kombinasi warna burgundy dan putih.

## Tentang Proyek

Proyek ini dibuat untuk mempelajari pengembangan website menggunakan Laravel, PHP, Blade Template, HTML, dan CSS. Website menampilkan informasi program kursus, biaya pendaftaran, kuota peserta, serta ketersediaan kursus.

## Teknologi yang Digunakan

- PHP
- Laravel
- Blade Template
- HTML
- CSS
- Git dan GitHub

## Fitur Website

- Halaman beranda KursusKu.
- Navigasi Beranda, Kursus, dan Tentang.
- Daftar program kursus unggulan.
- Informasi biaya setiap kursus.
- Informasi kuota dan sisa kursi.
- Status kursus tersedia atau penuh.
- Desain burgundy dan putih.
- Tampilan responsif untuk desktop dan perangkat seluler.

## Struktur File Utama

```text
Kursusku-laravel/
├── app/
│   └── Http/
│       └── Controllers/
│           └── HomeController.php
├── public/
│   └── css/
│       └── style.css
├── resources/
│   └── views/
│       └── home.blade.php
├── routes/
│   └── web.php
├── screenshots/
└── README.md
```

## Cara Menjalankan Proyek

1. Pastikan PHP, Composer, dan Laravel sudah siap digunakan.
2. Buka terminal di folder proyek.
3. Jalankan perintah berikut jika dependensi belum terpasang:

   `composer install`

4. Pastikan file `.env` tersedia. Jika belum, salin `.env.example` menjadi `.env`.
5. Jalankan `php artisan key:generate` jika APP_KEY belum tersedia.
6. Jalankan server Laravel:

   `php artisan serve`

7. Buka browser dan kunjungi `http://127.0.0.1:8000`.

## Bukti Pengerjaan

Screenshot kode program, tampilan website, terminal, dan repository GitHub disimpan dalam folder `screenshots` sebagai dokumentasi pengerjaan proyek.

## Tujuan Pembelajaran

Proyek ini bertujuan untuk memahami penggunaan route, controller, Blade Template, CSS, serta pengelolaan versi kode menggunakan Git dan GitHub.

## Pengembang

Proyek pembelajaran Laravel — KursusKu.

## Lisensi

Proyek ini dibuat untuk keperluan pembelajaran.
