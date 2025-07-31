

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landscaping Services - GreenScape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .landscape-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .landscape-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .landscape-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .landscape-card:hover .landscape-overlay {
            opacity: 1;
        }
        
        .landscape-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            color: white;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        .landscape-card:hover .landscape-content {
            transform: translateY(0);
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: none;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
        }
        
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover {
            color: black;
        }
        
        .hero-bg {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #16a34a, #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 2rem;
        }
        
        .booking-form {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!--Navigation-->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class ="max-w-7xl mx-auto px-4">
                <div class ="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-green-800"> GreenScape</span>
                    </div>       
                    <div class="hidden md:flex space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 transition duration-300">Home</a>
                        <div class="relative group">
                            <a href="#" class="text-gray-700 hover:text-green-600 transition duration-300">Plants</a>
                            <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg mt-2 w-48">
                                <a href="{{ route('plants.indoor') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Indoor Plants</a>
                                <a href="{{ route('plants.outdoor') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Outdoor Plants</a>
                                <a href="{{ route('plants.herb') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Herb Plants</a>
                                <a href="{{ route('plants.flowering') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Flowering Plants</a>

                            </div>
                        </div>   
                        <a href="{{ route('landscaping') }}" class="text-gray-700 hover:text-green-600 transition-duration-300">Landscaping</a>
                        <a href="{{ route('service') }}" class="text-gray-700 hover:text-green-600 transition-duration-300">Service</a>
                        
                    </div>     

                    <div class="flex items-center space-x-4" >
                        <a href="{{ route('cart') }}" class="text-gray-700 hover:text-green-600 transition duration-300">
                            <i class="fas fa-shopping-cart text-xl"></i>
                            <span class="bg-green-600 text-white rounded-full px-2 py-1 text-xs ml-1" id="cart-count">0</span>
                        </a>    
                        <button onclick="openModal('loginModal')" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">Login</button>
                    <button onclick="openModal('registerModal')" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300">Register</button>
                    </div>
                </div>
        </div>    
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg py-32 text-white" style="background-image: url('{{ asset('images/landscaping03.jpg') }}');">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6">Transform Your Outdoor Space</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Create stunning landscapes with our professional design services. From concept to completion, 
                we bring your garden dreams to life.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="openModal('bookingModal')" class="bg-green-600 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-green-700 transition duration-300">
                    Book Consultation
                </button>
                <button onclick="openModal('customModal')" class="bg-white text-green-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-gray-100 transition duration-300">
                    Custom Design
                </button>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Landscaping Services</h2>
                <p class="text-xl text-gray-600">Professional landscape design and maintenance solutions</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="service-icon">
                        <i class="fas fa-drafting-compass"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Garden Design</h3>
                    <p class="text-gray-600">Custom landscape designs tailored to your space, style, and budget. Our expert designers create beautiful, functional outdoor environments.</p>
                </div>
                
                <div class="text-center">
                    <div class="service-icon">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Installation</h3>
                    <p class="text-gray-600">Professional installation of plants, hardscaping, irrigation systems, and outdoor features by our certified landscaping team.</p>
                </div>
                
                <div class="text-center">
                    <div class="service-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Maintenance</h3>
                    <p class="text-gray-600">Ongoing garden care including pruning, fertilizing, pest control, and seasonal maintenance to keep your landscape looking its best.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Landscape Gallery -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Portfolio</h2>
                <p class="text-xl text-gray-600">Explore our stunning landscape transformations</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Landscape 1 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('Modern Zen Garden', 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Modern Zen Garden" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">Modern Zen Garden</h3>
                        <p class="text-sm">Minimalist design with clean lines and peaceful elements</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>

                <!-- Landscape 2 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('Tropical Paradise', 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Tropical Paradise" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">Tropical Paradise</h3>
                        <p class="text-sm">Lush tropical plants creating an exotic oasis</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>

                <!-- Landscape 3 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('Mediterranean Villa', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Mediterranean Villa" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">Mediterranean Villa</h3>
                        <p class="text-sm">Classic Mediterranean style with herbs and olive trees</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>

                <!-- Landscape 4 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('English Country Garden', 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="English Country Garden" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">English Country Garden</h3>
                        <p class="text-sm">Traditional cottage garden with mixed flowering plants</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>

                <!-- Landscape 5 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('Modern Minimalist', 'https://images.unsplash.com/photo-1574263867128-81beb7aa6d84?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1574263867128-81beb7aa6d84?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Modern Minimalist" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">Modern Minimalist</h3>
                        <p class="text-sm">Clean lines with structured plantings and geometric design</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>

                <!-- Landscape 6 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('Desert Oasis', 'https://images.unsplash.com/photo-1565011523534-747a8601c1b2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1565011523534-747a8601c1b2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Desert Oasis" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">Desert Oasis</h3>
                        <p class="text-sm">Drought-resistant succulents and cacti arrangement</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>

                <!-- Landscape 7 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('Japanese Garden', 'https://images.unsplash.com/photo-1523726491678-bf852e717f6a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1523726491678-bf852e717f6a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Japanese Garden" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">Japanese Garden</h3>
                        <p class="text-sm">Traditional Japanese elements with water features</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>

                <!-- Landscape 8 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('Woodland Retreat', 'https://images.unsplash.com/photo-1604334512875-e0c17b0a0e4c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1604334512875-e0c17b0a0e4c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Woodland Retreat" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">Woodland Retreat</h3>
                        <p class="text-sm">Natural forest-like setting with native plants</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>

                <!-- Landscape 9 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('Cottage Garden', 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1555252333-9f8e92e65df9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Cottage Garden" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">Cottage Garden</h3>
                        <p class="text-sm">Charming mix of flowers, herbs, and vegetables</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>

                <!-- Landscape 10 -->
                <div class="landscape-card bg-white rounded-lg shadow-lg overflow-hidden h-64 cursor-pointer" onclick="selectLandscape('Urban Rooftop', 'https://images.unsplash.com/photo-1597149332808-0317b7c64b17?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
                    <img src="https://images.unsplash.com/photo-1597149332808-0317b7c64b17?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Urban Rooftop" class="w-full h-full object-cover">
                    <div class="landscape-overlay"></div>
                    <div class="landscape-content">
                        <h3 class="text-xl font-bold mb-2">Urban Rooftop</h3>
                        <p class="text-sm">City garden with containers and vertical growing</p>
                        <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Book This Design
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Design Process</h2>
                <p class="text-xl text-gray-600">From consultation to completion in simple steps</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                    <h3 class="text-lg font-semibold mb-2">Consultation</h3>
                    <p class="text-gray-600">Meet with our designers to discuss your vision, needs, and budget</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                    <h3 class="text-lg font-semibold mb-2">Design</h3>
                    <p class="text-gray-600">Create detailed plans and 3D renderings of your new landscape</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                    <h3 class="text-lg font-semibold mb-2">Installation</h3>
                    <p class="text-gray-600">Professional installation by our certified landscape team</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">4</div>
                    <h3 class="text-lg font-semibold mb-2">Maintenance</h3>
                    <p class="text-gray-600">Ongoing care and support to keep your garden thriving</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Ready to Transform Your Garden?</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Whether you want to book one of our featured designs or create something entirely custom, 
                        our team is ready to help bring your vision to life. Contact us today for a free consultation.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-phone text-green-600 text-xl mr-4"></i>
                            <span class="text-lg">+1 (555) 123-4567</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-green-600 text-xl mr-4"></i>
                            <span class="text-lg">landscaping@greenscape.com</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock text-green-600 text-xl mr-4"></i>
                            <span class="text-lg">Mon-Sat: 8AM-6PM</span>
                        </div>
                    </div>
                    
                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <button onclick="openModal('bookingModal')" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                            Schedule Consultation
                        </button>
                        <button onclick="openModal('customModal')" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300">
                            Request Custom Quote
                        </button>
                    </div>
                </div>
                
                <div class="booking-form rounded-lg p-8">
                    <h3 class="text-2xl font-bold mb-6">Quick Contact Form</h3>
                    <form id="quick-contact-form">
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <input type="text" placeholder="First Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                            <input type="text" placeholder="Last Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                        </div>
                        <div class="mb-4">
                            <input type="email" placeholder="Email Address" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                        </div>
                        <div class="mb-4">
                            <input type="tel" placeholder="Phone Number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                        </div>
                        <div class="mb-4">
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                                <option value="">Select Service Type</option>
                                <option value="consultation">Free Consultation</option>
                                <option value="design">Landscape Design</option>
                                <option value="maintenance">Garden Maintenance</option>
                                <option value="installation">Plant Installation</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <textarea placeholder="Tell us about your project..." rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-leaf text-green-400 text-2xl mr-2"></i>
                        <span class="text-xl font-bold">GreenScape</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Transform your space with our premium plants and professional landscaping services.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Plants</a></li>
                        <li><a href="landscaping.php" class="text-green-400 font-semibold">Landscaping</a></li>
                        <li><a href="services.php" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                        <li><a href="contact.php" class="text-gray-400 hover:text-white transition duration-300">About Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Plant Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="indoor-plants.php" class="text-gray-400 hover:text-white transition duration-300">Indoor Plants</a></li>
                        <li><a href="outdoor-plants.php" class="text-gray-400 hover:text-white transition duration-300">Outdoor Plants</a></li>
                        <li><a href="herb-plants.php" class="text-gray-400 hover:text-white transition duration-300">Herb Plants</a></li>
                        <li><a href="flowering-plants.php" class="text-gray-400 hover:text-white transition duration-300">Flowering Plants</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-2 text-gray-400">
                        <p><i class="fas fa-map-marker-alt mr-2"></i>123 Garden Street, Green City</p>
                        <p><i class="fas fa-phone mr-2"></i>+1 (555) 123-4567</p>
                        <p><i class="fas fa-envelope mr-2"></i>info@greenscape.com</p>
                        <p><i class="fas fa-clock mr-2"></i>Mon-Sat: 9AM-6PM</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 GreenScape. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Booking Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('bookingModal')">&times;</span>
            <h2 class="text-2xl font-bold mb-6">Book Landscaping Service</h2>
            <form id="booking-form">
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">First Name *</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Last Name *</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email *</label>
                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Phone *</label>
                    <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Selected Design</label>
                    <input type="text" id="selected-design" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Preferred Date</label>
                    <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Budget Range</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                        <option value="">Select Budget Range</option>
                        <option value="under-5000">Under $5,000</option>
                        <option value="5000-10000">$5,000 - $10,000</option>
                        <option value="10000-20000">$10,000 - $20,000</option>
                        <option value="over-20000">Over $20,000</option>
                    </select>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Additional Notes</label>
                    <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" placeholder="Tell us about your vision, special requirements, or any questions you have..."></textarea>
                </div>
                
                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300">
                    Book Consultation
                </button>
            </form>
        </div>
    </div>

    <!-- Custom Design Modal -->
    <div id="customModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('customModal')">&times;</span>
            <h2 class="text-2xl font-bold mb-6">Custom Garden Design</h2>
            <form id="custom-form">
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">First Name *</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Last Name *</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email *</label>
                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Phone *</label>
                    <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Garden Size (sq ft)</label>
                    <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" placeholder="e.g., 500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Style Preferences</label>
                    <div class="grid grid-cols-2 gap-2">
                        <label class="flex items-center">
                            <input type="checkbox" value="modern" class="mr-2">
                            <span>Modern</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" value="traditional" class="mr-2">
                            <span>Traditional</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" value="tropical" class="mr-2">
                            <span>Tropical</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" value="zen" class="mr-2">
                            <span>Zen/Minimalist</span>
                        </label>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Describe Your Vision *</label>
                    <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" placeholder="Tell us about your dream garden, preferred plants, features you'd like to include, and any specific requirements..." required></textarea>
                </div>
                
                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300">
                    Request Custom Quote
                </button>
            </form>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('loginModal')">&times;</span>
            <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
            <form method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <button type="submit" name="login" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Login
                </button>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('registerModal')">&times;</span>
            <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>
            <form method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                    <input type="password" name="confirm_password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <button type="submit" name="register" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Register
                </button>
            </form>
        </div>
    </div>

    <script>
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        function updateCartCount() {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById('cart-count').textContent = totalItems;
        }
        
        function selectLandscape(designName, imageUrl) {
            document.getElementById('selected-design').value = designName;
            openModal('bookingModal');
        }
        
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }
        
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        }
        
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const bgColor = type === 'error' ? 'bg-red-600' : 'bg-green-600';
            notification.className = `fixed top-20 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        // Handle form submissions
        document.getElementById('booking-form').addEventListener('submit', function(e) {
            e.preventDefault();
            showNotification('Booking request submitted successfully! We will contact you soon.');
            closeModal('bookingModal');
            this.reset();
        });
        
        document.getElementById('custom-form').addEventListener('submit', function(e) {
            e.preventDefault();
            showNotification('Custom design request submitted! Our team will prepare a quote for you.');
            closeModal('customModal');
            this.reset();
        });
        
        document.getElementById('quick-contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            showNotification('Message sent successfully! We will get back to you within 24 hours.');
            this.reset();
        });
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            updateCartCount();
        });
    </script>
</body>
</html>

<?php
// PHP session management
session_start();

// Handle booking form submission
if (isset($_POST['book_service'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $message = $_POST['message'];
    
    // Here you would typically save to database and send email
    // For demo purposes, we'll just set a success message
    $_SESSION['booking_success'] = true;
    
    header('Location: ' . $_SERVER['PHP_SELF'] . '?booking=success');
    exit;
}

// Handle login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Here you would typically validate against a database
    $_SESSION['user_email'] = $email;
    $_SESSION['logged_in'] = true;
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Handle registration
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Here you would typically save to a database
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    $_SESSION['logged_in'] = true;
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>