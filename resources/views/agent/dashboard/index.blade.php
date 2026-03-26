@extends('agent.layouts.master')

@section('content')
    <div class="grid grid-cols-2 text-center">

        <div class="col-span-12 bg-white dark:bg-gray-800 p-4 rounded-lg">
            <h2>This is Agent dashboard</h2>
            <p>
                Welcome {{ Auth::guard('agent')->user()->name }} to your dashboard.
            </p>
            <form method="POST" action="{{ route('agent.logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
@endsection
