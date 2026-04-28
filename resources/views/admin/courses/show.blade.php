<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    Course Details
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    View course information and connected lessons.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.courses.edit', $course) }}"
                    class="inline-flex items-center justify-center bg-purple-600 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition">
                    Edit Course
                </a>

                <a href="{{ route('admin.courses.index') }}"
                    class="inline-flex items-center justify-center border border-purple-200 text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-5">
                    <div class="lg:col-span-2">
                        @if ($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}"
                            alt="{{ $course->title }}"
                            class="w-full h-72 lg:h-full object-cover">
                        @else
                        <div class="w-full h-72 lg:h-full bg-gradient-to-br from-purple-100 to-indigo-100 flex items-center justify-center">
                            <span class="text-purple-700 text-2xl font-extrabold">
                                CourseNest
                            </span>
                        </div>
                        @endif
                    </div>

                    <div class="lg:col-span-3 p-8 lg:p-10">
                        <div class="flex flex-wrap items-center gap-3 mb-5">
                            @if ($course->status === 'published')
                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                Published
                            </span>
                            @else
                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                Draft
                            </span>
                            @endif

                            <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-semibold">
                                {{ $course->lessons->count() }} lessons
                            </span>
                        </div>

                        <h1 class="text-3xl lg:text-5xl font-extrabold text-gray-900 leading-tight">
                            {{ $course->title }}
                        </h1>

                        <p class="text-gray-500 mt-3">
                            Slug: {{ $course->slug }}
                        </p>

                        <p class="text-gray-600 leading-relaxed mt-6">
                            {{ $course->description ?? 'No description added.' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-900">
                            Course Lessons
                        </h2>
                        <p class="text-gray-500 mt-1">
                            Lessons connected to this course.
                        </p>
                    </div>

                    <a href="{{ route('admin.lessons.create') }}"
                        class="inline-flex bg-purple-600 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition">
                        + Add Lesson
                    </a>
                </div>

                <div class="divide-y divide-gray-100">
                    @forelse ($course->lessons as $lesson)
                    <div class="p-6 flex items-center justify-between gap-5 hover:bg-gray-50 transition">
                        <div class="flex items-center gap-5 min-w-0">
                            <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center font-extrabold shrink-0">
                                {{ $lesson->position }}
                            </div>

                            <div class="min-w-0">
                                <h3 class="font-extrabold text-gray-900 truncate">
                                    {{ $lesson->title }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $lesson->duration ?? 'No duration' }} · {{ ucfirst($lesson->status) }}
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-2 shrink-0">
                            <a href="{{ route('admin.lessons.show', $lesson) }}"
                                class="px-3 py-2 rounded-xl bg-blue-50 text-blue-700 text-sm font-semibold hover:bg-blue-100 transition">
                                View
                            </a>

                            <a href="{{ route('admin.lessons.edit', $lesson) }}"
                                class="px-3 py-2 rounded-xl bg-purple-50 text-purple-700 text-sm font-semibold hover:bg-purple-100 transition">
                                Edit
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="p-12 text-center">
                        <div class="w-16 h-16 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-3xl mx-auto mb-4">
                            🎥
                        </div>

                        <h3 class="text-xl font-bold text-gray-900">
                            No lessons added yet
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Add your first lesson to this course.
                        </p>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>