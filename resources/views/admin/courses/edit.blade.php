<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    Edit Course
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Update course details, thumbnail, and status.
                </p>
            </div>

            <a href="{{ route('admin.courses.index') }}"
                class="inline-flex items-center justify-center border border-purple-200 text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                Back to Courses
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8 border-b border-gray-100">
                    <span class="inline-flex bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold">
                        Editing Course
                    </span>

                    <h1 class="text-3xl font-extrabold text-gray-900 mt-5">
                        {{ $course->title }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Slug: {{ $course->slug }}
                    </p>
                </div>

                <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-7">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Course Title
                        </label>

                        <input type="text"
                            name="title"
                            value="{{ old('title', $course->title) }}"
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
                            rows="6"
                            class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3">{{ old('description', $course->description) }}</textarea>

                        @error('description')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Price
                        </label>

                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500 font-semibold">
                                $
                            </span>

                            <input type="number"
                                name="price"
                                value="{{ old('price', $course->price) }}"
                                step="0.01"
                                min="0"
                                class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 pl-8 pr-4 py-3"
                                placeholder="30.00">
                        </div>

                        <p class="text-sm text-gray-500 mt-2">
                            Set 0 for a free course.
                        </p>

                        @error('price')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Course Thumbnail
                            </label>

                            @if ($course->thumbnail)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                    alt="{{ $course->title }}"
                                    class="w-full h-56 object-cover rounded-3xl border border-gray-100">
                            </div>
                            @endif

                            <div class="border-2 border-dashed border-purple-200 rounded-3xl p-6 bg-purple-50/40">
                                <input type="file"
                                    name="thumbnail"
                                    accept="image/png, image/jpeg, image/jpg, image/webp"
                                    class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500">

                                <p class="text-sm text-gray-500 mt-3">
                                    Leave empty if you do not want to change the thumbnail.
                                </p>
                            </div>

                            @error('thumbnail')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Status
                            </label>

                            <select name="status"
                                class="w-full rounded-2xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3">
                                <option value="draft" {{ old('status', $course->status) === 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>
                                <option value="published" {{ old('status', $course->status) === 'published' ? 'selected' : '' }}>
                                    Published
                                </option>
                            </select>

                            <div class="mt-4 bg-gray-50 border border-gray-100 rounded-2xl p-4">
                                <p class="text-sm text-gray-600">
                                    Publishing a course makes it visible to students.
                                </p>
                            </div>

                            @error('status')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.courses.index') }}"
                            class="inline-flex justify-center px-6 py-3 rounded-2xl border border-gray-200 text-gray-700 font-semibold hover:bg-gray-50 transition">
                            Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex justify-center bg-purple-600 text-white px-6 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                            Update Course
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>