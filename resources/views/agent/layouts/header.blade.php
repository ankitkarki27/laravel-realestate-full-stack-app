<!-- resources/views/agent/layouts/header.blade.php -->
<div class="w-full bg-white dark:bg-gray-800 p-4 shadow-md flex justify-between items-center">
    <!-- Logo / Brand -->
    <div class="text-xl font-bold text-gray-800 dark:text-white">
        RealEstate Agent Dashboard
    </div>

    <!-- Navigation / User Info -->
    <div class="flex items-center space-x-4">
        @auth('agent')
            <span class="text-gray-800 dark:text-white">
                Welcome, {{ Auth::guard('agent')->user()->name }}
            </span>
            <a href="{{ route('agent.profile') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
                Profile
            </a>
            <form method="POST" action="{{ route('agent.logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                    Logout
                </button>
            </form>
        @endauth

        @guest('agent')
            <a href="{{ route('agent.login') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
                Login
            </a>
            <a href="{{ route('agent.registration') }}"
                class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded">
                Register
            </a>
        @endguest
    </div>
</div>
