@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Our Services</h1>
        <p class="text-gray-600 mb-12">Explore our professional solutions designed to help your business thrive.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $services = [
                    ['title'=>'Cybersecurity','desc'=>'Comprehensive penetration testing, vulnerability assessment, and security audits.','icon'=>'fa-shield-alt'],
                    ['title'=>'Web Development','desc'=>'Responsive websites and web applications built with Laravel, Tailwind, and modern tech.','icon'=>'fa-code'],
                    ['title'=>'Digital Forensics','desc'=>'Investigating and analyzing digital evidence with accuracy and professionalism.','icon'=>'fa-search'],
                    ['title'=>'System Administration','desc'=>'Managing, maintaining, and optimizing IT systems for businesses.','icon'=>'fa-server'],
                    ['title'=>'Research Assistance','desc'=>'Specialized support for health faculty and academic programs.','icon'=>'fa-chart-line'],
                    ['title'=>'Health IT Solutions','desc'=>'Technology solutions tailored for healthcare professionals and research initiatives.','icon'=>'fa-laptop-medical'],
                ];
            @endphp

            @foreach($services as $service)
            <div class="bg-white/70 backdrop-blur-md rounded-xl p-8 shadow-lg text-center hover:shadow-2xl transition transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto flex items-center justify-center mb-4 text-white bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg">
                    <i class="fas {{ $service['icon'] }} text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-2 text-gray-800">{{ $service['title'] }}</h3>
                <p class="text-gray-600">{{ $service['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
