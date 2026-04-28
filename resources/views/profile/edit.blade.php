<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile Settings
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Manage your account information and password.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">
                        Profile Information
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Update your name and email address.
                    </p>
                </div>

                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">
                        Update Password
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Use a strong password to keep your account secure.
                    </p>
                </div>

                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-red-100 overflow-hidden">
                <div class="p-6 border-b border-red-100">
                    <h3 class="text-lg font-bold text-red-700">
                        Delete Account
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Permanently delete your account and all related data.
                    </p>
                </div>

                <div class="p-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>