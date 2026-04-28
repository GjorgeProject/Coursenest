<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    My Courses
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Continue learning from your available courses.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($courses->isEmpty())
            <div class="bg-white p-8 rounded-xl shadow-sm text-center">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">
                    No courses available yet
                </h1>
                <p class="text-gray-600">
                    Published courses will appear here when the admin adds them.
                </p>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                    @if ($course->thumbnail)
                    <img src="{{ $course->thumbnail }}"
                        alt="{{ $course->title }}"
                        class="w-full h-44 object-cover">
                    @else
                    <div class="w-full h-44 bg-purple-100 flex items-center justify-center">
                        <span class="text-purple-700 font-semibold">
                            CourseNest
                        </span>
                    </div>
                    @endif

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                Published
                            </span>

                            <span class="text-sm text-gray-500">
                                {{ $course->published_lessons_count }} lessons
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            {{ $course->title }}
                        </h3>

                        <p class="text-gray-600 text-sm line-clamp-3 mb-5">
                            {{ $course->description ?? 'No description available.' }}
                        </p>

                        <div class="mt-3 mb-6">
                            <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                                <span>Progress</span>
                                <span>{{ $course->progress_percentage }}%</span>
                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-purple-600 h-2 rounded-full"
                                    style="width: {{ $course->progress_percentage }}%;">
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('student.courses.show', $course) }}"
                            class="inline-flex items-center justify-center w-full mt-2 bg-purple-600 text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition">
                            Open Course
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</x-app-layout>