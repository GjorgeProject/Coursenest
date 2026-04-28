<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                Name
            </label>

            <input id="name"
                name="name"
                type="text"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name">

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                Email
            </label>

            <input id="email"
                name="email"
                type="email"
                class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-3"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username">

            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-4 rounded-xl bg-yellow-50 border border-yellow-100 p-4">
                <p class="text-sm text-yellow-800">
                    Your email address is unverified.

                    <button form="send-verification"
                        class="font-semibold underline text-yellow-900 hover:text-yellow-700">
                        Click here to re-send the verification email.
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-sm font-medium text-green-600">
                    A new verification link has been sent to your email address.
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="inline-flex justify-center rounded-xl bg-purple-600 px-5 py-3 text-white font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-100">
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
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