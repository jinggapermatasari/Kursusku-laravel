# AI LOG – KURSUSKU

## Meeting 12 – Relasi Database dan Eloquent ORM

### 1. Informasi Proyek

| Keterangan | Detail |
|---|---|
| Nama Proyek | KursusKu |
| Framework | Laravel |
| Database | MySQL |
| Materi | Relasi Database dan Eloquent ORM |
| Tanggal | 14 November 2026 |

### 2. Tujuan Penggunaan AI

AI digunakan sebagai asisten untuk membantu memahami penerapan relasi database dan Eloquent ORM pada aplikasi KursusKu, memperbaiki kendala migration, mengembangkan fitur enrollment, serta melakukan pengujian relasi antarmodel.

### 3. Aktivitas Penggunaan AI

| No. | Aktivitas | Bantuan AI |
|---|---|---|
| 1 | Membuat tabel participants | Membantu menyusun migration tabel peserta |
| 2 | Mengembangkan relasi enrollments | Membantu menambahkan participant_id dan status |
| 3 | Memperbaiki migration | Membantu mengatasi tabel enrollments yang sudah tersedia |
| 4 | Membuat model Participant | Membantu menyusun model dan relasi Eloquent |
| 5 | Memperbaiki model Enrollment | Membantu mengatur relasi belongsTo |
| 6 | Mengembangkan model Course | Membantu menambahkan relasi peserta dan pendaftaran |
| 7 | Pengujian menggunakan Tinker | Memberikan contoh pengujian pembuatan data dan relasi |
| 8 | Mengatasi error database | Membantu memperbaiki kolom name dan email yang wajib diisi |
| 9 | Pengujian Eager Loading | Membantu menguji pengambilan data peserta dan kursus |
| 10 | Pengembangan EnrollmentController | Membantu mengembangkan proses pendaftaran dan laporan enrollment |
| 11 | Validasi pendaftaran ganda | Membantu menguji agar peserta tidak mendaftar dua kali pada kursus yang sama |
| 12 | Pengujian ketersediaan kursi | Membantu menghitung jumlah peserta dan sisa kuota kursus |
| 13 | Pengujian Cascade Delete Course | Membantu menguji penghapusan enrollment ketika kursus dihapus |
| 14 | Pengujian Cascade Delete Participant | Membantu menguji penghapusan enrollment ketika peserta dihapus |
| 15 | Dokumentasi | Membantu menyusun bukti screenshot dan AI Log |

### 4. Kendala yang Ditemukan

Terjadi error saat membuat data enrollment karena kolom name pada tabel enrollments masih wajib diisi, sedangkan model baru menggunakan participant_id dan course_id.

Selain itu, diperlukan penyesuaian struktur database agar sistem tetap mendukung data pendaftaran lama.

### 5. Solusi

Membuat migration tambahan untuk mengubah kolom name dan email menjadi nullable tanpa menghapus tabel maupun data lama.

Menambahkan participant_id sebagai foreign key yang terhubung dengan tabel participants, serta menambahkan status dan unique constraint untuk mencegah pendaftaran ganda.

Selanjutnya, memperbaiki model dan controller agar proses pendaftaran, validasi, serta pengelolaan data enrollment berjalan dengan baik.

### 6. Hasil Penggunaan AI

- Migration berhasil dijalankan.
- Model Participant, Enrollment, dan Course berhasil dihubungkan.
- Relasi belongsTo, hasMany, dan belongsToMany berhasil diuji.
- Pembuatan data enrollment berhasil.
- Pengujian jumlah pendaftaran berhasil.
- Eager Loading berhasil menampilkan data peserta dan kursus.
- Validasi pendaftaran ganda berhasil diuji.
- Halaman laporan enrollment berhasil ditampilkan.
- Pengujian Cascade Delete Course berhasil.
- Pengujian Cascade Delete Participant berhasil.

### 7. Kesimpulan

Penggunaan AI membantu proses pengembangan dan pengujian relasi database pada proyek KursusKu. Seluruh pengujian relasi dan cascade delete yang dilakukan berhasil berdasarkan hasil pemeriksaan melalui Laravel Tinker.

AI juga membantu proses perbaikan kode, validasi data, serta penyusunan dokumentasi proyek. Seluruh perubahan tetap diperiksa dan diuji kembali sebelum digunakan.