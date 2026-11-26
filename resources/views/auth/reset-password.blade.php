@extends('layouts.app')

@section('title', 'Lupa Password - KursusKu')

@section('content')

<style>
.forgot-page {
    min-height: 85vh;
    padding: 45px 20px;
    background: #fff7fa;
    display: flex;
    align-items: center;
    justify-content: center;
}

.forgot-container {
    width: 100%;
    max-width: 1000px;
    min-height: 520px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 18px 55px rgba(93,12,48,.12);
}

.forgot-left {
    background: linear-gradient(145deg,#590018,#800020,#a83d59);
    color: white;
    padding: 45px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.forgot-brand {
    font-size: 25px;
    font-weight: 800;
}

.forgot-brand span {
    color: #ffc0d2;
}

.forgot-info small {
    color: #ffc0d2;
    font-weight: 700;
    letter-spacing: 2px;
}

.forgot-info h1 {
    font-size: 36px;
    font-weight: 800;
    line-height: 1.3;
    margin: 18px 0;
}

.forgot-info h1 span {
    color: #ffc0d2;
}

.forgot-info p {
    color: #f5dce5;
    line-height: 1.8;
}

.forgot-note {
    padding: 20px;
    border-radius: 15px;
    background: rgba(255,255,255,.12);
    color: #f8e8ee;
}

.forgot-right {
    padding: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.forgot-right h2 {
    color: #590018;
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 10px;
}

.forgot-description {
    color: #806e75;
    margin-bottom: 28px;
    line-height: 1.7;
}

.forgot-label {
    display: block;
    color: #38232a;
    font-weight: 700;
    margin-bottom: 8px;
}

.forgot-input {
    width: 100%;
    padding: 13px 15px;
    border: 1px solid #ead5dc;
    border-radius: 10px;
    margin-bottom: 20px;
    outline: none;
}

.forgot-input:focus {
    border-color: #800020;
    box-shadow: 0 0 0 3px rgba(128,0,32,.08);
}

.forgot-button {
    width: 100%;
    padding: 14px;
    background: #800020;
    border: none;
    border-radius: 10px;
    color: white;
    font-weight: 700;
    margin-top: 5px;
}

.forgot-button:hover {
    background: #590018;
}

.forgot-back {
    text-align: center;
    margin-top: 22px;
}

.forgot-back a {
    color: #800020;
    font-weight: 700;
    text-decoration: none;
}

@media(max-width:768px) {
    .forgot-container {
        grid-template-columns: 1fr;
    }

    .forgot-left {
        min-height: 300px;
        padding: 30px;
    }

    .forgot-info h1 {
        font-size: 29px;
    }

    .forgot-right {
        padding: 35px 25px;
    }
}
</style>

<div class="forgot-page">
    <div class="forgot-container">

        <div class="forgot-left">

            <div class="forgot-brand">
                ♡ KursusKu<span>.</span>
            </div>

            <div class="forgot-info">
                <small>KEAMANAN AKUN</small>

                <h1>
                    Atur Ulang
                    <span>Kata Sandi</span>
                    Anda.
                </h1>

                <p>
                    Masukkan alamat email yang terdaftar.
                    Kami akan mengirimkan tautan untuk
                    mengatur ulang kata sandi akun KursusKu.
                </p>
            </div>

            <div class="forgot-note">
                <strong>♡ KursusKu</strong>
                <p class="mb-0">
                    Belajar dengan semangat, raih masa depan.
                </p>
            </div>

        </div>

        <div class="forgot-right">

            <h2>Lupa Kata Sandi?</h2>

            <p class="forgot-description">
                Masukkan email akunmu untuk menerima link
                pengaturan ulang kata sandi.
            </p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label class="forgot-label">
                    Alamat Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="forgot-input"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email terdaftar"
                    required
                >

                <button type="submit" class="forgot-button">
                    Kirim Link Reset Password
                </button>

            </form>

            <div class="forgot-back">
                <a href="{{ route('login') }}">
                    ← Kembali ke Login
                </a>
            </div>

        </div>

    </div>
</div>

@endsection
