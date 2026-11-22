# TEST MATRIX – KURSUSKU

### MEETING 13 – SEARCH, FILTER, PAGINATION, DAN AJAX

## 1. INFORMASI PENGUJIAN

| Keterangan | Detail |
|---|---|
| Nama Proyek | KursusKu |
| Framework | Laravel |
| Database | MySQL |
| Materi | Search, Filter, Pagination, dan AJAX |
| Jenis Pengujian | Pengujian Fungsional (Functional Testing) |
| Objek Pengujian | Halaman Manajemen Kursus |

## 2. HASIL PENGUJIAN

Pengujian dilakukan terhadap fitur pencarian, filter status, pagination, dan AJAX pada halaman Manajemen Kursus aplikasi KursusKu. Pengujian bertujuan untuk memastikan seluruh fitur berjalan sesuai dengan kebutuhan dan skenario yang telah ditentukan.

Pengujian pencarian dilakukan dengan beberapa kondisi, yaitu pencarian yang tidak menghasilkan data, pencarian yang menghasilkan satu data, pencarian dengan jumlah data lebih dari 10, serta pencarian menggunakan kata kunci yang mengandung spasi. Pengujian filter dan pagination dilakukan untuk memastikan sistem dapat mempertahankan kata kunci pencarian dan status filter ketika pengguna berpindah ke halaman 2.

Selain pengujian wajib, dilakukan pengujian tambahan terhadap fitur AJAX yang meliputi live search, perubahan filter status, pagination AJAX, reset pencarian dan filter, navigasi Back dan Forward browser, serta GET fallback ketika JavaScript dinonaktifkan.

Berdasarkan pengujian yang telah dilakukan, fitur pencarian dapat menampilkan hasil sesuai kata kunci, menangani kondisi data kosong, serta mendukung pencarian menggunakan kata kunci dengan spasi. Pagination dapat membatasi tampilan maksimal 10 data pada setiap halaman. Filter status dan parameter pencarian juga tetap tersimpan ketika pengguna berpindah halaman.

Fitur AJAX dapat memperbarui hasil pencarian, filter, dan pagination tanpa melakukan reload halaman penuh. Tombol reset dapat menghapus pencarian dan filter, navigasi Back dan Forward browser berjalan, serta pencarian tetap berfungsi melalui GET ketika JavaScript dinonaktifkan.

## 3. TABEL HASIL PENGUJIAN WAJIB

| No | Skenario Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| 1 | Pencarian 0 hasil | Menampilkan pesan data kosong tanpa error. | Sistem menampilkan pesan data kosong dan tidak terjadi error. | PASS |
| 2 | Pencarian 1 hasil | Menampilkan tepat satu data kursus sesuai kata kunci. | Pencarian TEST-13 menampilkan tepat satu kursus, yaitu Tes Pagination. | PASS |
| 3 | Pencarian lebih dari 10 hasil | Menampilkan maksimal 10 data pada setiap halaman dan menyediakan pagination. | Halaman pertama menampilkan maksimal 10 data kursus dan tersedia pagination ke halaman berikutnya. | PASS |
| 4 | Kata kunci dengan spasi | Pencarian kata kunci yang mengandung spasi berjalan dengan benar. | Pencarian Web Dasar menampilkan hasil sesuai kata kunci. | PASS |
| 5 | Filter status dan halaman 2 | Filter status tetap aktif dan data halaman 2 sesuai filter. | Kata kunci dan filter status tetap tersimpan ketika membuka halaman 2, dan data ditampilkan sesuai filter. | PASS |

## 4. TABEL HASIL PENGUJIAN TAMBAHAN AJAX

| No | Skenario Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| 1 | Live Search AJAX | Hasil pencarian diperbarui tanpa reload halaman penuh. | Live search berjalan menggunakan AJAX dengan debounce sekitar 300 ms dan hasil diperbarui tanpa reload halaman penuh. | PASS |
| 2 | Filter Status AJAX | Daftar kursus diperbarui sesuai status yang dipilih tanpa reload halaman penuh. | Perubahan filter status memperbarui hasil kursus melalui AJAX. | PASS |
| 3 | Pagination AJAX | Sistem berpindah halaman dan memperbarui data tanpa reload halaman penuh. | Navigasi pagination melalui AJAX berjalan, data berubah dan URL ikut diperbarui. | PASS |
| 4 | Reset Pencarian dan Filter | Kata kunci dan filter dihapus, kemudian daftar kursus awal ditampilkan kembali. | Tombol reset menghapus pencarian dan filter, lalu menampilkan kembali daftar kursus. | PASS |
| 5 | Navigasi Back dan Forward | Tampilan menyesuaikan riwayat URL ketika pengguna menggunakan tombol Back dan Forward browser. | Navigasi Back dan Forward berjalan dan tampilan menyesuaikan URL sebelumnya atau berikutnya. | PASS |
| 6 | GET Fallback tanpa JavaScript | Pencarian tetap berfungsi menggunakan GET ketika JavaScript dinonaktifkan. | Pencarian tetap berjalan menggunakan GET dan halaman dimuat ulang. | PASS |

## 5. KESIMPULAN

Berdasarkan hasil pengujian terhadap fitur Search, Filter, Pagination, dan AJAX pada aplikasi KursusKu, fitur-fitur yang diuji telah berjalan sesuai dengan hasil yang diharapkan.

Sistem dapat menangani pencarian dengan 0 hasil, pencarian dengan 1 hasil, pencarian lebih dari 10 data, pencarian menggunakan kata kunci yang mengandung spasi, serta kombinasi filter status dengan pagination halaman 2.

Fitur tambahan AJAX juga berjalan dengan baik, meliputi live search, filter status, pagination, reset, navigasi Back dan Forward browser, serta GET fallback ketika JavaScript dinonaktifkan.

Dengan demikian, fitur Manajemen Kursus pada aplikasi KursusKu telah berhasil diuji sesuai skenario pengujian Praktikum Pertemuan 13.