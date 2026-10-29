<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Halaman Beranda
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $featured = [
        [
            'code' => 'WEB-01',
            'name' => 'Web Dasar',
            'description' => 'Belajar HTML, CSS, dan dasar pembuatan website.',
            'fee' => 150000,
            'quota' => 20,
            'registered' => 8,
        ],
        [
            'code' => 'PHP-01',
            'name' => 'PHP Dasar',
            'description' => 'Belajar PHP untuk membangun aplikasi web.',
            'fee' => 200000,
            'quota' => 20,
            'registered' => 12,
        ],
        [
            'code' => 'LAR-01',
            'name' => 'Laravel Dasar',
            'description' => 'Membangun aplikasi web dengan Laravel.',
            'fee' => 250000,
            'quota' => 20,
            'registered' => 16,
        ],
    ];

    return view('home', [
        'siteName' => 'KursusKu',
        'tagline' => 'Tingkatkan kemampuan digitalmu',
        'featured' => $featured,
    ]);
})->name('home');


/*
|--------------------------------------------------------------------------
| Formulir Pendaftaran
|--------------------------------------------------------------------------
*/

Route::get('/pendaftaran', [
    EnrollmentController::class,
    'create',
])->name('enrollments.create');


/*
|--------------------------------------------------------------------------
| Preview Pendaftaran
|--------------------------------------------------------------------------
*/

Route::post('/pendaftaran/preview', [
    EnrollmentController::class,
    'preview',
])->name('enrollments.preview');


/*
|--------------------------------------------------------------------------
| Proses Pengiriman Pendaftaran
|--------------------------------------------------------------------------
*/

Route::post('/pendaftaran', [
    EnrollmentController::class,
    'store',
])->name('enrollments.store');


/*
|--------------------------------------------------------------------------
| Cek Ketersediaan Kursi
|--------------------------------------------------------------------------
*/

Route::get('/courses/{course}/availability', [
    EnrollmentController::class,
    'availability',
])->whereNumber('course')->name('courses.availability');


/*
|--------------------------------------------------------------------------
| Halaman Mulai Belajar
|--------------------------------------------------------------------------
|
| Pastikan file resources/views/belajar.blade.php tersedia.
|
*/

Route::view('/belajar', 'belajar')->name('belajar');