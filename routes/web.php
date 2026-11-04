<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

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


Route::get('/pendaftaran', [
    EnrollmentController::class,
    'create',
])->name('enrollments.create');


Route::post('/pendaftaran/preview', [
    EnrollmentController::class,
    'preview',
])->name('enrollments.preview');


Route::post('/pendaftaran', [
    EnrollmentController::class,
    'store',
])->name('enrollments.store');


Route::get('/courses/{course}/availability', [
    EnrollmentController::class,
    'availability',
])->whereNumber('course')->name('courses.availability');


Route::view('/belajar', 'belajar')->name('belajar');