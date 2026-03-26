@extends('user.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-12">
    
    <div class="max-w-5xl w-full">
        
        <!-- Heading -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">
                Select Your Role
            </h1>
            <p class="text-gray-500">
                Choose how you want to continue
            </p>
        </div>

        <!-- Two Column Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- USER CARD -->
            <div class="bg-white rounded-2xl shadow-md p-8 text-center border hover:shadow-lg transition">
                
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    User
                </h2>
                <p class="text-gray-500 mb-6">
                    Access your dashboard, manage activities and explore features
                </p>

                <div class="flex flex-col gap-4">
                    <a href="{{ route('login') }}"
                        class="w-full px-4 py-3 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 transition">
                        Login as User
                    </a>

                    <a href="{{ route('registration') }}"
                        class="w-full px-4 py-3 text-sm font-medium text-gray-900 border border-gray-900 rounded-lg hover:bg-gray-900 hover:text-white transition">
                        Register as User
                    </a>
                </div>
            </div>

            <!-- AGENT CARD -->
            <div class="bg-white rounded-2xl shadow-md p-8 text-center border hover:shadow-lg transition">
                
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    Agent
                </h2>
                <p class="text-gray-500 mb-6">
                    Manage clients, handle operations and access agent tools
                </p>

                <div class="flex flex-col gap-4">
                    <a href="{{ route('login') }}"
                        class="w-full px-4 py-3 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 transition">
                        Login as Agent
                    </a>

                      <a href="{{ route('agent.registration') }}"
                        class="w-full px-4 py-3 text-sm font-medium text-gray-900 border border-gray-900 rounded-lg hover:bg-gray-900 hover:text-white transition">
                        Register as Agent
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection