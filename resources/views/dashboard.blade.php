<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    Hello, {{ auth()->user()->name }} 👋
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Keep learning and achieve your goals.
                </p>
            </div>

            <a href="{{ route('student.courses.index') }}"
                class="inline-flex items-center justify-center bg-purple-600 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                Browse Courses
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Available Courses</p>
                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">
                                {{ $availableCoursesCount }}
                            </h3>
                            <p class="text-sm text-gray-400 mt-3">Published courses</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl">
                            📚
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Lessons Completed</p>
                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">
                                {{ $completedLessonsCount }}
                            </h3>
                            <p class="text-sm text-gray-400 mt-3">Keep going!</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-700 flex items-center justify-center text-2xl">
                            ✅
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Average Progress</p>
                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">
                                {{ $averageProgress }}%
                            </h3>
                            <p class="text-sm text-gray-400 mt-3">Across recent courses</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-2xl">
                            📈
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

                <!-- Continue Learning -->
                <div class="xl:col-span-2">
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-xl font-extrabold text-gray-900">
                                    Continue Learning
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    Pick up where you left off.
                                </p>
                            </div>

                            <a href="{{ route('student.courses.index') }}"
                                class="text-sm text-purple-600 font-semibold hover:underline">
                                View all
                            </a>
                        </div>

                        @if ($courses->isEmpty())
                        <div class="bg-gray-50 rounded-3xl p-10 text-center">
                            <div class="w-16 h-16 bg-purple-100 text-purple-700 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                                📚
                            </div>

                            <h4 class="text-xl font-bold text-gray-900">
                                No courses available yet
                            </h4>

                            <p class="text-gray-500 mt-2">
                                Published courses will appear here.
                            </p>
                        </div>
                        @else
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach ($courses as $course)
                            <div class="rounded-3xl border border-gray-100 overflow-hidden hover:shadow-lg transition bg-white">
                                @if ($course->thumbnail)
                                <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                    alt="{{ $course->title }}"
                                    class="w-full h-40 object-cover">
                                @else
                                <div class="w-full h-40 bg-purple-100 flex items-center justify-center text-purple-700 font-bold">
                                    CourseNest
                                </div>
                                @endif

                                <div class="p-5">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="text-xs bg-purple-100 text-purple-700 px-3 py-1 rounded-full font-semibold">
                                            Course
                                        </span>

                                        <span class="text-xs text-gray-500">
                                            {{ $course->published_lessons_count }} lessons
                                        </span>
                                    </div>

                                    <h4 class="font-extrabold text-gray-900 line-clamp-2">
                                        {{ $course->title }}
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-2 line-clamp-2">
                                        {{ $course->description ?? 'Continue learning with this course.' }}
                                    </p>

                                    <div class="mt-5">
                                        <div class="flex items-center justify-between text-xs text-gray-500 mb-2">
                                            <span>Progress</span>
                                            <span>{{ $course->progress_percentage }}%</span>
                                        </div>

                                        <div class="w-full bg-gray-100 rounded-full h-2">
                                            <div class="bg-purple-600 h-2 rounded-full"
                                                style="width: {{ $course->progress_percentage }}%;">
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('student.courses.show', $course) }}"
                                        class="mt-5 inline-flex w-full justify-center bg-purple-600 text-white px-4 py-3 rounded-2xl text-sm font-semibold hover:bg-purple-700 transition">
                                        Continue
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-8">

                    <!-- Upcoming Lessons Mockup -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-6">
                            Upcoming Lessons
                        </h3>

                        <div class="space-y-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center">
                                    🎥
                                </div>

                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 text-sm">Continue your next lesson</p>
                                    <p class="text-xs text-gray-500 mt-1">Available anytime</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-700 flex items-center justify-center">
                                    📄
                                </div>

                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 text-sm">Review lesson resources</p>
                                    <p class="text-xs text-gray-500 mt-1">PDF, ZIP, DOC support</p>
                                </div>
                            </div>

                            <a href="{{ route('student.courses.index') }}"
                                class="mt-4 inline-flex w-full justify-center border border-purple-200 text-purple-700 px-4 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                                View My Courses
                            </a>
                        </div>
                    </div>

                    <!-- Announcements Mockup -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-extrabold text-gray-900">
                                Announcements
                            </h3>

                            <span class="text-sm text-purple-600 font-semibold">New</span>
                        </div>

                        <div class="space-y-5">
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-purple-100 flex items-center justify-center">
                                    📢
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">New courses are added regularly</p>
                                    <p class="text-xs text-gray-500 mt-1">Keep checking your dashboard</p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-orange-100 flex items-center justify-center">
                                    ⚡
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Progress tracking is live</p>
                                    <p class="text-xs text-gray-500 mt-1">Mark lessons as completed</p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-green-100 flex items-center justify-center">
                                    ✅
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Resources are available</p>
                                    <p class="text-xs text-gray-500 mt-1">Download files from lessons</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>