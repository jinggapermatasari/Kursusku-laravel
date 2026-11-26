@extends('layouts.app')

@section('title', 'Mulai Belajar - KursusKu')

@section('content')

<style>
    /* DESAIN KHUSUS HALAMAN MULAI BELAJAR */
    .belajar-page {
        min-height: 85vh;
        padding: 45px 20px 60px;
        background: #fffafb;
    }

    .belajar-page * {
        box-sizing: border-box;
    }

    .belajar-page .belajar-container {
        max-width: 1100px;
        margin: auto;
    }

    /* BAGIAN UTAMA */
    .belajar-page .belajar-welcome {
        display: grid;
        grid-template-columns: 0.9fr 1.1fr;
        overflow: hidden;
        min-height: 350px;
        border-radius: 25px;
        background: white;
        box-shadow: 0 18px 50px rgba(89, 0, 24, 0.12);
        margin-bottom: 45px;
    }

    /* PANEL BURGUNDY */
    .belajar-page .belajar-left {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 45px;
        background: linear-gradient(145deg, #590018, #800020, #a83d59);
        color: white;
    }

    .belajar-page .belajar-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        margin-bottom: 25px;
        border-radius: 17px;
        background: white;
        color: #800020;
        font-size: 28px;
        font-weight: 900;
    }

    .belajar-page .belajar-left small {
        margin-bottom: 12px;
        color: #f5dce5;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .belajar-page .belajar-left h1 {
        margin-bottom: 18px;
        color: white;
        font-size: 35px;
        font-weight: 800;
        line-height: 1.3;
    }

    .belajar-page .belajar-left p {
        margin: 0;
        color: #f8e8ee;
        font-size: 14px;
        line-height: 1.9;
    }

    /* PANEL PUTIH */
    .belajar-page .belajar-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 45px;
    }

    .belajar-page .belajar-label {
        display: inline-block;
        width: fit-content;
        margin-bottom: 17px;
        padding: 8px 15px;
        border-radius: 30px;
        background: #f8edf0;
        color: #800020;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .belajar-page .belajar-right h2 {
        margin-bottom: 15px;
        color: #590018;
        font-size: 27px;
        font-weight: 800;
    }

    .belajar-page .belajar-right p {
        margin-bottom: 25px;
        color: #806e75;
        font-size: 14px;
        line-height: 1.9;
    }

    .belajar-page .belajar-main-button {
        display: inline-block;
        width: fit-content;
        padding: 13px 23px;
        border-radius: 30px;
        background: #800020;
        color: white;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.25s;
    }

    .belajar-page .belajar-main-button:hover {
        background: #590018;
        color: white;
        transform: translateY(-3px);
    }

    /* JUDUL KURSUS */
    .belajar-page .belajar-section-heading {
        margin-bottom: 22px;
    }

    .belajar-page .belajar-section-heading small {
        color: #a83d59;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .belajar-page .belajar-section-heading h2 {
        margin-top: 8px;
        color: #590018;
        font-size: 26px;
        font-weight: 800;
    }

    /* KARTU KURSUS */
    .belajar-page .belajar-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .belajar-page .belajar-card {
        padding: 27px;
        border: 1px solid #ead5dc;
        border-radius: 20px;
        background: white;
        box-shadow: 0 10px 30px rgba(89, 0, 24, 0.06);
        transition: 0.3s;
    }

    .belajar-page .belajar-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(89, 0, 24, 0.12);
    }

    .belajar-page .belajar-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 52px;
        height: 52px;
        margin-bottom: 20px;
        border-radius: 15px;
        background: #f8edf0;
        color: #800020;
        font-size: 19px;
        font-weight: 900;
    }

    .belajar-page .belajar-code {
        color: #a83d59;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
    }

    .belajar-page .belajar-card h3 {
        margin: 10px 0;
        color: #590018;
        font-size: 20px;
        font-weight: 800;
    }

    .belajar-page .belajar-card p {
        min-height: 75px;
        margin-bottom: 18px;
        color: #806e75;
        font-size: 13px;
        line-height: 1.8;
    }

    .belajar-page .belajar-info {
        padding-top: 15px;
        margin-bottom: 20px;
        border-top: 1px solid #ead5dc;
        color: #806e75;
        font-size: 12px;
    }

    .belajar-page .belajar-button {
        display: block;
        padding: 12px;
        border-radius: 10px;
        background: #800020;
        color: white;
        font-size: 13px;
        font-weight: 700;
        text-align: center;
        text-decoration: none;
        transition: 0.25s;
    }

    .belajar-page .belajar-button:hover {
        background: #590018;
        color: white;
    }

    /* FOOTER */
    .belajar-page .belajar-footer {
        margin-top: 35px;
        padding: 25px;
        border-radius: 18px;
        background: #f8edf0;
        text-align: center;
    }

    .belajar-page .belajar-footer h3 {
        margin-bottom: 8px;
        color: #590018;
        font-size: 18px;
        font-weight: 800;
    }

    .belajar-page .belajar-footer p {
        margin: 0;
        color: #806e75;
        font-size: 13px;
    }

    /* RESPONSIVE */
    @media (max-width: 850px) {
        .belajar-page .belajar-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .belajar-page .belajar-welcome {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .belajar-page {
            padding: 30px 15px;
        }

        .belajar-page .belajar-left,
        .belajar-page .belajar-right {
            padding: 30px 25px;
        }

        .belajar-page .belajar-left h1 {
            font-size: 29px;
        }

        .belajar-page .belajar-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="belajar-page">
    <div class="belajar-container">

        <section class="belajar-welcome">

            <div class="belajar-left">
                <div class="belajar-logo">K</div>

                <small>WELCOME TO KURSUSKU</small>

                <h1>Mulai Perjalanan Belajarmu</h1>

                <p>
                    Kembangkan kemampuan digitalmu bersama KursusKu.
                    Pelajari berbagai materi pemrograman dari dasar
                    hingga mampu membuat proyek sendiri.
                </p>
            </div>

            <div class="belajar-right">
                <span class="belajar-label">YOUR LEARNING JOURNEY</span>

                <h2>Belajar, Berkembang, dan Berkreasi!</h2>

                <p>
                    Pilih kelas yang sesuai dengan minatmu.
                    Setiap kursus dirancang untuk membantu kamu
                    memahami materi secara bertahap dan terarah.
                </p>

                <a href="{{ route('enrollments.create') }}"
                   class="belajar-main-button">
                    Mulai Pendaftaran →
                </a>
            </div>

        </section>

        <div class="belajar-section-heading">
            <small>OUR COURSES</small>
            <h2>Pilih Kursus Favoritmu</h2>
        </div>

        <div class="belajar-grid">

            <div class="belajar-card">
                <div class="belajar-icon">01</div>
                <span class="belajar-code">WEB-01</span>
                <h3>Web Dasar</h3>

                <p>
                    Pelajari HTML, CSS, dan pengenalan JavaScript
                    untuk membangun website pertamamu.
                </p>

                <div class="belajar-info">
                    <strong>Materi:</strong> HTML, CSS, JavaScript
                </div>

                <a href="{{ route('enrollments.create') }}"
                   class="belajar-button">
                    Daftar Kursus →
                </a>
            </div>

            <div class="belajar-card">
                <div class="belajar-icon">02</div>
                <span class="belajar-code">PHP-01</span>
                <h3>PHP Dasar</h3>

                <p>
                    Kenali PHP untuk membuat website dinamis
                    dan mengelola data menggunakan database.
                </p>

                <div class="belajar-info">
                    <strong>Materi:</strong> PHP, Database, MySQL
                </div>

                <a href="{{ route('enrollments.create') }}"
                   class="belajar-button">
                    Daftar Kursus →
                </a>
            </div>

            <div class="belajar-card">
                <div class="belajar-icon">03</div>
                <span class="belajar-code">LAR-01</span>
                <h3>Laravel Dasar</h3>

                <p>
                    Pelajari framework Laravel untuk membangun
                    aplikasi web dengan struktur yang teratur.
                </p>

                <div class="belajar-info">
                    <strong>Materi:</strong> Laravel, MVC, CRUD
                </div>

                <a href="{{ route('enrollments.create') }}"
                   class="belajar-button">
                    Daftar Kursus →
                </a>
            </div>

        </div>

        <div class="belajar-footer">
            <h3>Siap Mengembangkan Kemampuanmu?</h3>
            <p>
                Pilih kursus yang sesuai dengan minatmu dan
                mulai perjalanan belajar bersama KursusKu.
            </p>
        </div>

    </div>
</div>

@endsection
