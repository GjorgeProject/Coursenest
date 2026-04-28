<section
    x-data="{ confirmingUserDeletion: false }">
    <div class="rounded-xl bg-red-50 border border-red-100 p-5">
        <h2 class="text-lg font-bold text-red-700">
            Delete account
        </h2>

        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
            Once your account is deleted, all of its resources and data will be permanently deleted.
            Please enter your password to confirm you would like to permanently delete your account.
        </p>

        <button
            type="button"
            x-on:click.prevent="confirmingUserDeletion = true"
            class="mt-5 inline-flex justify-center rounded-xl bg-red-600 px-5 py-3 text-white font-semibold hover:bg-red-700 transition shadow-lg shadow-red-100">
            Delete Account
        </button>
    </div>

    <div
        x-show="confirmingUserDeletion"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4">
        <div
            x-show="confirmingUserDeletion"
            x-transition
            class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-6">
            <h2 class="text-xl font-bold text-gray-900">
                Are you sure?
            </h2>

            <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                This action cannot be undone. Please enter your password to confirm.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-5">
                @csrf
                @method('delete')

                <div>
                    <label for="password" class="sr-only">Password</label>

                    <input id="password"
                        name="password"
                        type="password"
                        class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 px-4 py-3"
                        placeholder="Enter your password">

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-end gap-3">
                    <button
                        type="button"
                        x-on:click="confirmingUserDeletion = false"
                        class="rounded-xl border border-gray-200 px-5 py-3 font-semibold text-gray-700 hover:bg-gray-50 transition">
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="rounded-xl bg-red-600 px-5 py-3 font-semibold text-white hover:bg-red-700 transition">
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>