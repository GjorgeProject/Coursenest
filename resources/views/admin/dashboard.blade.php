<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>

            <span class="text-sm bg-purple-100 text-purple-700 px-3 py-1 rounded-full">
                Admin
            </span>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-sm text-gray-500">Courses</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">0</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-sm text-gray-500">Lessons</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">0</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-sm text-gray-500">Students</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">0</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">
                    Welcome to CourseNest Admin
                </h1>

                <p class="text-gray-600 mb-6">
                    Here you will manage courses, lessons, students, documents, and announcements.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('admin.courses.index') }}" class="bg-purple-600 text-white px-5 py-3 rounded-lg hover:bg-purple-700 transition">
                        Manage Courses
                    </a>

                    <a href="{{ route('admin.lessons.index') }}" class="bg-gray-900 text-white px-5 py-3 rounded-lg hover:bg-black transition">
                        Manage Lessons
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>