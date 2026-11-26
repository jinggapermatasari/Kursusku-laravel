@extends('layouts.app')

@section('title', 'Ganti Password - KursusKu')

@section('content')

<style>
    .forgot-page {
        min-height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 20px;
        background: #fffafb;
    }

    .forgot-card {
        width: 100%;
        max-width: 480px;
        background: #ffffff;
        padding: 40px;
        border-radius: 22px;
        box-shadow: 0 15px 45px rgba(89, 0, 24, .10);
        border: 1px solid #ead5dc;
    }

    .forgot-card h2 {
        color: #800020;
        font-weight: 800;
        text-align: center;
        margin-bottom: 10px;
    }

    .forgot-card .subtitle {
        color: #806e75;
        text-align: center;
        margin-bottom: 28px;
    }

    .forgot-card label {
        font-weight: 600;
        color: #38232a;
        margin-bottom: 8px;
    }

    .forgot-card input {
        width: 100%;
        padding: 13px 15px;
        border: 1px solid #ead5dc;
        border-radius: 10px;
        outline: none;
    }

    .forgot-card input:focus {
        border-color: #800020;
        box-shadow: 0 0 0 3px rgba(128, 0, 32, .08);
    }

    .password-wrapper {
        position: relative;
        margin-bottom: 18px;
    }

    .password-wrapper input {
        padding-right: 48px;
    }

    .toggle-password {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #800020;
        cursor: pointer;
        font-size: 18px;
        padding: 5px;
    }

    .forgot-button {
        width: 100%;
        border: none;
        background: #800020;
        color: white;
        padding: 14px;
        border-radius: 10px;
        font-weight: 700;
        transition: .3s;
    }

    .forgot-button:hover {
        background: #590018;
    }

    .forgot-back {
        display: block;
        text-align: center;
        margin-top: 22px;
        color: #800020;
        text-decoration: none;
        font-weight: 600;
    }
</style>

<div class="forgot-page">
    <div class="forgot-card">

        <h2>Ganti Password</h2>

        <p class="subtitle">
            Buat password baru untuk akun KursusKu kamu.
        </p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label>Email Terdaftar</label>
            <input
                type="email"
                name="email"
                class="form-control mb-3"
                value="{{ old('email') }}"
                placeholder="Masukkan email akun"
                required
            >

            <label>Password Baru</label>
            <div class="password-wrapper">
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Minimal 8 karakter"
                    minlength="8"
                    required
                >

                <button
                    type="button"
                    class="toggle-password"
                    onclick="togglePassword('password', this)"
                    aria-label="Tampilkan password"
                >
                    <i class="bi bi-eye"></i>
                </button>
            </div>

            <label>Konfirmasi Password Baru</label>
            <div class="password-wrapper">
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Masukkan ulang password baru"
                    minlength="8"
                    required
                >

                <button
                    type="button"
                    class="toggle-password"
                    onclick="togglePassword('password_confirmation', this)"
                    aria-label="Tampilkan konfirmasi password"
                >
                    <i class="bi bi-eye"></i>
                </button>
            </div>

            <button type="submit" class="forgot-button">
                Ubah Password
            </button>
        </form>

        <a href="{{ route('login') }}" class="forgot-back">
            ← Kembali ke Login
        </a>

    </div>
</div>

<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
            button.setAttribute('aria-label', 'Sembunyikan password');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
            button.setAttribute('aria-label', 'Tampilkan password');
        }
    }
</script>

@endsection
