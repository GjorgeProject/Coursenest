<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use App\Http\Controllers\Student\LessonProgressController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredCourses = Course::where('status', 'published')
        ->withCount(['lessons' => function ($query) {
            $query->where('status', 'published');
        }])
        ->latest()
        ->take(3)
        ->get();

    return view('welcome', compact('featuredCourses'));
});

Route::get('/dashboard', function () {
    if (request()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('courses', CourseController::class);
    Route::resource('lessons', LessonController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/courses', [StudentCourseController::class, 'index'])->name('student.courses.index');
    Route::get('/courses/{course}', [StudentCourseController::class, 'show'])->name('student.courses.show');
    Route::get('/courses/{course}/lessons/{lesson}', [StudentCourseController::class, 'lesson'])->name('student.lessons.show');

    Route::post('/lessons/{lesson}/toggle-progress', [LessonProgressController::class, 'toggle'])
        ->name('student.lessons.toggle-progress');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
