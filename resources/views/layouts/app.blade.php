<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CourseNest</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:w-72 bg-slate-950 text-white flex-col fixed inset-y-0 left-0 z-40">
            <div class="h-20 flex items-center px-6 border-b border-white/10">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-purple-600 flex items-center justify-center font-extrabold text-lg shadow-lg shadow-purple-900/40">
                        C
                    </div>

                    <div>
                        <h1 class="font-extrabold text-xl leading-none">CourseNest</h1>
                        @auth
                        <p class="text-xs text-slate-400 mt-1">
                            {{ auth()->user()->role === 'admin' ? 'Admin Panel' : 'Student Portal' }}
                        </p>
                        @endauth
                    </div>
                </a>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition
                   {{ request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') ? 'bg-purple-600 text-white shadow-lg shadow-purple-900/30' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                    <span>🏠</span>
                    Dashboard
                </a>

                @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin.courses.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition
                       {{ request()->routeIs('admin.courses.*') ? 'bg-purple-600 text-white shadow-lg shadow-purple-900/30' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                    <span>📚</span>
                    Courses
                </a>

                <a href="{{ route('admin.lessons.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition
                       {{ request()->routeIs('admin.lessons.*') ? 'bg-purple-600 text-white shadow-lg shadow-purple-900/30' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                    <span>🎥</span>
                    Lessons
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold text-slate-500 cursor-not-allowed">
                    <span>👥</span>
                    Users
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold text-slate-500 cursor-not-allowed">
                    <span>📊</span>
                    Reports
                </a>
                @else
                <a href="{{ route('student.courses.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition
                       {{ request()->routeIs('student.courses.*') || request()->routeIs('student.lessons.*') ? 'bg-purple-600 text-white shadow-lg shadow-purple-900/30' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                    <span>📚</span>
                    My Courses
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold text-slate-500 cursor-not-allowed">
                    <span>📈</span>
                    My Progress
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold text-slate-500 cursor-not-allowed">
                    <span>🏆</span>
                    Certificates
                </a>
                @endif

                <div class="pt-6 mt-6 border-t border-white/10 space-y-2">
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition
                       {{ request()->routeIs('profile.edit') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <span>⚙️</span>
                        Settings
                    </a>
                </div>
            </nav>

            <div class="p-4 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold text-slate-300 hover:bg-red-500/10 hover:text-red-300 transition">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6A2.25 2.25 0 0 0 5.25 5.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3-3H9m0 0 3-3m-3 3 3 3" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 lg:ml-72 min-w-0">

            <!-- Topbar -->
            <header class="h-20 bg-white border-b border-gray-100 sticky top-0 z-30">
                <div class="h-full px-6 lg:px-8 flex items-center justify-between">

                    <div class="flex items-center gap-4">
                        <a href="{{ route('dashboard') }}" class="lg:hidden flex items-center gap-3">
                            <div class="w-10 h-10 rounded-2xl bg-purple-600 text-white flex items-center justify-center font-extrabold">
                                C
                            </div>
                            <span class="font-extrabold text-lg">CourseNest</span>
                        </a>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="hidden sm:block text-right">
                            <p class="text-sm font-bold text-gray-900">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="text-xs text-gray-500 capitalize">
                                {{ auth()->user()->role }}
                            </p>
                        </div>

                        <div class="w-11 h-11 rounded-full bg-purple-100 text-purple-700 flex items-center justify-center font-bold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>

                </div>
            </header>

            <!-- Page Header -->
            @isset($header)
            <div class="bg-white border-b border-gray-100">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-6">
                    {{ $header }}
                </div>
            </div>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>