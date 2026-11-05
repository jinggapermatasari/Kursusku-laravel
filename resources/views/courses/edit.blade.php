@extends('layouts.app')

@section('title', 'Edit Kursus - KursusKu')

@section('content')
<div class="container py-5">
    <div class="mx-auto p-4 rounded-4 shadow"
         style="max-width: 750px; background: white;">

        <h2 class="mb-4 fw-bold" style="color: #701c35;">
            Edit Data Kursus
        </h2>

        <form action="{{ route('courses.update', $course->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode Kursus</label>
                <input type="text" name="code"
                       class="form-control"
                       value="{{ old('code', $course->code) }}"
                       required>
                @error('code')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Kursus</label>
                <input type="text" name="name"
                       class="form-control"
                       value="{{ old('name', $course->name) }}"
                       required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          class="form-control"
                          rows="3"
                          required>{{ old('description', $course->description) }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Biaya Kursus (Rp)</label>
                <input type="number" name="fee"
                       class="form-control"
                       value="{{ old('fee', $course->fee) }}"
                       min="0" required>
                @error('fee')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kuota Kursi</label>
                <input type="number" name="quota"
                       class="form-control"
                       value="{{ old('quota', $course->quota) }}"
                       min="1" required>
                @error('quota')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date"
                       class="form-control"
                       value="{{ old('start_date', optional($course->start_date)->format('Y-m-d')) }}"
                       required>
                @error('start_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Status Kursus</label>
                <select name="status" class="form-select" required>
                    <option value="open"
                        {{ old('status', $course->status) == 'open' ? 'selected' : '' }}>
                        Dibuka
                    </option>
                    <option value="closed"
                        {{ old('status', $course->status) == 'closed' ? 'selected' : '' }}>
                        Ditutup
                    </option>
                </select>
                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit"
                        class="btn text-white"
                        style="background: #701c35;">
                    Simpan Perubahan
                </button>

                <a href="{{ route('courses.index') }}"
                   class="btn btn-outline-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
