<header x-data="{ menuToggle: false, userDropdown: false }" @click.away="userDropdown = false"
    class="sticky top-0 z-50 w-full bg-white border-b border-gray-200">

    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">


            <div class="flex-shrink-2">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('logo/landmark-logo.png') }}" alt="RealEstateHomes Logo" class="h-8 w-auto" />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}"
                    class="text-base font-medium text-gray-900 transition-colors hover:text-blue-600">
                    Home
                </a>
                <a href="{{ route('about') }}"
                    class="text-base font-medium text-gray-900 transition-colors hover:text-blue-600">
                    About
                </a>
                <a href="" class="text-base font-medium text-gray-900 transition-colors hover:text-blue-600">
                    Properties
                </a>
                <a href="" class="text-base font-medium text-gray-900 transition-colors hover:text-blue-600">
                    Contact
                </a>

                @auth
                    <a href="{{ route('profile') }}">Profile </a>
                    <a href="{{ route('dashboard') }}">Dashboard </a>
                    {{-- <a href="{{ route('logout') }}">Logout </a> --}}
                @else
                    <a href="{{ route('admin_login') }}">Admin Login</a>
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('registration') }}">Register</a>
                @endauth

                @auth
                    <!-- User Menu when logged in - Icon Only -->
                    <div class="relative">
                        <button @click="userDropdown = !userDropdown" class="flex items-center focus:outline-none">
                            <!-- User Photo/Icon -->
                            <div
                                class="w-9 h-9 overflow-hidden rounded-full ring-2 ring-gray-100 hover:ring-blue-200 transition-all">
                                @if (Auth::guard('web')->user()->photo == null)
                                    <div class="flex items-center justify-center w-full h-full bg-gray-100">
                                        <span class="text-sm font-medium text-gray-600">
                                            {{ substr(auth()->user()->name, 0, 1) }}
                                        </span>
                                    </div>
                                @else
                                    <img src="{{ asset('uploads/' . Auth::guard('web')->user()->photo) }}"
                                        alt="{{ auth()->user()->name }}" class="object-cover w-full h-full" />
                                @endif
                            </div>
                        </button>

                        <!-- Dropdown Menu - Logged In (Simple & Minimal) -->
                        <div x-show="userDropdown" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 w-48 mt-2 bg-white rounded-md shadow-lg py-1 border border-gray-200">

                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>

                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                Profile
                            </a>

                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                Dashboard
                            </a>

                            <div class="border-t border-gray-100"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Login/Signup Button for non-logged in users -->
                    {{-- <div class="flex items-center space-x-3">
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-base font-medium text-gray-900 bg-white border border-gray-900 rounded-lg hover:bg-gray-800 hover:text-white hover:border-gray-900 transition-all inline-flex items-center">
                            <i class="fa-regular fa-user mr-2"></i>
                            Login/Signup
                        </a>
                    </div> --}}
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('select_user') }}"
                            class="px-4 py-2 text-base font-medium text-gray-900 bg-white border border-gray-900 rounded-lg hover:bg-gray-800 hover:text-white hover:border-gray-900 transition-all inline-flex items-center">
                            <i class="fa-regular fa-user mr-2"></i>
                            Login
                        </a>
                    </div>
                @endauth
            </nav>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button @click="menuToggle = !menuToggle"
                    class="inline-flex items-center justify-center p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!menuToggle" class="block w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="menuToggle" class="block w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu (simplified) -->
    <div x-show="menuToggle" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden border-t border-gray-200">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}"
                class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">
                Home
            </a>
            <a href="{{ route('about') }}"
                class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">
                About
            </a>
            <a href="" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">
                Properties
            </a>
            <a href="" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">
                Contact
            </a>

            @auth
                <div class="border-t border-gray-200 my-2 pt-2"></div>
                <div class="px-3 py-2">
                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                </div>
                <a href="{{ route('profile') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">
                    Profile
                </a>
                <a href="{{ route('dashboard') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">
                    Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full px-3 py-2 text-base font-medium text-left text-gray-900 rounded-md hover:bg-gray-50">
                        Logout
                    </button>
                </form>
            @else
                <div class="border-t border-gray-200 my-2 pt-4"></div>
                <div class="flex flex-col space-y-2 px-3">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-base font-medium text-gray-900 bg-white border border-gray-900 rounded-lg hover:bg-gray-800 hover:text-white hover:border-gray-900 transition-all inline-flex items-center">
                        <i class="fa-regular fa-user mr-2"></i>
                        Login/Signup
                    </a>
                    {{-- <a href="{{ route('registration') }}" 
                       class="block px-4 py-2.5 text-base font-medium text-center text-white bg-gray-900 border border-gray-900 rounded-md hover:bg-blue-600 hover:border-blue-600 transition-all">
                        Sign Up
                    </a> --}}
                </div>
            @endauth
        </div>
    </div>
</header>
