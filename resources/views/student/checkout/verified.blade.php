<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                Payment Verified
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Your course is now unlocked.
            </p>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 text-center">
                <div class="w-24 h-24 bg-green-100 text-green-700 rounded-full flex items-center justify-center text-5xl mx-auto mb-6">
                    ✓
                </div>

                <span class="inline-flex bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                    Payment Verified
                </span>

                <h1 class="text-3xl lg:text-5xl font-extrabold text-gray-900 mt-6">
                    You unlocked this course!
                </h1>

                <p class="text-gray-600 mt-4 max-w-2xl mx-auto leading-relaxed">
                    You now have access to <strong>{{ $course->title }}</strong>. Start learning, watch lessons, download resources, and track your progress.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('student.courses.show', $course) }}"
                        class="inline-flex justify-center bg-purple-600 text-white px-7 py-4 rounded-2xl font-bold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                        Go to Course →
                    </a>

                    <a href="{{ route('student.courses.index') }}"
                        class="inline-flex justify-center border border-purple-200 text-purple-700 px-7 py-4 rounded-2xl font-bold hover:bg-purple-50 transition">
                        Browse More Courses
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>