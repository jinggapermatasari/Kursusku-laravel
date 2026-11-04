@extends('layouts.app')

@section('title', 'Preview Pendaftaran - KursusKu')

@section('content')

<section class="container py-5">

    <div class="section-heading">
        <span class="eyebrow">REGISTRATION PREVIEW</span>

        <h2>Periksa Data Pendaftaran.</h2>

        <p>
            Pastikan seluruh informasi berikut sudah benar
            sebelum menyimpan pendaftaran.
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <h3 class="fw-bold mb-4"
                        style="color: #800020;">
                        Ringkasan Pendaftaran
                    </h3>

                    {{-- DATA PESERTA --}}
                    <div class="mb-4">
                        <label class="form-label">
                            Nama Lengkap
                        </label>

                        <div class="p-3 rounded"
                             style="background: #fff5f8;">
                            {{ $formData['name'] }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Alamat Email
                        </label>

                        <div class="p-3 rounded"
                             style="background: #fff5f8;">
                            {{ $formData['email'] }}
                        </div>
                    </div>

                    {{-- DATA KURSUS --}}
                    <div class="mb-4">
                        <label class="form-label">
                            Program Kursus
                        </label>

                        <div class="p-3 rounded"
                             style="background: #fff5f8;">
                            {{ $course->name }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Kapasitas Kursus
                        </label>

                        <div class="p-3 rounded"
                             style="background: #fff5f8;">
                            {{ $course->capacity }} peserta
                        </div>
                    </div>

                    {{-- INFORMASI --}}
                    <div class="alert alert-info">
                        Silakan periksa kembali data kamu.
                        Tekan tombol Simpan Pendaftaran jika
                        seluruh informasi sudah benar.
                    </div>

                    {{-- SIMPAN PENDAFTARAN --}}
                    <form method="POST"
                          action="{{ route('enrollments.store') }}">

                        @csrf

                        <input type="hidden"
                               name="name"
                               value="{{ $formData['name'] }}">

                        <input type="hidden"
                               name="email"
                               value="{{ $formData['email'] }}">

                        <input type="hidden"
                               name="course_id"
                               value="{{ $formData['course_id'] }}">

                        <div class="d-grid gap-3">

                            <button type="submit"
                                    class="btn-primary-custom">
                                ✓ Simpan Pendaftaran
                            </button>

                            <a href="{{ route('enrollments.create') }}"
                               class="btn btn-outline-secondary">
                                ← Kembali ke Formulir
                            </a>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</section>

@endsection