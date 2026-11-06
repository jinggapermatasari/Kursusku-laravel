@extends('layouts.app')

@section('title', 'Detail Kursus - KursusKu')

@section('content')

<style>
    .detail-page {
        background: #fffafa;
        min-height: 80vh;
        padding: 35px 0;
    }

    .detail-container {
        max-width: 850px;
        margin: auto;
        padding: 0 18px;
    }

    .detail-header {
        background: #701c35;
        color: white;
        padding: 23px;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .detail-header h2 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .detail-header p {
        color: #f5dfe5;
        font-size: 13px;
        margin: 0;
    }

    .detail-card {
        background: white;
        border: 1px solid #eadde1;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(80, 20, 40, .05);
    }

    .detail-card h3 {
        color: #701c35;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .detail-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 22px;
    }

    .detail-table th,
    .detail-table td {
        padding: 13px 10px;
        border-bottom: 1px solid #eee3e7;
        text-align: left;
        font-size: 13px;
    }

    .detail-table th {
        color: #701c35;
        width: 30%;
    }

    .detail-table td {
        color: #49343b;
    }

    .detail-status {
        display: inline-block;
        background: #e8f5ed;
        color: #247345;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .status-draft {
        background: #fff3d6;
        color: #946200;
    }

    .status-closed {
        background: #fde8e8;
        color: #b42318;
    }

    .btn-back,
    .btn-edit {
        display: inline-block;
        padding: 9px 15px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
    }

    .btn-back {
        background: white;
        color: #701c35;
        border: 1px solid #701c35;
    }

    .btn-edit {
        background: #701c35;
        color: white;
    }

    .btn-edit:hover {
        background: #541328;
        color: white;
    }

    .btn-back:hover {
        background: #f7e8ed;
        color: #701c35;
    }

    @media(max-width: 600px) {
        .detail-card {
            padding: 15px;
        }

        .detail-table th {
            width: 38%;
        }
    }
</style>

<div class="detail-page">
    <div class="detail-container">

        <div class="detail-header">
            <h2>Detail Kursus</h2>
            <p>Informasi lengkap kursus yang tersedia di KursusKu.</p>
        </div>

        <div class="detail-card">

            <h3>{{ $course->name }}</h3>

            <table class="detail-table">
                <tr>
                    <th>Kode Kursus</th>
                    <td>{{ $course->code }}</td>
                </tr>

                <tr>
                    <th>Nama Kursus</th>
                    <td>{{ $course->name }}</td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $course->description ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Biaya</th>
                    <td>
                        Rp{{ number_format($course->fee, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <th>Kuota</th>
                    <td>{{ $course->quota }} peserta</td>
                </tr>

                <tr>
                    <th>Tanggal Mulai</th>
                    <td>
                        {{ $course->start_date
                            ? $course->start_date->format('d-m-Y')
                            : '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        <span class="detail-status
                            {{ $course->status == 'draft' ? 'status-draft' : '' }}
                            {{ $course->status == 'closed' ? 'status-closed' : '' }}">
                            {{ ucfirst($course->status) }}
                        </span>
                    </td>
                </tr>
            </table>

            <div style="display:flex; gap:10px; flex-wrap:wrap;">

                <a href="{{ route('courses.index') }}"
                   class="btn-back">
                    Kembali
                </a>

                <a href="{{ route('courses.edit', $course) }}"
                   class="btn-edit">
                    Edit Kursus
                </a>

            </div>

        </div>
    </div>
</div>

@endsection
