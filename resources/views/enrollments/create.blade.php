@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - KursusKu')

@section('content')

{{-- NOTIFIKASI BERHASIL --}}
@if (session('success'))
    <div class="container mt-4">
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <h5 class="fw-bold mb-2">
                ✓ Pendaftaran Berhasil!
            </h5>

            <p class="mb-0">
                {{ session('success') }}
            </p>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Tutup">
            </button>
        </div>
    </div>
@endif

<section class="container py-5">

    {{-- JUDUL HALAMAN --}}
    <div class="section-heading">
        <span class="eyebrow">JOIN OUR LEARNING COMMUNITY</span>

        <h2>Mulai Perjalanan Belajarmu.</h2>

        <p>
            Lengkapi data berikut dan pilih kursus yang ingin
            kamu ikuti bersama KursusKu.
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm">
                <div class="card-body p-4 p-md-5">

                    {{-- HEADER FORMULIR --}}
                    <div class="mb-4">
                        <span class="eyebrow">REGISTRATION FORM</span>

                        <h1 class="h3 fw-bold mb-2"
                            style="color: #800020;">
                            Formulir Pendaftaran
                        </h1>

                        <p class="text-muted">
                            Isi informasi dengan benar sebelum
                            mengirim pendaftaran.
                        </p>
                    </div>

                    {{-- PESAN ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>
                                Periksa kembali formulir kamu.
                            </strong>

                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- FORM PENDAFTARAN --}}
                    <form method="POST"
                          action="{{ route('enrollments.preview') }}">

                        @csrf

                        {{-- NAMA LENGKAP --}}
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                Nama Lengkap *
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan nama lengkap"
                                minlength="3"
                                maxlength="255"
                                required
                            >

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted">
                                Gunakan nama lengkap sesuai identitas kamu.
                            </small>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-4">
                            <label for="email" class="form-label">
                                Alamat Email *
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="nama@email.com"
                                maxlength="255"
                                required
                            >

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted">
                                Masukkan alamat email yang masih aktif.
                            </small>
                        </div>

                        {{-- PILIH KURSUS --}}
                        <div class="mb-4">
                            <label for="course_id" class="form-label">
                                Pilih Program Kursus *
                            </label>

                            <select
                                id="course_id"
                                name="course_id"
                                class="form-select @error('course_id') is-invalid @enderror"
                                required
                            >
                                <option value="">
                                    -- Pilih Kursus --
                                </option>

                                @foreach ($courses as $course)

                                    @php
                                        $courseInfo = $availability[$course->id] ?? [];

                                        $quota = (int) ($courseInfo['capacity'] ?? $course->capacity);

                                        $remaining = (int) ($courseInfo['remaining'] ?? 0);
                                    @endphp

                                    <option
                                        value="{{ $course->id }}"
                                        data-remaining="{{ $remaining }}"
                                        @selected((string) old('course_id') === (string) $course->id)
                                        {{ $remaining <= 0 ? 'disabled' : '' }}
                                    >
                                        {{ $course->name }}
                                        - Sisa {{ $remaining }} dari {{ $quota }} kursi
                                        {{ $remaining <= 0 ? '(KELAS PENUH)' : '' }}
                                    </option>

                                @endforeach
                            </select>

                            @error('course_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- INFORMASI KURSI --}}
                        <div id="availability"
                             class="alert alert-secondary"
                             role="status">
                            Pilih kursus terlebih dahulu untuk melihat
                            jumlah kursi yang tersedia.
                        </div>

                        {{-- INFORMASI PENDAFTARAN --}}
                        <div class="p-3 mb-4 rounded"
                             style="background: #fff5f8;
                                    border: 1px solid #ead5dc;">

                            <h6 class="fw-bold"
                                style="color: #800020;">
                                Informasi Pendaftaran
                            </h6>

                            <p class="mb-0 text-muted">
                                Pastikan nama lengkap, alamat email,
                                dan pilihan kursus sudah benar sebelum
                                melanjutkan ke halaman preview.
                            </p>
                        </div>

                        {{-- TOMBOL --}}
                        <div class="d-grid">
                            <button type="submit"
                                    class="btn-primary-custom">
                                Lanjutkan ke Preview ↗
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            {{-- PENUTUP --}}
            <div class="text-center mt-4">
                <p class="text-muted">
                    Terima kasih telah memilih
                    <strong style="color: #800020;">
                        KursusKu
                    </strong>
                    sebagai teman belajarmu.
                </p>
            </div>

        </div>
    </div>

</section>

{{-- JAVASCRIPT CEK KURSI --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const courseSelect = document.getElementById('course_id');
    const availability = document.getElementById('availability');

    async function checkAvailability() {

        const courseId = courseSelect.value;

        if (!courseId) {
            availability.className = 'alert alert-secondary';
            availability.textContent =
                'Pilih kursus terlebih dahulu untuk melihat jumlah kursi yang tersedia.';
            return;
        }

        availability.className = 'alert alert-info';
        availability.textContent =
            'Sedang memeriksa ketersediaan kursi...';

        try {

            const response = await fetch(
                `/courses/${encodeURIComponent(courseId)}/availability`,
                {
                    headers: {
                        'Accept': 'application/json'
                    }
                }
            );

            const data = await response.json();

            if (!response.ok) {
                throw new Error(
                    data.message || 'Gagal memeriksa ketersediaan kursi.'
                );
            }

            const remaining = Number(data.remaining);

            if (remaining > 0) {

                availability.className = 'alert alert-success';

                availability.textContent =
                    `✓ ${data.course}: tersedia ${remaining} dari ${data.capacity} kursi.`;

            } else {

                availability.className = 'alert alert-warning';

                availability.textContent =
                    'Maaf, kursus ini sudah penuh. Silakan pilih kursus lain.';
            }

        } catch (error) {

            availability.className = 'alert alert-danger';

            availability.textContent =
                error.message ||
                'Tidak dapat memeriksa ketersediaan kursi.';
        }
    }

    courseSelect.addEventListener('change', checkAvailability);

    if (courseSelect.value) {
        checkAvailability();
    }

});
</script>

@endsection