@extends('admin.layouts.master')

@section('content')
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        <main>
            <div class="p-4 mx-auto max-w-xl md:p-6">
                <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">

                    <h3 class="mb-6 text-lg font-semibold text-gray-800 dark:text-white/90">
                        Update Profile
                    </h3>

                    <form action="{{ route('admin_profile_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Profile Photo -->
                        <div class="mb-6 flex flex-col items-center gap-4">
                            <div class="h-24 w-24 overflow-hidden rounded-full border border-gray-200 dark:border-gray-800">
                                <tr>
                                    <td>
                                        @if (Auth::guard('admin')->user()->photo == null)
                                            No Photo Found
                                        @else
                                            <img src="{{ asset('uploads/' . Auth::guard('admin')->user()->photo) }}"
                                                alt="admin photo " style="width:100px;height:auto;" />
                                        @endif
                                    </td>
                                </tr>
                            </div>

                            <input type="file" name="photo" accept="image/*"
                                class="block w-full text-sm text-gray-500
                                   file:mr-4 file:rounded-full file:border-0
                                   file:bg-gray-100 file:px-4 file:py-2
                                   file:text-sm file:font-medium
                                   dark:file:bg-gray-800 dark:file:text-gray-300">
                        </div>

                        <!-- Name -->
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Name
                            </label>
                            <input type="text" name="name" value="{{ Auth::guard('admin')->user()->name }}" required
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm
                                   focus:border-primary focus:outline-none
                                   dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>

                        <!-- Email (Read Only) -->
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Email
                            </label>
                            <input type="email" value="{{ Auth::guard('admin')->user()->email }}" readonly
                                class="w-full cursor-not-allowed rounded-lg border border-gray-300
                                   bg-gray-100 px-4 py-2 text-sm
                                   dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300">
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                New Password
                            </label>
                            <input type="password" name="password"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm
                                   focus:border-primary focus:outline-none
                                   dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-6">
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Confirm Password
                            </label>
                            <input type="password" name="confirm_password"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm
                                   focus:border-primary focus:outline-none
                                   dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="w-full rounded-full bg-primary px-6 py-3 text-sm font-medium
                               text-black hover:bg-primary/90">
                            Save Changes
                        </button>
                    </form>

                </div>
            </div>
        </main>
    </div>
@endsection
