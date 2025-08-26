@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold text-gray-800 mb-6">Welcome to SecureDevNexus</h1>
        <p class="text-xl text-gray-600 mb-10">
            Your go-to platform for <span class="font-semibold">Cybersecurity</span>, <span class="font-semibold">Web Development</span>, and <span class="font-semibold">Digital Research</span>.
        </p>
        <a href="{{ route('services') }}" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-lg hover:opacity-90 transition">
            Explore Services
        </a>
    </div>
</section>
@endsection
