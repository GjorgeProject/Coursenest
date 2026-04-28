<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lesson Details
            </h2>

            <a href="{{ route('admin.lessons.index') }}"
                class="text-gray-600 hover:text-gray-900">
                Back to Lessons
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-8 rounded-xl shadow-sm">
                <div class="flex items-start justify-between gap-6 mb-6">
                    <div>
                        <p class="text-sm text-purple-600 font-medium mb-2">
                            {{ $lesson->course->title }}
                        </p>

                        <h1 class="text-3xl font-bold text-gray-900">
                            {{ $lesson->title }}
                        </h1>

                        <p class="text-gray-500 mt-2">
                            Position: {{ $lesson->position }} |
                            Duration: {{ $lesson->duration ?? '-' }}
                        </p>
                    </div>

                    @if ($lesson->status === 'published')
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Published
                    </span>
                    @else
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                        Draft
                    </span>
                    @endif
                </div>

                @if ($lesson->video_url)
                <div class="aspect-video bg-black rounded-xl overflow-hidden mb-8">
                    <iframe src="{{ $lesson->video_url }}"
                        class="w-full h-full"
                        title="{{ $lesson->title }}"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
                @endif

                <p class="text-gray-700 leading-relaxed">
                    {{ $lesson->description ?? 'No description added.' }}
                </p>

                @if ($lesson->resource_file)
                <div class="mt-8 bg-gray-50 border rounded-xl p-5">
                    <h2 class="font-bold text-gray-900 mb-2">
                        Lesson Resource
                    </h2>

                    <p class="text-gray-600 mb-4">
                        {{ $lesson->resource_name ?? 'Download lesson resource' }}
                    </p>

                    <a href="{{ asset('storage/' . $lesson->resource_file) }}"
                        target="_blank"
                        class="inline-flex bg-purple-600 text-white px-5 py-3 rounded-lg hover:bg-purple-700 transition">
                        Download Resource
                    </a>
                </div>
                @endif

                <div class="mt-8 flex gap-4">
                    <a href="{{ route('admin.lessons.edit', $lesson) }}"
                        class="bg-purple-600 text-white px-5 py-3 rounded-lg hover:bg-purple-700 transition">
                        Edit Lesson
                    </a>

                    <a href="{{ route('admin.lessons.index') }}"
                        class="px-5 py-3 rounded-lg border text-gray-700 hover:bg-gray-50">
                        Back
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>