<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $course->title }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Course lessons and content.
                </p>
            </div>

            <a href="{{ route('student.courses.index') }}"
                class="text-gray-600 hover:text-gray-900">
                Back to Courses
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
                @if ($course->thumbnail)
                <img src="{{ asset('storage/' . $course->thumbnail) }}"
                    alt="{{ $course->title }}"
                    class="w-full h-72 object-cover">
                @endif

                <div class="p-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $course->title }}
                    </h1>

                    <p class="text-gray-700 leading-relaxed">
                        {{ $course->description ?? 'No description available.' }}
                    </p>

                    <div class="mt-8">
                        <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                            <span>Course Progress</span>
                            <span>{{ $completedCount }} / {{ $totalLessons }} lessons completed · {{ $progressPercentage }}%</span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-purple-600 h-3 rounded-full"
                                style="width: {{ $progressPercentage }}%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm">
                <div class="p-6 border-b">
                    <h2 class="text-2xl font-bold text-gray-900">
                        Lessons
                    </h2>
                    <p class="text-gray-600 mt-1">
                        Start from the first lesson and continue step by step.
                    </p>
                </div>

                <div class="divide-y">
                    @forelse ($course->lessons as $lesson)
                    <a href="{{ route('student.lessons.show', [$course, $lesson]) }}"
                        class="flex items-center justify-between p-6 hover:bg-gray-50 transition">
                        <div>
                            <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                                @if (in_array($lesson->id, $completedLessonIds))
                                <span class="text-green-600">✓</span>
                                @endif

                                {{ $lesson->position }}. {{ $lesson->title }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $lesson->duration ?? 'No duration' }}
                            </p>
                        </div>

                        <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-lg text-sm">
                            Watch
                        </span>
                    </a>
                    @empty
                    <div class="p-6 text-gray-500">
                        No published lessons yet.
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>