<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor Plants - GreenScape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
       
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class ="max-w-7xl mx-auto px-4">
                <div class ="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-green-800"> GreenScape</span>
                    </div>       
                    <div class="hidden md:flex space-x-8">
                        <a href="#home" class="text-gray-700 hover:text-green-600 transition duration-300">Home</a>
                        <div class="relative group">
                            <a href="#" class="text-gray-700 hover:text-green-600 transition duration-300">Plants</a>
                            <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg mt-2 w-48">
                                <a href="indoor-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Indoor Plants </a>
                               <a href="{{ route('plants.outdoor') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Outdoor Plants </a>
                                <a href="herb-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Herb Plants </a>
                                <a href="flowering-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Flowering plants </a>
                            </div>
                        </div>   
                        <a href="landscaping.php" class="text-gray-700 hover:text-green-600 transition-duration-300">Landscaping</a>
                        <a href="services.php" class="text-gray-700 hover:text-green-600 transition-duration-300">Service</a>
                        <a href="booking.php" class="text-gray-700 hover:text-green-600 transition-duration-300">Booking</a>
                    </div>     

                    <div class="flex items-center space-x-4" >
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

    <!-- Hero Section -->
    <section class="outdoor-hero">
        <div class="gradient-overlay w-full h-full flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold mb-4">Outdoor Plants Collection</h1>
                <p class="text-xl mb-8">Discover our wide range of beautiful outdoor plants perfect for your garden</p>
                <button class="bg-white text-green-600 px-8 py-3 rounded-lg text-lg font-semibold btn-hover">Shop Now</button>
            </div>
        </div>
    </section>

    <!-- Outdoor Plants Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Outdoor Plants</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Transform your outdoor space with our premium selection of plants that thrive in gardens, patios, and balconies.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tree text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Trees & Shrubs</h3>
                    <p class="text-gray-600">Beautiful trees and shrubs that provide structure to your garden.</p>
                </div>

                <div class="text-center">
                    <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-leaf text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Evergreens</h3>
                    <p class="text-gray-600">Plants that maintain their foliage all year round.</p>
                </div>

                <div class="text-center">
                    <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-spa text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Flowering Plants</h3>
                    <p class="text-gray-600">Add color and beauty to your outdoor spaces.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Outdoor Plants -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Featured Outdoor Plants</h2>
                <p class="text-xl text-gray-600">Perfect for your garden or balcony</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1598880940080-ff9a29891b85" alt="Boxwood" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Boxwood</h3>
                        <p class="text-gray-600 mb-4">Evergreen shrub perfect for hedges</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.2500.00</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1598880940080-ff9a29891b85" alt="Hydrangea" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Hydrangea</h3>
                        <p class="text-gray-600 mb-4">Beautiful flowering shrub</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.1800.00</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1598880940080-ff9a29891b85" alt="Japanese Maple" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Japanese Maple</h3>
                        <p class="text-gray-600 mb-4">Ornamental tree with stunning foliage</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.3500.00</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1598880940080-ff9a29891b85" alt="Lavender" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Lavender</h3>
                        <p class="text-gray-600 mb-4">Fragrant and drought-resistant</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.900.00</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1598880940080-ff9a29891b85" alt="Bamboo" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Bamboo</h3>
                        <p class="text-gray-600 mb-4">Fast-growing privacy screen</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.2000.00</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1598880940080-ff9a29891b85" alt="Rose Bush" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Rose Bush</h3>
                        <p class="text-gray-600 mb-4">Classic flowering plant</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Outdoor Plant Care Tips -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Outdoor Plant Care Tips</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-sun text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Sunlight Requirements</h3>
                                <p class="text-gray-600">Most outdoor plants need at least 6 hours of sunlight per day. Check the specific needs for each plant.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-tint text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Watering</h3>
                                <p class="text-gray-600">Water deeply but less frequently to encourage strong root growth. Early morning is the best time to water.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-seedling text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Soil & Fertilizer</h3>
                                <p class="text-gray-600">Use well-draining soil and fertilize during the growing season for optimal plant health.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae" alt="Garden care" class="rounded-lg shadow-lg w-full">
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
                        <li><a href="index.html" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="outdoor-plants.html" class="text-gray-400 hover:text-white transition duration-300">Outdoor Plants</a></li>
                        <li><a href="landscaping.html" class="text-gray-400 hover:text-white transition duration-300">Landscaping</a></li>
                        <li><a href="services.html" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                        <li><a href="about.html" class="text-gray-400 hover:text-white transition duration-300">About Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Plant Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="indoor-plants.html" class="text-gray-400 hover:text-white transition duration-300">Indoor Plants</a></li>
                        <a href="{{ url('/outdoor-plants') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Outdoor Plants </a>

                        <li><a href="herb-plants.html" class="text-gray-400 hover:text-white transition duration-300">Herb Plants</a></li>
                        <li><a href="flowering-plants.html" class="text-gray-400 hover:text-white transition duration-300">Flowering Plants</a></li>
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