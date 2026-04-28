<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    Courses
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Manage all CourseNest courses from one place.
                </p>
            </div>

            <a href="{{ route('admin.courses.create') }}"
                class="inline-flex items-center justify-center bg-purple-600 text-white px-5 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                + Add Course
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

            <!-- Top Overview -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                    <div class="lg:col-span-2">
                        <span class="inline-flex bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold">
                            Admin Course Library
                        </span>

                        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mt-5">
                            Create and organize your courses
                        </h1>

                        <p class="text-gray-600 mt-3 max-w-2xl leading-relaxed">
                            Add course thumbnails, descriptions, statuses, and organize lessons for your students.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-3xl p-5 border border-gray-100">
                            <p class="text-sm text-gray-500">Total Courses</p>
                            <p class="text-4xl font-extrabold text-gray-900 mt-2">
                                {{ $courses->count() }}
                            </p>
                        </div>

                        <div class="bg-gray-50 rounded-3xl p-5 border border-gray-100">
                            <p class="text-sm text-gray-500">Published</p>
                            <p class="text-4xl font-extrabold text-purple-600 mt-2">
                                {{ $courses->where('status', 'published')->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Courses Table -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 lg:p-8 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-extrabold text-gray-900">
                            All Courses
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            View, edit, publish, or delete courses.
                        </p>
                    </div>
                </div>

                @if ($courses->isEmpty())
                <div class="p-12 text-center">
                    <div class="w-20 h-20 bg-purple-100 text-purple-700 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-5">
                        📚
                    </div>

                    <h3 class="text-2xl font-extrabold text-gray-900">
                        No courses yet
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Create your first course and start adding lessons.
                    </p>

                    <a href="{{ route('admin.courses.create') }}"
                        class="mt-6 inline-flex bg-purple-600 text-white px-6 py-3 rounded-2xl font-semibold hover:bg-purple-700 transition">
                        Create Course
                    </a>
                </div>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
                            <tr>
                                <th class="px-6 py-4">Course</th>
                                <th class="px-6 py-4">Slug</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Created</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @foreach ($courses as $course)
                            <tr class="hover:bg-gray-50/70 transition">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        @if ($course->thumbnail)
                                        <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                            alt="{{ $course->title }}"
                                            class="w-14 h-14 rounded-2xl object-cover">
                                        @else
                                        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center font-extrabold">
                                            {{ strtoupper(substr($course->title, 0, 1)) }}
                                        </div>
                                        @endif

                                        <div>
                                            <h3 class="font-extrabold text-gray-900">
                                                {{ $course->title }}
                                            </h3>

                                            <p class="text-sm text-gray-500 mt-1 line-clamp-1 max-w-md">
                                                {{ $course->description ?? 'No description added.' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-5 text-sm text-gray-500">
                                    {{ $course->slug }}
                                </td>

                                <td class="px-6 py-5">
                                    @if ($course->status === 'published')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                        Published
                                    </span>
                                    @else
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">
                                        Draft
                                    </span>
                                    @endif
                                </td>

                                <td class="px-6 py-5 text-sm text-gray-500">
                                    {{ $course->created_at->format('d M Y') }}
                                </td>

                                <td class="px-6 py-5">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.courses.show', $course) }}"
                                            class="px-3 py-2 rounded-xl bg-blue-50 text-blue-700 text-sm font-semibold hover:bg-blue-100 transition">
                                            View
                                        </a>

                                        <a href="{{ route('admin.courses.edit', $course) }}"
                                            class="px-3 py-2 rounded-xl bg-purple-50 text-purple-700 text-sm font-semibold hover:bg-purple-100 transition">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.courses.destroy', $course) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this course?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="px-3 py-2 rounded-xl bg-red-50 text-red-700 text-sm font-semibold hover:bg-red-100 transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>