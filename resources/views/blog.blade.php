@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Our Blog</h1>
        <p class="text-gray-600 mb-12">Latest news, updates, and insights from SecureDevNexus.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $posts = [
                    ['title'=>'Cybersecurity Trends 2025','excerpt'=>'Discover the top cybersecurity trends to watch this year.','img'=>''],
                    ['title'=>'Building Modern Web Apps','excerpt'=>'A guide to using Laravel and Tailwind for modern web development.','img'=>''],
                    ['title'=>'Digital Forensics Explained','excerpt'=>'Learn the essentials of digital forensics in enterprise environments.','img'=>''],
                ];
            @endphp

            @foreach($posts as $post)
            <div class="bg-white/70 backdrop-blur-md rounded-xl shadow-lg p-6 text-left hover:shadow-2xl transition transform hover:-translate-y-2">
                <img src="{{ $post['img'] }}" alt="{{ $post['title'] }}" class="h-48 w-full rounded-lg object-cover mb-4">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $post['title'] }}</h3>
                <p class="text-gray-600">{{ $post['excerpt'] }}</p>
                <a href="#" class="text-blue-600 hover:underline mt-2 inline-block">Read More →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
