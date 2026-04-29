<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;

class EnrollmentController extends Controller
{
    public function index()
    {
        if (request()->user()->role !== 'admin') {
            abort(403);
        }

        $enrollments = CourseEnrollment::with(['user', 'course'])
            ->latest()
            ->get();

        $totalEnrollments = $enrollments->count();

        $totalRevenue = $enrollments
            ->where('payment_status', 'verified')
            ->sum('price');

        $verifiedEnrollments = $enrollments
            ->where('payment_status', 'verified')
            ->count();

        return view('admin.enrollments.index', compact(
            'enrollments',
            'totalEnrollments',
            'totalRevenue',
            'verifiedEnrollments'
        ));
    }
}
