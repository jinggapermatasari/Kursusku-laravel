<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'old_code' => 'WEB-01',
                'code' => 'WEB-101',
                'name' => 'Web Dasar',
                'description' => 'Belajar HTML, CSS, dan dasar pembuatan website.',
                'fee' => 300000,
                'quota' => 25,
                'start_date' => '2026-12-01',
                'status' => 'open',
            ],
            [
                'old_code' => 'PHP-01',
                'code' => 'PHP-101',
                'name' => 'PHP Fundamental',
                'description' => 'Belajar dasar pemrograman PHP.',
                'fee' => 400000,
                'quota' => 25,
                'start_date' => '2026-12-05',
                'status' => 'open',
            ],
            [
                'old_code' => 'LAR-01',
                'code' => 'LRV-101',
                'name' => 'Laravel Dasar',
                'description' => 'Belajar membangun aplikasi web dengan Laravel.',
                'fee' => 500000,
                'quota' => 20,
                'start_date' => '2026-12-10',
                'status' => 'open',
            ],
            [
                'code' => 'SQL-101',
                'name' => 'MySQL Dasar',
                'description' => 'Belajar pengelolaan database menggunakan MySQL.',
                'fee' => 350000,
                'quota' => 30,
                'start_date' => '2026-12-15',
                'status' => 'open',
            ],
            [
                'code' => 'UI-101',
                'name' => 'Bootstrap UI',
                'description' => 'Belajar membuat tampilan web menggunakan Bootstrap.',
                'fee' => 300000,
                'quota' => 25,
                'start_date' => '2026-12-20',
                'status' => 'draft',
            ],
            [
                'code' => 'JS-101',
                'name' => 'JavaScript Dasar',
                'description' => 'Belajar dasar pemrograman JavaScript.',
                'fee' => 400000,
                'quota' => 20,
                'start_date' => '2026-12-25',
                'status' => 'open',
            ],
            [
                'code' => 'AJAX-101',
                'name' => 'jQuery dan Ajax',
                'description' => 'Belajar interaksi web menggunakan jQuery dan Ajax.',
                'fee' => 450000,
                'quota' => 20,
                'start_date' => '2027-01-05',
                'status' => 'draft',
            ],
            [
                'code' => 'API-101',
                'name' => 'REST API Dasar',
                'description' => 'Belajar membuat dan menggunakan REST API.',
                'fee' => 550000,
                'quota' => 18,
                'start_date' => '2027-01-10',
                'status' => 'closed',
            ],
        ];

        foreach ($courses as $course) {
            $oldCode = $course['old_code'] ?? null;
            unset($course['old_code']);

            if ($oldCode) {
                $existingCourse = Course::where('code', $oldCode)->first();

                if ($existingCourse) {
                    $existingCourse->update($course);
                    continue;
                }
            }

            Course::updateOrCreate(
                ['code' => $course['code']],
                $course
            );
        }
    }
}
