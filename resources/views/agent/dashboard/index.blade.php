@extends('agent.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 p-6">
    <div class="max-w-4xl mx-auto grid grid-cols-1 gap-6">

        <!-- Welcome Card -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 text-center">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">
                Agent Dashboard
            </h2>
            @auth('agent')
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Welcome, <span class="font-medium">{{ Auth::guard('agent')->user()->name }}</span>!
                </p>

                <form method="POST" action="{{ route('agent.logout') }}">
                    @csrf
                    <button type="submit"
                            class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition-colors duration-200">
                        Logout
                    </button>
                </form>
            @endauth

            @guest('agent')
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    You are not logged in.
                </p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('agent.login') }}"
                       class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200">
                        Login
                    </a>
                    <a href="{{ route('agent.registration') }}"
                       class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors duration-200">
                        Register
                    </a>
                </div>
            @endguest
        </div>

    </div>
</div>
@endsection