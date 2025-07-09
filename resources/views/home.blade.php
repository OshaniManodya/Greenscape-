<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenScape - Transform Your Garden</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Flower Rain Animation */
        .flower-rain {
            position: fixed;
            top: -10px;
            z-index: 1000;
            font-size: 20px;
            animation: fall linear infinite;
            pointer-events: none;
        }
        
        @keyframes fall {
            0% { transform: translateY(-100vh) rotate(0deg); }
            100% { transform: translateY(100vh) rotate(360deg); }
        }
        
        /* Image Slider */
        .slider-container {
            position: relative;
            overflow: hidden;
        }
        
        .slider-track {
            display: flex;
            transition: transform 0.5s ease;
        }
        
        .slider-slide {
            min-width: 100%;
            height: 500px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Gradient Overlay */
        .gradient-overlay {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.8), rgba(16, 185, 129, 0.8));
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #22c55e;
            border-radius: 4px;
        }
        
        /* Button Hover Effects */
        .btn-hover {
            transition: all 0.3s ease;
        }
        
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        /* Modal Styles */
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
            margin: 15% auto;
            padding: 20px;
            border: none;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                    <span class="text-xl font-bold text-green-800">GreenScape</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-green-600 transition duration-300">Home</a>
                    <div class="relative group">
                        <a href="#" class="text-gray-700 hover:text-green-600 transition duration-300">Plants</a>
                        <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg mt-2 w-48">
                            <a href="indoor-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Indoor Plants</a>
                            <a href="outdoor-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Outdoor Plants</a>
                            <a href="herb-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Herb Plants</a>
                            <a href="flowering-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Flowering Plants</a>
                        </div>
                    </div>
                    <a href="landscaping.php" class="text-gray-700 hover:text-green-600 transition duration-300">Landscaping</a>
                    <a href="services.php" class="text-gray-700 hover:text-green-600 transition duration-300">Services</a>
                    <a href="contact.php" class="text-gray-700 hover:text-green-600 transition duration-300">Contact</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="cart.php" class="text-gray-700 hover:text-green-600 transition duration-300">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="bg-green-600 text-white rounded-full px-2 py-1 text-xs ml-1" id="cart-count">0</span>
                    </a>
                    <button onclick="openModal('loginModal')" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">Login</button>
                    <button onclick="openModal('registerModal')" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300">Register</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Image Slider -->
    <section class="slider-container">
        <div class="slider-track" id="slider-track">
            <div class="slider-slide" style="background-image: url('https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80');">
                <div class="gradient-overlay w-full h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <h1 class="text-5xl font-bold mb-4">Transform Your Garden</h1>
                        <p class="text-xl mb-8">Create beautiful landscapes with our expert services</p>
                        <button class="bg-white text-green-600 px-8 py-3 rounded-lg text-lg font-semibold btn-hover">Get Started</button>
                    </div>
                </div>
            </div>
            
            <div class="slider-slide" style="background-image: url('https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2332&q=80');">
                <div class="gradient-overlay w-full h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <h1 class="text-5xl font-bold mb-4">Premium Plant Collection</h1>
                        <p class="text-xl mb-8">Discover our wide range of indoor and outdoor plants</p>
                        <button class="bg-white text-green-600 px-8 py-3 rounded-lg text-lg font-semibold btn-hover">Shop Plants</button>
                    </div>
                </div>
            </div>
            
            <div class="slider-slide" style="background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80');">
                <div class="gradient-overlay w-full h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <h1 class="text-5xl font-bold mb-4">Professional Landscaping</h1>
                        <p class="text-xl mb-8">Let us design your dream garden</p>
                        <button class="bg-white text-green-600 px-8 py-3 rounded-lg text-lg font-semibold btn-hover">Book Service</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slider Navigation -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition duration-300" onclick="goToSlide(0)"></button>
            <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition duration-300" onclick="goToSlide(1)"></button>
            <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition duration-300" onclick="goToSlide(2)"></button>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Welcome to the World of Plants</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Plants are the foundation of life on Earth. They provide oxygen, food, medicine, and beauty to our world. 
                    At GreenScape, we believe that incorporating plants into your living space not only enhances its aesthetic 
                    appeal but also improves your physical and mental well-being.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-seedling text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Air Purification</h3>
                    <p class="text-gray-600">Plants naturally filter and purify the air, removing toxins and producing fresh oxygen.</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Mental Wellness</h3>
                    <p class="text-gray-600">Studies show that plants reduce stress, improve mood, and boost productivity.</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-home text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Beautiful Spaces</h3>
                    <p class="text-gray-600">Transform any space into a green oasis with our carefully selected plant collection.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About GreenScape Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">About GreenScape</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Founded with a passion for bringing nature closer to people, GreenScape has been serving plant 
                        enthusiasts and landscape lovers for over a decade. Our mission is to create beautiful, sustainable 
                        green spaces that enhance your quality of life.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        We specialize in providing premium quality plants, expert landscaping services, and comprehensive 
                        garden maintenance solutions. Our team of certified horticulturists and landscape designers work 
                        tirelessly to bring your green dreams to life.
                    </p>
                    <div class="flex space-x-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-green-600">500+</div>
                            <div class="text-gray-600">Happy Customers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-green-600">1000+</div>
                            <div class="text-gray-600">Plants Sold</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-green-600">50+</div>
                            <div class="text-gray-600">Garden Designs</div>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Garden Design" class="rounded-lg shadow-lg">
                    <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Landscape" class="rounded-lg shadow-lg mt-4">
                    <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Plants" class="rounded-lg shadow-lg">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Garden" class="rounded-lg shadow-lg mt-4">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Plants Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Featured Plants</h2>
                <p class="text-xl text-gray-600">Discover our most popular plants</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Monstera Plant" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Monstera Deliciosa</h3>
                        <p class="text-gray-600 mb-4">Perfect for indoor spaces</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">$45</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1509423350716-97f2360af8e4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Fiddle Leaf Fig" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Fiddle Leaf Fig</h3>
                        <p class="text-gray-600 mb-4">Statement indoor plant</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">$65</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Snake Plant" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                        <p class="text-gray-600 mb-4">Low maintenance beauty</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">$35</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Peace Lily" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Peace Lily</h3>
                        <p class="text-gray-600 mb-4">Elegant flowering plant</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">$55</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
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
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Plants</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Landscaping</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">About Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Plant Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Indoor Plants</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Outdoor Plants</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Herb Plants</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Flowering Plants</a></li>
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

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('loginModal')">&times;</span>
            <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
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
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                    <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Register
                </button>
            </form>
        </div>
    </div>

    <script>
        // Flower Rain Animation
        function createFlowerRain() {
            const flowers = ['🌸', '🌺', '🌻', '🌷', '🌹', '🌼', '🌲', '🌿', '🍀', '🌱'];
            const flower = document.createElement('div');
            flower.className = 'flower-rain';
            flower.innerHTML = flowers[Math.floor(Math.random() * flowers.length)];
            flower.style.left = Math.random() * 100 + '%';
            flower.style.animationDuration = (Math.random() * 3 + 2) + 's';
            flower.style.opacity = Math.random();
            document.body.appendChild(flower);
            
            setTimeout(() => {
                flower.remove();
            }, 5000);
        }
        
        // Create flower rain every 500ms
        setInterval(createFlowerRain, 500);
        
        // Image Slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slider-slide');
        const totalSlides = slides.length;
        
        function goToSlide(index) {
            currentSlide = index;
            const track = document.getElementById('slider-track');
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Update active dot
            const dots = document.querySelectorAll('.slider-container button');
            dots.forEach((dot, i) => {
                dot.style.opacity = i === currentSlide ? '1' : '0.5';
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            goToSlide(currentSlide);
        }
        
        // Auto-advance slides every 5 seconds
        setInterval(nextSlide, 5000);
        
        // Initialize first slide
        goToSlide(0);
        
        // Modal Functions
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
        
        // Cart functionality
        let cart = [];
        
        function addToCart(plantName, price) {
            cart.push({name: plantName, price: price});
            updateCartCount();
            alert(`${plantName} added to cart!`);
        }
        
        function updateCartCount() {
            document.getElementById('cart-count').textContent = cart.length;
        }
        
        // Initialize cart count
        updateCartCount();
    </script>
</body>
</html>

<?php
// PHP session management and cart functionality
session_start();

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart requests
if (isset($_POST['add_to_cart'])) {
    $plant = [
        'id' => $_POST['plant_id'],
        'name' => $_POST['plant_name'],
        'price' => $_POST['plant_price'],
        'image' => $_POST['plant_image']
    ];
    
    $_SESSION['cart'][] = $plant;
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Handle login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Here you would typically validate against a database
    // For demo purposes, we'll just set a session variable
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
    // For demo purposes, we'll just set session variables
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    $_SESSION['logged_in'] = true;
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>