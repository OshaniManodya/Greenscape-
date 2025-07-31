<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowering Plants - GreenScape</title>
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
            <h1 class="text-4xl font-bold mb-4">Flowering Plants Collection</h1>
            <p class="text-xl opacity-90">Make your garden colourfull not only green but in different colours.</p>
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
            
            <!-- Rose (Red) -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="600.00" data-name="Rose (Red)">
                <div class="relative">
                    <img src="{{ asset('images/Rose (Red).jpeg') }}" alt="Rose (Red)" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Popular
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Rose (Red)</h3>
                    <p class="text-gray-600 text-sm mb-2">Give any room a jungle-like vibe.</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.600.00</span>
                        <button onclick="addToCart('Rose (Red)', 600.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Orchid (Phalaenopsis)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Orchid (Phalaenopsis)">
                <div class="relative">
                    <img src="{{ asset('images/Orchid (Phalaenopsis).jpeg') }}" alt="Orchid (Phalaenopsis)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Orchid (Phalaenopsis)</h3>
                    <p class="text-gray-600 text-sm mb-2">Elegant white orchid with long-lasting blooms</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Orchid (Phalaenopsis)', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Philodendron -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Hibiscus (Red)">
                <div class="relative">
                    <img src="{{ asset('images/Hibiscus (Red).jpeg') }}"
                         alt="Philodendron" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Easy Care
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Hibiscus (Red)</h3>
                    <p class="text-gray-600 text-sm mb-2">Also called rattlesnake plant, peacock plant, or zebra plant, this popular houseplant is grown for its decorative foliage in an assortment of patterns</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Hibiscus (Red)', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sunflower (Giant) -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1600.00" data-name="Sunflower (Giant)">
                <div class="relative">
                    <img src="{{ asset('images/Sunflower (Giant).jpeg') }}" 
                         alt="Sunflower (Giant)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Sunflower (Giant)</h3>
                    <p class="text-gray-600 text-sm mb-2">Tall sunflowers with large yellow blooms</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.6)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1600.00</span>
                        <button onclick="addToCart('Sunflower (Giant)', 1600.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tulip (Mixed Colors) -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Tulip (Mixed Colors)">
                <div class="relative">
                    <img src="{{ asset('images/Tulip (Mixed Colors).jpeg') }}"
                         alt="Tulip (Mixed Colors)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Tulip (Mixed Colors)</h3>
                    <p class="text-gray-600 text-sm mb-2">Spring bulbs with colorful cup-shaped flowers</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Tulip (Mixed Colors)', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Lavender (English)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="ZZ Plant">
                <div class="relative">
                    <img src="{{ asset('images/Lavender (English).jpeg') }}" 
                         alt="Lavender (English)" class="w-full h-48 object-cover plant-image">
                    <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                        Medium Light
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Lavender (English)</h3>
                    <p class="text-gray-600 text-sm mb-2">Fragrant purple flowers with calming scent</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Lavender (English)', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Jasmine (Arabian)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1100.00" data-name="Jasmine (Arabian)">
                <div class="relative">
                    <img src="{{ asset('images/Jasmine (Arabian).jpeg') }}"
                         alt="Jasmine (Arabian)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Jasmine (Arabian)</h3>
                    <p class="text-gray-600 text-sm mb-2">Highly fragrant white flowers for gardens</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1100.00</span>
                        <button onclick="addToCart('Jasmine (Arabian)', 1100.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Marigold (African) -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="990.00" data-name="Marigold (African)">
                <div class="relative">
                    <img src="{{ asset('images/Marigold (African).jpeg') }}" 
                         alt="Marigold (African)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Marigold (African)</h3>
                    <p class="text-gray-600 text-sm mb-2">Bright orange-yellow flowers, easy to grow</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.990.00</span>
                        <button onclick="addToCart('Marigold (African)', 990.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dahlia (Pompon) -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="850.00" data-name="Dahlia (Pompon)">
                <div class="relative">
                    <img src="{{ asset('images/Dahlia (Pompon).jpeg') }}"
                         alt="Dahlia (Pompon)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Dahlia (Pompon)</h3>
                    <p class="text-gray-600 text-sm mb-2">Showy flowers with spherical blooms</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.850.00</span>
                        <button onclick="addToCart('Dahlia (Pompon)', 850.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Bougainvillea (Pink)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2000.00" data-name="Bougainvillea (Pink)">
                <div class="relative">
                    <img src="{{ asset('images/Bougainvillea (Pink).jpeg') }}"
                         alt="Bougainvillea (Pink)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Bougainvillea (Pink)</h3>
                    <p class="text-gray-600 text-sm mb-2">Vibrant pink paper-like flowers, great climber</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.7)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2000</span>
                        <button onclick="addToCart('Bougainvillea (Pink)', 2000)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Geranium (Zonal)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="675.00" data-name="Geranium (Zonal)">
                <div class="relative">
                    <img src="{{ asset('images/Geranium (Zonal).jpeg') }}"
                         alt="Geranium (Zonal)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Geranium (Zonal)</h3>
                    <p class="text-gray-600 text-sm mb-2">Popular container plant with colorful blooms</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.3)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.675.00</span>
                        <button onclick="addToCart('Geranium (Zonal)', 675.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Petunia (Grandiflora) -->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2500.00" data-name="Petunia (Grandiflora)">
                <div class="relative">
                 <img src="{{ asset('images/Petunia (Grandiflora).jpeg') }}"
                         alt="Tradescantia" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Petunia (Grandiflora)</h3>
                    <p class="text-gray-600 text-sm mb-2">Cascading flowers ideal for hanging baskets</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.2)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2500.00</span>
                        <button onclick="addToCart('Petunia (Grandiflora)', 2500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Hydrangea (Blue)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1800.00" data-name="Hydrangea (Blue)">
                <div class="relative">
                 <img src="{{ asset('images/Hydrangea (Blue).jpeg') }}"
                         alt="Hydrangea (Blue)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Hydrangea (Blue)</h3>
                    <p class="text-gray-600 text-sm mb-2">Large clusters of blue flowers</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.2)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1800.00</span>
                        <button onclick="addToCart('Hydrangea (Blue)',1800.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Pansy (Mixed)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="6500.00" data-name="Pansy (Mixed)">
                <div class="relative">
                 <img src="{{ asset('images/Pansy (Mixed).jpeg') }}"
                         alt="Pansy (Mixed)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Pansy (Mixed)</h3>
                    <p class="text-gray-600 text-sm mb-2">Cool-season flowers with "faces"</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.1)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.6500.00.00</span>
                        <button onclick="addToCart('Pansy (Mixed)', 6500.00.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Zinnia (Dwarf)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1500.00" data-name="Zinnia (Dwarf)">
                <div class="relative">
                 <img src="{{ asset('images/Zinnia (Dwarf).jpeg') }}"
                         alt="Zinnia (Dwarf)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Zinnia (Dwarf)</h3>
                    <p class="text-gray-600 text-sm mb-2">Bright, daisy-like flowers that attract butterflies</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1500.00</span>
                        <button onclick="addToCart('Zinnia (Dwarf)', 1500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Begonia (Tuberous)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1900.00" data-name="Begonia (Tuberous)">
                <div class="relative">
                 <img src="{{ asset('images/Begonia (Tuberous).jpeg') }}"
                         alt="Begonia (Tuberous)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Begonia (Tuberous)</h3>
                    <p class="text-gray-600 text-sm mb-2">Showy flowers for shady spots</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1900.00</span>
                        <button onclick="addToCart('Begonia (Tuberous)', 1900.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Azalea (Evergreen)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2200.00" data-name="Azalea (Evergreen)">
                <div class="relative">
                 <img src="{{ asset('images/Azalea (Evergreen).jpeg') }}"
                         alt="Azalea (Evergreen)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Azalea (Evergreen)</h3>
                    <p class="text-gray-600 text-sm mb-2">Spring-blooming shrub with vibrant colors</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2200.00</span>
                        <button onclick="addToCart('Azalea (Evergreen)', 2200.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Snapdragon (Tall)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1600.00" data-name="Snapdragon (Tall)">
                <div class="relative">
                 <img src="{{ asset('images/Snapdragon (Tall).jpeg') }}"
                         alt="Snapdragon (Tall)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Snapdragon (Tall)</h3>
                    <p class="text-gray-600 text-sm mb-2">Spikes of colorful flowers</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1600.00</span>
                        <button onclick="addToCart('Snapdragon (Tall)', 1600.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Foxglove (Purple)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1550.00" data-name="Foxglove (Purple)">
                <div class="relative">
                 <img src="{{ asset('images/Foxglove (Purple).jpeg') }}"
                         alt="Foxglove (Purple)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Foxglove (Purple)</h3>
                    <p class="text-gray-600 text-sm mb-2">Tall spikes of bell-shaped flowers</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1550.00</span>
                        <button onclick="addToCart('Foxglove (Purple)', 1550.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Peony (Pink)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2800.00" data-name="Peony (Pink)">
                <div class="relative">
                 <img src="{{ asset('images/Peony (Pink).jpeg') }}"
                         alt="Peony (Pink)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Peony (Pink)</h3>
                    <p class="text-gray-600 text-sm mb-2">Large, fragrant spring blooms</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2800.00</span>
                        <button onclick="addToCart('Peony (Pink)', 2800.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Cosmos (Bright Lights)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="2500.00" data-name="Cosmos (Bright Lights)">
                <div class="relative">
                 <img src="{{ asset('images/Cosmos (Bright Lights).jpeg') }}"
                         alt="Cosmos (Bright Lights)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Cosmos (Bright Lights)</h3>
                    <p class="text-gray-600 text-sm mb-2">Feathery foliage with daisy-like flowers</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.1)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.2500.00</span>
                        <button onclick="addToCart('Cosmos (Bright Lights)',2500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Iris (Bearded)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1900.00" data-name="Iris (Bearded)">
                <div class="relative">
                 <img src="{{ asset('images/Iris (Bearded).jpeg') }}"
                         alt="Iris (Bearded)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Iris (Bearded)</h3>
                    <p class="text-gray-600 text-sm mb-2">Elegant flowers with distinctive "beards"</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.6)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1900.00</span>
                        <button onclick="addToCart('Iris (Bearded)', 1900.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Fuchsia (Trailing)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1000.00" data-name="Fuchsia (Trailing)">
                <div class="relative">
                 <img src="{{ asset('images/Fuchsia (Trailing).jpeg') }}"
                         alt="Fuchsia (Trailing)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Fuchsia (Trailing)</h3>
                    <p class="text-gray-600 text-sm mb-2">Teardrop flowers perfect for hanging baskets</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-500 text-sm ml-2">(4.4)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1000.00</span>
                        <button onclick="addToCart('Fuchsia (Trailing)', 1000.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Gladiolus (Mixed)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="4500.00" data-name="Gladiolus (Mixed)">
                <div class="relative">
                 <img src="{{ asset('images/Gladiolus (Mixed).jpeg') }}"
                         alt="Aloe Vera" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Gladiolus (Mixed)</h3>
                    <p class="text-gray-600 text-sm mb-2">Tall flower spikes in various colors</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.4500.00</span>
                        <button onclick="addToCart('Gladiolus (Mixed)', 4500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Impatiens (New Guinea)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1700.00" data-name="Impatiens (New Guinea)">
                <div class="relative">
                 <img src="{{ asset('images/Impatiens (New Guinea).jpeg') }}"
                         alt="Impatiens (New Guinea)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Impatiens (New Guinea)</h3>
                    <p class="text-gray-600 text-sm mb-2">Colorful flowers for shady areas</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1700.00</span>
                        <button onclick="addToCart('Impatiens (New Guinea)', 1700.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Aster (New England)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="700.00" data-name="Aster (New England)">
                <div class="relative">
                 <img src="{{ asset('images/Aster (New England).jpeg') }}"
                         alt="Aster (New England)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Aster (New England)</h3>
                    <p class="text-gray-600 text-sm mb-2">Daisy-like flowers that bloom in fall</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.700.00</span>
                        <button onclick="addToCart('Aster (New England)', 700.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Balsam (Camellia Flowered)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="1300.00" data-name="Gladiolus (Mixed)">
                <div class="relative">
                 <img src="{{ asset('images/Balsam (Camellia Flowered).jpeg') }}"
                         alt="Balsam (Camellia Flowered)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Balsam (Camellia Flowered)</h3>
                    <p class="text-gray-600 text-sm mb-2">Annual with camellia-like blooms</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.1300.00.00</span>
                        <button onclick="addToCart('Balsam (Camellia Flowered)', 1300.00.)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--Canna Lily (Red)-->
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden" data-price="4500.00" data-name="Canna Lily (Red)">
                <div class="relative">
                 <img src="{{ asset('images/Canna Lily (Red).jpeg') }}"
                         alt="Canna Lily (Red)" class="w-full h-48 object-cover plant-image">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Canna Lily (Red)</h3>
                    <p class="text-gray-600 text-sm mb-2">Tropical-looking plant with bold foliage</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-green-600">Rs.4500.00</span>
                        <button onclick="addToCart('Canna Lily (Red)', 4500.00)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
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