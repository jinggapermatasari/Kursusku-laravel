<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu';
        $tagline = 'Tingkatkan Skill Digitalmu Bersama KursusKu';

        $featured = [
            [
                'code' => 'WEB-01',
                'name' => 'Web Dasar',
                'description' => 'Belajar HTML, CSS, dan pembuatan website.',
                'fee' => 200000,
                'quota' => 30,
                'registered' => 12,
            ],
            [
                'code' => 'PHP-01',
                'name' => 'PHP Dasar',
                'description' => 'Belajar dasar pemrograman PHP.',
                'fee' => 250000,
                'quota' => 30,
                'registered' => 18,
            ],
            [
                'code' => 'LAR-01',
                'name' => 'Laravel Fundamental',
                'description' => 'Belajar membuat aplikasi menggunakan Laravel.',
                'fee' => 350000,
                'quota' => 25,
                'registered' => 20,
            ],
        ];

        return view('home', compact(
            'siteName',
            'tagline',
            'featured'
        ));
    }
}