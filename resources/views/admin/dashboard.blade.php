<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    Dashboard
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Overview of your CourseNest platform.
                </p>
            </div>

            <a href="{{ route('admin.courses.create') }}"
                class="inline-flex items-center justify-center bg-purple-600 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                + Add New Course
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total Courses</p>
                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">{{ $totalCourses }}</h3>
                            <p class="text-sm text-green-600 mt-3">+ Active content</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl">
                            📚
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total Lessons</p>
                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">{{ $totalLessons }}</h3>
                            <p class="text-sm text-green-600 mt-3">Across all courses</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-700 flex items-center justify-center text-2xl">
                            🎥
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total Students</p>
                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">{{ $totalStudents }}</h3>
                            <p class="text-sm text-green-600 mt-3">Registered users</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-700 flex items-center justify-center text-2xl">
                            👥
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Platform Status</p>
                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">Live</h3>
                            <p class="text-sm text-green-600 mt-3">System working</p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-2xl">
                            ⚙️
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

                <!-- Left Main Area -->
                <div class="xl:col-span-2 space-y-8">

                    <!-- Chart Mockup -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-8">
                            <div>
                                <h3 class="text-xl font-extrabold text-gray-900">Users Growth</h3>
                                <p class="text-sm text-gray-500 mt-1">Visual overview mockup for your portfolio UI.</p>
                            </div>

                            <span class="text-sm bg-gray-100 text-gray-600 px-4 py-2 rounded-xl">
                                Last 30 Days
                            </span>
                        </div>

                        <div class="h-72 flex items-end gap-3 border-b border-l border-gray-100 px-4 pb-4">
                            @foreach ([35,45,40,55,50,70,62,85,76,95,110,130] as $height)
                            <div class="flex-1 flex items-end">
                                <div class="w-full bg-purple-500 rounded-t-xl"
                                    style="height: {{ $height }}px;"></div>
                            </div>
                            @endforeach
                        </div>

                        <div class="flex justify-between text-xs text-gray-400 mt-4">
                            <span>Jan</span>
                            <span>Feb</span>
                            <span>Mar</span>
                            <span>Apr</span>
                            <span>May</span>
                            <span>Jun</span>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-6">
                            Quick Actions
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <a href="{{ route('admin.courses.index') }}"
                                class="p-6 rounded-3xl border border-gray-100 hover:border-purple-200 hover:bg-purple-50 transition">
                                <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-2xl flex items-center justify-center text-2xl mb-4">
                                    📚
                                </div>
                                <h4 class="font-bold text-gray-900">Manage Courses</h4>
                                <p class="text-sm text-gray-500 mt-2">Create, edit, publish, and delete courses.</p>
                            </a>

                            <a href="{{ route('admin.lessons.index') }}"
                                class="p-6 rounded-3xl border border-gray-100 hover:border-purple-200 hover:bg-purple-50 transition">
                                <div class="w-12 h-12 bg-green-100 text-green-700 rounded-2xl flex items-center justify-center text-2xl mb-4">
                                    🎥
                                </div>
                                <h4 class="font-bold text-gray-900">Manage Lessons</h4>
                                <p class="text-sm text-gray-500 mt-2">Add videos, resources, duration, and lesson order.</p>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Right Sidebar -->
                <div class="space-y-8">

                    <!-- Recent Courses -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-extrabold text-gray-900">
                                Recent Courses
                            </h3>

                            <a href="{{ route('admin.courses.index') }}"
                                class="text-sm text-purple-600 font-semibold hover:underline">
                                View all
                            </a>
                        </div>

                        <div class="space-y-4">
                            @forelse ($recentCourses as $course)
                            <div class="flex items-center gap-4 p-4 rounded-2xl border border-gray-100">
                                <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center font-bold">
                                    {{ strtoupper(substr($course->title, 0, 1)) }}
                                </div>

                                <div class="flex-1 min-w-0">
                                    <h4 class="font-bold text-gray-900 truncate">
                                        {{ $course->title }}
                                    </h4>
                                    <p class="text-sm text-gray-500">
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
                            @empty
                            <p class="text-gray-500 text-sm">
                                No courses created yet.
                            </p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Recent Activity Mockup -->
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-6">
                            Recent Activity
                        </h3>

                        <div class="space-y-5">
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-blue-100 flex items-center justify-center">👤</div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">New user registered</p>
                                    <p class="text-xs text-gray-500 mt-1">Recently</p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-green-100 flex items-center justify-center">📚</div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Course system active</p>
                                    <p class="text-xs text-gray-500 mt-1">Courses are available</p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-purple-100 flex items-center justify-center">🎥</div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Lessons can be managed</p>
                                    <p class="text-xs text-gray-500 mt-1">Video links and resources</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>