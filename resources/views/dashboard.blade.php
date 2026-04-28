<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Student Dashboard
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Welcome back, {{ auth()->user()->name }}.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-8 rounded-xl shadow-sm mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-3">
                    Continue your learning
                </h1>

                <p class="text-gray-600 mb-6">
                    Access your available courses, watch lessons, and track your progress.
                </p>

                <a href="{{ route('student.courses.index') }}"
                    class="inline-flex bg-purple-600 text-white px-5 py-3 rounded-lg hover:bg-purple-700 transition">
                    Browse Courses
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-sm text-gray-500">Available Courses</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">View</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-sm text-gray-500">Progress</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">Soon</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-sm text-gray-500">Certificates</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">Soon</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>