@extends('user.layouts.master')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">

        <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
            {{-- @include('user.top') --}}
            <h2>This is user dashboard</h2>
            <p>
                Welcome {{ Auth::guard('web')->user()->name }} to your dashboard.
            </p>
            <a href="{{ route('logout') }}">Logout </a>
        </div>

        <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold">Active Sessions</h2>
            <p class="text-2xl mt-2">567</p>
        </div>

        <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold">Revenue</h2>
            <p class="text-2xl mt-2">$12,345</p>
        </div>

        <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold">New Orders</h2>
            <p class="text-2xl mt-2">89</p>
        </div>
    </div>
@endsection
