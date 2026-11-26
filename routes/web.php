<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;


// ==========================================
// HALAMAN BERANDA
// ==========================================

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


// ==========================================
// LOGIN, REGISTER, DAN LUPA PASSWORD
// ==========================================

Route::middleware('guest')->group(function () {

    // LOGIN
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');


    // REGISTER
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');


    // LUPA PASSWORD - GANTI PASSWORD LANGSUNG
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
        ->name('password.request');

    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])
        ->name('password.email');

});


// ==========================================
// HALAMAN SETELAH LOGIN
// ==========================================

Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');


    // PROFIL
    Route::get('/profil', [AuthController::class, 'profile'])
        ->name('profile');


    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});


// ==========================================
// PENDAFTARAN KURSUS
// ==========================================

Route::get('/pendaftaran', [EnrollmentController::class, 'create'])
    ->name('enrollments.create');

Route::post('/pendaftaran/preview', [EnrollmentController::class, 'preview'])
    ->name('enrollments.preview');

Route::post('/pendaftaran', [EnrollmentController::class, 'store'])
    ->name('enrollments.store');


// ==========================================
// LAPORAN ENROLLMENT
// ==========================================

Route::get('/enrollments', [EnrollmentController::class, 'index'])
    ->name('enrollments.index');


// ==========================================
// CEK KETERSEDIAAN KURSI
// ==========================================

Route::get('/courses/{course}/availability', [EnrollmentController::class, 'availability'])
    ->name('courses.availability');


// ==========================================
// PENGELOLAAN KURSUS (CRUD)
// ==========================================

Route::resource('courses', CourseController::class);


// ==========================================
// HALAMAN MULAI BELAJAR
// ==========================================

Route::view('/belajar', 'belajar')
    ->name('belajar');
