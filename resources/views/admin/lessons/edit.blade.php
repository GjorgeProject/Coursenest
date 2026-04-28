<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    Edit Lesson
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Update lesson content, video, resource, and status.
                </p>
            </div>

            <a href="{{ route('admin.lessons.index') }}"
                class="inline-flex items-center justify-center border border-purple-200 text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                Back to Lessons
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8 border-b border-gray-100">
                    <span class="inline-flex bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold">
                        Editing Lesson
                    </span>

                    <h1 class="text-3xl font-extrabold text-gray-900 mt-5">
                        {{ $lesson->title }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Connected course: {{ $lesson->course->title }}
                    </p>
                </div>

                <form action="{{ route('admin.lessons.update', $lesson) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-7">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Course
                        </label>

                        <select name="course_id"
                            class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3">
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id', $lesson->course_id) == $course->id ? 'selected' : '' }}>
                                {{ $course->title }}
                            </option>
                            @endforeach
                        </select>

                        @error('course_id')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Lesson Title
                        </label>

                        <input type="text"
                            name="title"
                            value="{{ old('title', $lesson->title) }}"
                            class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3">

                        @error('title')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea name="description"
                            rows="5"
                            class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3">{{ old('description', $lesson->description) }}</textarea>

                        @error('description')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Video URL
                        </label>

                        <input type="text"
                            name="video_url"
                            value="{{ old('video_url', $lesson->video_url) }}"
                            class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                            placeholder="https://www.youtube.com/embed/VIDEO_ID">

                        @error('video_url')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Resource Name
                            </label>

                            <input type="text"
                                name="resource_name"
                                value="{{ old('resource_name', $lesson->resource_name) }}"
                                class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                                placeholder="Lesson notes PDF">

                            @error('resource_name')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Resource File
                            </label>

                            @if ($lesson->resource_file)
                            <div class="mb-3 bg-gray-50 border border-gray-100 rounded-2xl p-4 text-sm text-gray-600">
                                Current file:
                                <a href="{{ asset('storage/' . $lesson->resource_file) }}"
                                    target="_blank"
                                    class="text-purple-600 font-semibold hover:underline">
                                    {{ $lesson->resource_name ?? 'Open resource' }}
                                </a>
                            </div>
                            @endif

                            <input type="file"
                                name="resource_file"
                                accept=".pdf,.doc,.docx,.zip,.txt"
                                class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500">

                            <p class="text-sm text-gray-500 mt-2">
                                Leave empty if you do not want to change the resource file.
                            </p>

                            @error('resource_file')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Duration
                            </label>

                            <input type="text"
                                name="duration"
                                value="{{ old('duration', $lesson->duration) }}"
                                class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3">

                            @error('duration')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Position
                            </label>

                            <input type="number"
                                name="position"
                                value="{{ old('position', $lesson->position) }}"
                                min="1"
                                class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3">

                            @error('position')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Status
                            </label>

                            <select name="status"
                                class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3">
                                <option value="draft" {{ old('status', $lesson->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $lesson->status) === 'published' ? 'selected' : '' }}>Published</option>
                            </select>

                            @error('status')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.lessons.index') }}"
                            class="inline-flex justify-center px-6 py-3 rounded-2xl border border-gray-200 text-gray-700 font-semibold hover:bg-gray-50 transition">
                            Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex justify-center bg-purple-600 text-white px-6 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                            Update Lesson
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>