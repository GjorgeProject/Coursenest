<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-semibold text-gray-700 mb-2">
                Current Password
            </label>

            <input id="update_password_current_password"
                name="current_password"
                type="password"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                autocomplete="current-password">

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-semibold text-gray-700 mb-2">
                New Password
            </label>

            <input id="update_password_password"
                name="password"
                type="password"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                autocomplete="new-password">

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                Confirm Password
            </label>

            <input id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                autocomplete="new-password">

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="inline-flex justify-center rounded-xl bg-purple-600 px-5 py-3 text-white font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-600 font-medium">
                Saved.
            </p>
            @endif
        </div>
    </form>
</section>