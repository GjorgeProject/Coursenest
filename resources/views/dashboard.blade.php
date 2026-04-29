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
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
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
                            <p class="text-sm text-gray-500 font-medium">My Courses</p>
                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">
                                {{ $enrolledCoursesCount }}
                            </h3>
                            <p class="text-sm text-gray-400 mt-3">Unlocked courses</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-2xl">
                            🔓
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
                            <p class="text-sm text-gray-400 mt-3">Unlocked courses</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-700 flex items-center justify-center text-2xl">
                            📈
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

                <!-- Left Column -->
                <div class="xl:col-span-2 space-y-8">

                    <!-- Continue Learning -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-xl font-extrabold text-gray-900">
                                    Continue Learning
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    Courses you have unlocked.
                                </p>
                            </div>

                            <a href="{{ route('student.courses.index') }}"
                                class="text-sm text-purple-600 font-semibold hover:underline">
                                View all
                            </a>
                        </div>

                        @if ($enrolledCourses->isEmpty())
                        <div class="bg-gray-50 rounded-3xl p-10 text-center">
                            <div class="w-16 h-16 bg-purple-100 text-purple-700 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                                🔒
                            </div>

                            <h4 class="text-xl font-bold text-gray-900">
                                No unlocked courses yet
                            </h4>

                            <p class="text-gray-500 mt-2">
                                Buy or unlock a course to start learning.
                            </p>

                            <a href="{{ route('student.courses.index') }}"
                                class="mt-6 inline-flex justify-center bg-purple-600 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition">
                                Explore Courses
                            </a>
                        </div>
                        @else
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach ($enrolledCourses as $course)
                            <div class="rounded-3xl border border-gray-100 overflow-hidden hover:shadow-lg transition bg-white h-full flex flex-col">
                                @if ($course->thumbnail)
                                <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                    alt="{{ $course->title }}"
                                    class="w-full h-40 object-cover object-center">
                                @else
                                <div class="w-full h-40 bg-purple-100 flex items-center justify-center text-purple-700 font-bold">
                                    CourseNest
                                </div>
                                @endif

                                <div class="p-5 flex flex-col flex-1">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">
                                            Unlocked
                                        </span>

                                        <span class="text-xs text-gray-500">
                                            {{ $course->published_lessons_count }} lessons
                                        </span>
                                    </div>

                                    <h4 class="font-extrabold text-gray-900 line-clamp-2 min-h-[48px]">
                                        {{ $course->title }}
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-2 line-clamp-2 min-h-[40px]">
                                        {{ $course->description ?? 'Continue learning with this course.' }}
                                    </p>

                                    <div class="mt-5 mb-5">
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

                                    <div class="mt-auto">
                                        <a href="{{ route('student.courses.show', $course) }}"
                                            class="inline-flex w-full justify-center items-center bg-purple-600 text-white px-4 py-3 rounded-2xl text-sm font-semibold hover:bg-purple-700 transition">
                                            Continue
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <!-- Explore Courses -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-xl font-extrabold text-gray-900">
                                    Explore Courses
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    Courses you can unlock next.
                                </p>
                            </div>

                            <a href="{{ route('student.courses.index') }}"
                                class="text-sm text-purple-600 font-semibold hover:underline">
                                Browse all
                            </a>
                        </div>

                        @if ($exploreCourses->isEmpty())
                        <div class="bg-gray-50 rounded-3xl p-8 text-center">
                            <div class="w-14 h-14 bg-green-100 text-green-700 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4">
                                ✅
                            </div>

                            <h4 class="text-lg font-bold text-gray-900">
                                You unlocked all available courses
                            </h4>

                            <p class="text-gray-500 mt-2">
                                New courses will appear here when published.
                            </p>
                        </div>
                        @else
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach ($exploreCourses as $course)
                            <div class="rounded-3xl border border-gray-100 overflow-hidden hover:shadow-lg transition bg-white h-full flex flex-col">
                                @if ($course->thumbnail)
                                <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                    alt="{{ $course->title }}"
                                    class="w-full h-40 object-cover object-center">
                                @else
                                <div class="w-full h-40 bg-gradient-to-br from-purple-100 to-indigo-100 flex items-center justify-center text-purple-700 font-bold">
                                    CourseNest
                                </div>
                                @endif

                                <div class="p-5 flex flex-col flex-1">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="text-xs bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold">
                                            Locked
                                        </span>

                                        <span class="text-xs text-gray-500">
                                            {{ $course->published_lessons_count }} lessons
                                        </span>
                                    </div>

                                    <h4 class="font-extrabold text-gray-900 line-clamp-2 min-h-[48px]">
                                        {{ $course->title }}
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-2 line-clamp-2 min-h-[40px]">
                                        {{ $course->description ?? 'Unlock this course and start learning.' }}
                                    </p>

                                    <div class="mt-5 mb-5 bg-gray-50 border border-gray-100 rounded-2xl p-4">
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-500">Price</span>
                                            <span class="font-extrabold text-gray-900">
                                                @if ($course->price > 0)
                                                ${{ number_format($course->price, 2) }}
                                                @else
                                                Free
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mt-auto">
                                        <a href="{{ route('student.checkout.show', $course) }}"
                                            class="inline-flex w-full justify-center items-center bg-slate-950 text-white px-4 py-3 rounded-2xl text-sm font-semibold hover:bg-black transition">
                                            Buy Course
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                </div>

                <!-- Right Column -->
                <div class="space-y-8">

                    <!-- Learning Tips -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-6">
                            Learning Tips
                        </h3>

                        <div class="space-y-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center">
                                    🎥
                                </div>

                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 text-sm">Watch lessons in order</p>
                                    <p class="text-xs text-gray-500 mt-1">Follow the course structure</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-700 flex items-center justify-center">
                                    📄
                                </div>

                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 text-sm">Use resources</p>
                                    <p class="text-xs text-gray-500 mt-1">Download files from lessons</p>
                                </div>
                            </div>

                            <a href="{{ route('student.courses.index') }}"
                                class="mt-4 inline-flex w-full justify-center border border-purple-200 text-purple-700 px-4 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                                Browse Courses
                            </a>
                        </div>
                    </div>

                    <!-- Announcements -->
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
                                    <p class="font-semibold text-gray-900 text-sm">Checkout demo is live</p>
                                    <p class="text-xs text-gray-500 mt-1">Unlock courses with simulated payment</p>
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