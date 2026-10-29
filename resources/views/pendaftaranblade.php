@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<div class="container">
    <h1>Pendaftaran Kursus</h1>
    <p>Silakan isi formulir berikut untuk mendaftar.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="course_id">Pilih Kursus</label>
            <select id="course_id" name="course_id" required>
                <option value="">-- Pilih Kursus --</option>
                @foreach ($courses as $course)
                    <option
                        value="{{ $course->id }}"
                        {{ old('course_id') == $course->id ? 'selected' : '' }}
                    >
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Daftar Sekarang</button>
    </form>
</div>
@endsection