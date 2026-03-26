@extends('agent.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex items-center justify-center p-4">
    <div class="w-full max-w-5xl mx-auto">
        <div class="flex flex-col lg:flex-row bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl overflow-hidden shadow-sm">

            <!-- Left Side: Login Form -->
            <div class="flex-1 lg:w-1/2 p-8 lg:p-12 flex flex-col">
                
                <!-- Back to Dashboard -->
                <div class="mb-8">
                    <a href="./" 
                       class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7" />
                        </svg>
                        Back to Dashboard
                    </a>
                </div>

                <div class="flex-1 flex flex-col justify-center max-w-md mx-auto w-full">
                    <div class="mb-8">
                        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-2">
                            Sign In
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400">
                            Enter your email and password to sign in to your account.
                        </p>
                    </div>

                    <form action="{{ route('agent.login_submit') }}" method="post" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   placeholder="info@example.com"
                                   value="{{ old('email') }}"
                                   class="w-full h-12 px-4 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-blue-500 focus:ring-0 outline-none transition">
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <div x-data="{ showPassword: false }" class="relative">
                                <input :type="showPassword ? 'text' : 'password'" 
                                       name="password"
                                       placeholder="Enter your password"
                                       class="w-full h-12 px-4 pr-12 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-blue-500 focus:ring-0 outline-none transition">
                                
                                <button type="button"
                                        @click="showPassword = !showPassword"
                                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5 16.477 5 20.268 7.943 21.542 12 20.268 16.057 16.477 19 12 19 7.523 19 3.732 16.057 2.458 12z" />
                                    </svg>
                                    <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908l3.42 3.42m-3.42-3.42l-3.42-3.42" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Sign In Button -->
                        <button type="submit"
                            class="w-full h-12 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition flex items-center justify-center">
                            Sign In
                        </button>
                    </form>

                    <!-- Links -->
                    <div class="mt-8 text-center space-y-3">
                        <p>
                            <a href="" 
                               class="text-blue-600 hover:text-blue-700 dark:text-blue-400 text-sm">
                                Forgot your password?
                            </a>
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            New Agent? 
                            <a href="{{ route('agent.registration') }}" 
                               class="text-gray-900 dark:text-white font-medium hover:underline">
                                Create an account
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Illustration / Branding -->
            <div class="hidden lg:flex lg:w-1/2 bg-gray-50 dark:bg-gray-800 items-center justify-center p-12">
                <div class="text-center">
                    <a href="#" class="inline-block mb-6">
                        <img src="{{ asset('logo/landmark-logo.png') }}" alt="Logo" class="h-20 mx-auto">
                    </a>
                    {{-- <p class="text-gray-500 dark:text-gray-400 text-lg">
                        Welcome back to the Admin Panel
                    </p> --}}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection