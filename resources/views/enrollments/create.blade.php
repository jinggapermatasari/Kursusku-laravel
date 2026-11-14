@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - KursusKu')

@section('content')

<section class="container py-5">

    {{-- JUDUL HALAMAN --}}
    <div class="section-heading mb-5">
        <span class="eyebrow">JOIN OUR LEARNING COMMUNITY</span>
        <h2>Mulai Perjalanan Belajarmu.</h2>
        <p>
            Daftarkan peserta dan pilih program kursus
            yang ingin diikuti bersama KursusKu.
        </p>
    </div>

    {{-- NOTIFIKASI BERHASIL --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <strong>✓ Pendaftaran Berhasil!</strong>
            <p class="mb-0">{{ session('success') }}</p>
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- PESAN ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali formulir kamu.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ========================================= --}}
    {{-- FORM RELASIONAL MEETING 12 --}}
    {{-- ========================================= --}}

    <div class="row justify-content-center mb-5">
        <div class="col-lg-9">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">

                    <span class="eyebrow">MEETING 12</span>

                    <h3 class="fw-bold mb-2" style="color: #800020;">
                        Pendaftaran Peserta
                    </h3>

                    <p class="text-muted mb-4">
                        Pilih peserta dan kursus untuk menyimpan
                        data enrollment ke database.
                    </p>

                    <form method="POST"
                          action="{{ route('enrollments.store') }}">

                        @csrf

                        {{-- PILIH PESERTA --}}
                        <div class="mb-4">
                            <label for="participant_id"
                                   class="form-label fw-semibold">
                                Pilih Peserta *
                            </label>

                            <select name="participant_id"
                                    id="participant_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Peserta --
                                </option>

                                @foreach ($participants as $participant)
                                    <option value="{{ $participant->id }}"
                                        @selected((string) old('participant_id') === (string) $participant->id)>
                                        {{ $participant->name }}
                                        ({{ $participant->email }})
                                    </option>
                                @endforeach

                            </select>

                            @if ($participants->isEmpty())
                                <small class="text-danger">
                                    Belum ada peserta. Tambahkan peserta terlebih dahulu.
                                </small>
                            @endif
                        </div>

                        {{-- PILIH KURSUS --}}
                        <div class="mb-4">
                            <label for="relational_course_id"
                                   class="form-label fw-semibold">
                                Pilih Program Kursus *
                            </label>

                            <select name="course_id"
                                    id="relational_course_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Kursus --
                                </option>

                                @foreach ($courses as $course)
                                    @php
                                        $info = $availability[$course->id] ?? [];
                                        $quota = (int) ($info['capacity'] ?? $course->quota);
                                        $remaining = (int) ($info['remaining'] ?? 0);
                                    @endphp

                                    <option value="{{ $course->id }}"
                                            data-remaining="{{ $remaining }}"
                                            @selected((string) old('course_id') === (string) $course->id)
                                            {{ $remaining <= 0 ? 'disabled' : '' }}>

                                        {{ $course->name }}
                                        - Sisa {{ $remaining }} dari {{ $quota }} kursi
                                        {{ $remaining <= 0 ? '(PENUH)' : '' }}

                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- INFORMASI KURSI --}}
                        <div id="relational-availability"
                             class="alert alert-secondary">
                            Pilih kursus untuk melihat ketersediaan kursi.
                        </div>

                        {{-- TOMBOL SIMPAN --}}
                        <div class="d-grid">
                            <button type="submit"
                                    class="btn-primary-custom"
                                    {{ $participants->isEmpty() || $courses->isEmpty() ? 'disabled' : '' }}>
                                ✓ Simpan Enrollment
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>


    {{-- ========================================= --}}
    {{-- FORM PENDAFTARAN LAMA KURSUSKU --}}
    {{-- ========================================= --}}

    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">

                    <span class="eyebrow">REGISTRATION FORM</span>

                    <h3 class="fw-bold mb-2" style="color: #800020;">
                        Pendaftaran Kursus Lama
                    </h3>

                    <p class="text-muted mb-4">
                        Formulir pendaftaran menggunakan nama dan email
                        dengan halaman preview sebelum penyimpanan.
                    </p>

                    <form method="POST"
                          action="{{ route('enrollments.preview') }}">

                        @csrf

                        {{-- NAMA --}}
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                Nama Lengkap *
                            </label>

                            <input type="text"
                                   name="name"
                                   id="name"
                                   value="{{ old('name') }}"
                                   class="form-control"
                                   placeholder="Masukkan nama lengkap"
                                   minlength="3"
                                   maxlength="255"
                                   required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-4">
                            <label for="email" class="form-label">
                                Alamat Email *
                            </label>

                            <input type="email"
                                   name="email"
                                   id="email"
                                   value="{{ old('email') }}"
                                   class="form-control"
                                   placeholder="nama@email.com"
                                   maxlength="255"
                                   required>
                        </div>

                        {{-- PILIH KURSUS --}}
                        <div class="mb-4">
                            <label for="legacy_course_id"
                                   class="form-label">
                                Pilih Program Kursus *
                            </label>

                            <select name="course_id"
                                    id="legacy_course_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Kursus --
                                </option>

                                @foreach ($courses as $course)
                                    @php
                                        $info = $availability[$course->id] ?? [];
                                        $quota = (int) ($info['capacity'] ?? $course->quota);
                                        $remaining = (int) ($info['remaining'] ?? 0);
                                    @endphp

                                    <option value="{{ $course->id }}"
                                            data-remaining="{{ $remaining }}"
                                            @selected((string) old('course_id') === (string) $course->id)
                                            {{ $remaining <= 0 ? 'disabled' : '' }}>

                                        {{ $course->name }}
                                        - Sisa {{ $remaining }} dari {{ $quota }} kursi
                                        {{ $remaining <= 0 ? '(PENUH)' : '' }}

                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div id="legacy-availability"
                             class="alert alert-secondary">
                            Pilih kursus untuk melihat ketersediaan kursi.
                        </div>

                        <div class="d-grid">
                            <button type="submit"
                                    class="btn-primary-custom">
                                Lanjutkan ke Preview ↗
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <div class="text-center mt-5">
        <p class="text-muted">
            Terima kasih telah memilih
            <strong style="color: #800020;">KursusKu</strong>
            sebagai teman belajarmu.
        </p>
    </div>

