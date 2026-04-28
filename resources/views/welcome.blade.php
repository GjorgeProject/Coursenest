<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CourseNest - Learn Smarter</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white text-gray-900">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-2xl bg-purple-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-purple-200">
                        C
                    </div>

                    <span class="text-2xl font-bold tracking-tight">
                        CourseNest
                    </span>
                </a>

                <nav class="hidden md:flex items-center gap-10 text-sm font-medium">
                    <a href="#home" class="text-purple-600">Home</a>
                    <a href="#courses" class="text-gray-600 hover:text-purple-600 transition">Courses</a>
                    <a href="#features" class="text-gray-600 hover:text-purple-600 transition">Features</a>
                    <a href="#testimonials" class="text-gray-600 hover:text-purple-600 transition">Reviews</a>
                </nav>

                <div class="flex items-center gap-3">
                    @auth
                    <a href="{{ route('dashboard') }}"
                        class="hidden sm:inline-flex px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-700 hover:text-purple-600 transition">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="hidden sm:inline-flex px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-700 hover:text-purple-600 transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                        class="inline-flex px-5 py-2.5 rounded-xl bg-purple-600 text-white text-sm font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-200">
                        Sign Up
                    </a>
                    @endauth
                </div>

            </div>
        </div>
    </header>

    <!-- Hero -->
    <main id="home">
        <section class="relative overflow-hidden">
            <div class="absolute inset-0 -z-10">
                <div class="absolute top-20 left-10 w-72 h-72 bg-purple-100 rounded-full blur-3xl opacity-70"></div>
                <div class="absolute top-40 right-0 w-96 h-96 bg-indigo-100 rounded-full blur-3xl opacity-80"></div>
                <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-violet-50 rounded-full blur-3xl opacity-90"></div>
            </div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20 lg:py-28">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

                    <!-- Left -->
                    <div>
                        <div class="inline-flex items-center gap-2 bg-purple-50 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold mb-6">
                            <span>✦</span>
                            Your learning. Your platform.
                        </div>

                        <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight tracking-tight">
                            Learn Smarter with
                            <span class="text-purple-600">CourseNest</span>
                        </h1>

                        <p class="mt-6 text-lg text-gray-600 leading-relaxed max-w-xl">
                            CourseNest is a modern learning platform where students can watch lessons,
                            download resources, and track their progress — all in one clean dashboard.
                        </p>

                        <div class="mt-8 flex flex-col sm:flex-row gap-4">
                            @auth
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex justify-center items-center px-7 py-4 rounded-xl bg-purple-600 text-white font-semibold hover:bg-purple-700 transition shadow-xl shadow-purple-200">
                                Go to Dashboard
                                <span class="ml-2">→</span>
                            </a>
                            @else
                            <a href="{{ route('register') }}"
                                class="inline-flex justify-center items-center px-7 py-4 rounded-xl bg-purple-600 text-white font-semibold hover:bg-purple-700 transition shadow-xl shadow-purple-200">
                                Start Learning Free
                                <span class="ml-2">→</span>
                            </a>
                            @endauth

                            <a href="#courses"
                                class="inline-flex justify-center items-center px-7 py-4 rounded-xl border border-purple-200 text-purple-700 font-semibold hover:bg-purple-50 transition">
                                Explore Courses
                            </a>
                        </div>

                        <div class="mt-10 grid grid-cols-3 gap-5 max-w-xl">
                            <div>
                                <p class="text-3xl font-extrabold text-gray-900">10K+</p>
                                <p class="text-sm text-gray-500 mt-1">Students</p>
                            </div>

                            <div>
                                <p class="text-3xl font-extrabold text-gray-900">200+</p>
                                <p class="text-sm text-gray-500 mt-1">Courses</p>
                            </div>

                            <div>
                                <p class="text-3xl font-extrabold text-gray-900">95%</p>
                                <p class="text-sm text-gray-500 mt-1">Satisfaction</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Dashboard Mockup -->
                    <div class="relative">
                        <div class="absolute -inset-6 bg-purple-200/40 blur-3xl rounded-full"></div>

                        <div class="relative bg-white rounded-3xl shadow-2xl shadow-purple-100 border border-gray-100 overflow-hidden">
                            <div class="flex">

                                <!-- Mock sidebar -->
                                <div class="hidden sm:block w-44 bg-gray-950 p-5 text-white">
                                    <div class="flex items-center gap-2 mb-8">
                                        <div class="w-8 h-8 rounded-xl bg-purple-600 flex items-center justify-center font-bold">
                                            C
                                        </div>
                                        <span class="font-bold">CourseNest</span>
                                    </div>

                                    <div class="space-y-3 text-sm">
                                        <div class="bg-purple-600 px-3 py-2 rounded-xl">Dashboard</div>
                                        <div class="text-gray-300 px-3 py-2">My Courses</div>
                                        <div class="text-gray-300 px-3 py-2">Progress</div>
                                        <div class="text-gray-300 px-3 py-2">Resources</div>
                                        <div class="text-gray-300 px-3 py-2">Settings</div>
                                    </div>
                                </div>

                                <!-- Mock content -->
                                <div class="flex-1 p-6 bg-gray-50">
                                    <div class="flex items-center justify-between mb-6">
                                        <div>
                                            <p class="text-sm text-gray-500">Welcome back, Sarah 👋</p>
                                            <h3 class="text-2xl font-bold">Continue Learning</h3>
                                        </div>

                                        <div class="w-11 h-11 rounded-full bg-purple-100 flex items-center justify-center">
                                            👩
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 mb-5">
                                        <div class="bg-white p-4 rounded-2xl shadow-sm">
                                            <p class="text-sm text-gray-500">Progress</p>
                                            <p class="text-3xl font-bold mt-1">75%</p>
                                            <div class="mt-3 h-2 bg-gray-100 rounded-full">
                                                <div class="h-2 bg-purple-600 rounded-full w-3/4"></div>
                                            </div>
                                        </div>

                                        <div class="bg-white p-4 rounded-2xl shadow-sm">
                                            <p class="text-sm text-gray-500">Completed</p>
                                            <p class="text-3xl font-bold mt-1">38</p>
                                            <p class="text-sm text-gray-400 mt-2">Lessons done</p>
                                        </div>
                                    </div>

                                    <div class="bg-white p-4 rounded-2xl shadow-sm mb-5">
                                        <div class="flex gap-4">
                                            <div class="w-24 h-20 bg-purple-100 rounded-xl flex items-center justify-center text-3xl">
                                                💻
                                            </div>

                                            <div class="flex-1">
                                                <h4 class="font-bold">Web Development Bootcamp</h4>
                                                <p class="text-sm text-gray-500 mt-1">Lesson 8 of 12</p>
                                                <div class="mt-3 h-2 bg-gray-100 rounded-full">
                                                    <div class="h-2 bg-purple-600 rounded-full w-2/3"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-3">
                                        <div class="bg-white p-3 rounded-xl shadow-sm text-center">
                                            <p class="text-xl">🎥</p>
                                            <p class="text-xs text-gray-500 mt-1">Videos</p>
                                        </div>

                                        <div class="bg-white p-3 rounded-xl shadow-sm text-center">
                                            <p class="text-xl">📄</p>
                                            <p class="text-xs text-gray-500 mt-1">Resources</p>
                                        </div>

                                        <div class="bg-white p-3 rounded-xl shadow-sm text-center">
                                            <p class="text-xl">🏆</p>
                                            <p class="text-xs text-gray-500 mt-1">Progress</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Featured Courses -->
        <section id="courses" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 mb-10">
                    <div>
                        <p class="text-purple-600 font-semibold text-sm uppercase tracking-wide">
                            Featured Courses
                        </p>
                        <h2 class="text-4xl font-extrabold mt-2">
                            Start learning today
                        </h2>
                        <p class="text-gray-600 mt-3 max-w-2xl">
                            Explore published courses from the platform and continue learning step by step.
                        </p>
                    </div>

                    @auth
                    <a href="{{ route('student.courses.index') }}"
                        class="text-purple-600 font-semibold hover:underline">
                        View all courses →
                    </a>
                    @else
                    <a href="{{ route('register') }}"
                        class="text-purple-600 font-semibold hover:underline">
                        Join to explore →
                    </a>
                    @endauth
                </div>

                @if ($featuredCourses->isEmpty())
                <div class="bg-purple-50 border border-purple-100 rounded-3xl p-10 text-center">
                    <h3 class="text-2xl font-bold text-gray-900">
                        No courses published yet
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Once admin publishes courses, they will appear here automatically.
                    </p>
                </div>
                @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($featuredCourses as $course)
                    <div class="bg-white border border-gray-100 rounded-3xl shadow-lg shadow-gray-100 overflow-hidden hover:-translate-y-1 hover:shadow-xl transition">

                        @if ($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}"
                            alt="{{ $course->title }}"
                            class="w-full h-52 object-cover">
                        @else
                        <div class="w-full h-52 bg-purple-100 flex items-center justify-center">
                            <span class="text-purple-700 font-bold text-xl">
                                CourseNest
                            </span>
                        </div>
                        @endif

                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-xs bg-purple-100 text-purple-700 px-3 py-1 rounded-full font-semibold">
                                    Published
                                </span>

                                <span class="text-sm text-gray-500">
                                    {{ $course->lessons_count }} lessons
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900">
                                {{ $course->title }}
                            </h3>

                            <p class="text-gray-600 text-sm mt-3 line-clamp-3">
                                {{ $course->description ?? 'Learn through structured video lessons and resources.' }}
                            </p>

                            @auth
                            <a href="{{ route('student.courses.show', $course) }}"
                                class="mt-6 inline-flex w-full justify-center bg-purple-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-purple-700 transition">
                                Open Course
                            </a>
                            @else
                            <a href="{{ route('register') }}"
                                class="mt-6 inline-flex w-full justify-center bg-purple-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-purple-700 transition">
                                Start Learning
                            </a>
                            @endauth
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </section>

        <!-- Features -->
        <section id="features" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center max-w-3xl mx-auto mb-14">
                    <p class="text-purple-600 font-semibold text-sm uppercase tracking-wide">
                        Why CourseNest?
                    </p>
                    <h2 class="text-4xl font-extrabold mt-2">
                        Everything needed for online learning
                    </h2>
                    <p class="text-gray-600 mt-4">
                        Built with Laravel, MySQL, Blade, and Tailwind — clean, practical, and ready to grow.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl mb-5">
                            📈
                        </div>
                        <h3 class="text-xl font-bold">Progress Tracking</h3>
                        <p class="text-gray-600 mt-3 text-sm leading-relaxed">
                            Students can mark lessons as completed and track course progress.
                        </p>
                    </div>

                    <div class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl mb-5">
                            🎥
                        </div>
                        <h3 class="text-xl font-bold">Video Lessons</h3>
                        <p class="text-gray-600 mt-3 text-sm leading-relaxed">
                            Lessons support embedded YouTube or Vimeo videos for easy streaming.
                        </p>
                    </div>

                    <div class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl mb-5">
                            📄
                        </div>
                        <h3 class="text-xl font-bold">Resources</h3>
                        <p class="text-gray-600 mt-3 text-sm leading-relaxed">
                            Admins can upload PDF, DOC, ZIP, or TXT resources for lessons.
                        </p>
                    </div>

                    <div class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl mb-5">
                            ⚙️
                        </div>
                        <h3 class="text-xl font-bold">Admin Dashboard</h3>
                        <p class="text-gray-600 mt-3 text-sm leading-relaxed">
                            Admins manage courses, lessons, thumbnails, resources, and platform content.
                        </p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Analytics Section -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    <div>
                        <p class="text-purple-600 font-semibold text-sm uppercase tracking-wide">
                            Learning Analytics
                        </p>

                        <h2 class="text-4xl font-extrabold mt-2">
                            Clear progress for every student
                        </h2>

                        <p class="text-gray-600 mt-5 leading-relaxed">
                            CourseNest helps learners stay organized with course progress,
                            completed lesson indicators, lesson resources, and a clean student dashboard.
                        </p>

                        <div class="mt-8 grid grid-cols-2 gap-5">
                            <div class="bg-gray-50 p-6 rounded-3xl">
                                <p class="text-3xl font-extrabold">75%</p>
                                <p class="text-gray-500 text-sm mt-1">Average Progress</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-3xl">
                                <p class="text-3xl font-extrabold">38</p>
                                <p class="text-gray-500 text-sm mt-1">Lessons Completed</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-3xl shadow-xl shadow-gray-100 p-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <p class="text-sm text-gray-500">Total Study Time</p>
                                <p class="text-3xl font-bold mt-2">24h 35m</p>
                                <p class="text-green-600 text-sm mt-2">+12% this week</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <p class="text-sm text-gray-500">Lessons Completed</p>
                                <p class="text-3xl font-bold mt-2">38 / 50</p>
                                <div class="mt-4 h-2 bg-gray-200 rounded-full">
                                    <div class="h-2 bg-purple-600 rounded-full w-3/4"></div>
                                </div>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <p class="text-sm text-gray-500">Resources Downloaded</p>
                                <p class="text-3xl font-bold mt-2">14</p>
                                <p class="text-gray-500 text-sm mt-2">PDFs and ZIP files</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <p class="text-sm text-gray-500">Learning Streak</p>
                                <p class="text-3xl font-bold mt-2">12</p>
                                <p class="text-orange-500 text-sm mt-2">Days in a row 🔥</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section id="testimonials" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center max-w-3xl mx-auto mb-14">
                    <p class="text-purple-600 font-semibold text-sm uppercase tracking-wide">
                        Reviews
                    </p>
                    <h2 class="text-4xl font-extrabold mt-2">
                        What students say
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100">
                        <p class="text-purple-600 text-4xl leading-none">“</p>
                        <p class="text-gray-600 mt-3">
                            CourseNest makes it easy to follow lessons and track progress without feeling lost.
                        </p>
                        <div class="mt-6">
                            <p class="font-bold">Emily Johnson</p>
                            <p class="text-sm text-gray-500">Web Development Student</p>
                        </div>
                    </div>

                    <div class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100">
                        <p class="text-purple-600 text-4xl leading-none">“</p>
                        <p class="text-gray-600 mt-3">
                            The resources and video lessons are organized clearly. The dashboard feels simple and useful.
                        </p>
                        <div class="mt-6">
                            <p class="font-bold">Michael Chen</p>
                            <p class="text-sm text-gray-500">Laravel Learner</p>
                        </div>
                    </div>

                    <div class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100">
                        <p class="text-purple-600 text-4xl leading-none">“</p>
                        <p class="text-gray-600 mt-3">
                            Great platform idea for companies, academies, and private course creators.
                        </p>
                        <div class="mt-6">
                            <p class="font-bold">Priya Sharma</p>
                            <p class="text-sm text-gray-500">Online Student</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- CTA -->
        <section class="py-10 bg-white">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                <div class="bg-purple-600 rounded-3xl px-8 py-8 lg:px-10 lg:py-9 text-white flex flex-col md:flex-row md:items-center md:justify-between gap-6 shadow-xl shadow-purple-200">

                    <div class="flex items-start gap-5">
                        <div class="hidden sm:flex w-14 h-14 rounded-2xl bg-white items-center justify-center text-purple-600 text-3xl font-extrabold shrink-0 shadow-lg shadow-purple-700/20">
                            C
                        </div>

                        <div>
                            <h2 class="text-2xl lg:text-3xl font-extrabold">
                                Ready to start your learning journey?
                            </h2>

                            <p class="text-purple-100 mt-2 max-w-2xl text-sm lg:text-base leading-relaxed">
                                Join CourseNest and learn through structured courses, video lessons, resources, and progress tracking.
                            </p>
                        </div>
                    </div>

                    @auth
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex justify-center shrink-0 bg-white text-purple-700 px-6 py-3 rounded-xl font-bold hover:bg-purple-50 transition">
                        Open Dashboard →
                    </a>
                    @else
                    <a href="{{ route('register') }}"
                        class="inline-flex justify-center shrink-0 bg-white text-purple-700 px-6 py-3 rounded-xl font-bold hover:bg-purple-50 transition">
                        Start Learning Free →
                    </a>
                    @endauth
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

                <div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-purple-600 flex items-center justify-center text-white font-bold">
                            C
                        </div>
                        <span class="text-xl font-bold">CourseNest</span>
                    </div>

                    <p class="text-gray-500 mt-4 text-sm leading-relaxed">
                        A modern Laravel learning platform for courses, lessons, resources, and progress tracking.
                    </p>
                </div>

                <div>
                    <h3 class="font-bold mb-4">Platform</h3>
                    <div class="space-y-3 text-sm text-gray-500">
                        <p>Courses</p>
                        <p>Progress</p>
                        <p>Resources</p>
                        <p>Dashboard</p>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold mb-4">Project</h3>
                    <div class="space-y-3 text-sm text-gray-500">
                        <p>Laravel</p>
                        <p>MySQL</p>
                        <p>Blade</p>
                        <p>Tailwind CSS</p>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold mb-4">Get Started</h3>
                    <p class="text-gray-500 text-sm mb-5">
                        Create an account and explore the learning dashboard.
                    </p>

                    @auth
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex bg-purple-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-purple-700 transition">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('register') }}"
                        class="inline-flex bg-purple-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-purple-700 transition">
                        Sign Up
                    </a>
                    @endauth
                </div>

            </div>

            <div class="border-t border-gray-100 mt-10 pt-8 text-center text-sm text-gray-500">
                © {{ date('Y') }} CourseNest. All rights reserved.
            </div>
        </div>
    </footer>

</body>

</html>