@extends('layouts.app')

@section('title', 'Login - KursusKu')

@section('content')

<style>
    /* =====================================
       LOGIN KURSUSKU
       STYLE KHUSUS HALAMAN LOGIN
    ===================================== */

    .login-page {
        min-height: 78vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 55px 20px;
        background:
            radial-gradient(circle at top left, #f3dce5 0, transparent 35%),
            linear-gradient(135deg, #fffafb, #f8edf0);
    }

    .login-page .login-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        width: 100%;
        max-width: 900px;
        overflow: hidden;
        border: 1px solid #ead5dc;
        border-radius: 26px;
        background: #ffffff;
        box-shadow: 0 20px 60px rgba(89, 0, 24, 0.13);
    }

    /* BAGIAN KIRI */

    .login-page .login-intro {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 50px 40px;
        background: linear-gradient(145deg, #590018, #800020, #a83d59);
        color: #ffffff;
    }

    .login-page .login-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 65px;
        height: 65px;
        margin-bottom: 28px;
        border-radius: 18px;
        background: #ffffff;
        color: #800020;
        font-size: 30px;
        font-weight: 900;
    }

    .login-page .login-intro h2 {
        margin-bottom: 16px;
        color: #ffffff;
        font-size: 30px;
        font-weight: 800;
        line-height: 1.3;
    }

    .login-page .login-intro p {
        color: #f9eaf0;
        font-size: 15px;
        line-height: 1.9;
    }

    .login-page .login-caption {
        margin-top: 30px;
        color: #f4dce4;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
    }

    /* BAGIAN FORM LOGIN */

    .login-page .login-form-area {
        padding: 50px 42px;
        background: #ffffff;
    }

    .login-page .login-heading {
        margin-bottom: 30px;
    }

    .login-page .login-heading h2 {
        margin-bottom: 8px;
        color: #590018;
        font-size: 28px;
        font-weight: 800;
    }

    .login-page .login-heading p {
        margin: 0;
        color: #806e75;
        font-size: 14px;
        line-height: 1.7;
    }

    .login-page .login-label {
        display: block;
        margin-bottom: 8px;
        color: #38232a;
        font-size: 14px;
        font-weight: 700;
    }

    .login-page .login-input {
        display: block;
        width: 100%;
        height: 48px;
        padding: 0 15px;
        border: 1px solid #ead5dc;
        border-radius: 12px;
        outline: none;
        background: #fffafb;
        color: #38232a;
        font-size: 14px;
        transition: 0.25s ease;
    }

    .login-page .login-input:focus {
        border-color: #a83d59;
        box-shadow: 0 0 0 4px rgba(168, 61, 89, 0.10);
        background: #ffffff;
    }

    .login-page .login-field {
        margin-bottom: 20px;
    }

    /* FITUR TAMPILKAN PASSWORD */

    .login-page .password-wrapper {
        position: relative;
    }

    .login-page .password-wrapper .login-input {
        padding-right: 105px;
    }

    .login-page .toggle-password {
        position: absolute;
        top: 50%;
        right: 13px;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #800020;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .login-page .toggle-password:hover {
        color: #a83d59;
        text-decoration: underline;
    }

    .login-page .login-options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        margin: 5px 0 25px;
        font-size: 13px;
    }

    .login-page .login-remember {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #806e75;
    }

    .login-page .login-remember input {
        accent-color: #800020;
    }

    .login-page .login-forgot {
        color: #800020;
        font-weight: 700;
        text-decoration: none;
    }

    .login-page .login-forgot:hover {
        color: #a83d59;
        text-decoration: underline;
    }

    .login-page .login-submit {
        display: block;
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 12px;
        background: #800020;
        color: #ffffff;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.25s ease;
    }

    .login-page .login-submit:hover {
        background: #590018;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(89, 0, 24, 0.18);
    }

    /* LINK REGISTER */

    .login-page .login-register {
        margin-top: 22px;
        text-align: center;
        color: #806e75;
        font-size: 13px;
    }

    .login-page .login-register a {
        color: #800020;
        font-weight: 800;
        text-decoration: none;
    }

    .login-page .login-register a:hover {
        color: #a83d59;
        text-decoration: underline;
    }

    /* PESAN NOTIFIKASI */

    .login-page .login-note {
        margin-top: 25px;
        padding-top: 18px;
        border-top: 1px solid #ead5dc;
        color: #806e75;
        font-size: 12px;
        line-height: 1.7;
        text-align: center;
    }

    .login-page .login-error {
        margin-bottom: 20px;
        padding: 12px 15px;
        border: 1px solid #f1c5ce;
        border-radius: 10px;
        background: #fff0f2;
        color: #9d2338;
        font-size: 13px;
    }

    .login-page .login-success {
        margin-bottom: 20px;
        padding: 12px 15px;
        border: 1px solid #b9dfc8;
        border-radius: 10px;
        background: #edf9f1;
        color: #17653b;
        font-size: 13px;
    }

    /* RESPONSIVE HANDPHONE */

    @media (max-width: 700px) {
        .login-page {
            min-height: auto;
            padding: 30px 15px;
        }

        .login-page .login-wrapper {
            grid-template-columns: 1fr;
        }

        .login-page .login-intro {
            padding: 30px;
        }

        .login-page .login-intro h2 {
            font-size: 24px;
        }

        .login-page .login-logo {
            width: 52px;
            height: 52px;
            margin-bottom: 18px;
            font-size: 25px;
        }

        .login-page .login-form-area {
            padding: 32px 25px;
        }
    }
