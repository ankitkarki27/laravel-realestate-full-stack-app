@extends('user.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50 px-4 py-12 flex justify-center">

    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-md p-8">

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">
            Profile Settings
        </h2>

        <!-- Alerts -->
        @if ($errors->any())
            <div class="mb-4 space-y-2">
                @foreach ($errors->all() as $error)
                    <div class="text-sm text-red-600 bg-red-50 px-3 py-2 rounded">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 text-sm text-green-600 bg-green-50 px-3 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 text-sm text-red-600 bg-red-50 px-3 py-2 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('profile_submit') }}" method="post" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Photo Section -->
            <div class="flex items-center gap-6">
                <div>
                    @if (Auth::guard('web')->user()->photo == null)
                        <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center text-gray-500">
                            No Photo
                        </div>
                    @else
                        <img src="{{ asset('uploads/' . Auth::guard('web')->user()->photo) }}"
                             class="w-24 h-24 rounded-full object-cover">
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Change Photo
                    </label>
                    <input type="file" name="photo" class="text-sm text-gray-600">
                </div>
            </div>

            <!-- Grid Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="text-sm text-gray-700">Name</label>
                    <input type="text" name="name"
                        value="{{ Auth::guard('web')->user()->name }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>

                <div>
                    <label class="text-sm text-gray-700">Email</label>
                    <input type="text"
                        value="{{ Auth::guard('web')->user()->email }}"
                        readonly
                        class="w-full px-4 py-2 rounded-lg bg-gray-200 text-gray-500">
                </div>

                <div>
                    <label class="text-sm text-gray-700">Phone</label>
                    <input type="text" name="phone"
                        value="{{ Auth::guard('web')->user()->phone }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>

                <div>
                    <label class="text-sm text-gray-700">Address</label>
                    <input type="text" name="address"
                        value="{{ Auth::guard('web')->user()->address }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>

                <div>
                    <label class="text-sm text-gray-700">Country</label>
                    <input type="text" name="country"
                        value="{{ Auth::guard('web')->user()->country }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>

                <div>
                    <label class="text-sm text-gray-700">State</label>
                    <input type="text" name="state"
                        value="{{ Auth::guard('web')->user()->state }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>

                <div>
                    <label class="text-sm text-gray-700">Zip</label>
                    <input type="text" name="zip"
                        value="{{ Auth::guard('web')->user()->zip }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>

            </div>

            <!-- Password Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="text-sm text-gray-700">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>

                <div>
                    <label class="text-sm text-gray-700">Confirm Password</label>
                    <input type="password" name="confirm_password"
                        class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2.5 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition">
                    Save Changes
                </button>
            </div>

        </form>

    </div>

</div>
@endsection