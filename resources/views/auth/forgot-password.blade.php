<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900">
            Forgot your password?
        </h2>

        <p class="text-gray-500 mt-2 leading-relaxed">
            No problem. Enter your email address and we’ll send you a password reset link.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                placeholder="Enter your email">

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <button type="submit"
            class="w-full inline-flex justify-center items-center rounded-xl bg-purple-600 px-5 py-3.5 text-white font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-200">
            Send Reset Link
        </button>

        <p class="text-center text-sm text-gray-600">
            Remember your password?
            <a href="{{ route('login') }}" class="font-semibold text-purple-600 hover:text-purple-700">
                Back to login
            </a>
        </p>
    </form>
</x-guest-layout>