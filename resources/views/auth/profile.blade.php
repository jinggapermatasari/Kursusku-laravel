@extends('layouts.app')

@section('title', 'Profil - KursusKu')

@section('content')

<style>
    /* =====================================
       PROFIL PENGGUNA KURSUSKU
    ===================================== */

    .profile-page {
        min-height: 85vh;
        padding: 55px 20px 70px;
        background:
            radial-gradient(circle at top left, #f8e8ee, transparent 35%),
            #fffafb;
    }

    .profile-container {
        max-width: 1000px;
        margin: auto;
    }

    /* HEADER */

    .profile-header {
        margin-bottom: 30px;
    }

    .profile-header h2 {
        color: #590018;
        font-size: 30px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .profile-header p {
        color: #806e75;
        font-size: 15px;
        margin: 0;
    }

    /* KARTU UTAMA */

    .profile-card {
        overflow: hidden;
        border: 1px solid #ead5dc;
        border-radius: 25px;
        background: #ffffff;
        box-shadow: 0 15px 45px rgba(89, 0, 24, .08);
    }

    /* BANNER */

    .profile-banner {
        height: 170px;
        background: linear-gradient(
            120deg,
            #590018,
            #800020,
            #b7476b
        );
        position: relative;
    }

    /* AVATAR */

    .profile-avatar-wrapper {
        display: flex;
        justify-content: center;
        margin-top: -65px;
        position: relative;
    }

    .profile-avatar {
        width: 130px;
        height: 130px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 7px solid #ffffff;
        border-radius: 50%;
        background: #f8e8ee;
        color: #800020;
        font-size: 48px;
        font-weight: 900;
        box-shadow: 0 8px 25px rgba(89, 0, 24, .12);
        text-transform: uppercase;
    }

    /* NAMA PENGGUNA */

    .profile-identity {
        padding: 18px 25px 30px;
        text-align: center;
    }

    .profile-identity h3 {
        color: #590018;
        font-size: 25px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .profile-identity p {
        color: #806e75;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .profile-status {
        display: inline-block;
        padding: 8px 17px;
        border-radius: 30px;
        background: #f8edf0;
        color: #800020;
        font-size: 12px;
        font-weight: 800;
    }

    /* DETAIL PROFIL */

    .profile-details {
        padding: 30px 40px 35px;
        border-top: 1px solid #f0e2e7;
    }

    .profile-details h4 {
        color: #590018;
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 23px;
    }

    .profile-info {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 19px;
        margin-bottom: 15px;
        border: 1px solid #f0e2e7;
        border-radius: 15px;
        background: #fffafb;
    }

    .profile-info-icon {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #f8e8ee;
        font-size: 22px;
    }

    .profile-info-text {
        min-width: 0;
    }

    .profile-info-text small {
        display: block;
        color: #806e75;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .profile-info-text strong {
        display: block;
        color: #38232a;
        font-size: 15px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    /* TOMBOL */

    .profile-actions {
        display: flex;
        justify-content: center;
        gap: 13px;
        padding: 0 30px 35px;
    }

    .profile-btn {
        display: inline-block;
        padding: 14px 25px;
        border-radius: 12px;
        background: #800020;
        color: #ffffff;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: .25s ease;
    }

    .profile-btn:hover {
        background: #590018;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(89, 0, 24, .15);
    }

    .profile-btn-outline {
        background: #ffffff;
        border: 1px solid #800020;
        color: #800020;
    }

    .profile-btn-outline:hover {
        background: #f8edf0;
        color: #590018;
    }

    /* RESPONSIVE */

    @media (max-width: 600px) {
        .profile-page {
            padding: 35px 15px;
        }

        .profile-header h2 {
            font-size: 25px;
        }

        .profile-banner {
            height: 130px;
        }

        .profile-avatar {
            width: 110px;
            height: 110px;
            font-size: 40px;
        }

        .profile-details {
            padding: 25px 20px;
        }

        .profile-info {
            padding: 14px;
        }

        .profile-actions {
            flex-direction: column;
            padding: 0 20px 25px;
        }

        .profile-btn {
            text-align: center;
        }
    }
</style>


<div class="profile-page">

    <div class="profile-container">

        <!-- JUDUL HALAMAN -->
        <div class="profile-header">
            <h2>Profil Pengguna</h2>
            <p>Informasi akun dan identitas pengguna KursusKu.</p>
        </div>


        <!-- KARTU PROFIL -->
        <div class="profile-card">

            <!-- BANNER -->
            <div class="profile-banner"></div>


            <!-- FOTO INISIAL -->
            <div class="profile-avatar-wrapper">
                <div class="profile-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>


            <!-- IDENTITAS -->
            <div class="profile-identity">

                <h3>{{ auth()->user()->name }}</h3>

                <p>{{ auth()->user()->email }}</p>

                <span class="profile-status">
                    ✓ Akun Aktif
                </span>

            </div>


            <!-- DETAIL INFORMASI -->
            <div class="profile-details">

                <h4>Informasi Akun</h4>

                <!-- NAMA -->
                <div class="profile-info">

                    <div class="profile-info-icon">👤</div>

                    <div class="profile-info-text">
                        <small>Nama Lengkap</small>
                        <strong>{{ auth()->user()->name }}</strong>
                    </div>

                </div>


                <!-- EMAIL -->
                <div class="profile-info">

                    <div class="profile-info-icon">✉️</div>

                    <div class="profile-info-text">
                        <small>Alamat Email</small>
                        <strong>{{ auth()->user()->email }}</strong>
                    </div>

                </div>


                <!-- ID PENGGUNA -->
                <div class="profile-info">

                    <div class="profile-info-icon">🆔</div>

                    <div class="profile-info-text">
                        <small>ID Pengguna</small>
                        <strong>#{{ auth()->user()->id }}</strong>
                    </div>

                </div>


                <!-- TANGGAL BERGABUNG -->
                <div class="profile-info">

                    <div class="profile-info-icon">📅</div>

                    <div class="profile-info-text">
                        <small>Bergabung Sejak</small>
                        <strong>
                            {{ auth()->user()->created_at
                                ? auth()->user()->created_at->format('d F Y')
                                : '-' }}
                        </strong>
                    </div>

                </div>

            </div>


            <!-- TOMBOL -->
            <div class="profile-actions">

                <a href="{{ route('dashboard') }}" class="profile-btn">
                    ← Kembali ke Dashboard
                </a>

                <a href="{{ route('home') }}" class="profile-btn profile-btn-outline">
                    Kembali ke Beranda
                </a>

            </div>

        </div>

    </div>

</div>

@endsection
