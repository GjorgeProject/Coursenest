<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Courses
            </h2>

            <a href="{{ route('admin.courses.create') }}"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                + Add Course
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b">
                    <h1 class="text-2xl font-bold text-gray-900">Manage Courses</h1>
                    <p class="text-gray-600 mt-1">Create, edit, publish, or delete courses.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-100 text-gray-600 text-sm">
                            <tr>
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Slug</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Created</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse ($courses as $course)
                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $course->title }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $course->slug }}
                                </td>

                                <td class="px-6 py-4">
                                    @if ($course->status === 'published')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                        Published
                                    </span>
                                    @else
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                        Draft
                                    </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $course->created_at->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('admin.courses.show', $course) }}"
                                            class="text-blue-600 hover:underline">
                                            View
                                        </a>

                                        <a href="{{ route('admin.courses.edit', $course) }}"
                                            class="text-purple-600 hover:underline">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.courses.destroy', $course) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this course?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    No courses yet. Create your first course.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>