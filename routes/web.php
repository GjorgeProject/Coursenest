<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\LessonProgressController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (request()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    if (request()->user()->role !== 'admin') {
        abort(403);
    }

    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

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
