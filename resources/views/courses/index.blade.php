@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')

<style>
    .course-page {
        background: #fffafa;
        min-height: 80vh;
        padding: 28px 0;
    }

    .course-container {
        max-width: 1000px;
        margin: auto;
        padding: 0 18px;
    }

    .course-header {
        background: #701c35;
        color: white;
        padding: 23px;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .course-header h2 {
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .course-header p {
        font-size: 13px;
        margin: 0;
        color: #f5dfe5;
    }

    .course-card {
        background: white;
        border: 1px solid #eadde1;
        border-radius: 12px;
        padding: 18px;
        box-shadow: 0 4px 15px rgba(80, 20, 40, .05);
    }

    .course-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 12px;
    }

    .course-table th {
        background: #701c35;
        color: white;
        padding: 10px 9px;
        text-align: left;
        font-size: 12px;
        white-space: nowrap;
    }

    .course-table td {
        padding: 11px 9px;
        border-bottom: 1px solid #eee3e7;
        color: #49343b;
        font-size: 12px;
    }

    .course-table tr:hover td {
        background: #fff7f9;
    }

    .course-code {
        color: #701c35;
        font-weight: 700;
        white-space: nowrap;
    }

    .course-status {
        display: inline-block;
        background: #e8f5ed;
        color: #247345;
        padding: 4px 9px;
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

    .btn-add {
        display: inline-block;
        background: white;
        color: #701c35;
        padding: 9px 14px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-add:hover {
        background: #f7e8ed;
        color: #701c35;
    }

    .btn-edit, .btn-delete {
        display: inline-block;
        border: none;
        padding: 5px 9px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 11px;
        cursor: pointer;
    }

    .btn-edit {
        background: #f5e5eb;
        color: #701c35;
    }

    .btn-delete {
        background: #fde8e8;
        color: #b42318;
    }

    .empty-data {
        text-align: center;
        padding: 28px;
        color: #8a737b;
    }

    .table-responsive {
        overflow-x: auto;
    }

    @media(max-width: 600px) {
        .course-header {
            padding: 18px;
        }

        .course-card {
            padding: 12px;
        }
    }
</style>

<div class="course-page">
    <div class="course-container">

        <div class="course-header">
            <div style="display:flex; justify-content:space-between;
                align-items:center; gap:12px; flex-wrap:wrap;">

                <div>
                    <h2>Manajemen Kursus</h2>
                    <p>Kelola daftar kursus yang tersedia di KursusKu.</p>
                </div>

                <a href="{{ route('courses.create') }}" class="btn-add">
                    + Tambah Kursus
                </a>
            </div>
        </div>

        @if(session('success'))
            <div style="background:#e8f5ed;color:#247345;
                padding:10px;border-radius:7px;margin-bottom:15px;font-size:12px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background:#fde8e8;color:#b42318;
                padding:10px;border-radius:7px;margin-bottom:15px;font-size:12px;">
                {{ session('error') }}
            </div>
        @endif

        <div class="course-card">

            <h3 style="color:#701c35;margin:0;font-size:17px;">
                Daftar Kursus
            </h3>

            <p style="color:#8a737b;font-size:12px;margin:5px 0;">
                Informasi kursus, biaya, kuota, dan jadwal.
            </p>

            <div class="table-responsive">
                <table class="course-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Kursus</th>
                            <th>Biaya</th>
                            <th>Kuota</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="course-code">
                                    {{ $course->code }}
                                </td>

                                <td>
                                    <strong>{{ $course->name }}</strong>
                                    <br>
                                    <small style="color:#8a737b;font-size:10px;">
                                        {{ $course->description }}
                                    </small>
                                </td>

                                <td style="white-space:nowrap;">
                                    Rp{{ number_format($course->fee, 0, ',', '.') }}
                                </td>

                                <td style="white-space:nowrap;">
                                    {{ $course->quota }} kursi
                                </td>

                                <td style="white-space:nowrap;">
                                    {{ $course->start_date
                                        ? $course->start_date->format('d-m-Y')
                                        : '-' }}
                                </td>

                                <td>
                                    <span class="course-status
                                        {{ $course->status == 'draft' ? 'status-draft' : '' }}
                                        {{ $course->status == 'closed' ? 'status-closed' : '' }}">
                                        {{ ucfirst($course->status) }}
                                    </span>
                                </td>

                                <td style="white-space:nowrap;">
                                    <a href="{{ route('courses.edit', $course->id) }}"
                                       class="btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('courses.destroy', $course->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="empty-data">
                                    Belum ada data kursus.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </div>
</div>

@endsection
