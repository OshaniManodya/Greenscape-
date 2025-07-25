<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indoor Plants - GreenScape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styles for product cards */
        .product-card {
            transition: all 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
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
        
        .cart-animation {
            animation: addToCart 0.5s ease-in-out;
        }
        
        @keyframes addToCart {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .plant-image {
            transition: transform 0.3s ease;
        }
        
        .plant-image:hover {
            transform: scale(1.05);
        }
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
                                <a href="{{ route('plants.indoor') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Indoor Plants</a>
                                <a href="{{ route('plants.outdoor') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Outdoor Plants</a>
                                <a href="{{ route('plants.herb') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Herb Plants</a>
                                <a href="{{ route('plants.flowering') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Flowering Plants</a>

                            </div>
                        </div>   
                        <a href="{{ route('landscaping') }}" class="text-gray-700 hover:text-green-600 transition-duration-300">Landscaping</a>
                        <a href="{{ route('services') }}" class="text-gray-700 hover:text-green-600 transition-duration-300">Service</a>
                        <a href="{{ route('booking') }}" class="text-gray-700 hover:text-green-600 transition-duration-300">Booking</a>
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

    <!-- Page Header -->
    <div class="bg-green-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Indoor Plants</h1>
            <p class="text-xl">Bring nature indoors with our premium indoor plant collection</p>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-wrap gap-4 mb-8">
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                <option>Sort by Price</option>
                <option>Low to High</option>
                <option>High to Low</option>
            </select>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                <option>Filter by Size</option>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
            </select>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                <option>Filter by Care Level</option>
                <option>Low Maintenance</option>
                <option>Medium Maintenance</option>
                <option>High Maintenance</option>
            </select>
        </div>
    </div>

    <!-- Plants Grid -->
    <div class="max-w-7xl mx-auto px-4 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            
            <!-- Plant 1 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="{{ asset('images/Fiddle Leaf Fig.jpeg') }}" alt="Fiddle Leaf Fig" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Popular
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Fiddle Leaf Fig</h3>
                    <p class="text-gray-600 text-sm mb-2">Give any room a jungle-like vibe.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1200.00</span>
                        <button onclick="addToCart('Fiddle Leaf Fig', 1200.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 2 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="{{ asset('images/pothos.jpg') }}"alt="Pothos" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Pothos</h3>
                    <p class="text-gray-600 text-sm mb-2">One of the easiest houseplants to grow.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.350.00</span>
                        <button onclick="addToCart('Pothos', 350.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 3 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="{{ asset('images/philodendron.jpeg') }}"
                         alt="Philodendron" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Easy Care
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Philodendron</h3>
                    <p class="text-gray-600 text-sm mb-2">Also called rattlesnake plant, peacock plant, or zebra plant, this popular houseplant is grown for its decorative foliage in an assortment of patterns</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Philodendron', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 4 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Peace Lily" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Peace Lily</h3>
                    <p class="text-gray-600 text-sm mb-2">Elegant flowering plant with white blooms</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.6)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$55.99</span>
                        <button onclick="addToCart('Peace Lily', 55.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 5 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1511884642898-4c92249e20b6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Rubber Tree" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Rubber Tree</h3>
                    <p class="text-gray-600 text-sm mb-2">Glossy leaves and easy-care nature</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$49.99</span>
                        <button onclick="addToCart('Rubber Tree', 49.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 6 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1586074299757-c8d1c4b3b6f3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="ZZ Plant" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Low Light
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">ZZ Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">Extremely low maintenance with glossy leaves</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$39.99</span>
                        <button onclick="addToCart('ZZ Plant', 39.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 7 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1621496070936-a4e6e1faf5b4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Pothos" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Golden Pothos</h3>
                    <p class="text-gray-600 text-sm mb-2">Trailing vine with heart-shaped leaves</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$25.99</span>
                        <button onclick="addToCart('Golden Pothos', 25.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 8 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1565011523534-747a8601c1b2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Aloe Vera" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Aloe Vera</h3>
                    <p class="text-gray-600 text-sm mb-2">Medicinal succulent with healing properties</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$19.99</span>
                        <button onclick="addToCart('Aloe Vera', 19.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Continue with remaining plants... -->
            <!-- Plant 9 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1523726491678-bf852e717f6a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Spider Plant" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Spider Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">Air-purifying plant with arching leaves</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$22.99</span>
                        <button onclick="addToCart('Spider Plant', 22.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 10 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1604334512875-e0c17b0a0e4c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Philodendron" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Philodendron</h3>
                    <p class="text-gray-600 text-sm mb-2">Classic houseplant with heart-shaped leaves</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$32.99</span>
                        <button onclick="addToCart('Philodendron', 32.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 11 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1604334512875-e0c17b0a0e4c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Philodendron" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Philodendron</h3>
                    <p class="text-gray-600 text-sm mb-2">Classic houseplant with heart-shaped leaves</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$32.99</span>
                        <button onclick="addToCart('Philodendron', 32.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 12 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1604334512875-e0c17b0a0e4c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Philodendron" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Philodendron</h3>
                    <p class="text-gray-600 text-sm mb-2">Classic houseplant with heart-shaped leaves</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$32.99</span>
                        <button onclick="addToCart('Philodendron', 32.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Plant 13 -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1604334512875-e0c17b0a0e4c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Philodendron" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Philodendron</h3>
                    <p class="text-gray-600 text-sm mb-2">Classic houseplant with heart-shaped leaves</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">$32.99</span>
                        <button onclick="addToCart('Philodendron', 32.99)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
    

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

    </body>
    </html>


    
            
        
