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
        flex-wrap: wrap;
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

    .btn-save:hover {
        background: #541328;
    }

    .btn-back {
        background: #f5e5eb;
        color: #701c35;
        padding: 12px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-back:hover {
        background: #ead2db;
        color: #701c35;
    }

    .error-text {
        color: #b42318;
        font-size: 13px;
        margin-top: 5px;
    }

    .input-error {
        border-color: #b42318 !important;
    }

    @media(max-width: 600px) {
        .form-page {
            padding: 25px 12px;
        }

        .form-header,
        .form-card {
            padding: 20px;
        }
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
                    <strong>Periksa kembali data yang kamu masukkan.</strong>
                    <ul style="margin:8px 0 0;padding-left:20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="code">Kode Kursus</label>
                    <input
                        type="text"
                        id="code"
                        name="code"
                        value="{{ old('code') }}"
                        class="{{ $errors->has('code') ? 'input-error' : '' }}"
                        placeholder="Contoh: WEB-02"
                        required
                    >
                    @error('code')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nama Kursus</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="{{ $errors->has('name') ? 'input-error' : '' }}"
                        placeholder="Masukkan nama kursus"
                        required
                    >
                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        class="{{ $errors->has('description') ? 'input-error' : '' }}"
                        placeholder="Deskripsi kursus"
                        required
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fee">Biaya Kursus (Rp)</label>
                    <input
                        type="number"
                        id="fee"
                        name="fee"
                        value="{{ old('fee') }}"
                        min="0"
                        class="{{ $errors->has('fee') ? 'input-error' : '' }}"
                        placeholder="Contoh: 150000"
                        required
                    >
                    @error('fee')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quota">Jumlah Kuota Kursi</label>
                    <input
                        type="number"
                        id="quota"
                        name="quota"
                        value="{{ old('quota') }}"
                        min="1"
                        class="{{ $errors->has('quota') ? 'input-error' : '' }}"
                        placeholder="Contoh: 20"
                        required
                    >
                    @error('quota')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input
                        type="date"
                        id="start_date"
                        name="start_date"
                        value="{{ old('start_date') }}"
                        class="{{ $errors->has('start_date') ? 'input-error' : '' }}"
                        required
                    >
                    @error('start_date')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status Kursus</label>
                    <select
                        id="status"
                        name="status"
                        class="{{ $errors->has('status') ? 'input-error' : '' }}"
                        required
                    >
                        <option value="">-- Pilih Status --</option>

                        <option value="open"
                            {{ old('status') == 'open' ? 'selected' : '' }}>
                            Open
                        </option>

                        <option value="draft"
                            {{ old('status') == 'draft' ? 'selected' : '' }}>
                            Draft
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

                    <a href="{{ route('courses.index') }}" class="btn-back">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
