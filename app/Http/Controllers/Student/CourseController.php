<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonProgress;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $user = request()->user();

        $courses = Course::where('status', 'published')
            ->with(['lessons' => function ($query) {
                $query->where('status', 'published');
            }])
            ->latest()
            ->get()
            ->map(function ($course) use ($user) {
                $lessonIds = $course->lessons->pluck('id');

                $completedCount = LessonProgress::where('user_id', $user->id)
                    ->whereIn('lesson_id', $lessonIds)
                    ->count();

                $totalLessons = $lessonIds->count();

                $course->completed_lessons_count = $completedCount;
                $course->published_lessons_count = $totalLessons;
                $course->progress_percentage = $totalLessons > 0
                    ? round(($completedCount / $totalLessons) * 100)
                    : 0;

                return $course;
            });

        return view('student.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        if ($course->status !== 'published') {
            abort(404);
        }

        $user = request()->user();

        $course->load(['lessons' => function ($query) {
            $query->where('status', 'published')->orderBy('position');
        }]);

        $completedLessonIds = LessonProgress::where('user_id', $user->id)
            ->whereIn('lesson_id', $course->lessons->pluck('id'))
            ->pluck('lesson_id')
            ->toArray();

        $totalLessons = $course->lessons->count();
        $completedCount = count($completedLessonIds);

        $progressPercentage = $totalLessons > 0
            ? round(($completedCount / $totalLessons) * 100)
            : 0;

        return view('student.courses.show', compact(
            'course',
            'completedLessonIds',
            'totalLessons',
            'completedCount',
            'progressPercentage'
        ));
    }

    public function lesson(Course $course, Lesson $lesson)
    {
        if ($course->status !== 'published' || $lesson->status !== 'published') {
            abort(404);
        }

        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $user = request()->user();

        $lessons = $course->lessons()
            ->where('status', 'published')
            ->orderBy('position')
            ->get();

        $completedLessonIds = LessonProgress::where('user_id', $user->id)
            ->whereIn('lesson_id', $lessons->pluck('id'))
            ->pluck('lesson_id')
            ->toArray();

        $isCompleted = in_array($lesson->id, $completedLessonIds);

        return view('student.lessons.show', compact(
            'course',
            'lesson',
            'lessons',
            'completedLessonIds',
            'isCompleted'
        ));
    }
}
