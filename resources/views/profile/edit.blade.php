@extends('layouts.app') {{-- Universal layout for all users --}}

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white py-12 px-6">
    <div class="max-w-6xl mx-auto">
        <br>
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-cyan-500">
                Profile Settings
            </h1>
            <p class="text-gray-400 mt-2 text-lg">
                Manage your account information, update your password, and control your security preferences.
            </p>
        </div>

        <!-- Profile Summary Card -->
        <div class="bg-white/10 backdrop-blur-xl border border-gray-700 rounded-2xl p-6 mb-10 shadow-2xl">
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-10">
                <!-- Profile Image -->
                <div class="relative group">
                    <img src="{{ Auth::user()->profile_photo_url ?? asset('images/default-profile.png') }}"
                         alt="Profile Image"
                         class="w-36 h-36 rounded-full border-4 border-green-400 object-cover shadow-lg group-hover:scale-105 transition duration-300">
                    <label for="profile-photo" class="absolute bottom-2 right-2 bg-green-500 hover:bg-green-600 p-2 rounded-full cursor-pointer shadow-lg">
                        <i class="fas fa-camera text-white"></i>
                    </label>
                </div>

                <!-- Profile Info -->
                <div>
                    <h2 class="text-3xl font-bold">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-400 mt-1">{{ Auth::user()->email }}</p>
                    @if(Auth::user()->role)
                        <p class="text-gray-400 mt-1 capitalize">Role: {{ Auth::user()->role }}</p>
                    @endif
                    <p class="mt-4 text-sm text-gray-500">Last updated: {{ Auth::user()->updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        <!-- Forms Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Update Information -->
            <div class="col-span-1 bg-white/10 border border-gray-700 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition duration-300">
                <h3 class="text-2xl font-semibold mb-4 text-green-400 flex items-center">
                    <i class="fas fa-user-edit mr-3"></i> Update Information
                </h3>
                <p class="text-gray-400 mb-4 text-sm">Edit your personal details and contact information.</p>
                <div class="space-y-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="col-span-1 bg-white/10 border border-gray-700 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition duration-300">
                <h3 class="text-2xl font-semibold mb-4 text-cyan-400 flex items-center">
                    <i class="fas fa-lock mr-3"></i> Change Password
                </h3>
                <p class="text-gray-400 mb-4 text-sm">Keep your account secure by regularly updating your password.</p>
                <div class="space-y-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="col-span-1 bg-white/10 border border-gray-700 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition duration-300">
                <h3 class="text-2xl font-semibold mb-4 text-red-400 flex items-center">
                    <i class="fas fa-user-slash mr-3"></i> Delete Account
                </h3>
                <p class="text-gray-400 mb-4 text-sm">Once deleted, your data will be permanently removed from our system.</p>
                <div class="space-y-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="mt-12 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Your Application Name — Profile Management</p>
        </div>
    </div>
</div>

<!-- Entry Animation -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll('.rounded-2xl').forEach(card => {
            card.classList.add('opacity-0', 'translate-y-8');
            setTimeout(() => {
                card.classList.remove('opacity-0', 'translate-y-8');
                card.classList.add('transition', 'duration-700');
            }, 150);
        });
    });
</script>
@endsection
