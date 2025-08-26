@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Our Portfolio</h1>
        <p class="text-gray-600 mb-12">A showcase of projects across Cybersecurity, Web, and Research domains.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $projects = [
                    ['title'=>'Healthcare Research Portal','desc'=>'A research platform for health professionals with analysis tools.','icon'=>'fa-laptop-medical'],
                    ['title'=>'Cybersecurity Audit System','desc'=>'Enterprise security assessment platform.','icon'=>'fa-shield-alt'],
                    ['title'=>'E-Commerce Solution','desc'=>'Full-featured online store with payment integration.','icon'=>'fa-globe'],
                    ['title'=>'Patient Management System','desc'=>'Web system for hospital patient records.','icon'=>'fa-notes-medical'],
                    ['title'=>'Penetration Testing Dashboard','desc'=>'Real-time vulnerability tracking platform.','icon'=>'fa-user-shield'],
                    ['title'=>'Academic Research Tracker','desc'=>'Tool for managing and analyzing academic research data.','icon'=>'fa-book'],
                ];
            @endphp

            @foreach($projects as $project)
            <div class="bg-white/70 backdrop-blur-md rounded-xl shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-2 text-center">
                <div class="h-40 w-40 mx-auto flex items-center justify-center mb-4 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-4xl">
                    <i class="fas {{ $project['icon'] }}"></i>
                </div>
                <h2 class="text-2xl font-bold mb-2 text-gray-800">{{ $project['title'] }}</h2>
                <p class="text-gray-600">{{ $project['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
