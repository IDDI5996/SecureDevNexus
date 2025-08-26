@extends('layouts.app')

@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-6 max-w-6xl"><br>
        <h1 class="text-4xl font-bold text-gray-800 text-center mb-10">Contact Us</h1>

        <!-- Contact Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="space-y-4">
                <p class="text-gray-800"><strong>Phone:</strong> +255 764 666 275, +255 678 796 119</p>
                <p class="text-gray-800"><strong>Email:</strong> info@techsolution.or.tz</p>
                <p class="text-gray-800">
                    <strong>Address:</strong> Tanzania
                </p>
                <a href="https://wa.me/255" target="_blank"
                   class="inline-block bg-green-600 hover:bg-gray-800 text-white px-4 py-2 rounded shadow">
                    Chat on WhatsApp
                </a>

                <!-- Social Media Links -->
                <div class="mt-6 flex space-x-4">
                    <a href="https://t.me/YourTelegram" target="_blank" class="text-green-700 hover:text-green-900">
                        <i class="fab fa-telegram fa-2x"></i>
                    </a>
                    <a href="https://youtube.com/" target="_blank" class="text-red-600 hover:text-red-800">
                        <i class="fab fa-youtube fa-2x"></i>
                    </a>
                    <a href="https://twitter.com/YourXProfile" target="_blank" class="text-blue-500 hover:text-blue-700">
                        <i class="fab fa-x-twitter fa-2x"></i>
                    </a>
                    <a href="https://whatsapp.com/" target="_blank" class="text-green-500 hover:text-green-700">
                        <i class="fab fa-whatsapp fa-2x"></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="text-pink-500 hover:text-pink-700">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a href="https://facebook.com/YourFacebook" target="_blank" class="text-blue-700 hover:text-blue-900">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="https://tiktok.com/@YourTikTok" target="_blank" class="text-black hover:text-gray-700">
                        <i class="fab fa-tiktok fa-2x"></i>
                    </a>
                </div>
            </div>

            <!-- Google Map -->
            <div>
                <iframe class="w-full h-64 rounded shadow" 
                        src="https://www.google.com/maps/embed?pb=" 
                        width="600" height="450" style="border:0;" allowfullscreen="" 
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-green-50 p-8 rounded shadow">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Send Us a Message</h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full mt-1 border-gray-300 rounded-lg shadow-sm">
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full mt-1 border-gray-300 rounded-lg shadow-sm">
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Subject</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" required
                           class="w-full mt-1 border-gray-300 rounded-lg shadow-sm">
                    @error('subject') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Message</label>
                    <textarea name="message" rows="5" required
                              class="w-full mt-1 border-gray-300 rounded-lg shadow-sm">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <button type="submit" 
                        class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 shadow w-full">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
