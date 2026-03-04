@extends('user.layouts.master')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-white">
        <!-- Subtle pattern overlay (optional) -->
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative px-4 py-24 mx-auto max-w-4xl sm:px-6 lg:px-8 lg:py-32">
            <div class="text-center">
                <!-- Welcome Badge -->
                <div class="inline-flex items-center justify-center mb-6">
                    <span class="px-4 py-1 text-sm font-medium text-blue-700 bg-blue-50 rounded-full">
                        Welcome to RealEstateHomes
                    </span>
                </div>
                
                <!-- Main Heading -->
                <h1 class="mb-6 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                    Find Your Perfect 
                    <span class="text-blue-600">Place to Call Home</span>
                </h1>
                
                <!-- Description -->
                <p class="max-w-2xl mx-auto mb-8 text-lg text-gray-600 sm:text-xl">
                    We help you discover quality properties that match your lifestyle. 
                    From cozy apartments to luxury estates, your dream home is just a click away.
                </p>
                
                <!-- Value Proposition -->
                <div class="flex flex-wrap items-center justify-center gap-8 pt-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-700">Affordable Homes</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-700">Expert Guidance</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-700">Quality Properties</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rest of your content -->
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Your other content here -->
    </div>
@endsection