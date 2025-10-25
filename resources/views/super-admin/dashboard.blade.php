@extends('layouts.superadmin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white py-6 px-4 sm:px-6 lg:px-12">
    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-cyan-500 animate-pulse">
                Super Admin Dashboard
            </h1>
            <p class="text-gray-400 mt-2 text-sm sm:text-base">
                Welcome back, <span class="font-semibold text-white">{{ Auth::user()->name }}</span> 👑  
                — Master control of the entire system.
            </p>
        </div>

        <!-- Analytics Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 mb-8">
            <div class="p-4 sm:p-6 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-2xl shadow-xl hover:scale-105 transition-transform">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xs sm:text-sm uppercase tracking-wide text-blue-100">Total Users</h2>
                        <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mt-1 sm:mt-2">{{ $userCount ?? '1,248' }}</p>
                    </div>
                    <i class="fas fa-users text-xl sm:text-2xl md:text-3xl text-blue-100 opacity-80"></i>
                </div>
            </div>

            <div class="p-4 sm:p-6 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-xl hover:scale-105 transition-transform">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xs sm:text-sm uppercase tracking-wide text-green-100">Admins</h2>
                        <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mt-1 sm:mt-2">{{ $adminCount ?? '87' }}</p>
                    </div>
                    <i class="fas fa-user-shield text-xl sm:text-2xl md:text-3xl text-green-100 opacity-80"></i>
                </div>
            </div>

            <div class="p-4 sm:p-6 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl shadow-xl hover:scale-105 transition-transform">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xs sm:text-sm uppercase tracking-wide text-yellow-100">Active Sessions</h2>
                        <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mt-1 sm:mt-2">{{ $activeSessions ?? '342' }}</p>
                    </div>
                    <i class="fas fa-signal text-xl sm:text-2xl md:text-3xl text-yellow-100 opacity-80"></i>
                </div>
            </div>

            <div class="p-4 sm:p-6 bg-gradient-to-br from-pink-500 to-fuchsia-600 rounded-2xl shadow-xl hover:scale-105 transition-transform">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xs sm:text-sm uppercase tracking-wide text-pink-100">System Logs</h2>
                        <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mt-1 sm:mt-2">{{ $logsCount ?? '5,643' }}</p>
                    </div>
                    <i class="fas fa-database text-xl sm:text-2xl md:text-3xl text-pink-100 opacity-80"></i>
                </div>
            </div>
        </div>

        <!-- System Performance + Activity Logs -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Chart Placeholder -->
            <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-4 sm:p-6 shadow-xl border border-gray-700">
                <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4 text-green-400 flex items-center">
                    <i class="fas fa-chart-line mr-2"></i> System Performance
                </h3>
                <canvas id="performanceChart" class="w-full h-48 sm:h-60"></canvas>
            </div>

            <!-- Recent Activities -->
            <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-4 sm:p-6 shadow-xl border border-gray-700">
                <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4 text-cyan-400 flex items-center">
                    <i class="fas fa-history mr-2"></i> Recent Activities
                </h3>
                <ul class="divide-y divide-gray-700 text-gray-300">
                    <li class="py-2 sm:py-3 flex justify-between items-center text-sm sm:text-base">
                        <span>New Admin Added</span><span class="text-green-400">2 mins ago</span>
                    </li>
                    <li class="py-2 sm:py-3 flex justify-between items-center text-sm sm:text-base">
                        <span>Backup Completed</span><span class="text-green-400">15 mins ago</span>
                    </li>
                    <li class="py-2 sm:py-3 flex justify-between items-center text-sm sm:text-base">
                        <span>User Deactivated</span><span class="text-red-400">30 mins ago</span>
                    </li>
                    <li class="py-2 sm:py-3 flex justify-between items-center text-sm sm:text-base">
                        <span>Database Optimized</span><span class="text-yellow-400">1 hr ago</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Management Shortcuts -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
            <div class="p-4 sm:p-6 bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-xl hover:scale-105 transition">
                <h4 class="text-lg sm:text-xl font-semibold mb-1 sm:mb-2">User Management</h4>
                <p class="text-gray-200 text-sm sm:text-base mb-2 sm:mb-4">Add, suspend, or assign roles to users.</p>
                <a href="{{ route('superadmin.users') }}" class="text-white font-medium hover:underline text-sm sm:text-base">
                    Go to Users <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="p-4 sm:p-6 bg-gradient-to-r from-green-600 to-emerald-700 rounded-2xl shadow-xl hover:scale-105 transition">
                <h4 class="text-lg sm:text-xl font-semibold mb-1 sm:mb-2">System Settings</h4>
                <p class="text-gray-200 text-sm sm:text-base mb-2 sm:mb-4">Configure global system parameters and APIs.</p>
                <a href="{{ route('superadmin.settings') }}" class="text-white font-medium hover:underline text-sm sm:text-base">
                    Manage Settings <i class="fas fa-cog ml-1"></i>
                </a>
            </div>

            <div class="p-4 sm:p-6 bg-gradient-to-r from-pink-600 to-rose-700 rounded-2xl shadow-xl hover:scale-105 transition">
                <h4 class="text-lg sm:text-xl font-semibold mb-1 sm:mb-2">Reports & Logs</h4>
                <p class="text-gray-200 text-sm sm:text-base mb-2 sm:mb-4">Access system reports and download audit logs.</p>
                <a href="{{ route('superadmin.reports') }}" class="text-white font-medium hover:underline text-sm sm:text-base">
                    View Reports <i class="fas fa-file-alt ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-gray-500 text-xs sm:text-sm">
            <p>&copy; {{ date('Y') }} Super Admin Control Center — Built for Excellence ⚡</p>
        </div>

    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('performanceChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            datasets: [{
                label: 'Server Load',
                data: [20, 35, 25, 45, 40, 55, 30],
                borderColor: '#4ade80',
                backgroundColor: 'rgba(74,222,128,0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            plugins: { legend: { labels: { color: '#ddd' } } },
            scales: {
                x: { ticks: { color: '#aaa' } },
                y: { ticks: { color: '#aaa' } }
            }
        }
    });
</script>
@endsection
