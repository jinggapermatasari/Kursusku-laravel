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

    /* FORM SEARCH DAN FILTER */
    .filter-form {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: end;
        background: #fffafa;
        border: 1px solid #eadde1;
        border-radius: 10px;
        padding: 15px;
        margin: 18px 0;
    }

    .filter-group {
        flex: 1;
        min-width: 180px;
    }

    .filter-group label {
        display: block;
        color: #701c35;
        font-weight: 700;
        font-size: 12px;
        margin-bottom: 6px;
    }

    .filter-control {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d9c4cc;
        border-radius: 7px;
        padding: 9px 11px;
        font-size: 12px;
        color: #49343b;
        background: white;
        outline: none;
    }

    .filter-control:focus {
        border-color: #701c35;
        box-shadow: 0 0 0 2px rgba(112, 28, 53, .1);
    }

    .btn-search {
        background: #701c35;
        color: white;
        border: none;
        padding: 10px 17px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-search:hover {
        background: #551329;
    }

    .btn-reset {
        display: inline-block;
        background: white;
        color: #701c35;
        border: 1px solid #701c35;
        padding: 9px 15px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        text-align: center;
    }

    .btn-reset:hover {
        background: #f7e8ed;
    }

    /* TABEL KURSUS */
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

    /* STATUS */
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

    /* TOMBOL */
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

    .btn-detail,
    .btn-edit,
    .btn-delete {
        display: inline-block;
        border: none;
        padding: 5px 9px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 11px;
        cursor: pointer;
        margin-bottom: 3px;
    }

    .btn-detail {
        background: #f5e5eb;
        color: #701c35;
    }

    .btn-edit {
        background: #e9edf8;
        color: #344b87;
    }

    .btn-delete {
        background: #fde8e8;
        color: #b42318;
    }

    /* DATA KOSONG */
    .empty-data {
        text-align: center;
        padding: 28px;
        color: #8a737b;
    }

    .table-responsive {
        overflow-x: auto;
    }

    /* INFORMASI PAGINATION */
    .pagination-info {
        color: #8a737b;
        font-size: 12px;
        margin-top: 15px;
    }

    /* PAGINATION CUSTOM */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 6px;
        margin-top: 20px;
        width: 100%;
    }

    .pagination-wrapper a,
    .pagination-wrapper span {
        box-sizing: border-box;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        min-width: 36px;
        height: 36px;
        padding: 0 10px;
        border: 1px solid #eadde1;
        border-radius: 6px;
        background: white;
        color: #701c35;
        font-size: 13px;
        line-height: 1;
        text-decoration: none;
    }

    .pagination-wrapper a:hover {
        background: #f7e8ed;
        border-color: #701c35;
    }

    .pagination-wrapper .pagination-active {
        background: #701c35;
        color: white;
        border-color: #701c35;
        font-weight: 700;
    }

    .pagination-wrapper .pagination-disabled {
        background: #f5f0f2;
        color: #b7a5ac;
        border-color: #eadde1;
        cursor: not-allowed;
    }

    /* RESPONSIVE */
    @media (max-width: 600px) {
        .course-header {
            padding: 18px;
        }

        .course-card {
            padding: 12px;
        }

        .filter-form {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-group {
            width: 100%;
        }

        .pagination-wrapper {
            gap: 4px;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            min-width: 32px;
            height: 32px;
            padding: 0 8px;
        }
    }
</style>

<div class="course-page">
    <div class="course-container">

        {{-- HEADER --}}
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

        {{-- PESAN SUKSES --}}
        @if(session('success'))
            <div style="background:#e8f5ed;color:#247345;
                padding:10px;border-radius:7px;margin-bottom:15px;font-size:12px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- PESAN ERROR --}}
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

            {{-- FORM SEARCH DAN FILTER --}}
            <form action="{{ route('courses.index') }}"
                  method="GET"
                  class="filter-form">

                <div class="filter-group">
                    <label for="search">Cari Kursus</label>

                    <input
                        type="text"
                        id="search"
                        name="q"
                        class="filter-control"
                        placeholder="Masukkan kode atau nama kursus..."
                        value="{{ $search ?? '' }}">
                </div>

                <div class="filter-group">
                    <label for="status">Filter Status</label>

                    <select name="status" id="status" class="filter-control">
                        <option value="">Semua Status</option>

                        <option value="open"
                            {{ ($status ?? '') == 'open' ? 'selected' : '' }}>
                            Open
                        </option>

                        <option value="closed"
                            {{ ($status ?? '') == 'closed' ? 'selected' : '' }}>
                            Closed
                        </option>

                        <option value="draft"
                            {{ ($status ?? '') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn-search">
                    Cari
                </button>

                <a href="{{ route('courses.index') }}" class="btn-reset">
                    Reset
                </a>

            </form>

            {{-- PEMBUNGKUS HASIL AJAX --}}
            <div id="course-results">

                {{-- TABEL KURSUS --}}
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
                                    <td>
                                        {{ $courses->firstItem() + $loop->index }}
                                    </td>

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

                                    {{-- TOMBOL CRUD --}}
                                    <td style="white-space:nowrap;">

                                        <a href="{{ route('courses.show', $course->id) }}"
                                           class="btn-detail">
                                            Detail
                                        </a>

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
                                        <strong>Data kursus tidak ditemukan.</strong>
                                        <br>
                                        <small>
                                            Coba ubah kata pencarian atau filter status.
                                        </small>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                {{-- INFORMASI PAGINATION --}}
                @if($courses->total() > 0)
                    <div class="pagination-info">
                        Menampilkan {{ $courses->firstItem() }}
                        sampai {{ $courses->lastItem() }}
                        dari {{ $courses->total() }} kursus.
                    </div>
                @endif

                {{-- PAGINATION CUSTOM --}}
                @if($courses->hasPages())
                    <div class="pagination-wrapper">

                        {{-- PREVIOUS --}}
                        @if($courses->onFirstPage())
                            <span class="pagination-disabled"
                                  aria-disabled="true">
                                &laquo;
                            </span>
                        @else
                            <a href="{{ $courses->previousPageUrl() }}"
                               aria-label="Halaman sebelumnya">
                                &laquo;
                            </a>
                        @endif

                        {{-- NOMOR HALAMAN --}}
                        @foreach($courses->getUrlRange(1, $courses->lastPage()) as $page => $url)
                            @if($page == $courses->currentPage())
                                <span class="pagination-active"
                                      aria-current="page">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- NEXT --}}
                        @if($courses->hasMorePages())
                            <a href="{{ $courses->nextPageUrl() }}"
                               aria-label="Halaman berikutnya">
                                &raquo;
                            </a>
                        @else
                            <span class="pagination-disabled"
                                  aria-disabled="true">
                                &raquo;
                            </span>
                        @endif

                    </div>
                @endif

            </div>
            {{-- AKHIR PEMBUNGKUS HASIL AJAX --}}

        </div>
    </div>
