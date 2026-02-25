<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Real Homes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body x-data="{
    sidebarToggle: false,
    darkMode: false
}" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode }">

    <div class="flex h-screen overflow-hidden">

        {{-- SIDEBAR --}}
        @auth('admin')
            @include('admin.layouts.sidebar')
        @endauth


        {{-- MAIN CONTENT AREA --}}
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            @auth('admin')
                {{-- mobileoverlay --}}
                @include('admin.layouts.overlay')
            @endauth

            @auth('admin')
                {{-- header --}}
                @include('admin.layouts.header')
            @endauth


            {{-- pagecontent --}}
            <main class="p-4 md:p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
