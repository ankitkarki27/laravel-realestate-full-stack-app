@extends('user.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-2xl mx-auto px-4">

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-gray-900 mb-8">
            Profile Settings
        </h2>

        <!-- Alerts -->
        @if ($errors->any())
            <div class="mb-6 space-y-2">
                @foreach ($errors->all() as $error)
                    <div class="text-sm text-red-600 bg-red-50 border border-red-200 px-4 py-3 rounded-lg">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 text-sm text-green-600 bg-green-50 border border-green-200 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 text-sm text-red-600 bg-red-50 border border-red-200 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white border border-gray-200 rounded-xl p-8">

            <form action="{{ route('profile_submit') }}" method="post" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Photo Section -->
                <div class="flex items-center gap-6">
                    <div class="flex-shrink-0">
                        @if (Auth::guard('web')->user()->photo == null)
                            <div class="w-24 h-24 bg-gray-100 border border-gray-300 rounded-full flex items-center justify-center text-gray-400 text-sm">
                                No Photo
                            </div>
                        @else
                            <img src="{{ asset('uploads/' . Auth::guard('web')->user()->photo) }}"
                                 class="w-24 h-24 rounded-full object-cover border border-gray-300">
                        @endif
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Profile Photo
                        </label>
                        <input type="file" name="photo" 
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    </div>
                </div>

                <!-- Basic Information -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="name"
                                value="{{ Auth::guard('web')->user()->name }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500 focus:ring-0">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email"
                                value="{{ Auth::guard('web')->user()->email }}"
                                readonly
                                class="w-full px-4 py-3 border border-gray-200 bg-gray-50 text-gray-500 rounded-lg">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="text" name="phone"
                                value="{{ Auth::guard('web')->user()->phone }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500 focus:ring-0">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <input type="text" name="address"
                                value="{{ Auth::guard('web')->user()->address }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500 focus:ring-0">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                            <input type="text" name="country"
                                value="{{ Auth::guard('web')->user()->country }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500 focus:ring-0">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">State / Province</label>
                            <input type="text" name="state"
                                value="{{ Auth::guard('web')->user()->state }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500 focus:ring-0">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Zip / Postal Code</label>
                            <input type="text" name="zip"
                                value="{{ Auth::guard('web')->user()->zip }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500 focus:ring-0">
                        </div>
                    </div>
                </div>

                <!-- Change Password -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Change Password</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <input type="password" name="password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500 focus:ring-0">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                            <input type="password" name="confirm_password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500 focus:ring-0">
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Leave blank if you don't want to change your password.</p>
                </div>

                <!-- Submit Button -->
                <div class="pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="w-full md:w-auto px-8 py-3 bg-gray-900 hover:bg-black text-white font-medium rounded-lg transition">
                        Save Changes
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection