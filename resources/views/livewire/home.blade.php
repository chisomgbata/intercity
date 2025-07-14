<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftLogistics - Your Trusted Partner</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- SwiperJS for Sliders -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Animate.css for Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Custom styles */
        body {
            font-family: 'Inter', sans-serif;
        }

        .swiper-button-next, .swiper-button-prev {
            color: #a21caf; /* fuchsia-700 */
        }

        .swiper-pagination-bullet-active {
            background-color: #a21caf; /* fuchsia-700 */
        }

        [x-cloak] {
            display: none !important;
        }

        .animate-on-scroll {
            opacity: 0;
            transition: opacity 1s, transform 1s;
        }

        .animate-on-scroll.animated {
            opacity: 1;
        }

        .stagger-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s, transform 0.5s;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Header & Navigation -->
<header x-data="{ mobileMenuOpen: false }"
        class="bg-white/80 backdrop-blur-lg fixed top-0 left-0 right-0 z-50 shadow-md">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="flex items-center space-x-2">
            <img src="https://placehold.co/40x40/a21caf/ffffff?text=SL" alt="SwiftLogistics Logo" class="rounded-full">
            <span class="text-2xl font-bold text-gray-800">Swift<span class="text-fuchsia-600">Logistics</span></span>
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="#home" class="text-gray-600 hover:text-fuchsia-600 transition duration-300">Home</a>
            <a href="#about" class="text-gray-600 hover:text-fuchsia-600 transition duration-300">About Us</a>
            <a href="#services" class="text-gray-600 hover:text-fuchsia-600 transition duration-300">Services</a>
            <a href="#contact" class="text-gray-600 hover:text-fuchsia-600 transition duration-300">Contact</a>
        </div>

        <!-- CTA Button -->
        <a href="#track"
           class="hidden md:inline-block bg-fuchsia-600 text-white px-6 py-2 rounded-full hover:bg-fuchsia-700 transition duration-300 shadow-lg">Track
            Order</a>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-800 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="md:hidden bg-white shadow-xl">
        <a href="#home" @click="mobileMenuOpen = false"
           class="block px-6 py-3 text-gray-600 hover:bg-fuchsia-50 hover:text-fuchsia-600">Home</a>
        <a href="#about" @click="mobileMenuOpen = false"
           class="block px-6 py-3 text-gray-600 hover:bg-fuchsia-50 hover:text-fuchsia-600">About Us</a>
        <a href="#services" @click="mobileMenuOpen = false"
           class="block px-6 py-3 text-gray-600 hover:bg-fuchsia-50 hover:text-fuchsia-600">Services</a>
        <a href="#contact" @click="mobileMenuOpen = false"
           class="block px-6 py-3 text-gray-600 hover:bg-fuchsia-50 hover:text-fuchsia-600">Contact</a>
        <a href="#track" @click="mobileMenuOpen = false"
           class="block px-6 py-4 bg-fuchsia-600 text-white text-center rounded-b-lg hover:bg-fuchsia-700">Track
            Order</a>
    </div>
</header>

