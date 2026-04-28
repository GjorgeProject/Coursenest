<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $lesson->title }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    {{ $course->title }}
                </p>
            </div>

            <a href="{{ route('student.courses.show', $course) }}"
                class="text-gray-600 hover:text-gray-900">
                Back to Course
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        @if ($lesson->video_url)
                        <div class="aspect-video bg-black">
                            <iframe src="{{ $lesson->video_url }}"
                                class="w-full h-full"
                                title="{{ $lesson->title }}"
                                frameborder="0"
                                allowfullscreen>
                            </iframe>
                        </div>
                        @else
                        <div class="aspect-video bg-gray-900 flex items-center justify-center">
                            <p class="text-white">
                                No video added for this lesson.
                            </p>
                        </div>
                        @endif

                        <div class="p-8">
                            <h1 class="text-3xl font-bold text-gray-900 mb-3">
                                {{ $lesson->title }}
                            </h1>

                            <p class="text-gray-500 mb-6">
                                Duration: {{ $lesson->duration ?? 'No duration' }}
                            </p>
                            <form action="{{ route('student.lessons.toggle-progress', $lesson) }}" method="POST" class="mb-6">
                                @csrf

                                <button type="submit"
                                    class="{{ $isCompleted ? 'bg-gray-900 hover:bg-black' : 'bg-purple-600 hover:bg-purple-700' }} text-white px-5 py-3 rounded-lg transition">
                                    {{ $isCompleted ? 'Mark as Incomplete' : 'Mark as Completed' }}
                                </button>
                            </form>
                            <p class="text-gray-700 leading-relaxed">
                                {{ $lesson->description ?? 'No description available.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden sticky top-6">
                        <div class="p-5 border-b">
                            <h2 class="font-bold text-gray-900">
                                Course Lessons
                            </h2>
                        </div>

                        <div class="divide-y">
                            @foreach ($lessons as $sidebarLesson)
                            <a href="{{ route('student.lessons.show', [$course, $sidebarLesson]) }}"
                                class="block p-5 hover:bg-gray-50 transition {{ $sidebarLesson->id === $lesson->id ? 'bg-purple-50' : '' }}">
                                <div class="flex items-start gap-3">
                                    <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm
                                            {{ $sidebarLesson->id === $lesson->id ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700' }}">
                                        @if (in_array($sidebarLesson->id, $completedLessonIds))
                                        ✓
                                        @else
                                        {{ $sidebarLesson->position }}
                                        @endif
                                    </span>

                                    <div>
                                        <h3 class="font-medium text-gray-900">
                                            {{ $sidebarLesson->title }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ $sidebarLesson->duration ?? 'No duration' }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>