<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    private function ensureAdmin(): void
    {
        if (request()->user()->role !== 'admin') {
            abort(403);
        }
    }

    public function index()
    {
        $this->ensureAdmin();

        $lessons = Lesson::with('course')->latest()->get();

        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $this->ensureAdmin();

        $courses = Course::orderBy('title')->get();

        return view('admin.lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'video_url' => ['nullable', 'string'],
            'resource_name' => ['nullable', 'string', 'max:255'],
            'resource_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip,txt', 'max:5120'],
            'duration' => ['nullable', 'string', 'max:50'],
            'position' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['title'],
            $validated['course_id']
        );

        if ($request->hasFile('resource_file')) {
            $validated['resource_file'] = $request
                ->file('resource_file')
                ->store('lessons/resources', 'public');
        }

        Lesson::create($validated);

        return redirect()
            ->route('admin.lessons.index')
            ->with('success', 'Lesson created successfully.');
    }

    public function show(Lesson $lesson)
    {
        $this->ensureAdmin();

        $lesson->load('course');

        return view('admin.lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        $this->ensureAdmin();

        $courses = Course::orderBy('title')->get();

        return view('admin.lessons.edit', compact('lesson', 'courses'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'video_url' => ['nullable', 'string'],
            'resource_name' => ['nullable', 'string', 'max:255'],
            'resource_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip,txt', 'max:5120'],
            'duration' => ['nullable', 'string', 'max:50'],
            'position' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $newSlug = Str::slug($validated['title']);

        if ($newSlug !== $lesson->slug || (int) $validated['course_id'] !== (int) $lesson->course_id) {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $validated['course_id'],
                $lesson->id
            );
        }

        if ($request->hasFile('resource_file')) {
            if ($lesson->resource_file) {
                Storage::disk('public')->delete($lesson->resource_file);
            }

            $validated['resource_file'] = $request->file('resource_file')->store('lessons/resources', 'public');
        } else {
            unset($validated['resource_file']);
        }

        $lesson->update($validated);

        return redirect()->route('admin.lessons.index')
            ->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Lesson $lesson)
    {
        $this->ensureAdmin();

        if ($lesson->resource_file) {
            Storage::disk('public')->delete($lesson->resource_file);
        }

        $lesson->delete();

        return redirect()->route('admin.lessons.index')
            ->with('success', 'Lesson deleted successfully.');
    }

    private function generateUniqueSlug(string $title, int $courseId, ?int $ignoreLessonId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Lesson::where('course_id', $courseId)
            ->where('slug', $slug)
            ->when($ignoreLessonId, function ($query) use ($ignoreLessonId) {
                $query->where('id', '!=', $ignoreLessonId);
            })
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
