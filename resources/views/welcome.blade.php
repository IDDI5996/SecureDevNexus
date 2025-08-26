<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TechSolutions | Cybersecurity & Development Experts</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS for scroll animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg,#2563eb,#1e40af); }
        .hero-overlay { background: rgba(0,0,0,0.4); }

        /* Card Hover + 3D tilt */
        .service-card, .portfolio-item, .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        .service-card:hover, .portfolio-item:hover, .card-hover:hover {
            cursor: pointer;
        }
        .service-icon {
            transition: transform 0.3s ease;
        }
        .service-card:hover .service-icon {
            transform: scale(1.15) rotate(5deg);
        }

        /* Portfolio hover */
        .portfolio-item:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
        }

        /* Hero typed text style */
        #typed-text {
            border-right: 2px solid rgba(255,255,255,0.7);
            padding-right: 5px;
        }

        /* Floating CTA button hover */
        .floating-cta:hover {
            transform: scale(1.05);
        }

        /* Tailwind classes for gradient animation */
        @keyframes gradient-x {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 15s ease infinite;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<div class="min-h-screen">
    @include('layouts.navigation')

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-indigo-600 to-purple-600 animate-gradient-x"></div>
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
                <span id="typed-text"></span>
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-10">
                We provide cutting-edge solutions in <span class="font-semibold">cybersecurity</span>, <span class="font-semibold">web development</span>, and <span class="font-semibold">research analysis</span>.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#services" class="px-8 py-3 bg-white text-blue-600 font-medium rounded-lg hover:bg-blue-50 transition">Our Services</a>
                <a href="#portfolio" class="px-8 py-3 border-2 border-white text-white font-medium rounded-lg hover:bg-white hover:text-blue-600 transition">View Portfolio</a>
            </div>
        </div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-angle-down text-white text-3xl"></i>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" data-aos="fade-up">Our Expertise</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                    We offer a wide range of professional services tailored to meet your technology needs
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $services = [
                        ['icon'=>'fa-shield-alt','title'=>'Cybersecurity','desc'=>'Comprehensive security solutions including penetration testing, vulnerability assessment, and security audits.'],
                        ['icon'=>'fa-code','title'=>'Web Development','desc'=>'Modern, responsive websites and web applications built with Laravel, Tailwind CSS, and other advanced technologies.'],
                        ['icon'=>'fa-server','title'=>'System Administration','desc'=>'Professional system management, maintenance, and optimization services for businesses of all sizes.'],
                        ['icon'=>'fa-search','title'=>'Digital Forensics','desc'=>'Comprehensive digital investigation services to uncover and analyze digital evidence for various purposes.'],
                        ['icon'=>'fa-chart-line','title'=>'Research Assistance','desc'=>'Specialized research analysis and support for health faculty and other academic programs.'],
                        ['icon'=>'fa-laptop-medical','title'=>'Health IT Solutions','desc'=>'Technology solutions tailored for healthcare professionals and medical research initiatives.'],
                    ];
                @endphp

                @foreach($services as $service)
                <div class="service-card bg-white rounded-xl p-8 shadow-lg text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="w-16 h-16 gradient-bg rounded-lg flex items-center justify-center mb-6 mx-auto">
                        <i class="fas {{ $service['icon'] }} text-white text-2xl service-icon"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $service['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" data-aos="fade-up">Our Expert Team</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Meet the professionals behind our success</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $team = [
                        ['name'=>'Iddi B. Hemedi','role'=>'BSc. Cybersecurity & Digital Forensics Engineering','bio'=>'Expert in system design, web development, cybersecurity, and digital forensics.','photo'=>'team1.jpg'],
                        ['name'=>'Joseph P. Ndamgoba','role'=>'BSc. Information Systems','bio'=>'Specialist in information systems, web development, and research analysis.','photo'=>'team2.jpg'],
                        ['name'=>'Colneli','role'=>'Technology Specialist','bio'=>'Experienced in system administration, computer maintenance, and technical support.','photo'=>'team3.jpg'],
                    ];
                @endphp

                @foreach($team as $member)
                <div class="bg-gray-50 rounded-xl shadow-lg overflow-hidden text-center p-6 card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <img src="{{ asset('images/'.$member['photo']) }}" alt="{{ $member['name'] }}" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $member['name'] }}</h3>
                    <p class="text-primary font-medium mb-2">{{ $member['role'] }}</p>
                    <p class="text-gray-600">{{ $member['bio'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" data-aos="fade-up">Our Portfolio</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                    Explore our projects across various domains
                </p>
            </div>

            <div class="flex justify-center mb-12 space-x-4" data-aos="fade-up" data-aos-delay="200">
                <button class="filter-btn bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition" data-filter="all">All</button>
                <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition" data-filter="web">Web</button>
                <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition" data-filter="cyber">Cybersecurity</button>
                <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition" data-filter="research">Research</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
                @php
                    $portfolio = [
                        ['title'=>'Healthcare Research Portal','desc'=>'A comprehensive research platform for health professionals with data analysis tools.','category'=>'research','icon'=>'fa-laptop-code'],
                        ['title'=>'Cybersecurity Audit System','desc'=>'A security assessment platform for enterprise vulnerability management.','category'=>'cyber','icon'=>'fa-shield-alt'],
                        ['title'=>'E-Commerce Solution','desc'=>'A full-featured online store with payment integration and inventory management.','category'=>'web','icon'=>'fa-globe'],
                        ['title'=>'Patient Management System','desc'=>'Web-based system for hospitals to manage patient records.','category'=>'web','icon'=>'fa-notes-medical'],
                        ['title'=>'Penetration Testing Dashboard','desc'=>'Real-time vulnerability tracking platform for enterprises.','category'=>'cyber','icon'=>'fa-user-shield'],
                        ['title'=>'Academic Research Tracker','desc'=>'Tool for managing and analyzing academic research data.','category'=>'research','icon'=>'fa-book'],
                    ];
                @endphp

                @foreach($portfolio as $item)
                <div class="portfolio-item bg-white rounded-xl shadow-lg p-6 text-center" data-category="{{ $item['category'] }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="h-48 gradient-bg flex items-center justify-center mb-4 rounded-lg">
                        <i class="fas {{ $item['icon'] }} text-5xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $item['title'] }}</h3>
                    <p class="text-gray-600">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg text-white text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-6" data-aos="fade-up">Ready to Start Your Project?</h2>
            <p class="text-xl mb-8" data-aos="fade-up" data-aos-delay="100">Contact us today to discuss how we can help with your cybersecurity, development, or research needs</p>
            <a href="#contact" class="inline-block px-8 py-3 bg-white text-primary font-medium rounded-lg hover:bg-blue-50 transition" data-aos="fade-up" data-aos-delay="200">Get in Touch</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TechSolutions</h3>
                    <p class="text-gray-400">Providing cutting-edge technology solutions with expertise in cybersecurity, web development, and research analysis.</p>
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
                    <ul class="space-y-2">
                        @foreach($services as $service)
                        <li><a href="#services" class="text-gray-400 hover:text-white transition">{{ $service['title'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center"><i class="fas fa-envelope text-gray-400 mr-2"></i> contact@techsolutions.com</li>
                        <li class="flex items-center"><i class="fas fa-phone text-gray-400 mr-2"></i> +255 123 456 789</li>
                        <li class="flex items-center"><i class="fas fa-map-marker-alt text-gray-400 mr-2"></i> Tanzania</li>
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

</div>

<!-- Floating CTA Buttons -->
<div class="fixed bottom-6 right-6 flex flex-col space-y-4 z-50">
    <a href="#contact" class="floating-cta bg-primary text-white px-5 py-3 rounded-full shadow-lg transform hover:scale-105 transition flex items-center space-x-2">
        <i class="fas fa-envelope"></i>
        <span>Contact Us</span>
    </a>
    <a href="#services" class="floating-cta bg-green-600 text-white px-5 py-3 rounded-full shadow-lg transform hover:scale-105 transition flex items-center space-x-2">
        <i class="fas fa-rocket"></i>
        <span>Get Quote</span>
    </a>
    <a href="#portfolio" class="floating-cta bg-yellow-500 text-white px-5 py-3 rounded-full shadow-lg transform hover:scale-105 transition flex items-center space-x-2">
        <i class="fas fa-lightbulb"></i>
        <span>Our Work</span>
    </a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({ duration: 800, once: true });

    // Portfolio filter
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.getAttribute('data-filter');
            filterButtons.forEach(b => b.classList.replace('bg-primary','bg-gray-200'));
            btn.classList.replace('bg-gray-200','bg-primary');
            portfolioItems.forEach(item => {
                if(filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.classList.remove('hidden'); item.classList.add('block');
                } else { item.classList.add('hidden'); item.classList.remove('block'); }
            });
        });
    });

    // Typed hero text
    const phrases = ["Cybersecurity Experts.","Web Development Professionals.","Digital Research Analysts."];
    let i=0,j=0,currentPhrase=[],isDeleting=false;
    const typedText=document.getElementById('typed-text');
    const speed=100;
    function type() {
        if(i>=phrases.length) i=0;
        let fullText=phrases[i];
        currentPhrase=isDeleting? fullText.substring(0,currentPhrase.length-1) : fullText.substring(0,currentPhrase.length+1);
        typedText.textContent=currentPhrase;
        if(!isDeleting && currentPhrase===fullText){ isDeleting=true; setTimeout(type,2000);
        } else if(isDeleting && currentPhrase===''){ isDeleting=false;i++; setTimeout(type,500);
        } else { setTimeout(type,speed); }
    }
    type();
});
</script>

</body>
</html>
