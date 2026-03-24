@extends('user.layouts.master')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-12">

    <div class="w-full max-w-md bg-white shadow-md rounded-2xl p-8">
        
        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">
            Create Account
        </h2>

        <!-- Errors -->
        @if ($errors->any())
            <div class="mb-4 space-y-2">
                @foreach ($errors->all() as $error)
                    <div class="text-sm text-red-600 bg-red-50 px-3 py-2 rounded">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Success -->
        @if (session('success'))
            <div class="mb-4 text-sm text-green-600 bg-green-50 px-3 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error -->
        @if (session('error'))
            <div class="mb-4 text-sm text-red-600 bg-red-50 px-3 py-2 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('registration_submit') }}" method="post" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Name
                </label>
                <input type="text" name="name" placeholder="Enter your name"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-900 focus:outline-none">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input type="email" name="email" placeholder="Enter your email"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-900 focus:outline-none">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input type="password" name="password" placeholder="Enter password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-900 focus:outline-none">
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Confirm Password
                </label>
                <input type="password" name="confirm_password" placeholder="Confirm password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-900 focus:outline-none">
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-gray-900 text-white py-2.5 rounded-lg font-medium hover:bg-gray-800 transition">
                Register
            </button>

            <!-- Login Link -->
            <p class="text-sm text-center text-gray-500">
                Already have an account?
                <a href="{{ route('login') }}" class="text-gray-900 font-medium hover:underline">
                    Login
                </a>
            </p>

        </form>
    </div>

</div>
@endsection