</section>


{{-- ========================================= --}}
{{-- JAVASCRIPT KETERSEDIAAN KURSI --}}
{{-- ========================================= --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    function setupAvailability(selectId, infoId) {

        const select = document.getElementById(selectId);
        const info = document.getElementById(infoId);

        if (!select || !info) return;

        async function checkAvailability() {

            const courseId = select.value;

            if (!courseId) {
                info.className = 'alert alert-secondary';
                info.textContent =
                    'Pilih kursus untuk melihat ketersediaan kursi.';
                return;
            }

            info.className = 'alert alert-info';
            info.textContent = 'Memeriksa ketersediaan kursi...';

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
                        data.message || 'Gagal memeriksa kursi.'
                    );
                }

                const remaining = Number(data.remaining);

                if (remaining > 0) {

                    info.className = 'alert alert-success';

                    info.textContent =
                        `✓ ${data.course}: tersedia ${remaining} dari ${data.capacity} kursi.`;

                } else {

                    info.className = 'alert alert-warning';

                    info.textContent =
                        'Kursus sudah penuh. Silakan pilih kursus lain.';
                }

            } catch (error) {

                info.className = 'alert alert-danger';
                info.textContent = error.message;
            }
        }

        select.addEventListener('change', checkAvailability);

        if (select.value) {
            checkAvailability();
        }
    }

    setupAvailability(
        'relational_course_id',
        'relational-availability'
    );

    setupAvailability(
        'legacy_course_id',
        'legacy-availability'
    );

});
</script>

@endsection