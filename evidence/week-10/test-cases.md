# TEST CASES – KURSUSKU
## Praktikum Pertemuan 10

### A. Tabel Pengujian

| No. | Fitur yang Diuji | Skenario Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|---|
| 1 | Menampilkan Data Kursus | Membuka halaman `/courses` | Sistem menampilkan daftar kursus yang tersimpan di database | Halaman berhasil menampilkan 8 data kursus | PASS |
| 2 | Struktur Database | Memeriksa tabel `courses` melalui phpMyAdmin | Tabel memiliki kolom sesuai kebutuhan aplikasi | Struktur tabel courses berhasil diperiksa | PASS |
| 3 | Menambahkan Data Kursus | Membuka `/courses/create` dan mengisi formulir dengan data valid | Sistem menyimpan data kursus ke database | Data kursus berhasil ditambahkan | PASS |
| 4 | Validasi Kode Kursus | Mengosongkan kolom kode saat menambahkan kursus | Sistem menampilkan pesan bahwa kode wajib diisi | Sistem menampilkan pesan validasi | PASS |
| 5 | Validasi Kode Duplikat | Memasukkan kode kursus yang sudah terdaftar | Sistem menolak kode kursus yang sudah digunakan | Sistem menampilkan pesan validasi kode duplikat | PASS |
| 6 | Validasi Biaya Kursus | Memasukkan nilai biaya negatif | Sistem menolak nilai biaya yang tidak valid | Sistem menolak input biaya negatif | PASS |
| 7 | Validasi Kuota Kursus | Mengosongkan kolom kuota | Sistem menampilkan pesan bahwa kuota wajib diisi | Sistem menampilkan pesan validasi | PASS |
| 8 | Mengubah Data Kursus | Membuka halaman Edit dan mengubah informasi kursus | Sistem memperbarui data kursus di database | Data kursus berhasil diperbarui | PASS |
| 9 | Menghapus Data Kursus | Menghapus data kursus melalui tombol Hapus | Sistem menghapus data kursus yang dipilih | Data kursus berhasil dihapus | PASS |
| 10 | Menampilkan Status Kursus | Memeriksa status setiap kursus pada halaman daftar | Sistem menampilkan status Open, Draft, atau Closed sesuai data | Status kursus berhasil ditampilkan | PASS |

### B. Keterangan

- PASS: Pengujian berhasil dan hasil sesuai dengan yang diharapkan.
- FAIL: Pengujian tidak berhasil atau hasil tidak sesuai dengan yang diharapkan.

### C. Kesimpulan

Berdasarkan pengujian yang dilakukan pada aplikasi KursusKu, fitur pengelolaan data kursus telah berjalan sesuai dengan kebutuhan. Pengujian mencakup pemeriksaan struktur database, menampilkan data kursus, menambahkan data, validasi input, mengubah data, menghapus data, serta menampilkan status kursus.

Hasil pengujian menunjukkan bahwa seluruh skenario berjalan sesuai dengan hasil yang diharapkan. Dengan demikian, implementasi fitur pengelolaan data kursus pada Praktikum Pertemuan 10 telah berhasil diselesaikan.
