<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    {{ $lesson->title }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    {{ $course->title }}
                </p>
            </div>

            <a href="{{ route('student.courses.show', $course) }}"
                class="inline-flex items-center justify-center border border-purple-200 text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                Back to Course
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-700 px-5 py-4 rounded-2xl border border-green-200 font-medium">
                {{ session('success') }}
            </div>
            @endif

            <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">

                <!-- Main Lesson Area -->
                <div class="xl:col-span-3 space-y-8">

                    <!-- Video Card -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
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
                        <div class="aspect-video bg-slate-950 flex flex-col items-center justify-center text-white text-center px-6">
                            <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center text-3xl mb-4">
                                🎥
                            </div>

                            <h3 class="text-2xl font-extrabold">
                                No video added yet
                            </h3>

                            <p class="text-slate-300 mt-2">
                                This lesson does not have a video URL.
                            </p>
                        </div>
                        @endif

                        <div class="p-8">
                            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
                                <div>
                                    <div class="flex flex-wrap items-center gap-3 mb-4">
                                        <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-bold">
                                            Lesson {{ $lesson->position }}
                                        </span>

                                        <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-semibold">
                                            {{ $lesson->duration ?? 'No duration' }}
                                        </span>

                                        @if ($isCompleted)
                                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                            Completed
                                        </span>
                                        @endif
                                    </div>

                                    <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight">
                                        {{ $lesson->title }}
                                    </h1>
                                </div>

                                <form action="{{ route('student.lessons.toggle-progress', $lesson) }}" method="POST" class="shrink-0">
                                    @csrf

                                    <button type="submit"
                                        class="{{ $isCompleted ? 'bg-slate-950 hover:bg-black' : 'bg-purple-600 hover:bg-purple-700' }} text-white px-6 py-3.5 rounded-2xl font-semibold transition shadow-lg {{ $isCompleted ? 'shadow-gray-200' : 'shadow-purple-100' }}">
                                        {{ $isCompleted ? 'Mark as Incomplete' : 'Mark as Completed' }}
                                    </button>
                                </form>
                            </div>

                            <div class="mt-8 border-t border-gray-100 pt-8">
                                <h2 class="text-xl font-extrabold text-gray-900 mb-3">
                                    About this lesson
                                </h2>

                                <p class="text-gray-600 leading-relaxed">
                                    {{ $lesson->description ?? 'No description available for this lesson.' }}
                                </p>
                            </div>

                            @if ($lesson->resource_file)
                            <div class="mt-8 bg-purple-50 border border-purple-100 rounded-3xl p-6">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">
                                    <div class="flex items-start gap-4">
                                        <div class="w-14 h-14 rounded-2xl bg-purple-600 text-white flex items-center justify-center text-2xl shrink-0">
                                            📄
                                        </div>

                                        <div>
                                            <h2 class="font-extrabold text-gray-900">
                                                Lesson Resource
                                            </h2>

                                            <p class="text-gray-600 mt-1">
                                                {{ $lesson->resource_name ?? 'Download lesson resource' }}
                                            </p>
                                        </div>
                                    </div>

                                    <a href="{{ asset('storage/' . $lesson->resource_file) }}"
                                        target="_blank"
                                        class="inline-flex justify-center bg-purple-600 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition">
                                        Open Resource
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Navigation Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @php
                        $currentIndex = $lessons->search(function ($item) use ($lesson) {
                        return $item->id === $lesson->id;
                        });

                        $previousLesson = $currentIndex !== false && $currentIndex > 0
                        ? $lessons[$currentIndex - 1]
                        : null;

                        $nextLesson = $currentIndex !== false && $currentIndex < $lessons->count() - 1
                            ? $lessons[$currentIndex + 1]
                            : null;
                            @endphp

                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                                <p class="text-sm text-gray-500 mb-2">Previous Lesson</p>

                                @if ($previousLesson)
                                <a href="{{ route('student.lessons.show', [$course, $previousLesson]) }}"
                                    class="group block">
                                    <h3 class="font-extrabold text-gray-900 group-hover:text-purple-700 transition">
                                        ← {{ $previousLesson->title }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-2">
                                        {{ $previousLesson->duration ?? 'No duration' }}
                                    </p>
                                </a>
                                @else
                                <p class="font-semibold text-gray-400">
                                    You are at the first lesson.
                                </p>
                                @endif
                            </div>

                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                                <p class="text-sm text-gray-500 mb-2">Next Lesson</p>

                                @if ($nextLesson)
                                <a href="{{ route('student.lessons.show', [$course, $nextLesson]) }}"
                                    class="group block">
                                    <h3 class="font-extrabold text-gray-900 group-hover:text-purple-700 transition">
                                        {{ $nextLesson->title }} →
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-2">
                                        {{ $nextLesson->duration ?? 'No duration' }}
                                    </p>
                                </a>
                                @else
                                <p class="font-semibold text-gray-400">
                                    You finished the last lesson.
                                </p>
                                @endif
                            </div>
                    </div>

                </div>

                <!-- Lesson Sidebar -->
                <div class="xl:col-span-1">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden sticky top-28">

                        <div class="p-6 border-b border-gray-100">
                            <h2 class="text-xl font-extrabold text-gray-900">
                                Course Lessons
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $lessons->count() }} lessons available
                            </p>
                        </div>

                        <div class="max-h-[650px] overflow-y-auto divide-y divide-gray-100">
                            @foreach ($lessons as $sidebarLesson)
                            <a href="{{ route('student.lessons.show', [$course, $sidebarLesson]) }}"
                                class="block p-5 transition
                                   {{ $sidebarLesson->id === $lesson->id ? 'bg-purple-50' : 'hover:bg-gray-50' }}">

                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 rounded-2xl flex items-center justify-center text-sm font-bold shrink-0
                                            {{ in_array($sidebarLesson->id, $completedLessonIds) ? 'bg-green-100 text-green-700' : ($sidebarLesson->id === $lesson->id ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700') }}">
                                        @if (in_array($sidebarLesson->id, $completedLessonIds))
                                        ✓
                                        @else
                                        {{ $sidebarLesson->position }}
                                        @endif
                                    </div>

                                    <div class="min-w-0">
                                        <h3 class="font-bold text-sm leading-snug
                                                {{ $sidebarLesson->id === $lesson->id ? 'text-purple-700' : 'text-gray-900' }}">
                                            {{ $sidebarLesson->title }}
                                        </h3>

                                        <p class="text-xs text-gray-500 mt-2">
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