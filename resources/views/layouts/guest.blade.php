<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CourseNest</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-purple-50 via-white to-indigo-50 text-gray-900 antialiased">

    <div class="min-h-screen flex items-center justify-center px-6 py-10">
        <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl shadow-purple-100 overflow-hidden border border-purple-100">

            <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[720px]">

                <!-- Left Side -->
                <div class="hidden lg:flex relative bg-purple-600 text-white p-12 flex-col justify-between overflow-hidden">
                    <div class="absolute inset-0">
                        <div class="absolute top-10 left-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                        <div class="absolute bottom-10 right-10 w-56 h-56 bg-indigo-300/20 rounded-full blur-3xl"></div>
                    </div>

                    <div class="relative z-10">
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                            <div class="w-14 h-14 rounded-2xl bg-white text-purple-600 flex items-center justify-center text-2xl font-extrabold shadow-lg">
                                C
                            </div>
                            <span class="text-3xl font-extrabold tracking-tight">CourseNest</span>
                        </a>
                    </div>

                    <div class="relative z-10 max-w-md">
                        <p class="inline-flex px-4 py-2 rounded-full bg-white/15 text-sm font-semibold mb-6">
                            Learn smarter. Grow faster.
                        </p>

                        <h1 class="text-5xl font-extrabold leading-tight">
                            Your learning journey starts here.
                        </h1>

                        <p class="mt-6 text-lg text-purple-100 leading-relaxed">
                            Access courses, watch video lessons, download resources, and track your progress —
                            all from one modern dashboard.
                        </p>

                        <div class="mt-10 grid grid-cols-3 gap-5">
                            <div>
                                <p class="text-3xl font-extrabold">200+</p>
                                <p class="text-sm text-purple-100 mt-1">Courses</p>
                            </div>

                            <div>
                                <p class="text-3xl font-extrabold">10K+</p>
                                <p class="text-sm text-purple-100 mt-1">Students</p>
                            </div>

                            <div>
                                <p class="text-3xl font-extrabold">95%</p>
                                <p class="text-sm text-purple-100 mt-1">Success</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10 text-sm text-purple-100">
                        Built with Laravel, Blade, Tailwind & MySQL.
                    </div>
                </div>

                <!-- Right Side -->
                <div class="flex items-center justify-center p-6 sm:p-10 lg:p-14 bg-white">
                    <div class="w-full max-w-md">

                        <div class="lg:hidden mb-8 text-center">
                            <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                                <div class="w-12 h-12 rounded-2xl bg-purple-600 text-white flex items-center justify-center text-xl font-extrabold shadow-lg shadow-purple-200">
                                    C
                                </div>
                                <span class="text-2xl font-extrabold tracking-tight text-gray-900">CourseNest</span>
                            </a>
                        </div>

                        {{ $slot }}

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>