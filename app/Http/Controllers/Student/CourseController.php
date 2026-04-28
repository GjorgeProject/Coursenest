<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 'published')
            ->withCount(['lessons' => function ($query) {
                $query->where('status', 'published');
            }])
            ->latest()
            ->get();

        return view('student.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        if ($course->status !== 'published') {
            abort(404);
        }

        $course->load(['lessons' => function ($query) {
            $query->where('status', 'published')->orderBy('position');
        }]);

        return view('student.courses.show', compact('course'));
    }

    public function lesson(Course $course, Lesson $lesson)
    {
        if ($course->status !== 'published' || $lesson->status !== 'published') {
            abort(404);
        }

        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $lessons = $course->lessons()
            ->where('status', 'published')
            ->orderBy('position')
            ->get();

        return view('student.lessons.show', compact('course', 'lesson', 'lessons'));
    }
}
