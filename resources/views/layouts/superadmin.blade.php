<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a2d9b6cda2.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white min-h-screen flex overflow-x-hidden overflow-y-auto">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-gray-300 flex flex-col fixed h-screen transition-transform duration-300 transform">
        <div class="flex items-center justify-center h-20 border-b border-gray-700">
            <h1 class="text-2xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-cyan-400">SuperAdmin</h1>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('super.admin.dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-home"></i><span>Dashboard</span>
            </a>
            <a href="{{ route('superadmin.users') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-users"></i><span>Users</span>
            </a>
            <a href="{{ route('superadmin.settings') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-cogs"></i><span>Settings</span>
            </a>
            <a href="{{ route('superadmin.reports') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-chart-pie"></i><span>Reports</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-shield-alt"></i><span>Security Logs</span>
            </a>
        </nav>

        <div class="border-t border-gray-700 p-4 text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="flex items-center justify-center space-x-2 w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col ml-64">

        <!-- Top Navbar -->
        <header class="bg-gray-800/70 backdrop-blur-xl border-b border-gray-700 flex items-center justify-between px-8 py-4 sticky top-0 z-10">
            <div class="flex items-center space-x-4 space-y-5">
                <button onclick="toggleSidebar()" class="md:hidden text-gray-400 hover:text-white focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-semibold text-gray-100">Super Admin Control Panel</h2>
            </div>

            <div class="flex items-center space-x-6">
                <!-- Notifications -->
                <div class="relative">
                    <i class="fas fa-bell text-gray-400 hover:text-white cursor-pointer"></i>
                    <span class="absolute top-0 right-0 bg-red-500 rounded-full w-2 h-2"></span>
                </div>

                <!-- Profile Dropdown -->
                <div class="relative group">
                    <div class="flex items-center space-x-2 cursor-pointer">
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('images/default-profile.png') }}" 
                        class="w-9 h-9 rounded-full border-2 border-green-400 object-cover" 
                        alt="Profile Image">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                    </div>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg border border-gray-700 hidden group-hover:block">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Profile Settings</a>
                        <a href="{{ route('superadmin.settings') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">System Settings</a>
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="w-full text-left px-4 py-2 text-red-400 hover:bg-gray-700">Logout</button>
                        </form>
                    </div>
                </div>
            </div>

        </header>

        <!-- Page Content -->
        <main class="p-8 flex-1 overflow-y-auto">
            @yield('content')
        </main>
        
        <!-- Footer -->
        @include('layouts.footer')
    </div>

    <script>
        // Sidebar toggle for mobile view
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</body>
</html>
