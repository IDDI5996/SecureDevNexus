@extends('layouts.app')

@section('content')
<div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Title + Welcome -->
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Admin Dashboard</h1>
            <p class="text-gray-500 mt-2">Manage and monitor your platform with ease</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Services Card -->
            <div class="group relative bg-white/90 backdrop-blur-lg border border-gray-200 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 text-blue-600 rounded-xl">
                            <i class="fas fa-cogs text-xl"></i>
                        </div>
                        <span class="text-sm font-semibold text-blue-500 group-hover:text-blue-600 transition">Updated</span>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-1">Services</h2>
                    <p class="text-4xl font-extrabold text-gray-900">{{ $servicesCount }}</p>
                    <a href="{{ route('admin.services') }}" class="inline-flex mt-4 items-center text-blue-600 font-medium hover:text-blue-800 transition">
                        Manage Services 
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Portfolio Card -->
            <div class="group relative bg-white/90 backdrop-blur-lg border border-gray-200 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-green-100 text-green-600 rounded-xl">
                            <i class="fas fa-briefcase text-xl"></i>
                        </div>
                        <span class="text-sm font-semibold text-green-500 group-hover:text-green-600 transition">Live</span>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-1">Portfolio Items</h2>
                    <p class="text-4xl font-extrabold text-gray-900">{{ $portfolioCount }}</p>
                    <a href="{{ route('admin.portfolio') }}" class="inline-flex mt-4 items-center text-green-600 font-medium hover:text-green-800 transition">
                        Manage Portfolio
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Team Card -->
            <div class="group relative bg-white/90 backdrop-blur-lg border border-gray-200 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-100 text-purple-600 rounded-xl">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <span class="text-sm font-semibold text-purple-500 group-hover:text-purple-600 transition">Active</span>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-1">Team Members</h2>
                    <p class="text-4xl font-extrabold text-gray-900">{{ $teamCount }}</p>
                    <a href="{{ route('admin.team') }}" class="inline-flex mt-4 items-center text-purple-600 font-medium hover:text-purple-800 transition">
                        Manage Team
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Optional Section: Quick Actions -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition">
                <h3 class="text-lg font-bold mb-2">Add New Service</h3>
                <p class="text-sm mb-4 opacity-80">Quickly add new services to your platform.</p>
                <a href="{{ route('admin.services') }}" class="inline-flex items-center font-medium hover:underline">
                    Go now <i class="fas fa-plus ml-2"></i>
                </a>
            </div>
            <div class="bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition">
                <h3 class="text-lg font-bold mb-2">Upload Portfolio Item</h3>
                <p class="text-sm mb-4 opacity-80">Showcase your latest work easily.</p>
                <a href="{{ route('admin.portfolio') }}" class="inline-flex items-center font-medium hover:underline">
                    Go now <i class="fas fa-upload ml-2"></i>
                </a>
            </div>
            <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition">
                <h3 class="text-lg font-bold mb-2">Add Team Member</h3>
                <p class="text-sm mb-4 opacity-80">Grow your team instantly.</p>
                <a href="{{ route('admin.team') }}" class="inline-flex items-center font-medium hover:underline">
                    Go now <i class="fas fa-user-plus ml-2"></i>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
