@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Our Team</h1>
        <p class="text-gray-600 mb-12">Meet the experts behind SecureDevNexus.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $teamMembers = [
                    ['name'=>'Alice Johnson','role'=>'Lead Developer','img'=>'https://i.pravatar.cc/150?img=1'],
                    ['name'=>'Bob Smith','role'=>'Cybersecurity Analyst','img'=>'https://i.pravatar.cc/150?img=2'],
                    ['name'=>'Carol White','role'=>'Project Manager','img'=>'https://i.pravatar.cc/150?img=3'],
                ];
            @endphp

            @foreach($teamMembers as $member)
            <div class="bg-white/70 backdrop-blur-md rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition transform hover:-translate-y-2">
                <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="h-32 w-32 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-2xl font-bold text-gray-800">{{ $member['name'] }}</h3>
                <p class="text-gray-600">{{ $member['role'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
