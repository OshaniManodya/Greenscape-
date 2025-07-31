<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor Plants- GreenScape</title>
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
            <h1 class="text-4xl font-bold mb-4">Outdoor plant collection</h1>
            <p class="text-xl opacity-90">Make your garden so beautiful.</p>
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
            
            <!-- ARTEMISIA -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Artemisia">
                <div class="relative">
                    <img src="{{ asset('images/Artemisia.jpg') }}" alt="Artemisia" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Popular
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Artemisia</h3>
                    <p class="text-gray-600 text-sm mb-2">Also known as wormwood or mugwort, Artemisia is grown for the silver, white, or gray foliage.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Artemisia', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- BOXWOOD -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2500.00" data-name="Boxwood">
                <div class="relative">
                    <img src="{{ asset('images/Boxwood.jpg') }}" alt="Boxwood" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Boxwood</h3>
                    <p class="text-gray-600 text-sm mb-2">Boxwood has long been used in formal European design as clipped hedging or living sculpture.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2500.00</span>
                        <button onclick="addToCart('Boxwood', 2500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--CALADIUM-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="600.00" data-name="Caladium">
                <div class="relative">
                    <img src="{{ asset('images/Caladium.jpg') }}"
                         alt="Caladium" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Easy Care
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Caladium</h3>
                    <p class="text-gray-600 text-sm mb-2">Also known as angel wings, Caladium are grown for the bold arrowhead-shaped leaves which come in an array of intricate patterns and colors.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.600.00</span>
                        <button onclick="addToCart('Caladium', 600.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CANNA -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="600.00" data-name="Canna">
                <div class="relative">
                    <img src="{{ asset('images/Canna.jpg') }}" alt="Canna" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Popular
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Canna</h3>
                    <p class="text-gray-600 text-sm mb-2">Large banana-like leaves occur in shades of green or striking colored patterns, lending an exotic feel to the landscape.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.600.00</span>
                        <button onclick="addToCart('Canna', 600.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--COLEUS-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="700.00" data-name="Coleus">
                <div class="relative">
                    <img src="{{ asset('images/coleus.jpg') }}"
                         alt="Birds nest fern" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Coleus</h3>
                    <p class="text-gray-600 text-sm mb-2">Coleus is a popular Victorian bedding plant grown for the foliage, which comes in an endless array of shapes and patterns, in hues from bright yellow to almost black.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.700.00</span>
                        <button onclick="addToCart('Coleus', 700.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CORAL BELLS -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="700.00" data-name="Coral Bells">
                <div class="relative">
                    <img src="{{ asset('images/coral-bells.jpg') }}" 
                         alt="ZZ Plant" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Low Light
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Coral Bells</h3>
                    <p class="text-gray-600 text-sm mb-2">Named for the nodding bell-shaped flowers, coral bells are primarily grown for the evergreen or semi-evergreen foliage, which comes in a range of colors and shapes.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.700.00</span>
                        <button onclick="addToCart('Coral Bells', 700.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- ELEPHANT EAR -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="800.00" data-name="Elephant Ear">
                <div class="relative">
                    <img src="{{ asset('images/elephant-ear.jpg') }}"
                         alt="Parlor Palm" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Elephant Ear</h3>
                    <p class="text-gray-600 text-sm mb-2">Giant heart-shaped leaves up to 2 feet across resemble elephant ears, hence the common name. Foliage occurs in colors of green, purple, or nearly black, some with striped or speckled patterns.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">800.00</span>
                        <button onclick="addToCart('Elephant Ear',800.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- FERNS -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="100.00" data-name="Ferns">
                <div class="relative">
                    <img src="{{ asset('images/fern.jpg') }}" 
                         alt="Ferns" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Ferns</h3>
                    <p class="text-gray-600 text-sm mb-2">One of the most valuable plants for shade gardens, ferns add a lushness to borders, beds, and containers. Plants can range from tiny forest floor specimens to giant tropical tree ferns.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.100.00</span>
                        <button onclick="addToCart('Ferns', 100.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- HOSTA -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="500.00" data-name="Hosta">
                <div class="relative">
                    <img src="{{ asset('images/hosta.jpg') }}"
                         alt="Hosta" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Hosta</h3>
                    <p class="text-gray-600 text-sm mb-2">One of the most popular perennials for shade gardens, the bold leaves of hosta come in an array of colors, patterns and shapes.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.500.00</span>
                        <button onclick="addToCart('Hosta', 500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--LAMB''S EAR -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="600.00" data-name="Lamb's ear">
                <div class="relative">
                    <img src="{{ asset('images/lambs-ear.jpg') }}"
                         alt="Lambs-ear" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Lamb's ear</h3>
                    <p class="text-gray-600 text-sm mb-2">Grown for the silvery foliage with a soft fuzzy texture that resembles lamb’s ears, hence its common name.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">600.00</span>
                        <button onclick="addToCart('Lamb''s ear', 600.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- LILYTURF -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="800.00" data-name="Lilyturf">
                <div class="relative">
                    <img src="{{ asset('images/lilyturf.jpg') }}"
                         alt="Lilyturf" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Lilyturf</h3>
                    <p class="text-gray-600 text-sm mb-2">Strappy green or variegated leaves add fine texture and structure to the landscape.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.3)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.800.00</span>
                        <button onclick="addToCart('Lilyturf', 800.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--LUNGWORT  -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="900.00" data-name="Lungwort">
                <div class="relative">
                 <img src="{{ asset('images/lungwort.jpg') }}"
                         alt="Lungwort" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Lungwort</h3>
                    <p class="text-gray-600 text-sm mb-2">Grown for the lance-shaped leaves that are green, silver, speckled, or patterned.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.2)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.900.00</span>
                        <button onclick="addToCart('Lungwort', 900.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--REX BEGONIA -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Rex Begonia">
                <div class="relative">
                 <img src="{{ asset('images/rex-begonia.jpg') }}"
                         alt="Rex Begonia" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Rex Begonia</h3>
                    <p class="text-gray-600 text-sm mb-2">Also known as fancy leaf begonia, these delicate looking plants are valued for their highly decorative leaves, which come in a wide range of colors and patterns.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.2)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Rex Begonia',1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--NEW ZEALAND FLAX -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="New zealand flax">
                <div class="relative">
                 <img src="{{ asset('images/new-zealand-flax.jpg') }}"
                         alt="New zealand flax" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">New zealand flax</h3>
                    <p class="text-gray-600 text-sm mb-2">The thick sword-like foliage of New Zealand flax lends bold structure and texture to the landscape.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.1)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('New zealand flax', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--ORNAMENTAL GRASSES -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="900.00" data-name="Polka Dot Plant">
                <div class="relative">
                 <img src="{{ asset('images/Ornamental-grasses.jpg') }}"
                         alt="Ornamental grasses" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Ornamental grasses</h3>
                    <p class="text-gray-600 text-sm mb-2">Ornamental grasses add texture, movement, and sound to the landscape.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.900.00</span>
                        <button onclick="addToCart('Polka Dot Plant', 900.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--NINEBARK-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="800.00" data-name="Ninebark">
                <div class="relative">
                 <img src="{{ asset('images/ninebark.jpg') }}"
                         alt="Ninebark" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Ninebark</h3>
                    <p class="text-gray-600 text-sm mb-2">Ninebark has multi-seasonal appeal</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.800.00</span>
                        <button onclick="addToCart('Ninebark', 800.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
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