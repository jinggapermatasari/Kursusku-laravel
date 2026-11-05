<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Menampilkan semua kursus
    public function index()
    {
        $courses = Course::orderBy('id', 'asc')->get();

        return view('courses.index', compact('courses'));
    }

    // Menampilkan form tambah kursus
    public function create()
    {
        return view('courses.create');
    }

    // Menyimpan kursus baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20|unique:courses,code',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'status' => 'required|in:open,draft,closed',
        ]);

        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan!');
    }

    // Menampilkan form edit kursus
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Memperbarui data kursus
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20|unique:courses,code,' . $course->id,
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'status' => 'required|in:open,draft,closed',
        ]);

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil diperbarui!');
    }

    // Menghapus kursus
    public function destroy(Course $course)
    {
        if ($course->enrollments()->exists()) {
            return redirect()
                ->route('courses.index')
                ->with('error', 'Kursus tidak dapat dihapus karena sudah memiliki pendaftar.');
        }

        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil dihapus!');
    }
}
