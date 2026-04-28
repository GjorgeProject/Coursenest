<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (request()->user()->role !== 'admin') {
            abort(403);
        }

        $totalCourses = Course::count();
        $totalLessons = Lesson::count();
        $totalStudents = User::where('role', 'student')->count();

        $recentCourses = Course::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalCourses',
            'totalLessons',
            'totalStudents',
            'recentCourses'
        ));
    }
}
