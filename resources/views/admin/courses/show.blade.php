<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Course Details
            </h2>

            <a href="{{ route('admin.courses.index') }}"
                class="text-gray-600 hover:text-gray-900">
                Back to Courses
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-8 rounded-xl shadow-sm">
                @if ($course->thumbnail)
                <img src="{{ $course->thumbnail }}"
                    alt="{{ $course->title }}"
                    class="w-full h-64 object-cover rounded-xl mb-6">
                @endif

                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-3xl font-bold text-gray-900">
                        {{ $course->title }}
                    </h1>

                    @if ($course->status === 'published')
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Published
                    </span>
                    @else
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                        Draft
                    </span>
                    @endif
                </div>

                <p class="text-gray-500 mb-6">
                    Slug: {{ $course->slug }}
                </p>

                <p class="text-gray-700 leading-relaxed">
                    {{ $course->description ?? 'No description added.' }}
                </p>

                <div class="mt-8 flex gap-4">
                    <a href="{{ route('admin.courses.edit', $course) }}"
                        class="bg-purple-600 text-white px-5 py-3 rounded-lg hover:bg-purple-700 transition">
                        Edit Course
                    </a>

                    <a href="{{ route('admin.courses.index') }}"
                        class="px-5 py-3 rounded-lg border text-gray-700 hover:bg-gray-50">
                        Back
                    </a>
                </div>
            </div>

        </div>

        <div class="mt-8 bg-white p-8 rounded-xl shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Course Lessons</h2>
                    <p class="text-gray-600 mt-1">Lessons connected to this course.</p>
                </div>

                <a href="{{ route('admin.lessons.create') }}"
                    class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                    + Add Lesson
                </a>
            </div>

            <div class="space-y-4">
                @forelse ($course->lessons as $lesson)
                <div class="flex items-center justify-between border rounded-lg p-4">
                    <div>
                        <h3 class="font-semibold text-gray-900">
                            {{ $lesson->position }}. {{ $lesson->title }}
                        </h3>

                        <p class="text-sm text-gray-500">
                            {{ $lesson->duration ?? 'No duration' }} · {{ ucfirst($lesson->status) }}
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('admin.lessons.show', $lesson) }}"
                            class="text-blue-600 hover:underline">
                            View
                        </a>

                        <a href="{{ route('admin.lessons.edit', $lesson) }}"
                            class="text-purple-600 hover:underline">
                            Edit
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-gray-500">No lessons added to this course yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>