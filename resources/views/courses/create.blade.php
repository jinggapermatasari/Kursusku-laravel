@extends('layouts.app')

@section('title', 'Tambah Kursus - KursusKu')

@section('content')

<style>
    .form-page {
        background: #fffafa;
        min-height: 85vh;
        padding: 40px 20px;
    }

    .form-container {
        max-width: 750px;
        margin: auto;
    }

    .form-header {
        background: #701c35;
        color: white;
        padding: 28px;
        border-radius: 14px 14px 0 0;
    }

    .form-header h2 {
        margin: 0 0 8px;
        font-weight: 700;
    }

    .form-header p {
        margin: 0;
        color: #f5dfe5;
    }

    .form-card {
        background: white;
        padding: 30px;
        border: 1px solid #eadde1;
        border-radius: 0 0 14px 14px;
        box-shadow: 0 5px 20px rgba(80,20,40,.05);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #701c35;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #dfcbd2;
        border-radius: 8px;
        outline: none;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #701c35;
        box-shadow: 0 0 0 3px rgba(112,28,53,.1);
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 25px;
    }

    .btn-save {
        background: #701c35;
        color: white;
        border: none;
        padding: 12px 22px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
    }

    .btn-back {
        background: #f5e5eb;
        color: #701c35;
        padding: 12px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }

    .error-text {
        color: #b42318;
        font-size: 13px;
        margin-top: 5px;
    }
</style>

<div class="form-page">
    <div class="form-container">

        <div class="form-header">
            <h2>Tambah Kursus</h2>
            <p>Lengkapi informasi kursus baru di KursusKu.</p>
        </div>

        <div class="form-card">

            @if($errors->any())
                <div style="background:#fde8e8;color:#b42318;
                    padding:15px;border-radius:8px;margin-bottom:20px;">
                    Periksa kembali data yang kamu masukkan.
                </div>
            @endif

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Kode Kursus</label>
                    <input type="text" name="code"
                        value="{{ old('code') }}"
                        placeholder="Contoh: WEB-02" required>
                    @error('code')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama Kursus</label>
                    <input type="text" name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama kursus" required>
                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" rows="3"
                        placeholder="Deskripsi kursus" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Biaya Kursus (Rp)</label>
                    <input type="number" name="fee"
                        value="{{ old('fee') }}"
                        min="0" required>
                    @error('fee')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Jumlah Kuota Kursi</label>
                    <input type="number" name="quota"
                        value="{{ old('quota') }}"
                        min="1" required>
                    @error('quota')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="start_date"
                        value="{{ old('start_date') }}" required>
                    @error('start_date')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Status Kursus</label>
                    <select name="status" required>
                        <option value="open"
                            {{ old('status') == 'open' ? 'selected' : '' }}>
                            Open
                        </option>
                        <option value="closed"
                            {{ old('status') == 'closed' ? 'selected' : '' }}>
                            Closed
                        </option>
                    </select>
                    @error('status')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        Simpan Kursus
                    </button>

                    <a href="{{ route('courses.index') }}"
                       class="btn-back">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection