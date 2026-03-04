<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Real Homes') - Real Estate Platform</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    @stack('styles')
</head>

<body x-data="{
    sidebarToggle: false,
    darkMode: localStorage.getItem('darkMode') === 'true'
}" x-init="
    $watch('darkMode', value => {
        localStorage.setItem('darkMode', value);
        if (value) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });
    if (darkMode) document.documentElement.classList.add('dark');
" :class="{ 'dark': darkMode }" class="antialiased">

    <div class="flex h-screen overflow-hidden bg-gray-50 dark:bg-gray-900">
        <!-- Sidebar (if any) can go here -->
        
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            @include('user.layouts.header')

            <!-- Page Content -->
            <main class="flex-1 p-4 mx-auto w-full max-w-7xl md:p-6 lg:p-8">
                @yield('content')
            </main>

            <!-- Footer (optional) -->
            @include('user.layouts.footer')
        </div>
    </div>

    @stack('scripts')
</body>

</html>