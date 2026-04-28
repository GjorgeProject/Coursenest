<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;

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
/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