<main>
    <!-- Hero Section -->
    <section id="home" class="relative h-screen min-h-[600px] w-full" x-data="heroSlider">
        <div class="swiper-container h-full">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide relative">
                    <img src="https://placehold.co/1920x1080/1f2937/ffffff?text=Global+Logistics" alt="Global Logistics"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-center text-white p-4" x-data="{ inView: false }"
                             x-intersect.once="inView = true">
                            <h1 x-show="inView"
                                class="text-4xl md:text-6xl font-extrabold mb-4 animate__animated animate__fadeInDown">
                                Reliable & Efficient Cargo Solutions</h1>
                            <p x-show="inView"
                               class="text-lg md:text-xl max-w-3xl mx-auto mb-8 animate__animated animate__fadeInUp animate__delay-1s">
                                Connecting your business to the world with seamless logistics and transportation
                                services.</p>
                            <a href="#about" x-show="inView"
                               class="bg-fuchsia-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-fuchsia-700 transition duration-300 animate__animated animate__zoomIn animate__delay-2s">Discover
                                More</a>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide relative">
                    <img src="https://placehold.co/1920x1080/374151/ffffff?text=Warehouse+Management"
                         alt="Warehouse Management" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-center text-white p-4">
                            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 animate__animated animate__fadeInDown">
                                Secure & Smart Warehousing</h1>
                            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-8 animate__animated animate__fadeInUp animate__delay-1s">
                                State-of-the-art facilities to store, manage, and dispatch your goods with precision and
                                care.</p>
                            <a href="#about"
                               class="bg-fuchsia-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-fuchsia-700 transition duration-300 animate__animated animate__zoomIn animate__delay-2s">Explore
                                Our Facilities</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <!-- Track Your Order Section -->
    <section id="track" class="py-20 bg-white" x-data>
        <div class="container mx-auto px-6 text-center animate-on-scroll"
             x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Track Your Shipment</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-8">Enter your tracking ID below to get real-time updates on
                your package's location.</p>
            <div class="max-w-2xl mx-auto flex flex-col sm:flex-row gap-4 bg-white p-4 rounded-full shadow-lg border">
                <div class="relative flex-grow">
                    <i class="fas fa-truck-fast absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Enter Tracking ID (e.g., SL123456789)"
                           class="w-full pl-12 pr-4 py-3 rounded-full border-gray-200 focus:border-fuchsia-500 focus:ring focus:ring-fuchsia-200 focus:ring-opacity-50 transition duration-300">
                </div>
                <button
                    class="bg-fuchsia-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-fuchsia-700 transition duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-search"></i>
                    Track Order
                </button>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="animate-on-scroll" x-data
                     x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInLeft')">
                    <img src="https://placehold.co/600x400/a21caf/ffffff?text=Our+Team" alt="Our Team"
                         class="rounded-lg shadow-2xl w-full">
                </div>
                <div class="animate-on-scroll" x-data
                     x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInRight')">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">About <span class="text-fuchsia-600">SwiftLogistics</span>
                    </h2>
                    <p class="text-gray-600 mb-6">We are a leading logistics and supply chain partner, dedicated to
                        providing innovative and reliable solutions. With years of experience, we have built a network
                        that ensures your cargo reaches its destination safely and on time, every time.</p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-fuchsia-600 mt-1"></i>
                            <span><strong>Global Network:</strong> Extensive reach across continents for seamless international shipping.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-fuchsia-600 mt-1"></i>
                            <span><strong>Advanced Technology:</strong> Utilizing cutting-edge tech for tracking, management, and security.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-fuchsia-600 mt-1"></i>
                            <span><strong>Customer-Centric:</strong> Our clients are at the heart of everything we do. We provide tailored solutions.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 animate-on-scroll" x-data
                 x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                <h2 class="text-3xl font-bold text-gray-800">Our Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">We offer a comprehensive range of logistics services to
                    meet your business needs.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" x-data="staggerAnimation()">
                <template x-for="(item, index) in items" :key="index">
                    <div
                        class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 stagger-item"
                        x-intersect.once="animateItem(index)">
                        <div class="text-4xl text-fuchsia-600 mb-4"><i :class="item.icon"></i></div>
                        <h3 class="text-xl font-bold mb-2" x-text="item.title"></h3>
                        <p class="text-gray-600" x-text="item.description"></p>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact-cta" class="py-20 bg-fuchsia-700 text-white">
        <div class="container mx-auto px-6 text-center animate-on-scroll" x-data
             x-intersect.once="$el.classList.add('animate__animated', 'animate__pulse')">
            <h2 class="text-3xl font-bold mb-4">Ready to Streamline Your Logistics?</h2>
            <p class="max-w-2xl mx-auto mb-8">Let's discuss how SwiftLogistics can help your business grow. Our experts
                are here to provide a tailored solution for you.</p>
            <a href="#contact"
               class="bg-white text-fuchsia-700 px-10 py-3 rounded-full text-lg font-semibold hover:bg-gray-100 transition duration-300">Contact
                Us</a>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 animate-on-scroll" x-data
                 x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                <h2 class="text-3xl font-bold text-gray-800">How It Works</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">A simple, three-step process to get your shipment
                    moving.</p>
            </div>
            <div class="relative">
                <!-- Dashed line for desktop -->
                <div
                    class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 border-t-2 border-dashed border-fuchsia-300 -translate-y-1/2"></div>
                <div class="grid md:grid-cols-3 gap-12 relative" x-data="staggerAnimation({ items: 3 })">
                    <!-- Step 1 -->
                    <div class="text-center stagger-item" x-intersect.once="animateItem(0)">
                        <div
                            class="bg-fuchsia-100 text-fuchsia-600 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl font-bold border-4 border-white shadow-lg">
                            01
                        </div>
                        <h3 class="text-xl font-bold mb-2">Request a Quote</h3>
                        <p class="text-gray-600">Fill out our contact form or give us a call to get a free,
                            no-obligation quote for your shipment.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="text-center stagger-item" x-intersect.once="animateItem(1)">
                        <div
                            class="bg-fuchsia-100 text-fuchsia-600 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl font-bold border-4 border-white shadow-lg">
                            02
                        </div>
                        <h3 class="text-xl font-bold mb-2">We Prepare Your Shipment</h3>
                        <p class="text-gray-600">Our team handles the packaging, labeling, and documentation to ensure a
                            smooth transit.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="text-center stagger-item" x-intersect.once="animateItem(2)">
                        <div
                            class="bg-fuchsia-100 text-fuchsia-600 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl font-bold border-4 border-white shadow-lg">
                            03
                        </div>
                        <h3 class="text-xl font-bold mb-2">Track & Receive</h3>
                        <p class="text-gray-600">Monitor your shipment in real-time and receive it at its destination,
                            right on schedule.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center" x-data="statsCounter()">
                <!-- Stat 1 -->
                <div class="p-4 animate-on-scroll"
                     x-intersect.once="$el.classList.add('animate__animated', 'animate__bounceIn')">
                    <div class="text-fuchsia-600 text-5xl mb-2"><i class="fas fa-box-open"></i></div>
                    <div class="text-4xl font-extrabold text-gray-800" x-text="Math.floor(stats.packages)">1000</div>
                    <p class="text-gray-500">Packages Delivered</p>
                </div>
                <!-- Stat 2 -->
                <div class="p-4 animate-on-scroll"
                     x-intersect.once="$el.classList.add('animate__animated', 'animate__bounceIn', 'animate__delay-1s')">
                    <div class="text-fuchsia-600 text-5xl mb-2"><i class="fas fa-globe-americas"></i></div>
                    <div class="text-4xl font-extrabold text-gray-800" x-text="Math.floor(stats.countries)">100</div>
                    <p class="text-gray-500">Countries Covered</p>
                </div>
                <!-- Stat 3 -->
                <div class="p-4 animate-on-scroll"
                     x-intersect.once="$el.classList.add('animate__animated', 'animate__bounceIn', 'animate__delay-2s')">
                    <div class="text-fuchsia-600 text-5xl mb-2"><i class="fas fa-smile"></i></div>
                    <div class="text-4xl font-extrabold text-gray-800" x-text="Math.floor(stats.clients)">500</div>
                    <p class="text-gray-500">Happy Clients</p>
                </div>
                <!-- Stat 4 -->
                <div class="p-4 animate-on-scroll"
                     x-intersect.once="$el.classList.add('animate__animated', 'animate__bounceIn', 'animate__delay-3s')">
                    <div class="text-fuchsia-600 text-5xl mb-2"><i class="fas fa-truck"></i></div>
                    <div class="text-4xl font-extrabold text-gray-800" x-text="Math.floor(stats.tons)">250</div>
                    <p class="text-gray-500">Tons of Goods</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Feedback Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 animate-on-scroll" x-data
                 x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                <h2 class="text-3xl font-bold text-gray-800">What Our Clients Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Real feedback from businesses we've helped.</p>
            </div>
            <div class="swiper-container-testimonials" x-data="testimonialsSlider">
                <div class="swiper-wrapper">
                    <!-- Testimonial 1 -->
                    <div class="swiper-slide p-2">
                        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                            <img src="https://placehold.co/80x80/e9d5ff/8b5cf6?text=JD" alt="Client"
                                 class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-fuchsia-200">
                            <p class="text-gray-600 italic mb-4">"SwiftLogistics transformed our supply chain. Their
                                professionalism and real-time tracking are second to none. Highly recommended!"</p>
                            <h4 class="font-bold text-gray-800">Jane Doe</h4>
                            <p class="text-sm text-gray-500">CEO, Tech Innovators</p>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="swiper-slide p-2">
                        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                            <img src="https://placehold.co/80x80/e9d5ff/8b5cf6?text=JS" alt="Client"
                                 class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-fuchsia-200">
                            <h4 class="font-bold text-gray-800">John Smith</h4>
                            <p class="text-sm text-gray-500">Operations Manager, Retail Co.</p>
                            <p class="text-gray-600 italic mt-4">"The team at SwiftLogistics is always responsive and
                                helpful. They handle our international freight with incredible efficiency."</p>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="swiper-slide p-2">
                        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                            <img src="https://placehold.co/80x80/e9d5ff/8b5cf6?text=EM" alt="Client"
                                 class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-fuchsia-200">
                            <h4 class="font-bold text-gray-800">Emily White</h4>
                            <p class="text-sm text-gray-500">Founder, Artisan Goods</p>
                            <p class="text-gray-600 italic mt-4">"As a small business, we needed a logistics partner we
                                could trust. SwiftLogistics has been that and more. Flawless service."</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination-testimonials mt-8"></div>
            </div>
        </div>
    </section>

    <!-- Companies Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center"
                 x-data="staggerAnimation({ items: 6 })">
                <div class="flex justify-center stagger-item" x-intersect.once="animateItem(0)">
                    <img src="https://placehold.co/150x60/cbd5e1/475569?text=CompanyA" alt="Company Logo"
                         class="h-10 opacity-60 hover:opacity-100 transition-opacity">
                </div>
                <div class="flex justify-center stagger-item" x-intersect.once="animateItem(1)">
                    <img src="https://placehold.co/150x60/cbd5e1/475569?text=CompanyB" alt="Company Logo"
                         class="h-10 opacity-60 hover:opacity-100 transition-opacity">
                </div>
                <div class="flex justify-center stagger-item" x-intersect.once="animateItem(2)">
                    <img src="https://placehold.co/150x60/cbd5e1/475569?text=CompanyC" alt="Company Logo"
                         class="h-10 opacity-60 hover:opacity-100 transition-opacity">
                </div>
                <div class="flex justify-center stagger-item" x-intersect.once="animateItem(3)">
                    <img src="https://placehold.co/150x60/cbd5e1/475569?text=CompanyD" alt="Company Logo"
                         class="h-10 opacity-60 hover:opacity-100 transition-opacity">
                </div>
                <div class="flex justify-center stagger-item" x-intersect.once="animateItem(4)">
                    <img src="https://placehold.co/150x60/cbd5e1/475569?text=CompanyE" alt="Company Logo"
                         class="h-10 opacity-60 hover:opacity-100 transition-opacity">
                </div>
                <div class="flex justify-center stagger-item" x-intersect.once="animateItem(5)">
                    <img src="https://placehold.co/150x60/cbd5e1/475569?text=CompanyF" alt="Company Logo"
                         class="h-10 opacity-60 hover:opacity-100 transition-opacity">
                </div>
            </div>
        </div>
    </section>

