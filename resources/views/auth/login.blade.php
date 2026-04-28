<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900">
            Welcome back
        </h2>
        <p class="text-gray-500 mt-2">
            Sign in to continue learning with CourseNest.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                Email address
            </label>
            <input id="email"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                Password
            </label>
            <input id="password"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">Remember me</span>
            </label>

            @if (Route::has('password.request'))
            <a class="text-sm font-medium text-purple-600 hover:text-purple-700"
                href="{{ route('password.request') }}">
                Forgot password?
            </a>
            @endif
        </div>

        <button type="submit"
            class="w-full inline-flex justify-center items-center rounded-xl bg-purple-600 px-5 py-3.5 text-white font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-200">
            Sign In
        </button>

        <p class="text-center text-sm text-gray-600">
            Don’t have an account?
            <a href="{{ route('register') }}" class="font-semibold text-purple-600 hover:text-purple-700">
                Create one
            </a>
        </p>
    </form>
</x-guest-layout>