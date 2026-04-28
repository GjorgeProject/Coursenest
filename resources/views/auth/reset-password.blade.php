<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900">
            Reset password
        </h2>

        <p class="text-gray-500 mt-2">
            Create a new password for your CourseNest account.
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                Email address
            </label>

            <input id="email"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                type="email"
                name="email"
                value="{{ old('email', $request->email) }}"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email">

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                New password
            </label>

            <input id="password"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Enter new password">

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                Confirm new password
            </label>

            <input id="password_confirmation"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Confirm new password">

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit"
            class="w-full inline-flex justify-center items-center rounded-xl bg-purple-600 px-5 py-3.5 text-white font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-200">
            Reset Password
        </button>
    </form>
</x-guest-layout>