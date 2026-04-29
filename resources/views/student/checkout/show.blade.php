<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    Checkout
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Complete your simulated payment to unlock the course.
                </p>
            </div>

            <a href="{{ route('student.courses.index') }}"
                class="inline-flex items-center justify-center border border-purple-200 text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                Back to Courses
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    @if ($course->thumbnail)
                    <img src="{{ asset('storage/' . $course->thumbnail) }}"
                        alt="{{ $course->title }}"
                        class="w-full h-72 object-cover object-center">
                    @else
                    <div class="w-full h-72 bg-gradient-to-br from-purple-100 to-indigo-100 flex items-center justify-center">
                        <span class="text-purple-700 text-2xl font-extrabold">
                            CourseNest
                        </span>
                    </div>
                    @endif

                    <div class="p-8">
                        <span class="inline-flex bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-bold">
                            Course Access
                        </span>

                        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mt-5">
                            {{ $course->title }}
                        </h1>

                        <p class="text-gray-600 leading-relaxed mt-4">
                            {{ $course->description ?? 'Unlock this course and start learning through video lessons, resources, and progress tracking.' }}
                        </p>

                        <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
                                <p class="text-sm text-gray-500">Access</p>
                                <p class="text-xl font-extrabold text-gray-900 mt-1">Lifetime</p>
                            </div>

                            <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
                                <p class="text-sm text-gray-500">Lessons</p>
                                <p class="text-xl font-extrabold text-gray-900 mt-1">
                                    {{ $course->lessons()->where('status', 'published')->count() }}
                                </p>
                            </div>

                            <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
                                <p class="text-sm text-gray-500">Resources</p>
                                <p class="text-xl font-extrabold text-gray-900 mt-1">Included</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 h-fit sticky top-28">
                    <h2 class="text-2xl font-extrabold text-gray-900">
                        Order Summary
                    </h2>

                    <div class="mt-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Course price</span>
                            <span class="font-extrabold text-gray-900">
                                @if ($course->price > 0)
                                ${{ number_format($course->price, 2) }}
                                @else
                                Free
                                @endif
                            </span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Payment type</span>
                            <span class="font-semibold text-gray-900">Demo</span>
                        </div>

                        <div class="border-t border-gray-100 pt-4 flex items-center justify-between">
                            <span class="font-bold text-gray-900">Total</span>
                            <span class="text-3xl font-extrabold text-purple-600">
                                @if ($course->price > 0)
                                ${{ number_format($course->price, 2) }}
                                @else
                                $0.00
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 bg-purple-50 border border-purple-100 rounded-2xl p-4">
                        <p class="text-sm text-purple-700 leading-relaxed">
                            This is a portfolio demo checkout. No real money is charged.
                        </p>
                    </div>

                    <form action="{{ route('student.checkout.confirm', $course) }}" method="POST" class="mt-6">
                        @csrf

                        <button type="submit"
                            class="w-full inline-flex justify-center bg-purple-600 text-white px-6 py-4 rounded-2xl font-bold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                            Confirm Payment
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>