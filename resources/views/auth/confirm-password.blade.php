<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900">
            Confirm password
        </h2>

        <p class="text-gray-500 mt-2 leading-relaxed">
            This is a secure area. Please confirm your password before continuing.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

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

        <button type="submit"
            class="w-full inline-flex justify-center items-center rounded-xl bg-purple-600 px-5 py-3.5 text-white font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-200">
            Confirm
        </button>
    </form>
</x-guest-layout>