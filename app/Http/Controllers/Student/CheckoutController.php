<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseEnrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function show(Course $course): View|RedirectResponse
    {
        if ($course->status !== 'published') {
            abort(404);
        }

        if ($course->isEnrolledBy(request()->user())) {
            return redirect()->route('student.courses.show', $course);
        }

        return view('student.checkout.show', compact('course'));
    }

    public function confirm(Course $course): RedirectResponse
    {
        if ($course->status !== 'published') {
            abort(404);
        }

        $user = request()->user();

        CourseEnrollment::updateOrCreate(
            [
                'user_id' => $user->id,
                'course_id' => $course->id,
            ],
            [
                'price' => $course->price,
                'payment_status' => 'verified',
                'enrolled_at' => now(),
            ]
        );

        return redirect()->route('student.checkout.verified', $course);
    }

    public function verified(Course $course): View
    {
        if (! $course->isEnrolledBy(request()->user())) {
            return redirect()->route('student.checkout.show', $course);
        }

        return view('student.checkout.verified', compact('course'));
    }
}
