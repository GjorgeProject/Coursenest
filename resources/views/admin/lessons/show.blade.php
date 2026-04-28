<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    Lesson Details
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Preview lesson video, resource, and metadata.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.lessons.edit', $lesson) }}"
                    class="inline-flex items-center justify-center bg-purple-600 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition">
                    Edit Lesson
                </a>

                <a href="{{ route('admin.lessons.index') }}"
                    class="inline-flex items-center justify-center border border-purple-200 text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">

                <div class="xl:col-span-3 space-y-8">
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
                                No video added
                            </h3>

                            <p class="text-slate-300 mt-2">
                                Add a video URL from the edit page.
                            </p>
                        </div>
                        @endif

                        <div class="p-8">
                            <div class="flex flex-wrap items-center gap-3 mb-5">
                                <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Lesson {{ $lesson->position }}
                                </span>

                                @if ($lesson->status === 'published')
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Published
                                </span>
                                @else
                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Draft
                                </span>
                                @endif

                                <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    {{ $lesson->duration ?? 'No duration' }}
                                </span>
                            </div>

                            <p class="text-sm text-purple-600 font-bold mb-2">
                                {{ $lesson->course->title }}
                            </p>

                            <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight">
                                {{ $lesson->title }}
                            </h1>

                            <div class="mt-8 border-t border-gray-100 pt-8">
                                <h2 class="text-xl font-extrabold text-gray-900 mb-3">
                                    Lesson Description
                                </h2>

                                <p class="text-gray-600 leading-relaxed">
                                    {{ $lesson->description ?? 'No description added.' }}
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
                </div>

                <div class="space-y-8">
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-6">
                            Lesson Summary
                        </h3>

                        <div class="space-y-5">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500">Course</span>
                                <span class="font-bold text-gray-900 text-right">
                                    {{ $lesson->course->title }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-gray-500">Position</span>
                                <span class="font-bold text-gray-900">#{{ $lesson->position }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-gray-500">Duration</span>
                                <span class="font-bold text-gray-900">{{ $lesson->duration ?? '-' }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-gray-500">Resource</span>
                                <span class="font-bold {{ $lesson->resource_file ? 'text-purple-600' : 'text-gray-400' }}">
                                    {{ $lesson->resource_file ? 'Included' : 'None' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-950 text-white p-8 rounded-3xl shadow-sm">
                        <div class="w-14 h-14 rounded-2xl bg-purple-600 flex items-center justify-center text-2xl mb-5">
                            ⚙️
                        </div>

                        <h3 class="text-xl font-extrabold">
                            Admin Preview
                        </h3>

                        <p class="text-slate-300 mt-3 text-sm leading-relaxed">
                            This page lets you preview the lesson exactly before students interact with it.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>