<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Lesson
            </h2>

            <a href="{{ route('admin.lessons.index') }}"
                class="text-gray-600 hover:text-gray-900">
                Back to Lessons
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-sm">

                @if ($courses->isEmpty())
                <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded-lg mb-6">
                    You need to create a course first before adding lessons.
                </div>
                @endif

                <form action="{{ route('admin.lessons.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Course</label>

                        <select name="course_id"
                            class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Select course</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->title }}
                            </option>
                            @endforeach
                        </select>

                        @error('course_id')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lesson Title</label>

                        <input type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500"
                            placeholder="Introduction to Laravel">

                        @error('title')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>

                        <textarea name="description"
                            rows="4"
                            class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500"
                            placeholder="Short lesson description...">{{ old('description') }}</textarea>

                        @error('description')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Video URL</label>

                        <input type="text"
                            name="video_url"
                            value="{{ old('video_url') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500"
                            placeholder="https://www.youtube.com/embed/VIDEO_ID">

                        @error('video_url')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>

                            <input type="text"
                                name="duration"
                                value="{{ old('duration') }}"
                                class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500"
                                placeholder="12:45">

                            @error('duration')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Position</label>

                            <input type="number"
                                name="position"
                                value="{{ old('position', 1) }}"
                                min="1"
                                class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">

                            @error('position')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>

                        <select name="status"
                            class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        </select>

                        @error('status')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.lessons.index') }}"
                            class="px-5 py-3 rounded-lg border text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>

                        <button type="submit"
                            class="bg-purple-600 text-white px-5 py-3 rounded-lg hover:bg-purple-700 transition">
                            Create Lesson
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>