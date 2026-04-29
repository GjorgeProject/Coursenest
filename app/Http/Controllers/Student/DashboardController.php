<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LessonProgress;

class DashboardController extends Controller
{
    public function index()
    {
        if (request()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $user = request()->user();

        $courses = Course::where('status', 'published')
            ->with(['lessons' => function ($query) {
                $query->where('status', 'published')->orderBy('position');
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

                $course->is_enrolled = $course->isEnrolledBy($user);

                return $course;
            });

        $enrolledCourses = $courses
            ->where('is_enrolled', true)
            ->take(3)
            ->values();

        $exploreCourses = $courses
            ->where('is_enrolled', false)
            ->take(3)
            ->values();

        $availableCoursesCount = $courses->count();

        $enrolledCoursesCount = $courses
            ->where('is_enrolled', true)
            ->count();

        $completedLessonsCount = LessonProgress::where('user_id', $user->id)->count();

        $averageProgress = $enrolledCourses->count() > 0
            ? round($enrolledCourses->avg('progress_percentage'))
            : 0;

        return view('dashboard', compact(
            'enrolledCourses',
            'exploreCourses',
            'availableCoursesCount',
            'enrolledCoursesCount',
            'completedLessonsCount',
            'averageProgress'
        ));
    }
}
