<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herb Plants- GreenScape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styles for product cards */
        .product-card {
            transition: all 0.3s ease;
            display: none; /* Initially hide all cards */
            transform: translateY(20px);
            opacity: 0;
        }

        .product-card.visible {
            display: block; /* Show only visible cards */
            animation: fadeInUp 0.5s ease forwards;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        /*plant images*/
        .plant-image {
            transition: transform 0.3s ease;
        }
        
        .plant-image:hover {
            transform: scale(1.05);
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
        /*cart*/
        .cart-animation {
            animation: addToCart 0.5s ease-in-out;
        }
        
        @keyframes addToCart {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
         /*loading button*/
        .load-more-btn {
            transition: all 0.3s ease;
        }
        
        .load-more-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(34, 197, 94, 0.3);
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

                <div class="flex items-center space-x-4">
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
    <div class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Herb plant collection</h1>
            <p class="text-xl opacity-90">small, non-woody plants used for flavoring food, medicinal purposes, or fragrance</p>
            <div class="mt-6">
                <span class="bg-white/20 px-4 py-2 rounded-full text-sm" id="total-plants-count">Loading plants...</span>
            </div>
        </div>
    </div>

    <!-- Filter and Sort Controls -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 bg-white p-4 rounded-lg shadow-md">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <span class="text-gray-700 font-medium">Showing:</span>
                <span id="showing-count" class="text-green-600 font-semibold">12 of 27 plants</span>
            </div>
            <div class="flex items-center space-x-4">
                <label class="text-gray-700 font-medium">Sort by:</label>
                <select id="price-sort" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500">
                    <option value="">Default</option>
                    <option value="low">Price: Low to High</option>
                    <option value="high">Price: High to Low</option>
                    <option value="name">Name: A to Z</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Plants Grid -->
    <div class="max-w-7xl mx-auto px-4 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="plants-container">
            
            <!-- Aloe Vera -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price=" 900.00" data-name="Aloe Vera">
                <div class="relative">
                    <img src="{{ asset('images/Aloe Vera.jpeg') }}" alt="Aloe Vera" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Popular
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Aloe Vera</h3>
                    <p class="text-gray-600 text-sm mb-2">Succulent plant with medicinal gel for skin care and burns</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs. 900.00</span>
                        <button onclick="addToCart('Aloe Vera',  900.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Peppermint -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Peppermint">
                <div class="relative">
                    <img src="{{ asset('images/Peppermint.jpeg') }}" alt="Peppermint" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Peppermint</h3>
                    <p class="text-gray-600 text-sm mb-2">Aromatic herb for digestion and respiratory health</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Peppermint', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Chamomile-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="750.00" data-name="Caladium">
                <div class="relative">
                    <img src="{{ asset('images/Chamomile.jpeg') }}"
                         alt="Chamomile" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Easy Care
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Chamomile</h3>
                    <p class="text-gray-600 text-sm mb-2">Calming herb for tea, helps with sleep and anxiety</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.750.00</span>
                        <button onclick="addToCart('Chamomile', 750.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Echinacea-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Echinacea">
                <div class="relative">
                    <img src="{{ asset('images/Echinacea.jpeg') }}" alt="Echinacea" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Easy care
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Echinacea</h3>
                    <p class="text-gray-600 text-sm mb-2">Large banana-like leaves occur in shades of green or striking colored patterns, lending an exotic feel to the landscape.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Echinacea', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Lavender-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="700.00" data-name="Coleus">
                <div class="relative">
                    <img src="{{ asset('images/Lavender.jpeg') }}"
                         alt="Lavender" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Lavender</h3>
                    <p class="text-gray-600 text-sm mb-2">Fragrant herb for relaxation and skin care</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.700.00</span>
                        <button onclick="addToCart('Lavender', 700.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Ginger -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="750.00" data-name="Ginger">
                <div class="relative">
                    <img src="{{ asset('images/Ginger.jpeg') }}" 
                         alt="Ginger" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Popular
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Ginger</h3>
                    <p class="text-gray-600 text-sm mb-2">Root herb for digestion and nausea relief</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.750.00</span>
                        <button onclick="addToCart('Ginger', 750.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Turmeric -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Turmeric">
                <div class="relative">
                    <img src="{{ asset('images/Turmeric.jpeg') }}" 
                         alt="Turmeric" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Popular
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Turmeric</h3>
                    <p class="text-gray-600 text-sm mb-2">Anti-inflammatory root with bright yellow color</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Turmeric', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            

            <!--Ginseng-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1250.00" data-name="Ginseng">
                <div class="relative">
                    <img src="{{ asset('images/Ginseng.jpeg') }}" 
                         alt="Ferns" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Ginseng</h3>
                    <p class="text-gray-600 text-sm mb-2">Adaptogenic root for energy and stress relief</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1250.00</span>
                        <button onclick="addToCart('Ginseng',1250.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Rosemary-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="990.00" data-name="Rosemary">
                <div class="relative">
                    <img src="{{ asset('images/Rosemary.jpeg') }}"
                         alt="Rosemary" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Rosemary</h3>
                    <p class="text-gray-600 text-sm mb-2">Aromatic herb for memory and hair growth</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.990.00</span>
                        <button onclick="addToCart('Rosemary', 990.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Thyme -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1300.00" data-name="Thyme">
                <div class="relative">
                    <img src="{{ asset('images/Thyme.jpeg') }}"
                         alt="Thyme" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Thyme</h3>
                    <p class="text-gray-600 text-sm mb-2">Antimicrobial herb for respiratory health</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1300.00</span>
                        <button onclick="addToCart('Thyme', 1300.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Basil -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Basil">
                <div class="relative">
                    <img src="{{ asset('images/Basil.jpeg') }}"
                         alt="Basil" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Basil</h3>
                    <p class="text-gray-600 text-sm mb-2">Aromatic herb with anti-inflammatory properties</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.3)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Basil', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Sage-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1600.00" data-name="Sage">
                <div class="relative">
                 <img src="{{ asset('images/Sage.jpeg') }}"
                         alt="Sage" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Sage</h3>
                    <p class="text-gray-600 text-sm mb-2">Calming herb with citrus aroma for anxiety</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.2)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1600.00</span>
                        <button onclick="addToCart('Sage', 1600.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--St. John's Wort -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1300.00" data-name="St. John's Wort">
                <div class="relative">
                 <img src="{{ asset('images/JohnsWort.jpeg') }}"
                         alt="St. John's Wort" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">St. John's Wort</h3>
                    <p class="text-gray-600 text-sm mb-2">Herb traditionally used for mood support</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.2)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1300.00</span>
                        <button onclick="addToCart('St. Johns Wort',1300.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Calendula -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Calendula">
                <div class="relative">
                 <img src="{{ asset('images/Calendula.jpeg') }}"
                         alt="Calendula" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Calendula</h3>
                    <p class="text-gray-600 text-sm mb-2">Skin-healing herb with bright orange flowers</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.1)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Calendula', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
         <!--load more button-->
        <div class="text-center mt-12">
            <button id="load-more-btn" class="load-more-btn bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition duration-300 transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i>Load More Plants
            </button>
            <p id="all-loaded-message" class="text-gray-600 mt-4 hidden">
                <i class="fas fa-check-circle text-green-600 mr-2"></i>All plants loaded!
            </p>
        </div>
    </div>

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
                        <li><a href="landscaping.php" class="text-gray-400 hover:text-white transition duration-300">Landscaping</a></li>
                        <li><a href="services.php" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                        <li><a href="contact.php" class="text-gray-400 hover:text-white transition duration-300">About Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Plant Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="indoor-plants.php" class="text-gray-400 hover:text-white transition duration-300">Indoor Plants</a></li>
                        <li><a href="outdoor-plants.php" class="text-green-400 font-semibold">Outdoor Plants</a></li>
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
        // ========== GLOBAL VARIABLES ==========
        let currentlyVisible = 0;
        const plantsPerLoad = 12;
        let allPlants = [];
        let cart = [];

        // ========== INITIALIZATION ==========
        document.addEventListener('DOMContentLoaded', function() {
            allPlants = Array.from(document.querySelectorAll('.product-card'));
            updateTotalCount();
            showInitialPlants();
            updateCartCount();
            
            // Add data attributes to all plants
            allPlants.forEach(plant => {
                const price = plant.querySelector('.text-xl.font-bold.text-green-600').textContent.replace('Rs.', '').trim();
                const name = plant.querySelector('h3').textContent.trim();
                plant.dataset.price = price;
                plant.dataset.name = name;
            });
        });

        // ========== LOAD MORE FUNCTIONALITY ==========
        function showInitialPlants() {
            showMorePlants();
        }

        function showMorePlants() {
            const plantsToShow = Math.min(plantsPerLoad, allPlants.length - currentlyVisible);
            
            // Show plants with animation
            for (let i = currentlyVisible; i < currentlyVisible + plantsToShow; i++) {
                if (allPlants[i]) {
                    allPlants[i].classList.add('visible');
                    // Add staggered animation effect
                    setTimeout(() => {
                        allPlants[i].style.animation = 'fadeInUp 0.5s ease forwards';
                    }, (i - currentlyVisible) * 100);
                }
            }
            
            currentlyVisible += plantsToShow;
            updateShowingCount();
            
            // Hide load more button if all plants are shown
            if (currentlyVisible >= allPlants.length) {
                document.getElementById('load-more-btn').style.display = 'none';
                document.getElementById('all-loaded-message').classList.remove('hidden');
            }
        }

        // ========== COUNTER UPDATES ==========
        function updateTotalCount() {
            document.getElementById('total-plants-count').textContent = `${allPlants.length} plants available`;
        }

        function updateShowingCount() {
            document.getElementById('showing-count').textContent = `${currentlyVisible} of ${allPlants.length} plants`;
        }

        // ========== EVENT LISTENERS ==========
        // Load More Button
        document.getElementById('load-more-btn').addEventListener('click', function() {
            showMorePlants();
        });

        // ========== SORTING FUNCTIONALITY ==========
        document.getElementById('price-sort').addEventListener('change', function() {
            const sortValue = this.value;
            const container = document.getElementById('plants-container');
            
            if (sortValue === '') {
                // Reset to default order
                allPlants.sort((a, b) => {
                    return Array.from(container.children).indexOf(a) - Array.from(container.children).indexOf(b);
                });
            } else {
                // Sort plants based on selected option
                allPlants.sort((a, b) => {
                    if (sortValue === 'low') {
                        return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                    } else if (sortValue === 'high') {
                        return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                    } else if (sortValue === 'name') {
                        return a.dataset.name.localeCompare(b.dataset.name);
                    }
                });
            }
            
            // Re-arrange DOM elements
            allPlants.forEach(plant => container.appendChild(plant));
            
            // Reset visibility state
            currentlyVisible = 0;
            allPlants.forEach(plant => {
                plant.classList.remove('visible');
                plant.style.animation = 'none';
            });
            
            // Show initial plants again
            showMorePlants();
            
            // Show load more button if needed
            if (currentlyVisible < allPlants.length) {
                document.getElementById('load-more-btn').style.display = 'block';
                document.getElementById('all-loaded-message').classList.add('hidden');
            }
        });

        // ========== CART FUNCTIONALITY ==========
        function addToCart(plantName, price) {
            const plant = {
                id: Date.now(),
                name: plantName,
                price: price,
                quantity: 1
            };
            
            cart.push(plant);
            updateCartCount();
            
            // Add animation to button
            event.target.classList.add('cart-animation');
            setTimeout(() => {
                event.target.classList.remove('cart-animation');
            }, 500);
            
            // Show success notification
            showNotification(`${plantName} added to cart!`);
        }
        
        function updateCartCount() {
            document.getElementById('cart-count').textContent = cart.length;
        }
        
        // ========== NOTIFICATION SYSTEM ==========
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-20 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full';
            notification.innerHTML = `<i class="fas fa-check-circle mr-2"></i>${message}`;
            document.body.appendChild(notification);
            
            // Slide in animation
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
                notification.style.transition = 'transform 0.3s ease';
            }, 100);
            
            // Slide out and remove
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

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
    </script>
</body>
</html>