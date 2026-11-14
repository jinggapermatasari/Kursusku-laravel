@extends('layouts.app')

@section('title', 'Laporan Pendaftaran - KursusKu')

@section('content')
<style>
    .report-container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 25px;
    }

    .report-header {
        background: #6b1835;
        color: white;
        padding: 28px;
        border-radius: 15px;
        margin-bottom: 25px;
    }

    .report-header h2 {
        margin: 0 0 8px;
        font-weight: 700;
    }

    .report-header p {
        margin: 0;
        color: #f3dfe6;
    }

    .report-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 18px rgba(0,0,0,.07);
    }

    .report-table {
        width: 100%;
        border-collapse: collapse;
    }

    .report-table th {
        background: #6b1835;
        color: white;
        padding: 14px;
        text-align: left;
    }

    .report-table td {
        padding: 14px;
        border-bottom: 1px solid #eee;
        color: #444;
    }

    .report-table tr:hover {
        background: #fff7fa;
    }

    .status-badge {
        display: inline-block;
        background: #f5e2e9;
        color: #6b1835;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .empty-data {
        text-align: center;
        padding: 35px;
        color: #777;
    }

    .btn-back {
        display: inline-block;
        margin-top: 20px;
        background: #6b1835;
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
    }

    .btn-back:hover {
        background: #501127;
        color: white;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>

<div class="report-container">

    <div class="report-header">
        <h2>Laporan Pendaftaran Kursus</h2>
        <p>Daftar peserta yang telah terdaftar pada kursus KursusKu.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="report-card">

        <h4 style="color:#6b1835; margin-bottom:20px;">
            Data Enrollment
        </h4>

        <div class="table-responsive">
            <table class="report-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Peserta</th>
                        <th>Email</th>
                        <th>Nama Kursus</th>
                        <th>Tanggal Mulai</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($enrollments as $enrollment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $enrollment->participant?->name
                                    ?? $enrollment->name
                                    ?? 'Peserta lama' }}
                            </td>

                            <td>
                                {{ $enrollment->participant?->email
                                    ?? $enrollment->email
                                    ?? '-' }}
                            </td>

                            <td>
                                {{ $enrollment->course?->name ?? '-' }}
                            </td>

                            <td>
                                {{ $enrollment->course?->start_date?->format('d M Y') ?? '-' }}
                            </td>

                            <td>
                                <span class="status-badge">
                                    {{ ucfirst($enrollment->status ?? 'registered') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-data">
                                Belum ada data pendaftaran kursus.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('enrollments.create') }}" class="btn-back">
            Kembali ke Pendaftaran
        </a>

    </div>
</div>
@endsection