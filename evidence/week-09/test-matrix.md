TEST MATRIX — PRAKTIKUM PERTEMUAN 9

Nama Proyek: KursusKu
Framework: Laravel 13.39.0
Bahasa Pemrograman: PHP 8.3.33
Database: SQLite

No.| Skenario Pengujian| Hasil yang Diharapkan| Status
1| Membuka halaman Home| Halaman utama KursusKu tampil dengan layout dan navbar.| BELUM DIUJI
2| Mengubah ukuran viewport| Tampilan halaman dan navbar menyesuaikan ukuran layar.| BELUM DIUJI
3| Membuka halaman pendaftaran| Formulir pendaftaran kursus tampil tanpa error.| BELUM DIUJI
4| Membiarkan pilihan kursus kosong| Sistem menampilkan instruksi untuk memilih kursus.| BELUM DIUJI
5| Memilih Web Dasar| Sistem menampilkan 12 kursi tersisa.| BELUM DIUJI
6| Memilih PHP Dasar| Sistem menampilkan 8 kursi tersisa.| BELUM DIUJI
7| Memilih Laravel Dasar| Sistem menampilkan 4 kursi tersisa.| BELUM DIUJI
8| Mengirim formulir dengan nama dan email valid| Data pendaftaran berhasil disimpan dan pesan sukses tampil.| BELUM DIUJI
9| Mengirim formulir dengan email tidak valid| Sistem menampilkan pesan validasi email.| BELUM DIUJI
10| Memeriksa request pada tab Network| Request availability berstatus 200 dan respons berupa JSON.| BELUM DIUJI
11| Memeriksa tabel courses| Data kursus dapat diakses dari database SQLite.| SUDAH DIBUAT, DATA BELUM DIPERIKSA
12| Memeriksa tabel enrollments| Data pendaftaran tersimpan di database setelah formulir berhasil dikirim.| BELUM DIUJI

Kesimpulan

Pengujian aplikasi KursusKu dilakukan untuk memastikan halaman utama, formulir pendaftaran, validasi input, penyimpanan data, dan fitur ketersediaan kursus berjalan sesuai dengan kebutuhan.

Status pengujian akan diperbarui menjadi PASS apabila fitur berhasil diuji dan memberikan hasil sesuai harapan. Jika hasil pengujian belum sesuai, status akan dicatat sebagai FAIL dan dilakukan perbaikan.

Dokumentasi Pengujian

1. Screenshot halaman Home.
2. Screenshot halaman formulir pendaftaran.
3. Screenshot validasi formulir.
4. Screenshot pesan sukses setelah pendaftaran.
5. Screenshot database yang menunjukkan data pendaftaran.
6. Screenshot tab Network yang menunjukkan respons JSON.

Catatan: Dokumentasi dan status pengujian dilengkapi berdasarkan hasil pengujian aktual aplikasi.