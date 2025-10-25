<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-indigo-900 to-blue-800 px-6 py-12">
        <div class="w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-2xl p-8 space-y-8 text-white">
            
            <!-- Logo / Title -->
            <div class="text-center">
                <div class="flex justify-center mb-4">
                    <i class="fas fa-shield-alt text-5xl text-indigo-400"></i>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight text-white">Welcome Back</h2>
                <p class="text-indigo-200 text-sm mt-2">Log in to your secure account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-indigo-100 mb-1">Email Address</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-3 text-indigo-300"></i>
                        <input id="email" type="email" name="email"
                               value="{{ old('email') }}" required autofocus autocomplete="username"
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
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                               class="block w-full pl-10 pr-3 py-2 rounded-lg border border-white/20 bg-white/10 text-white placeholder-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition duration-200"
                               placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center space-x-2 text-sm text-indigo-200">
                        <input id="remember_me" type="checkbox" name="remember"
                               class="rounded border-gray-400 text-indigo-500 focus:ring-indigo-400" />
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-300 hover:text-indigo-100 transition">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="w-full py-3 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-semibold text-white tracking-wide shadow-lg transition-all duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i> Log In
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="text-center mt-6 text-sm text-indigo-200">
                Don’t have an account?
                <a href="{{ route('register') }}" class="font-semibold text-indigo-400 hover:text-indigo-200 underline">
                    Register here
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
