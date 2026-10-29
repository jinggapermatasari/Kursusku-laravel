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
     * Menampilkan halaman pendaftaran kursus.
     */
    public function create()
    {
        $courses = Course::all();

        return view('pendaftaran', compact('courses'));
    }

    /**
     * Memproses pemeriksaan data pendaftaran.
     */
    public function preview(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $course = Course::findOrFail($validated['course_id']);

        $enrolled = Enrollment::where(
            'course_id',
            $course->id
        )->count();

        if ($enrolled >= $course->capacity) {
            throw ValidationException::withMessages([
                'course_id' => 'Maaf, kursus ini sudah penuh.',
            ]);
        }

        return view('pendaftaran', [
            'courses' => Course::all(),
            'selectedCourse' => $course,
            'formData' => $validated,
        ]);
    }

    /**
     * Menyimpan pendaftaran kursus.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        DB::transaction(function () use ($validated) {
            $course = Course::whereKey($validated['course_id'])
                ->lockForUpdate()
                ->firstOrFail();

            $enrolled = Enrollment::where(
                'course_id',
                $course->id
            )->count();

            if ($enrolled >= $course->capacity) {
                throw ValidationException::withMessages([
                    'course_id' => 'Maaf, kursus ini sudah penuh. Silakan pilih kursus lain.',
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
            ->with('success', 'Pendaftaran kursus berhasil!');
    }

    /**
     * Mengecek sisa kursi kursus.
     */
    public function availability($id)
    {
        $course = Course::findOrFail($id);

        $enrolled = Enrollment::where(
            'course_id',
            $course->id
        )->count();

        $remaining = max(
            0,
            $course->capacity - $enrolled
        );

        return response()->json([
            'course' => $course->name,
            'remaining' => $remaining,
            'is_full' => $remaining === 0,
        ]);
    }
}