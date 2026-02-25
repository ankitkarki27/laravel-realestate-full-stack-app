    @extends('admin.top')

    @section('content')
    {{-- @include('admin.layouts.app') --}}
        <h3>Name of admin updated: {{ Auth::guard('admin')->user()->name }}</h3>
        <h3>{{ Auth::guard('admin')->user()->email }}</h3>
        <a href="{{ route('admin_profile') }}">profile</a>
        <a href="{{ route('admin_logout') }}">Logout</a>
    @endsection
