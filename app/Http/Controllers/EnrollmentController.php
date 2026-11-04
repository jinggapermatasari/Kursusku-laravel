<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class EnrollmentController extends Controller
{
    /**
     * Menampilkan formulir pendaftaran.
     */
    public function create()
    {
        $courses = Course::orderBy('id')->get();

        $availability = $this->getAvailability();

        return view('enrollments.create', compact(
            'courses',
            'availability'
        ));
    }

    /**
     * Memeriksa data sebelum pendaftaran dikirim.
     */
    public function preview(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'course_id' => 'required|integer|exists:courses,id',
        ]);

        $course = Course::findOrFail(
            $validated['course_id']
        );

        $enrolled = Enrollment::where(
            'course_id',
            $course->id
        )->count();

        if ($enrolled >= $course->capacity) {
            throw ValidationException::withMessages([
                'course_id' => 'Maaf, kursus ini sudah penuh.',
            ]);
        }

        return view('enrollments.preview', [
            'course' => $course,
            'formData' => $validated,
        ]);
    }

    /**
     * Menyimpan pendaftaran ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'course_id' => 'required|integer|exists:courses,id',
        ]);

        DB::transaction(function () use ($validated) {

            $course = Course::whereKey(
                $validated['course_id']
            )->lockForUpdate()->firstOrFail();

            $enrolled = Enrollment::where(
                'course_id',
                $course->id
            )->count();

            if ($enrolled >= $course->capacity) {
                throw ValidationException::withMessages([
                    'course_id' =>
                        'Kursus sudah penuh. Silakan pilih kursus lain.',
                ]);
            }

            Enrollment::create([
                'course_id' => $course->id,
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]);
        });

        return redirect()
            ->route('enrollments.create')
            ->with(
                'success',
                'Pendaftaran kursus berhasil disimpan!'
            );
    }

    /**
     * Menghitung ketersediaan kursi setiap kursus.
     */
    private function getAvailability()
    {
        $courses = Course::orderBy('id')->get();

        $enrollmentCounts = Enrollment::selectRaw(
            'course_id, COUNT(*) as total'
        )
            ->groupBy('course_id')
            ->pluck('total', 'course_id');

        return $courses->mapWithKeys(function ($course) use (
            $enrollmentCounts
        ) {
            $enrolled = (int) (
                $enrollmentCounts[$course->id] ?? 0
            );

            $capacity = (int) $course->capacity;

            return [
                $course->id => [
                    'name' => $course->name,
                    'capacity' => $capacity,
                    'enrolled' => $enrolled,
                    'remaining' => max(
                        0,
                        $capacity - $enrolled
                    ),
                ],
            ];
        });
    }

    /**
     * Mengecek ketersediaan kursi melalui Ajax.
     */
    public function availability($course)
    {
        $course = Course::findOrFail($course);

        $enrolled = Enrollment::where(
            'course_id',
            $course->id
        )->count();

        $capacity = (int) $course->capacity;

        $remaining = max(
            0,
            $capacity - $enrolled
        );

        return response()->json([
            'id' => $course->id,
            'course' => $course->name,
            'capacity' => $capacity,
            'enrolled' => $enrolled,
            'remaining' => $remaining,
            'is_full' => $remaining === 0,
        ]);
    }
}