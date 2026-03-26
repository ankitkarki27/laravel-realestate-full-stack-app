@extends('user.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex items-center justify-center p-4">
    <div class="w-full max-w-5xl mx-auto bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl overflow-hidden shadow-sm">

        <div class="flex flex-col lg:flex-row">

            <!-- Left Side: Registration Form -->
            <div class="flex-1 lg:w-1/2 p-8 lg:p-12 flex flex-col">
                
                <!-- Back Link (optional) -->
                <div class="mb-8">
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7 7-7" />
                        </svg>
                        Back to Login
                    </a>
                </div>

                <div class="flex-1 flex flex-col justify-center max-w-md w-full mx-auto">
                    <div class="mb-8">
                        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-2">
                            Create Account
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400">
                            Join us today and start your journey.
                        </p>
                    </div>

                    <!-- Alerts -->
                    @if ($errors->any())
                        <div class="mb-6 space-y-2">
                            @foreach ($errors->all() as $error)
                                <div class="text-sm text-red-600 bg-red-50 border border-red-200 px-4 py-3 rounded-xl">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-6 text-sm text-green-600 bg-green-50 border border-green-200 px-4 py-3 rounded-xl">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 text-sm text-red-600 bg-red-50 border border-red-200 px-4 py-3 rounded-xl">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('registration_submit') }}" method="post" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                Full Name
                            </label>
                            <input type="text" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   placeholder="Enter your full name"
                                   class="w-full h-12 px-4 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-blue-500 focus:ring-0 outline-none transition">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                Email Address
                            </label>
                            <input type="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="you@example.com"
                                   class="w-full h-12 px-4 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-blue-500 focus:ring-0 outline-none transition">
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                Password
                            </label>
                            <input type="password" 
                                   name="password" 
                                   placeholder="Create a strong password"
                                   class="w-full h-12 px-4 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-blue-500 focus:ring-0 outline-none transition">
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                Confirm Password
                            </label>
                            <input type="password" 
                                   name="confirm_password" 
                                   placeholder="Confirm your password"
                                   class="w-full h-12 px-4 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-blue-500 focus:ring-0 outline-none transition">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full h-12 bg-gray-900 hover:bg-black text-white font-medium rounded-xl transition flex items-center justify-center">
                            Create Account
                        </button>
                    </form>

                    <!-- Login Link -->
                    <div class="mt-8 text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Already have an account? 
                            <a href="{{ route('login') }}" 
                               class="text-gray-900 dark:text-white font-medium hover:underline">
                                Sign in
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Branding / Logo Area -->
            <div class="hidden lg:flex lg:w-1/2 bg-gray-50 dark:bg-gray-800 items-center justify-center p-12 relative">
                <div class="text-center max-w-xs">
                    <a href="{{ url('/') }}" class="inline-block mb-8">
                        <img src="{{ asset('logo/landmark-logo.png') }}" 
                             alt="Logo" 
                             class="h-20 mx-auto">
                    </a>
                    <h3 class="text-2xl font-medium text-gray-900 dark:text-white mb-3">
                        Welcome to Our Community
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 leading-relaxed">
                        Create your account and enjoy seamless access to all features.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection