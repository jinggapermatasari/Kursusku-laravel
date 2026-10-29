@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - KursusKu')

@section('content')
<section class="container">
    <div class="section-heading">
        <span class="eyebrow">Join our learning community</span>
        <h2>Mulai perjalanan belajarmu.</h2>
        <p>Lengkapi data berikut dan pilih kursus yang ingin kamu ikuti.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h3 mb-3">Form Pendaftaran</h1>

                    <form method="POST"
                          action="{{ route('enrollments.preview') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama lengkap</label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="form-control"
                                   minlength="3"
                                   maxlength="100"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="course_id" class="form-label">
                                Pilih kursus
                            </label>

                            <select id="course_id"
                                    name="course_id"
                                    class="form-select"
                                    required>
                                <option value="">-- Pilih kursus --</option>

                                @foreach ($courses as $id => $course)
                                    <option value="{{ $id }}"
                                        @selected(old('course_id') == $id)>
                                        {{ $course['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div id="availability" class="alert alert-secondary">
                            Pilih kursus untuk melihat sisa kursi.
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit" class="btn-primary-custom">
                            Kirim Pendaftaran ↗
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection