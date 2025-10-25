@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Our Services</h1>
        <p class="text-gray-600 mb-12">Explore our professional solutions designed to help your business thrive.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white/70 backdrop-blur-md rounded-xl p-8 shadow-lg text-center hover:shadow-2xl transition transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto flex items-center justify-center mb-4 text-white bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg">
                    <i class="fas {{ $service->icon }} text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-2 text-gray-800">{{ $service->title }}</h3>
                <p class="text-gray-600">{{ $service->description }}</p>
                <a href="{{ route('service.show', $service->id) }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Learn More
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection