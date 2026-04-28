<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonProgress;
use Illuminate\Http\RedirectResponse;

class LessonProgressController extends Controller
{
    public function toggle(Lesson $lesson): RedirectResponse
    {
        if ($lesson->status !== 'published') {
            abort(404);
        }

        $user = request()->user();

        $progress = LessonProgress::where('user_id', $user->id)
            ->where('lesson_id', $lesson->id)
            ->first();

        if ($progress) {
            $progress->delete();

            return back()->with('success', 'Lesson marked as incomplete.');
        }

        LessonProgress::create([
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
            'completed_at' => now(),
        ]);

        return back()->with('success', 'Lesson completed. Great job!');
    }
}
