@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Careers at SecureDevNexus</h1>
        <p class="text-gray-600 mb-12">
            Join our team of cybersecurity experts, developers, and researchers. Explore open positions and be part of our innovative projects.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $jobs = [
                    ['title'=>'Frontend Developer','location'=>'Tanzania','type'=>'Full-time'],
                    ['title'=>'Cybersecurity Analyst','location'=>'Remote','type'=>'Full-time'],
                    ['title'=>'Digital Forensics Specialist','location'=>'Tanzania','type'=>'Part-time'],
                ];
            @endphp

            @foreach($jobs as $job)
            <div class="bg-white/70 backdrop-blur-md rounded-xl shadow-lg p-6 text-left hover:shadow-2xl transition transform hover:-translate-y-2">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $job['title'] }}</h3>
                <p class="text-gray-600">{{ $job['location'] }} — {{ $job['type'] }}</p>
                <a href="#" class="text-blue-600 hover:underline mt-2 inline-block">Apply Now →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
