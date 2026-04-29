<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                    Enrollments
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Track simulated payments and unlocked courses.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
                class="inline-flex items-center justify-center border border-purple-200 text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-50 transition">
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">
                                Total Enrollments
                            </p>

                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">
                                {{ $totalEnrollments }}
                            </h3>

                            <p class="text-sm text-gray-400 mt-3">
                                All unlocked courses
                            </p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl">
                            🎓
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">
                                Verified Payments
                            </p>

                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">
                                {{ $verifiedEnrollments }}
                            </h3>

                            <p class="text-sm text-gray-400 mt-3">
                                Demo payment status
                            </p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-700 flex items-center justify-center text-2xl">
                            ✅
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">
                                Demo Revenue
                            </p>

                            <h3 class="text-4xl font-extrabold text-gray-900 mt-3">
                                ${{ number_format($totalRevenue, 2) }}
                            </h3>

                            <p class="text-sm text-gray-400 mt-3">
                                Simulated only
                            </p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-2xl">
                            💳
                        </div>
                    </div>
                </div>
            </div>

            <!-- Intro Card -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                    <div class="lg:col-span-2">
                        <span class="inline-flex bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold">
                            Admin Payment Overview
                        </span>

                        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mt-5">
                            See who unlocked which course
                        </h1>

                        <p class="text-gray-600 mt-3 max-w-2xl leading-relaxed">
                            This page tracks simulated payments from the fake checkout flow.
                            In a real production version, this would connect to Stripe, PayPal, or another payment provider.
                        </p>
                    </div>

                    <div class="bg-slate-950 text-white rounded-3xl p-6">
                        <div class="w-14 h-14 rounded-2xl bg-purple-600 flex items-center justify-center text-2xl mb-5">
                            🔐
                        </div>

                        <h3 class="text-xl font-extrabold">
                            Access Control
                        </h3>

                        <p class="text-slate-300 text-sm mt-3 leading-relaxed">
                            Students can only access course lessons after a verified enrollment exists.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Enrollments Table -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 lg:p-8 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-extrabold text-gray-900">
                            Enrollment Records
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            List of all course unlocks from the fake checkout system.
                        </p>
                    </div>

                    <div class="hidden md:flex items-center bg-gray-50 border border-gray-100 rounded-2xl px-4 py-3 w-72">
                        <span class="text-gray-400 mr-3">🔍</span>
                        <span class="text-sm text-gray-400">Search coming soon...</span>
                    </div>
                </div>

                @if ($enrollments->isEmpty())
                <div class="p-12 text-center">
                    <div class="w-20 h-20 bg-purple-100 text-purple-700 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-5">
                        💳
                    </div>

                    <h3 class="text-2xl font-extrabold text-gray-900">
                        No enrollments yet
                    </h3>

                    <p class="text-gray-500 mt-2 max-w-md mx-auto">
                        When students confirm payment from the checkout page, their enrollments will appear here.
                    </p>
                </div>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
                            <tr>
                                <th class="px-6 py-4">Student</th>
                                <th class="px-6 py-4">Course</th>
                                <th class="px-6 py-4">Price</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Enrolled At</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @foreach ($enrollments as $enrollment)
                            <tr class="hover:bg-gray-50/70 transition">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center font-extrabold">
                                            {{ strtoupper(substr($enrollment->user->name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <h3 class="font-extrabold text-gray-900">
                                                {{ $enrollment->user->name }}
                                            </h3>

                                            <p class="text-sm text-gray-500 mt-1">
                                                {{ $enrollment->user->email }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-5">
                                    <div>
                                        <h3 class="font-bold text-gray-900">
                                            {{ $enrollment->course->title }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ $enrollment->course->slug }}
                                        </p>
                                    </div>
                                </td>

                                <td class="px-6 py-5 text-sm font-extrabold text-gray-900">
                                    @if ($enrollment->price > 0)
                                    ${{ number_format($enrollment->price, 2) }}
                                    @else
                                    Free
                                    @endif
                                </td>

                                <td class="px-6 py-5">
                                    @if ($enrollment->payment_status === 'verified')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                        Verified
                                    </span>
                                    @else
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">
                                        {{ ucfirst($enrollment->payment_status) }}
                                    </span>
                                    @endif
                                </td>

                                <td class="px-6 py-5 text-sm text-gray-500">
                                    {{ $enrollment->enrolled_at ? $enrollment->enrolled_at->format('d M Y, H:i') : '-' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>