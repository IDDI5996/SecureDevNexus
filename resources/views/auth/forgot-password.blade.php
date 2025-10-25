<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-indigo-900 to-blue-800 px-6 py-12">
        <div class="w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-2xl p-8 space-y-8 text-white">

            <!-- Logo / Title -->
            <div class="text-center">
                <div class="flex justify-center mb-4">
                    <i class="fas fa-unlock-alt text-5xl text-indigo-400"></i>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight text-white">Forgot Password?</h2>
                <p class="text-indigo-200 text-sm mt-2">
                    Enter your email address and we’ll send you a link to reset your password.
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

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

            <!-- Forgot Password Form -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-indigo-100 mb-1">Email Address</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-3 text-indigo-300"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="block w-full pl-10 pr-3 py-2 rounded-lg border border-white/20 bg-white/10 text-white placeholder-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition duration-200"
                               placeholder="you@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="w-full py-3 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-semibold text-white tracking-wide shadow-lg transition-all duration-300">
                        <i class="fas fa-paper-plane mr-2"></i> Send Password Reset Link
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="text-center mt-6 text-sm text-indigo-200">
                Remembered your password?
                <a href="{{ route('login') }}" class="font-semibold text-indigo-400 hover:text-indigo-200 underline">
                    Log in here
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