</style>

<div class="login-page">
    <div class="login-wrapper">

        <!-- BAGIAN KIRI -->
        <div class="login-intro">
            <div class="login-logo">K</div>

            <h2>Selamat Datang di KursusKu!</h2>

            <p>
                Kembangkan kemampuan digitalmu bersama KursusKu.
                Mulai perjalanan belajar dan tingkatkan keterampilan
                untuk meraih masa depan yang lebih baik.
            </p>

            <div class="login-caption">
                PREMIUM LEARNING
            </div>
        </div>

        <!-- BAGIAN FORM LOGIN -->
        <div class="login-form-area">

            <div class="login-heading">
                <h2>Login Akun</h2>
                <p>Masukkan email dan password untuk melanjutkan.</p>
            </div>

            @if(session('success'))
                <div class="login-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="login-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <!-- EMAIL -->
                <div class="login-field">
                    <label class="login-label" for="email">
                        Alamat Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="login-input"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        required
                        autofocus
                    >
                </div>

                <!-- PASSWORD -->
                <div class="login-field">
                    <label class="login-label" for="password">
                        Password
                    </label>

                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="login-input"
                            placeholder="Masukkan password"
                            required
                        >

                        <button
                            type="button"
                            id="togglePassword"
                            class="toggle-password"
                            aria-label="Tampilkan password"
                            aria-pressed="false"
                        >
                            Tampilkan
                        </button>
                    </div>
                </div>

                <!-- REMEMBER DAN FORGOT PASSWORD -->
                <div class="login-options">
                    <label class="login-remember">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                        >
                        Ingat saya
                    </label>

                    <a
                        href="{{ route('password.request') }}"
                        class="login-forgot"
                    >
                        Lupa password?
                    </a>
                </div>

                <!-- TOMBOL LOGIN -->
                <button type="submit" class="login-submit">
                    Masuk ke Akun →
                </button>
            </form>

            <!-- LINK REGISTER -->
            <div class="login-register">
                Belum punya akun?
                <a href="{{ route('register') }}">Daftar di sini</a>
            </div>

            <div class="login-note">
                Dengan login, kamu dapat mengakses fitur pembelajaran
                KursusKu sesuai akun yang terdaftar.
            </div>

        </div>
    </div>
</div>

<!-- JAVASCRIPT TAMPILKAN / SEMBUNYIKAN PASSWORD -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');

    if (passwordInput && toggleButton) {
        toggleButton.addEventListener('click', function () {

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = 'Sembunyikan';
                toggleButton.setAttribute('aria-label', 'Sembunyikan password');
                toggleButton.setAttribute('aria-pressed', 'true');
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = 'Tampilkan';
                toggleButton.setAttribute('aria-label', 'Tampilkan password');
                toggleButton.setAttribute('aria-pressed', 'false');
            }

        });
    }
});
</script>

@endsection
