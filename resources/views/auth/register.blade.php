@extends('layouts.app')

@section('title', 'Register - KursusKu')

@section('content')

<style>
    /* =====================================
       REGISTER KURSUSKU
       TAMPILAN LEBIH BESAR
    ===================================== */

    .register-page {
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 65px 20px;
        background:
            radial-gradient(circle at top left, #f3dce5 0, transparent 35%),
            linear-gradient(135deg, #fffafb, #f8edf0);
    }

    /* KOTAK REGISTER */

    .register-card {
        width: 100%;
        max-width: 650px;
        padding: 55px 65px;
        border: 1px solid #ead5dc;
        border-radius: 28px;
        background: #ffffff;
        box-shadow: 0 20px 60px rgba(89, 0, 24, 0.12);
    }

    /* BAGIAN JUDUL */

    .register-heading {
        text-align: center;
        margin-bottom: 38px;
    }

    .register-logo {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 22px;
        border-radius: 19px;
        background: #800020;
        color: #ffffff;
        font-size: 32px;
        font-weight: 900;
        box-shadow: 0 8px 20px rgba(128, 0, 32, .15);
    }

    .register-heading h2 {
        color: #590018;
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .register-heading p {
        color: #806e75;
        font-size: 15px;
        line-height: 1.8;
        margin: 0;
    }

    /* FORM REGISTER */

    .register-label {
        display: block;
        margin-bottom: 10px;
        color: #38232a;
        font-size: 15px;
        font-weight: 700;
    }

    .register-field {
        margin-bottom: 23px;
    }

    .register-input {
        display: block;
        width: 100%;
        height: 55px;
        padding: 0 18px;
        border: 1px solid #ead5dc;
        border-radius: 12px;
        outline: none;
        background: #fffafb;
        color: #38232a;
        font-size: 15px;
        transition: .25s ease;
    }

    .register-input:focus {
        border-color: #a83d59;
        box-shadow: 0 0 0 4px rgba(168, 61, 89, .10);
        background: #ffffff;
    }

    .register-input::placeholder {
        color: #b5a2aa;
    }

    /* FITUR TAMPILKAN PASSWORD */

    .register-password-wrapper {
        position: relative;
    }

    .register-password-wrapper .register-input {
        padding-right: 115px;
    }

    .register-toggle-password {
        position: absolute;
        top: 50%;
        right: 14px;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #800020;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .register-toggle-password:hover {
        color: #a83d59;
        text-decoration: underline;
    }

    /* TOMBOL DAFTAR */

    .register-button {
        display: block;
        width: 100%;
        padding: 17px;
        border: none;
        border-radius: 12px;
        background: #800020;
        color: #ffffff;
        font-size: 17px;
        font-weight: 700;
        cursor: pointer;
        transition: .25s ease;
    }

    .register-button:hover {
        background: #590018;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(89, 0, 24, .18);
    }

    /* LINK LOGIN */

    .register-login {
        margin-top: 27px;
        padding-top: 22px;
        border-top: 1px solid #ead5dc;
        text-align: center;
        color: #806e75;
        font-size: 14px;
    }

    .register-login a {
        color: #800020;
        font-weight: 800;
        text-decoration: none;
    }

    .register-login a:hover {
        color: #a83d59;
        text-decoration: underline;
    }

    /* PESAN ERROR */

    .register-error {
        padding: 14px 17px;
        margin-bottom: 23px;
        border: 1px solid #f1c5ce;
        border-radius: 11px;
        background: #fff0f2;
        color: #9d2338;
        font-size: 14px;
        line-height: 1.8;
    }

    /* RESPONSIVE */

    @media (max-width: 700px) {
        .register-page {
            min-height: auto;
            padding: 35px 15px;
        }

        .register-card {
            padding: 35px 25px;
        }

        .register-heading h2 {
            font-size: 27px;
        }

        .register-logo {
            width: 60px;
            height: 60px;
            font-size: 27px;
        }

        .register-input {
            height: 52px;
        }
    }
</style>


<div class="register-page">

    <div class="register-card">

        <!-- JUDUL REGISTER -->
        <div class="register-heading">

            <div class="register-logo">
                K
            </div>

            <h2>Buat Akun Baru</h2>

            <p>
                Daftar sekarang dan mulai perjalanan belajarmu
                bersama KursusKu.
            </p>

        </div>


        <!-- PESAN ERROR -->
        @if ($errors->any())
            <div class="register-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif


        <!-- FORM REGISTER -->
        <form action="{{ route('register.store') }}" method="POST">

            @csrf

            <!-- NAMA LENGKAP -->
            <div class="register-field">

                <label class="register-label" for="name">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="register-input"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            <!-- EMAIL -->
            <div class="register-field">

                <label class="register-label" for="email">
                    Alamat Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="register-input"
                    value="{{ old('email') }}"
                    placeholder="contoh@email.com"
                    required
                >

            </div>


            <!-- PASSWORD -->
            <div class="register-field">

                <label class="register-label" for="password">
                    Password
                </label>

                <div class="register-password-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="register-input"
                        placeholder="Minimal 8 karakter"
                        required
                    >

                    <button
                        type="button"
                        class="register-toggle-password"
                        data-target="password"
                        aria-label="Tampilkan password"
                        aria-pressed="false"
                    >
                        Tampilkan
                    </button>

                </div>

            </div>


            <!-- KONFIRMASI PASSWORD -->
            <div class="register-field">

                <label class="register-label" for="password_confirmation">
                    Konfirmasi Password
                </label>

                <div class="register-password-wrapper">

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="register-input"
                        placeholder="Masukkan ulang password"
                        required
                    >

                    <button
                        type="button"
                        class="register-toggle-password"
                        data-target="password_confirmation"
                        aria-label="Tampilkan konfirmasi password"
                        aria-pressed="false"
                    >
                        Tampilkan
                    </button>

                </div>

            </div>


            <!-- TOMBOL DAFTAR -->
            <button type="submit" class="register-button">
                Daftar Sekarang →
            </button>

        </form>


        <!-- LINK KE LOGIN -->
        <div class="register-login">

            Sudah punya akun?

            <a href="{{ route('login') }}">
                Login di sini
            </a>

        </div>

    </div>

</div>


<!-- JAVASCRIPT TAMPILKAN / SEMBUNYIKAN PASSWORD -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const toggleButtons = document.querySelectorAll(
        '.register-toggle-password'
    );

    toggleButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            const targetId = button.getAttribute('data-target');
            const passwordInput = document.getElementById(targetId);

            if (!passwordInput) {
                return;
            }

            if (passwordInput.type === 'password') {

                passwordInput.type = 'text';
                button.textContent = 'Sembunyikan';
                button.setAttribute('aria-pressed', 'true');

            } else {

                passwordInput.type = 'password';
                button.textContent = 'Tampilkan';
                button.setAttribute('aria-pressed', 'false');

            }

        });

    });

});
</script>

@endsection
