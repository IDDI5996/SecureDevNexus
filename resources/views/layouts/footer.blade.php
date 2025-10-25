<!-- resources/views/layouts/footer.blade.php -->
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">SecureDevNexus</h3>
                <p class="text-gray-400">
                    Providing cutting-edge technology solutions with expertise in cybersecurity,
                    web development, and research analysis.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition">Services</a></li>
                    <li><a href="#portfolio" class="text-gray-400 hover:text-white transition">Portfolio</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-white transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Services</h3>
                @php 
                $services = $services ?? []; 
                @endphp
                <ul class="space-y-2">
                    @foreach($services as $service)
                        <li>
                            <a href="#services" class="text-gray-400 hover:text-white transition">
                                {{ $service['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                <ul class="space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-gray-400 mr-2"></i> contact@techsolutions.com
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone text-gray-400 mr-2"></i> +255 123 456 789
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i> Tanzania
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400">© 2025 TechSolutions. All rights reserved.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </div>
</footer>