</main>

<!-- Footer -->
<footer id="contact" class="bg-gray-800 text-white">
    <div class="container mx-auto px-6 py-12">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About -->
            <div class="mb-6 md:mb-0">
                <a href="#" class="flex items-center space-x-2 mb-4">
                    <img src="https://placehold.co/40x40/a21caf/ffffff?text=SL" alt="SwiftLogistics Logo"
                         class="rounded-full">
                    <span class="text-2xl font-bold">Swift<span class="text-fuchsia-500">Logistics</span></span>
                </a>
                <p class="text-gray-400">Your trusted partner for global logistics, warehousing, and supply chain
                    management.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-bold text-lg mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#about" class="text-gray-400 hover:text-white">About Us</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white">Services</a></li>
                    <li><a href="#track" class="text-gray-400 hover:text-white">Track Order</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="font-bold text-lg mb-4">Contact Us</h4>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-start gap-3"><i class="fas fa-map-marker-alt mt-1 text-fuchsia-500"></i><span>123 Logistics Lane, Anytown, USA 12345</span>
                    </li>
                    <li class="flex items-center gap-3"><i class="fas fa-phone-alt text-fuchsia-500"></i><a
                            href="tel:+1234567890" class="hover:text-white">+1 (234) 567-890</a></li>
                    <li class="flex items-center gap-3"><i class="fas fa-envelope text-fuchsia-500"></i><a
                            href="mailto:contact@swiftlogistics.com"
                            class="hover:text-white">contact@swiftlogistics.com</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h4 class="font-bold text-lg mb-4">Follow Us</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-fuchsia-500 transition-colors"><i
                            class="fab fa-facebook-f text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-fuchsia-500 transition-colors"><i
                            class="fab fa-twitter text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-fuchsia-500 transition-colors"><i
                            class="fab fa-linkedin-in text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-fuchsia-500 transition-colors"><i
                            class="fab fa-instagram text-xl"></i></a>
                </div>
            </div>
        </div>

        <div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-500">
            <p>&copy; 2024 SwiftLogistics. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script>
    // Use alpine:init event to register components
    document.addEventListener('alpine:init', () => {
        // Hero Slider Component
        Alpine.data('heroSlider', () => ({
            init() {
                new Swiper(this.$el.querySelector('.swiper-container'), {
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    on: {
                        slideChangeTransitionStart: function () {
                            this.slides.forEach(slide => {
                                const animatedElements = slide.querySelectorAll('.animate__animated');
                                animatedElements.forEach(el => {
                                    el.classList.remove('animate__fadeInDown', 'animate__fadeInUp', 'animate__zoomIn');
                                });
                            });
                            const activeSlide = this.slides[this.activeIndex];
                            const animatedElements = activeSlide.querySelectorAll('.animate__animated');
                            animatedElements.forEach(el => {
                                void el.offsetWidth; // Trigger reflow
                                const animation = el.className.includes('delay-1s') ? 'animate__fadeInUp' : el.className.includes('delay-2s') ? 'animate__zoomIn' : 'animate__fadeInDown';
                                el.classList.add(animation);
                            });
                        }
                    }
                });
            }
        }));

        // Testimonials Slider Component
        Alpine.data('testimonialsSlider', () => ({
            init() {
                new Swiper(this.$el, {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    autoplay: {
                        delay: 4000,
                    },
                    pagination: {
                        el: '.swiper-pagination-testimonials',
                        clickable: true,
                    },
                    breakpoints: {
                        768: {slidesPerView: 2, spaceBetween: 30},
                        1024: {slidesPerView: 3, spaceBetween: 40}
                    }
                });
            }
        }));

        // Staggered Animation Component
        Alpine.data('staggerAnimation', (config = {}) => ({
            items: config.items || [
                {
                    icon: 'fas fa-plane-departure',
                    title: 'Air Freight',
                    description: 'Fast and reliable air cargo services for time-sensitive shipments across the globe.'
                },
                {
                    icon: 'fas fa-ship',
                    title: 'Ocean Freight',
                    description: 'Cost-effective sea freight solutions for large and bulk shipments worldwide.'
                },
                {
                    icon: 'fas fa-truck-moving',
                    title: 'Road Freight',
                    description: 'Comprehensive ground transportation for domestic and cross-border deliveries.'
                },
                {
                    icon: 'fas fa-warehouse',
                    title: 'Warehousing',
                    description: 'Secure storage and inventory management in our modern, tech-enabled facilities.'
                },
                {
                    icon: 'fas fa-dolly',
                    title: 'Supply Chain',
                    description: 'End-to-end supply chain management to optimize your logistics and reduce costs.'
                },
                {
                    icon: 'fas fa-box',
                    title: 'Customs Brokerage',
                    description: 'Hassle-free customs clearance to ensure your goods cross borders smoothly.'
                }
            ],
            animateItem(index) {
                const el = this.$el.querySelectorAll('.stagger-item')[index];
                if (el) {
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }, index * 150);
                }
            }
        }));

        // Stats Counter Component
        Alpine.data('statsCounter', () => ({
            stats: {packages: 0, countries: 0, clients: 0, tons: 0},
            targets: {packages: 1250, countries: 80, clients: 950, tons: 4500},
            init() {
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) {
                        this.startCounting();
                        observer.disconnect();
                    }
                }, {threshold: 0.5});
                observer.observe(this.$el);
            },
            startCounting() {
                const duration = 2000;
                Object.keys(this.targets).forEach(key => {
                    const target = this.targets[key];
                    let start = null;
                    const step = (timestamp) => {
                        if (!start) start = timestamp;
                        const progress = Math.min((timestamp - start) / duration, 1);
                        this.stats[key] = Math.floor(progress * target);
                        if (progress < 1) {
                            window.requestAnimationFrame(step);
                        } else {
                            this.stats[key] = target;
                        }
                    };
                    window.requestAnimationFrame(step);
                });
            }
        }));
    });

    // Simple scroll animation trigger (non-Alpine)
    document.addEventListener('DOMContentLoaded', () => {
        const animatedElements = document.querySelectorAll('.animate-on-scroll');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    // observer.unobserve(entry.target); // Optional: unobserve after animation
                }
            });
        }, {
            threshold: 0.1
        });
        animatedElements.forEach(el => observer.observe(el));
    });
</script>
</body>
</html>
