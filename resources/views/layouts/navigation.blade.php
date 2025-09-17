<nav x-data="{ open: false, scroll: false }" 
     :class="{'shadow-md bg-white': scroll}" 
     class="fixed w-full top-0 z-50 transition-all duration-300 border-b border-gray-100 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="h-10 w-auto text-gray-800"/>
                </a>
            </div>

            <!-- Primary Links -->
            <div class="hidden lg:flex lg:items-center lg:space-x-6">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-yellow-600 hover:text-green-500 transition">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('home')" class="text-yellow-600 hover:text-green-500 transition">
                    Home
                </x-nav-link>
                <x-nav-link :href="route('services')" class="text-yellow-600 hover:text-green-500 transition">
                    Services
                </x-nav-link>
                <x-nav-link :href="route('portfolio')" class="text-yellow-600 hover:text-green-500 transition">
                    Portfolio
                </x-nav-link>
                <x-nav-link :href="route('contact')" class="text-yellow-600 hover:text-green-500 transition">
                    Contact
                </x-nav-link>

                <!-- Dropdown Navigation -->
                <div x-data="{ openDropdown: false }" class="relative">
                    <button @mouseenter="openDropdown = true" @mouseleave="openDropdown = false"
                            class="inline-flex items-center text-yellow-600 hover:text-green-500 transition font-medium">
                        More
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div x-show="openDropdown" 
                         @mouseenter="openDropdown = true" @mouseleave="openDropdown = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1">
                            <a href="{{ route('team') }}" class="block px-4 py-2 text-yellow-600 hover:bg-green-500">Our Team</a>
                            <a href="{{ route('blog') }}" class="block px-4 py-2 text-yellow-600 hover:bg-green-500">Blog</a>
                            <a href="{{ route('careers') }}" class="block px-4 py-2 text-yellow-600 hover:bg-green-500">Careers</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile & Auth -->
            <div class="hidden lg:flex lg:items-center lg:space-x-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center space-x-2 rounded-md border border-transparent px-3 py-2 text-sm font-medium text-gray-500 bg-white hover:text-gray-700 transition">
                                @if(Auth::user()->profile_photo)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo" class="h-8 w-8 rounded-full object-cover"/>
                                @else
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.97 9.97 0 0112 15c2.21 0 4.236.72 5.879 1.926M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                @endif
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="px-3 py-2 text-yellow-600 hover:text-green-500 transition">Login</a>
                    <a href="{{ route('register') }}" class="px-3 py-2 text-yellow-600 hover:text-green-500 transition">Register</a>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="lg:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" @click.away="open = false" class="lg:hidden bg-white border-t border-gray-100 shadow-md">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')">Home</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('services')">Services</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('portfolio')">Portfolio</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')">Contact</x-responsive-nav-link>
            
            <!-- Mobile Dropdown Navigation -->
                <div x-data="{ openMore: false }" class="border-t border-gray-200">
                    <button @click="openMore = !openMore" class="w-full flex items-center justify-between px-4 py-2 text-yellow-600 hover:text-green-500">
                            More
                        <svg class="h-4 w-4 transform" :class="{'rotate-180': openMore}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div x-show="openMore" x-transition class="pl-6 space-y-1">
                        <x-responsive-nav-link :href="route('team')">Our Team</x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('blog')">Blog</x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('careers')">Careers</x-responsive-nav-link>
                    </div>
                </div>
        </div>
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4 flex items-center space-x-2">
                    @if(Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile" class="h-8 w-8 rounded-full object-cover"/>
                    @else
                        <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.97 9.97 0 0112 15c2.21 0 4.236.72 5.879 1.926M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    @endif
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>

    <!-- Sticky scroll effect -->
    <script>
        window.addEventListener('scroll', () => {
            document.querySelector('nav').__x.$data.scroll = window.scrollY > 20;
        });
    </script>
</nav>
