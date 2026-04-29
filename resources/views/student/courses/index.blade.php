<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    My Courses
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Browse available courses and continue your learning.
                </p>
            </div>

            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center justify-center border border-purple-200 text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Hero / Search Visual -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                    <div class="lg:col-span-2">
                        <span class="inline-flex bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold">
                            Course Library
                        </span>

                        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mt-5">
                            Learn at your own pace
                        </h1>

                        <p class="text-gray-600 mt-3 max-w-2xl leading-relaxed">
                            Choose a course, watch video lessons, download resources, and track your progress step by step.
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-3xl p-5 border border-gray-100">

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div class="bg-white rounded-2xl p-4 border border-gray-100">
                                <p class="text-xs text-gray-500">Available</p>
                                <p class="text-2xl font-extrabold text-gray-900 mt-1">
                                    {{ $courses->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($courses->isEmpty())
            <div class="bg-white p-12 rounded-3xl shadow-sm border border-gray-100 text-center">
                <div class="w-20 h-20 bg-purple-100 text-purple-700 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-5">
                    📚
                </div>

                <h1 class="text-2xl font-extrabold text-gray-900 mb-2">
                    No courses available yet
                </h1>

                <p class="text-gray-600 max-w-md mx-auto">
                    Published courses will appear here when the admin adds them.
                </p>
            </div>
            @else
            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach ($courses as $course)
                <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition">

                    <div class="relative">
                        @if ($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}"
                            alt="{{ $course->title }}"
                            class="w-full h-56 object-cover">
                        @else
                        <div class="w-full h-56 bg-gradient-to-br from-purple-100 to-indigo-100 flex items-center justify-center">
                            <span class="text-purple-700 font-extrabold text-xl">
                                CourseNest
                            </span>
                        </div>
                        @endif

                        <div class="absolute top-4 left-4">
                            <span class="bg-white/90 backdrop-blur text-purple-700 px-3 py-1 rounded-full text-xs font-bold">
                                Published
                            </span>
                        </div>

                        <div class="absolute top-4 right-4">
                            <span class="bg-slate-950/80 backdrop-blur text-white px-3 py-1 rounded-full text-xs font-bold">
                                {{ $course->published_lessons_count }} lessons
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4">
                            <span class="bg-white/90 backdrop-blur text-gray-900 px-3 py-1 rounded-full text-xs font-extrabold">
                                @if ($course->price > 0)
                                ${{ number_format($course->price, 2) }}
                                @else
                                Free
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-extrabold text-gray-900 line-clamp-2">
                            {{ $course->title }}
                        </h3>

                        <p class="text-gray-500 text-sm line-clamp-3 mt-3 min-h-[63px]">
                            {{ $course->description ?? 'Learn through structured video lessons, resources, and progress tracking.' }}
                        </p>

                        <div class="mt-6 bg-gray-50 rounded-2xl p-4 border border-gray-100">
                            <div class="flex items-center justify-between text-sm mb-3">
                                <span class="text-gray-500">Progress</span>
                                <span class="font-bold text-gray-900">
                                    {{ $course->progress_percentage }}%
                                </span>
                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-purple-600 h-2.5 rounded-full"
                                    style="width: {{ $course->progress_percentage }}%;">
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-3 text-xs text-gray-500">
                                <span>
                                    {{ $course->completed_lessons_count }} completed
                                </span>

                                <span>
                                    {{ $course->published_lessons_count }} total
                                </span>
                            </div>
                        </div>

                        @if ($course->is_enrolled)
                        <a href="{{ route('student.courses.show', $course) }}"
                            class="mt-6 inline-flex items-center justify-center w-full bg-purple-600 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                            Open Course
                            <span class="ml-2 group-hover:translate-x-1 transition">→</span>
                        </a>
                        @else
                        <a href="{{ route('student.checkout.show', $course) }}"
                            class="mt-6 inline-flex items-center justify-center w-full bg-slate-950 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-black transition shadow-lg shadow-gray-200">
                            Buy Course
                            <span class="ml-2">
                                @if ($course->price > 0)
                                ${{ number_format($course->price, 2) }}
                                @else
                                Free
                                @endif
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</x-app-layout>