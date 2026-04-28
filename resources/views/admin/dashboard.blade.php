<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Admin Dashboard
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Overview of your CourseNest platform.
                </p>
            </div>

            <span class="text-sm bg-purple-100 text-purple-700 px-3 py-1 rounded-full">
                Admin
            </span>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="text-sm text-gray-500">Total Courses</h3>
                    <p class="text-4xl font-bold text-gray-900 mt-2">
                        {{ $totalCourses }}
                    </p>
                    <p class="text-sm text-gray-400 mt-2">
                        All courses created
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="text-sm text-gray-500">Total Lessons</h3>
                    <p class="text-4xl font-bold text-gray-900 mt-2">
                        {{ $totalLessons }}
                    </p>
                    <p class="text-sm text-gray-400 mt-2">
                        Lessons across all courses
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="text-sm text-gray-500">Total Students</h3>
                    <p class="text-4xl font-bold text-gray-900 mt-2">
                        {{ $totalStudents }}
                    </p>
                    <p class="text-sm text-gray-400 mt-2">
                        Registered student users
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">
                        Welcome to CourseNest Admin
                    </h1>

                    <p class="text-gray-600 mb-6">
                        Manage courses, lessons, students, documents, and announcements from one place.
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('admin.courses.index') }}"
                            class="bg-purple-600 text-white px-5 py-3 rounded-lg hover:bg-purple-700 transition">
                            Manage Courses
                        </a>

                        <a href="{{ route('admin.lessons.index') }}"
                            class="bg-gray-900 text-white px-5 py-3 rounded-lg hover:bg-black transition">
                            Manage Lessons
                        </a>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-5">
                        <h2 class="text-xl font-bold text-gray-900">
                            Recent Courses
                        </h2>

                        <a href="{{ route('admin.courses.index') }}"
                            class="text-sm text-purple-600 hover:underline">
                            View all
                        </a>
                    </div>

                    <div class="space-y-4">
                        @forelse ($recentCourses as $course)
                        <div class="border rounded-lg p-4">
                            <div class="flex items-center justify-between gap-3">
                                <div>
                                    <h3 class="font-semibold text-gray-900">
                                        {{ $course->title }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ $course->created_at->format('d M Y') }}
                                    </p>
                                </div>

                                @if ($course->status === 'published')
                                <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">
                                    Published
                                </span>
                                @else
                                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">
                                    Draft
                                </span>
                                @endif
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500">
                            No courses created yet.
                        </p>
                        @endforelse
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>