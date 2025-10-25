<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-indigo-900 to-blue-800 px-6 py-12">
        <div class="w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-2xl p-8 space-y-8 text-white">

            <!-- Logo / Title -->
            <div class="text-center">
                <div class="flex justify-center mb-4">
                    <i class="fas fa-user-shield text-5xl text-indigo-400"></i>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight text-white">Create Your Account</h2>
                <p class="text-indigo-200 text-sm mt-2">Sign up to start using your secure account</p>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-lg bg-red-100/20 border border-red-300 text-red-300">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-indigo-100 mb-1">Full Name</label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-3 text-indigo-300"></i>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                               class="block w-full pl-10 pr-3 py-2 rounded-lg border border-white/20 bg-white/10 text-white placeholder-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition duration-200"
                               placeholder="Iddi Hemedi" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-300" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-indigo-100 mb-1">Email Address</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-3 text-indigo-300"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                               class="block w-full pl-10 pr-3 py-2 rounded-lg border border-white/20 bg-white/10 text-white placeholder-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition duration-200"
                               placeholder="you@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-indigo-100 mb-1">Password</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-3 text-indigo-300"></i>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               class="block w-full pl-10 pr-3 py-2 rounded-lg border border-white/20 bg-white/10 text-white placeholder-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition duration-200"
                               placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-indigo-100 mb-1">Confirm Password</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-3 text-indigo-300"></i>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               class="block w-full pl-10 pr-3 py-2 rounded-lg border border-white/20 bg-white/10 text-white placeholder-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition duration-200"
                               placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-300" />
                </div>

                <!-- Register Button -->
                <div>
                    <button type="submit"
                            class="w-full py-3 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-semibold text-white tracking-wide shadow-lg transition-all duration-300">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="text-center mt-6 text-sm text-indigo-200">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-indigo-400 hover:text-indigo-200 underline">Log in here</a>
            </div>
        </div>
    </div>
</x-guest-layout>
