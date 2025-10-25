<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-indigo-900 to-blue-800 px-6 py-12">
        <div class="w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-2xl p-8 space-y-8 text-white">

            <!-- Logo / Title -->
            <div class="text-center">
                <div class="flex justify-center mb-4">
                    <i class="fas fa-envelope-open-text text-5xl text-indigo-400"></i>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight text-white">Verify Your Email</h2>
                <p class="text-indigo-200 text-sm mt-2">
                    Thanks for signing up! Before getting started, please verify your email by clicking the link we just sent.
                    If you didn’t receive it, we can send another.
                </p>
            </div>

            <!-- Status Message -->
            @if (session('status') == 'verification-link-sent')
                <div class="p-4 rounded-lg bg-green-100/20 border border-green-300 text-green-300 text-sm font-medium">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <!-- Resend & Logout Actions -->
            <div class="mt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                <!-- Resend Verification -->
                <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                    @csrf
                    <button type="submit"
                            class="w-full sm:w-auto py-3 px-6 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-semibold text-white tracking-wide shadow-lg transition-all duration-300">
                        <i class="fas fa-redo-alt mr-2"></i> Resend Verification Email
                    </button>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                    @csrf
                    <button type="submit"
                            class="w-full sm:w-auto py-3 px-6 rounded-lg border border-white/20 hover:border-white/40 font-semibold text-white tracking-wide transition-all duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center text-sm text-indigo-200 mt-4">
                Didn’t receive the email? Click "Resend Verification Email" above.
            </div>
        </div>
    </div>
</x-guest-layout>
