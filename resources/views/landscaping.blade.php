<!DOCTYPE html>
<html lang ="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Greenscape - Transform Your Garden </title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel ="stylesheet">

    <style>
        

        /*custom scrollbar*/ 
        ::-webkit-scrollbar{
            width:8px;
        }

        ::-webkit-scrollbar-track{
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb{
            background:#22c55e;
            border-radius:4px;
        }

        /*Button Hover Effects*/
        .btn-hover{
            transition:all 0.3s ease;
        }

        .btn-hover:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 20px rgba(0,0,0,0,2);
        }

        /*Model style */
        .modal{
            display:none;
            position:fixed;
            z-index:9999;
            left:0;
            top:0;
            width:100%;
            height:100%;
            background-color:rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color:#fefefe;
            margin: 15% auto;
            padding:20px;
            border:none;
            border-radius:10px;
            position: relative;
            z-index: 10000;
            width:80%;
            max-width:400px;
        }

        .close{
            color:#aaa;
            float:right;
            font-size:28px;
            font-weight:bold;
            cursor:pointer;
        }

        .close:hover{
            color:black; 
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
                        <a href="#home" class="text-gray-700 hover:text-green-600 transition duration-300">Home</a>
                        <div class="relative group">
                            <a href="#" class="text-gray-700 hover:text-green-600 transition duration-300">Plants</a>
                            <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg mt-2 w-48">
                                <a href="indoor.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Indoor Plants </a>
                               <a href="outdoor.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Outdoor Plants </a>
                                <a href="herb.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Herb Plants </a>
                                <a href="flowering.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Flowering plants </a>
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
    

    <!--Introduction Section-->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Welcome to the World of Landscaping</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Plants are the foundation of life on Earth. They provide oxygen,food, medicine, and beauty to our world.
                    Greenscape is a comprehensive to use for everyone who interest in palnts and landcaping your garden. 
                    At GreenScape,we believe that incorporating plants into your living space not only enhances its aesthetic
                    appeal but also improves your physical and mental well-being.
                </p>    
            </div>    
        </div>
    </section>       
    
    
    <!--Featured Plants section-->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auo px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4"> Featured Plants</h2>
                <p class="text-xl text-gray-600"> Discover our most popular plants</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="images/Fiddle Leaf Fig.jpeg" alt="Fiddle Leaf Fig" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Fiddle Leaf Fig</h3>
                        <p class="text-gray-600 mb-4">Perfect for indoor spaces</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.1200.00</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div> 
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="images/Pothos.jpg" alt="Fiddle Leaf Fig" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Pothos</h3>
                        <p class="text-gray-600 mb-4">Perfect for indoor spaces</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.350.00</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div> 
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="images/Artemisia.jpg" alt="Artemisia" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Artemisia</h3>
                        <p class="text-gray-600 mb-4">Perfect for outdoor spaces</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div> 
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="images/Boxwood.jpg" alt="Boxwood" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Boxwood</h3>
                        <p class="text-gray-600 mb-4">Perfect for your beautiful space</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.2500.00</span>
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