</div>

{{-- AJAX SEARCH, FILTER, PAGINATION, DAN RESET --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.filter-form');
    const results = document.getElementById('course-results');

    if (!form || !results) {
        return;
    }

    const searchInput = form.querySelector('[name="q"]');
    const statusInput = form.querySelector('[name="status"]');
    const resetButton = form.querySelector('.btn-reset');

    let timer;

    // Mengambil hasil kursus melalui AJAX
    function loadCourses(url, updateHistory = true) {
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal mengambil data kursus.');
            }

            return response.text();
        })
        .then(html => {
            const parser = new DOMParser();
            const ajaxDocument = parser.parseFromString(html, 'text/html');
            const newResults = ajaxDocument.querySelector('#course-results');

            if (!newResults) {
                throw new Error('Bagian hasil kursus tidak ditemukan.');
            }

            results.innerHTML = newResults.innerHTML;

            if (updateHistory) {
                window.history.pushState({}, '', url);
            }
        })
        .catch(error => {
            console.error('AJAX Error:', error);

            // Jika AJAX gagal, gunakan navigasi biasa
            window.location.href = url;
        });
    }

    // Membentuk URL pencarian dan filter
    function getSearchUrl() {
        const params = new URLSearchParams();

        const keyword = searchInput.value.trim();
        const status = statusInput.value;

        if (keyword !== '') {
            params.set('q', keyword);
        }

        if (status !== '') {
            params.set('status', status);
        }

        return form.action + '?' + params.toString();
    }

    // Ketika form Cari dikirim
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        clearTimeout(timer);

        loadCourses(getSearchUrl());
    });

    // Pencarian otomatis dengan jeda 300 milidetik
    searchInput.addEventListener('input', function () {
        clearTimeout(timer);

        timer = setTimeout(function () {
            loadCourses(getSearchUrl());
        }, 300);
    });

    // Filter status otomatis
    statusInput.addEventListener('change', function () {
        clearTimeout(timer);

        loadCourses(getSearchUrl());
    });

    // Pagination tanpa reload halaman
    results.addEventListener('click', function (event) {
        const link = event.target.closest('.pagination-wrapper a');

        if (link) {
            event.preventDefault();

            clearTimeout(timer);

            loadCourses(link.href);
        }
    });

    // Tombol Reset
    if (resetButton) {
        resetButton.addEventListener('click', function (event) {
            event.preventDefault();

            clearTimeout(timer);

            searchInput.value = '';
            statusInput.value = '';

            loadCourses(resetButton.href);
        });
    }

    // Mendukung tombol Back dan Forward browser
    window.addEventListener('popstate', function () {
        const params = new URLSearchParams(window.location.search);

        searchInput.value = params.get('q') || '';
        statusInput.value = params.get('status') || '';

        loadCourses(window.location.href, false);
    });
});
</script>

@endsection