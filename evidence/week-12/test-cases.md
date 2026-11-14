# TEST CASES – KURSUSKU

## Meeting 12 – Relasi Database dan Eloquent ORM

### 1. Informasi Pengujian

| Keterangan | Detail |
|---|---|
| Nama Proyek | KursusKu |
| Framework | Laravel |
| Database | MySQL |
| Materi | Relasi Database dan Eloquent ORM |
| Tanggal Pengujian | 14 November 2026 |
| Status | Berhasil |

### 2. Daftar Test Case

| No. | Pengujian | Langkah Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|---|
| 1 | Membuat tabel participants | Menjalankan migration | Tabel participants berhasil dibuat | Berhasil | PASS |
| 2 | Mengubah tabel enrollments | Menjalankan migration relasi | Kolom participant_id dan status berhasil ditambahkan | Berhasil | PASS |
| 3 | Relasi Participant ke Enrollment | Mengakses `$participant->enrollments` | Data pendaftaran peserta tampil | Berhasil | PASS |
| 4 | Relasi Enrollment ke Participant | Mengakses `$enrollment->participant` | Data peserta tampil | Andi Saputra | PASS |
| 5 | Relasi Enrollment ke Course | Mengakses `$enrollment->course` | Data kursus tampil | Web Dasar | PASS |
| 6 | Relasi Participant ke Course | Mengakses `$participant->courses` | Daftar kursus peserta tampil | Web Dasar | PASS |
| 7 | Relasi Course ke Participant | Mengakses `$course->participants` | Daftar peserta kursus tampil | Andi Saputra | PASS |
| 8 | Menghitung pendaftaran kursus | Menggunakan `count()` | Jumlah pendaftaran tampil | 1 | PASS |
| 9 | Menghitung pendaftaran peserta | Menggunakan `count()` | Jumlah pendaftaran tampil | 1 | PASS |
| 10 | Eager Loading | Menggunakan `with(['participant', 'course'])` | Data peserta dan kursus tampil bersama | Berhasil | PASS |
| 11 | Validasi pendaftaran ganda | Mendaftarkan Andi Saputra ke Web Dasar untuk kedua kalinya | Sistem menolak pendaftaran ganda | Pesan validasi ditampilkan | PASS |
| 12 | Laporan Enrollment | Membuka halaman `/enrollments` | Halaman laporan dapat ditampilkan | Berhasil | PASS |
| 13 | Cascade Delete Course | Menghapus kursus dummy dan memeriksa enrollment | Enrollment terkait ikut terhapus | Jumlah berubah dari 1 menjadi 0 | PASS |
| 14 | Cascade Delete Participant | Menghapus peserta dummy dan memeriksa enrollment | Enrollment terkait ikut terhapus | Jumlah berubah dari 1 menjadi 0 | PASS |

### 3. Kesimpulan

Berdasarkan pengujian yang dilakukan, seluruh test case berhasil dijalankan. Relasi database antara tabel participants, courses, dan enrollments berjalan dengan baik menggunakan Eloquent ORM pada Laravel.

Pengujian juga membuktikan bahwa validasi pendaftaran ganda berfungsi, halaman laporan enrollment dapat ditampilkan, serta mekanisme Cascade Delete pada Course dan Participant berjalan sesuai harapan.