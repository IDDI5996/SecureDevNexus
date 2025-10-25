@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Our Team</h1>
        <p class="text-gray-600 mb-12">Meet the experts behind SecureDevNexus.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($team as $member)
            <div class="bg-white/70 backdrop-blur-md rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition transform hover:-translate-y-2">
                @if($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="h-32 w-32 rounded-full mx-auto mb-4 object-cover">
                @else
                    <div class="h-32 w-32 rounded-full mx-auto mb-4 bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white text-4xl font-bold">
                        {{ substr($member->name, 0, 1) }}
                    </div>
                @endif
                <h3 class="text-2xl font-bold text-gray-800">{{ $member->name }}</h3>
                <p class="text-blue-600 font-medium mb-2">{{ $member->role }}</p>
                <p class="text-gray-600">{{ $member->bio }}</p>
                <div class="flex justify-center mt-4 space-x-3">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection