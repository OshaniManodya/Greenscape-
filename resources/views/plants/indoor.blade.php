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
     @include('partial.navbar')
     

    <!-- Page Header -->
    <div class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Indoor Plants Collection</h1>
            <p class="text-xl opacity-90">Bring nature indoors with our premium indoor plant collection</p>
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
            
            <!-- Fiddle Leaf Fig -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1200.00" data-name="Fiddle Leaf Fig">
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

            <!-- Pothos -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="350.00" data-name="Pothos">
                <div class="relative">
                    <img src="{{ asset('images/pothos.jpg') }}" alt="Pothos" class="w-full h-48 object-cover plant-image">
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

            <!-- Philodendron -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Philodendron">
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

            <!-- Prayer plant -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1600.00" data-name="Prayer plant">
                <div class="relative">
                    <img src="{{ asset('images/prayer plant.jpg') }}" 
                         alt="Prayer plant" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Prayer plant</h3>
                    <p class="text-gray-600 text-sm mb-2">Keep evenly moist.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.6)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1600.00</span>
                        <button onclick="addToCart('Prayer plant', 1600.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Bird nest fern -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Bird's nest fern">
                <div class="relative">
                    <img src="{{ asset('images/bird nest fern.jpg') }}"
                         alt="Birds nest fern" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Bird's nest fern</h3>
                    <p class="text-gray-600 text-sm mb-2">This tropical fern makes a stunning centerpiece for a table or plant stand.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Birds nest fern', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- ZZ PLANT -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="ZZ Plant">
                <div class="relative">
                    <img src="{{ asset('images/zz plant.jpg') }}" 
                         alt="ZZ Plant" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Low Light
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">ZZ Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">The naturally shiny leaves of the ZZ plant require little effort to maintain their good looks</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('ZZ Plant', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Parlor Palm -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2000.00" data-name="Parlor Palm">
                <div class="relative">
                    <img src="{{ asset('images/parlor plam.jpg') }}"
                         alt="Parlor Palm" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Parlor Palm</h3>
                    <p class="text-gray-600 text-sm mb-2">Pure white spathes surrounding creamy white flower spikes bloom from mid-spring through late summer. Peace lilies love warmth and humidity.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2000.00</span>
                        <button onclick="addToCart('Parlor Palm', 2000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Rubber Plant -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Rubber Plant">
                <div class="relative">
                    <img src="{{ asset('images/rubber plant.jpg') }}" 
                         alt="Rubber Plant" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Rubber Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">Rubber plants can threaten to outgrow a room, but can be kept in check by pruning off the top at the central stem.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Rubber Plant', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Peace Lily -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="850.00" data-name="Peace Lily">
                <div class="relative">
                    <img src="{{ asset('images/peace lily.jpg') }}"
                         alt="Peace Lily" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Peace Lily</h3>
                    <p class="text-gray-600 text-sm mb-2">Pure white spathes surrounding creamy white flower spikes bloom from mid-spring through late summer.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.850.00</span>
                        <button onclick="addToCart('Peace Lily', 850.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Chinese Evergreen -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2000.00" data-name="Chinese Evergreen">
                <div class="relative">
                    <img src="{{ asset('images/chinese evergreen.jpg') }}"
                         alt="Chinese Evergreen" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Chinese Evergreen</h3>
                    <p class="text-gray-600 text-sm mb-2">Chinese evergreens hate cold drafts and temperatures below 55 degrees F. Locate your plant away from drafty doorways, windows, and air-conditioning vents.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2000</span>
                        <button onclick="addToCart('Chinese Evergreen', 2000)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cast Iron Plant -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Cast Iron Plant">
                <div class="relative">
                    <img src="{{ asset('images/cast iron plant.jpg') }}"
                         alt="Cast Iron Plant" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Cast Iron Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">Cast iron plants are extremely slow growing and can take years to reach their full height.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.3)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Cast Iron Plant', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--TRADESCANTIA  -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2500.00" data-name="Tradescantia">
                <div class="relative">
                 <img src="{{ asset('images/tradescantia.jpg') }}"
                         alt="Tradescantia" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Tradescantia</h3>
                    <p class="text-gray-600 text-sm mb-2">An easy-to-grow, trailing plant that is great for beginners. Perfect for use in a hanging basket or even spilling from a regular planter.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.2)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2500.00</span>
                        <button onclick="addToCart('Tradescantia', 2500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Monstera  -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Monstera">
                <div class="relative">
                 <img src="{{ asset('images/monster.jpg') }}"
                         alt="Monstera" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Monstera</h3>
                    <p class="text-gray-600 text-sm mb-2">Popular houseplants prized for their unique, holed leaves.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.2)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Monstera',1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Watermelon peperomia  -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Watermelon peperomia">
                <div class="relative">
                 <img src="{{ asset('images/watermelon-peperomia.jpg') }}"
                         alt="Watermelon peperomia" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Watermelon peperomia</h3>
                    <p class="text-gray-600 text-sm mb-2">A charming little foliage plant with cheery pink speckles over deep-green leaves. In addition to pink, cultivars sporting white or red dots are also available.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.1)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Watermelon peperomia', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--POLKA DOT PLANT  -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Polka Dot Plant">
                <div class="relative">
                 <img src="{{ asset('images/polka-dot-plant.jpg') }}"
                         alt="polka-dot-plant" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Polka Dot Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">A charming little foliage plant with cheery pink speckles over deep-green leaves. In addition to pink, cultivars sporting white or red dots are also available.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Polka Dot Plant', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--AFRICAN VIOLET-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="African Violet">
                <div class="relative">
                 <img src="{{ asset('images/african-violet.jpg') }}"
                         alt="African Violet" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">African Violet</h3>
                    <p class="text-gray-600 text-sm mb-2">Thousands of cultivars give you a choice of almost any flower color, as well as single, double, and bicolored blooms.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('African Violet', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--AIR PLANT-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="500.00" data-name="Air-Plant">
                <div class="relative">
                 <img src="{{ asset('images/air-plant.jpg') }}"
                         alt="Air-Plant" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Air-Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">Air plants put down no roots and receive nutrients and moisture through their leaves.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.500.00</span>
                        <button onclick="addToCart('Air-Plant', 500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--ALOCASIA-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Alocasia">
                <div class="relative">
                 <img src="{{ asset('images/alocasia.jpg') }}"
                         alt="Alocasia" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Alocasia</h3>
                    <p class="text-gray-600 text-sm mb-2">Given the right conditions, these lush and leafy tropical plants can thrive indoors in well-lit areas, making them a bold focal point of any sunny room.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Alocasia', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--SNAKE PLANT-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1550.00" data-name="Snake Plant">
                <div class="relative">
                 <img src="{{ asset('images/snake plant.jpg') }}"
                         alt="Snake Plant" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snake Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">Also called mother-in-law's tongue, this hardy houseplant is almost impossible to kill.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1550.00</span>
                        <button onclick="addToCart('Snake Plant', 1550.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--JADE PLANT-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Jade Plant">
                <div class="relative">
                 <img src="{{ asset('images/jade-plant.jpg') }}"
                         alt="Jade Plant" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Jade Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">Jade plants can live for decades and are easy to propagate from leaf or stem cuttings.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Jade Plant', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--SPIDER PLANT-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2000.00" data-name="Spider Plant">
                <div class="relative">
                 <img src="{{ asset('images/spider-plant.jpg') }}"
                         alt="Spider Plant" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Spider Plant</h3>
                    <p class="text-gray-600 text-sm mb-2">One of the easiest plants to propagate.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.1)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2000.00</span>
                        <button onclick="addToCart('Spider Plant',2000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--KALANCHOE-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Kalanchoe">
                <div class="relative">
                 <img src="{{ asset('images/kalanchoe.jpg') }}"
                         alt="Kalanchoe" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Kalanchoe</h3>
                    <p class="text-gray-600 text-sm mb-2">When kalanchoes bloom, the flowers can last for several weeks.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.6)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Kalanchoe', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--HAWORTHIA-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Haworthia">
                <div class="relative">
                 <img src="{{ asset('images/haworthia.jpg') }}"
                         alt="Haworthia" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Haworthia</h3>
                    <p class="text-gray-600 text-sm mb-2">Ideal for narrow windowsills, the slow-growing succulent remains neat and compact.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Haworthia', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--ALOE-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="350.00" data-name="Aloe Vera">
                <div class="relative">
                 <img src="{{ asset('images/aloe-vera.jpg') }}"
                         alt="Aloe Vera" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Aloe Vera</h3>
                    <p class="text-gray-600 text-sm mb-2">Aloes prefer tight quarters and keeping them slightly root bound may help promote blooming, which doesn't always happen when they are grown indoors.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.350.00</span>
                        <button onclick="addToCart('Aloe Vera', 350.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
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
    @include('partial.footer')

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