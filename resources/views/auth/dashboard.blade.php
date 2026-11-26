@extends('layouts.app')

@section('title', 'Dashboard - KursusKu')

@section('content')

<style>
    .dashboard-page {
        min-height: 85vh;
        padding: 45px 20px 65px;
        background: #fffafb;
    }

    .dashboard-container {
        max-width: 1150px;
        margin: auto;
    }

    /* HEADER DASHBOARD */

    .dashboard-welcome {
        padding: 40px;
        border-radius: 24px;
        background: linear-gradient(120deg, #590018, #800020, #a83d59);
        color: white;
        box-shadow: 0 15px 35px rgba(89, 0, 24, .13);
        margin-bottom: 35px;
    }

    .welcome-label {
        display: inline-block;
        padding: 8px 15px;
        margin-bottom: 16px;
        border-radius: 30px;
        background: rgba(255,255,255,.15);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .dashboard-welcome h2 {
        font-size: 30px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .dashboard-welcome p {
        color: #f8e8ee;
        font-size: 15px;
        line-height: 1.8;
        margin: 0;
    }

    /* JUDUL SECTION */

    .dashboard-section-title {
        color: #590018;
        font-size: 23px;
        font-weight: 800;
        margin-bottom: 22px;
    }

    /* KARTU MENU */

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
        margin-bottom: 35px;
    }

    .dashboard-card {
        display: block;
        padding: 28px;
        border: 1px solid #ead5dc;
        border-radius: 20px;
        background: white;
        color: #38232a;
        text-decoration: none;
        box-shadow: 0 8px 25px rgba(89, 0, 24, .05);
        transition: .25s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        border-color: #a83d59;
        box-shadow: 0 15px 30px rgba(89, 0, 24, .10);
        color: #38232a;
    }

    .dashboard-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        border-radius: 16px;
        background: #f8edf0;
        font-size: 26px;
    }

    .dashboard-card h4 {
        color: #590018;
        font-size: 19px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .dashboard-card p {
        color: #806e75;
        font-size: 14px;
        line-height: 1.8;
        margin-bottom: 18px;
    }

    .dashboard-link {
        color: #800020;
        font-size: 14px;
        font-weight: 800;
    }

    /* INFORMASI AKUN */

    .dashboard-profile {
        padding: 30px;
        border: 1px solid #ead5dc;
        border-radius: 20px;
        background: white;
        box-shadow: 0 8px 25px rgba(89, 0, 24, .05);
    }

    .dashboard-profile h4 {
        color: #590018;
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .profile-info {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #f0e2e7;
        font-size: 14px;
    }

    .profile-info:last-child {
        border-bottom: none;
    }

    .profile-info span:first-child {
        color: #806e75;
    }

    .profile-info span:last-child {
        color: #38232a;
        font-weight: 700;
        text-align: right;
        overflow-wrap: anywhere;
    }

    /* RESPONSIVE */

    @media (max-width: 850px) {
        .dashboard-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .dashboard-page {
            padding: 30px 15px;
        }

        .dashboard-welcome {
            padding: 28px 23px;
        }

        .dashboard-welcome h2 {
            font-size: 24px;
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


<div class="dashboard-page">
    <div class="dashboard-container">

        <!-- SAPAAN -->
        <div class="dashboard-welcome">

            <span class="welcome-label">
                MEMBER DASHBOARD
            </span>

            <h2>
                Selamat Datang, {{ auth()->user()->name }}!
            </h2>

            <p>
                Selamat datang di dashboard KursusKu.
                Yuk, lanjutkan perjalanan belajarmu dan
                kembangkan kemampuan digital bersama kami.
            </p>

        </div>


        <!-- MENU UTAMA -->
        <h3 class="dashboard-section-title">
            Menu Utama
        </h3>

        <div class="dashboard-grid">

            <!-- DAFTAR KURSUS -->
            <a href="{{ route('courses.index') }}" class="dashboard-card">

                <div class="dashboard-icon">📚</div>

                <h4>Daftar Kursus</h4>

                <p>
                    Lihat berbagai pilihan kursus yang tersedia
                    untuk mengembangkan kemampuanmu.
                </p>

                <span class="dashboard-link">Lihat Kursus →</span>

            </a>


            <!-- PENDAFTARAN -->
            <a href="{{ route('enrollments.create') }}" class="dashboard-card">

                <div class="dashboard-icon">📝</div>

                <h4>Pendaftaran Kursus</h4>

                <p>
                    Daftarkan dirimu pada kursus pilihan
                    dan mulai pengalaman belajar baru.
                </p>

                <span class="dashboard-link">Daftar Sekarang →</span>

            </a>


            <!-- MULAI BELAJAR -->
            <a href="{{ route('belajar') }}" class="dashboard-card">

                <div class="dashboard-icon">🎓</div>

                <h4>Mulai Belajar</h4>

                <p>
                    Kunjungi halaman pembelajaran dan
                    tingkatkan pengetahuan digitalmu.
                </p>

                <span class="dashboard-link">Mulai Belajar →</span>

            </a>


            <!-- DATA PENDAFTARAN -->
            <a href="{{ route('enrollments.index') }}" class="dashboard-card">

                <div class="dashboard-icon">📋</div>

                <h4>Data Pendaftaran</h4>

                <p>
                    Lihat informasi pendaftaran kursus
                    yang tersedia pada sistem.
                </p>

                <span class="dashboard-link">Lihat Data →</span>

            </a>


            <!-- PROFIL -->
            <a href="{{ route('profile') }}" class="dashboard-card">

                <div class="dashboard-icon">👤</div>

                <h4>Profil Saya</h4>

                <p>
                    Lihat informasi akun dan data
                    pribadi yang terdaftar di KursusKu.
                </p>

                <span class="dashboard-link">Lihat Profil →</span>

            </a>


            <!-- BERANDA -->
            <a href="{{ route('home') }}" class="dashboard-card">

                <div class="dashboard-icon">🏠</div>

                <h4>Beranda</h4>

                <p>
                    Kembali ke halaman utama untuk
                    mengenal lebih jauh tentang KursusKu.
                </p>

                <span class="dashboard-link">Kunjungi Beranda →</span>

            </a>

        </div>


        <!-- INFORMASI AKUN -->
        <div class="dashboard-profile">

            <h4>Informasi Akun</h4>

            <div class="profile-info">
                <span>Nama Lengkap</span>
                <span>{{ auth()->user()->name }}</span>
            </div>

            <div class="profile-info">
                <span>Email</span>
                <span>{{ auth()->user()->email }}</span>
            </div>

            <div class="profile-info">
                <span>Status Akun</span>
                <span>Aktif</span>
            </div>

        </div>

    </div>
</div>

@endsection
