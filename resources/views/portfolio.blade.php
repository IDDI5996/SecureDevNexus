@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Our Portfolio</h1>
        <p class="text-gray-600 mb-12">A showcase of projects across Cybersecurity, Web, and Research domains.</p>

        <!-- Portfolio Filter Buttons -->
        <div class="flex justify-center mb-12 space-x-4">
            <button class="filter-btn bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition" data-filter="all">All</button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition" data-filter="web">Web</button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition" data-filter="cyber">Cybersecurity</button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition" data-filter="research">Research</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            @foreach($portfolio as $project)
            <div class="portfolio-item bg-white/70 backdrop-blur-md rounded-xl shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-2 text-center" data-category="{{ $project->category }}">
                <div class="h-40 w-40 mx-auto flex items-center justify-center mb-4 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-4xl">
                    <i class="fas {{ $project->icon }}"></i>
                </div>
                <h2 class="text-2xl font-bold mb-2 text-gray-800">{{ $project->title }}</h2>
                <p class="text-gray-600 mb-4">{{ $project->description }}</p>
                <div class="mt-4">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                        {{ ucfirst($project->category) }}
                    </span>
                </div>
                <a href="{{ route('portfolio.show', $project->id) }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    View Details
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Add JavaScript for filtering -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(b => {
                if (b === btn) {
                    b.classList.remove('bg-gray-200', 'text-gray-700');
                    b.classList.add('bg-blue-600', 'text-white');
                } else {
                    b.classList.remove('bg-blue-600', 'text-white');
                    b.classList.add('bg-gray-200', 'text-gray-700');
                }
            });
            
            // Filter items
            portfolioItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
});
</script>

<style>
.filter-btn {
    transition: all 0.3s ease;
}
.portfolio-item {
    transition: all 0.3s ease;
}
</style>
@endsection