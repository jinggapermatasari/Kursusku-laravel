<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class EnrollmentController extends Controller
{
    /**
     * Menampilkan formulir pendaftaran.
     */
    public function create()
    {
        $participants = Participant::orderBy('name')->get();

        $courses = Course::orderBy('name')->get();

        $availability = $this->getAvailability();

        return view('enrollments.create', compact(
            'participants',
            'courses',
            'availability'
        ));
    }

    /**
     * Menampilkan laporan enrollment.
     */
    public function index()
    {
        $enrollments = Enrollment::with([
            'participant',
            'course',
        ])->latest()->get();

        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Memeriksa data pendaftaran lama sebelum preview.
     */
    public function preview(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'course_id' => 'required|integer|exists:courses,id',
        ]);

        $course = Course::findOrFail($validated['course_id']);

        $enrolled = Enrollment::where(
            'course_id',
            $course->id
        )->count();

        if ($enrolled >= (int) $course->quota) {
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
     * Menyimpan pendaftaran lama maupun relasional.
     */
    public function store(Request $request)
    {
        /*
         * PENDAFTARAN RELASIONAL MEETING 12
         */
        if ($request->has('participant_id')) {

            $data = $request->validate([
                'participant_id' => [
                    'required',
                    'integer',
                    'exists:participants,id',
                ],

                'course_id' => [
                    'required',
                    'integer',
                    'exists:courses,id',
                    Rule::unique('enrollments')->where(
                        fn ($query) => $query->where(
                            'participant_id',
                            $request->input('participant_id')
                        )
                    ),
                ],
            ], [
                'participant_id.required' =>
                    'Silakan pilih peserta terlebih dahulu.',

                'participant_id.exists' =>
                    'Peserta yang dipilih tidak ditemukan.',

                'course_id.required' =>
                    'Silakan pilih kursus terlebih dahulu.',

                'course_id.unique' =>
                    'Peserta ini sudah terdaftar pada kursus tersebut.',
            ]);

            DB::transaction(function () use ($data) {

                $course = Course::whereKey(
                    $data['course_id']
                )->lockForUpdate()->firstOrFail();

                $enrolled = Enrollment::where(
                    'course_id',
                    $course->id
                )->count();

                if ($enrolled >= (int) $course->quota) {
                    throw ValidationException::withMessages([
                        'course_id' =>
                            'Kursus sudah penuh. Silakan pilih kursus lain.',
                    ]);
                }

                Enrollment::create([
                    'participant_id' => $data['participant_id'],
                    'course_id' => $data['course_id'],
                    'status' => 'registered',
                ]);
            });

            return redirect()
                ->route('enrollments.index')
                ->with(
                    'success',
                    'Enrollment berhasil disimpan.'
                );
        }

        /*
         * PENDAFTARAN LAMA KURSUSKU
         */
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

            if ($enrolled >= (int) $course->quota) {
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

            $capacity = (int) $course->quota;

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

        $capacity = (int) $course->quota;

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