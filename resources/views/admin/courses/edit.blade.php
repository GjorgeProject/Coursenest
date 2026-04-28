<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Course
            </h2>

            <a href="{{ route('admin.courses.index') }}"
                class="text-gray-600 hover:text-gray-900">
                Back to Courses
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-sm">

                <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Course Title
                        </label>

                        <input type="text"
                            name="title"
                            value="{{ old('title', $course->title) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">

                        @error('title')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea name="description"
                            rows="5"
                            class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">{{ old('description', $course->description) }}</textarea>

                        @error('description')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Course Thumbnail
                        </label>

                        @if ($course->thumbnail)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                alt="{{ $course->title }}"
                                class="w-full h-48 object-cover rounded-lg">
                        </div>
                        @endif

                        <input type="file"
                            name="thumbnail"
                            accept="image/png, image/jpeg, image/jpg, image/webp"
                            class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">

                        <p class="text-sm text-gray-500 mt-2">
                            Leave empty if you do not want to change the thumbnail.
                        </p>

                        @error('thumbnail')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Status
                        </label>

                        <select name="status"
                            class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                            <option value="draft" {{ old('status', $course->status) === 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>
                            <option value="published" {{ old('status', $course->status) === 'published' ? 'selected' : '' }}>
                                Published
                            </option>
                        </select>

                        @error('status')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.courses.index') }}"
                            class="px-5 py-3 rounded-lg border text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>

                        <button type="submit"
                            class="bg-purple-600 text-white px-5 py-3 rounded-lg hover:bg-purple-700 transition">
                            Update Course
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>