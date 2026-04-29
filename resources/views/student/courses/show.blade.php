<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    {{ $course->title }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Course overview and lesson list.
                </p>
            </div>

            <a href="{{ route('student.courses.index') }}"
                class="inline-flex items-center justify-center border border-purple-200 text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                Back to Courses
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Course Hero -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-5">

                    <!-- Image -->
                    <div class="lg:col-span-2">
                        @if ($course->thumbnail)
                        <div class="w-full h-72 lg:h-full bg-gray-50 flex items-center justify-center p-6">
                            <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                alt="{{ $course->title }}"
                                class="max-w-full max-h-full object-contain rounded-2xl">
                        </div>
                        @else
                        <div class="w-full h-72 lg:h-full bg-gradient-to-br from-purple-100 to-indigo-100 flex items-center justify-center">
                            <span class="text-purple-700 text-2xl font-extrabold">
                                CourseNest
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="lg:col-span-3 p-8 lg:p-10">
                        <div class="flex flex-wrap items-center gap-3 mb-5">
                            <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-bold">
                                Published Course
                            </span>

                            <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-semibold">
                                {{ $totalLessons }} lessons
                            </span>
                        </div>

                        <h1 class="text-3xl lg:text-5xl font-extrabold text-gray-900 leading-tight">
                            {{ $course->title }}
                        </h1>

                        <p class="text-gray-600 leading-relaxed mt-5">
                            {{ $course->description ?? 'Learn through structured video lessons, resources, and progress tracking.' }}
                        </p>

                        <!-- Progress -->
                        <div class="mt-8 bg-gray-50 rounded-3xl p-5 border border-gray-100">
                            <div class="flex items-center justify-between text-sm text-gray-600 mb-3">
                                <span class="font-semibold">Course Progress</span>
                                <span class="font-bold text-gray-900">
                                    {{ $completedCount }} / {{ $totalLessons }} completed · {{ $progressPercentage }}%
                                </span>
                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-purple-600 h-3 rounded-full"
                                    style="width: {{ $progressPercentage }}%;">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col sm:flex-row gap-4">
                            @if ($course->lessons->isNotEmpty())
                            <a href="{{ route('student.lessons.show', [$course, $course->lessons->first()]) }}"
                                class="inline-flex justify-center items-center bg-purple-600 text-white px-6 py-3.5 rounded-2xl font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                                Start Course →
                            </a>
                            @endif

                            <a href="#lessons"
                                class="inline-flex justify-center items-center border border-purple-200 text-purple-700 px-6 py-3.5 rounded-2xl font-semibold hover:bg-purple-50 transition">
                                View Lessons
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lessons Section -->
            <div id="lessons" class="grid grid-cols-1 xl:grid-cols-3 gap-8">

                <!-- Lessons List -->
                <div class="xl:col-span-2">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-8 border-b border-gray-100">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <h2 class="text-2xl font-extrabold text-gray-900">
                                        Course Lessons
                                    </h2>

                                    <p class="text-gray-500 mt-1">
                                        Follow the lessons step by step.
                                    </p>
                                </div>

                                <span class="hidden sm:inline-flex bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-bold">
                                    {{ $progressPercentage }}% Done
                                </span>
                            </div>
                        </div>

                        <div class="divide-y divide-gray-100">
                            @forelse ($course->lessons as $lesson)
                            <a href="{{ route('student.lessons.show', [$course, $lesson]) }}"
                                class="group flex items-center justify-between gap-5 p-6 hover:bg-purple-50/50 transition">

                                <div class="flex items-center gap-5 min-w-0">
                                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold shrink-0
                                            {{ in_array($lesson->id, $completedLessonIds) ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                        @if (in_array($lesson->id, $completedLessonIds))
                                        ✓
                                        @else
                                        {{ $lesson->position }}
                                        @endif
                                    </div>

                                    <div class="min-w-0">
                                        <h3 class="font-extrabold text-gray-900 group-hover:text-purple-700 transition truncate">
                                            {{ $lesson->title }}
                                        </h3>

                                        <div class="flex flex-wrap items-center gap-3 mt-2 text-sm text-gray-500">
                                            <span>
                                                {{ $lesson->duration ?? 'No duration' }}
                                            </span>

                                            @if ($lesson->resource_file)
                                            <span class="text-purple-600 font-semibold">
                                                Resource included
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="hidden sm:flex items-center gap-3 shrink-0">
                                    @if (in_array($lesson->id, $completedLessonIds))
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                        Completed
                                    </span>
                                    @endif

                                    <span class="bg-purple-600 text-white px-4 py-2 rounded-xl text-sm font-semibold group-hover:bg-purple-700 transition">
                                        Watch
                                    </span>
                                </div>
                            </a>
                            @empty
                            <div class="p-10 text-center">
                                <div class="w-16 h-16 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-3xl mx-auto mb-4">
                                    🎥
                                </div>

                                <h3 class="text-xl font-bold text-gray-900">
                                    No lessons yet
                                </h3>

                                <p class="text-gray-500 mt-2">
                                    Published lessons will appear here.
                                </p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Right Info Panel -->
                <div class="space-y-8">

                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-6">
                            Course Summary
                        </h3>

                        <div class="space-y-5">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500">Total Lessons</span>
                                <span class="font-extrabold text-gray-900">{{ $totalLessons }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-gray-500">Completed</span>
                                <span class="font-extrabold text-gray-900">{{ $completedCount }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-gray-500">Progress</span>
                                <span class="font-extrabold text-purple-600">{{ $progressPercentage }}%</span>
                            </div>

                            <div class="pt-5 border-t border-gray-100">
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div class="bg-purple-600 h-3 rounded-full"
                                        style="width: {{ $progressPercentage }}%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-950 text-white p-8 rounded-3xl shadow-sm">
                        <div class="w-14 h-14 rounded-2xl bg-purple-600 flex items-center justify-center text-2xl mb-5">
                            🚀
                        </div>

                        <h3 class="text-xl font-extrabold">
                            Keep going
                        </h3>

                        <p class="text-slate-300 mt-3 text-sm leading-relaxed">
                            Complete each lesson, download resources, and track your progress until the course is finished.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>