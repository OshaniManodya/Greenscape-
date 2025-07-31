<?php
// PHP session management and cart functionality - MUST be at the TOP of the file
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    
    // Validate credentials (in a real app, check against database)
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
    
    // Save user data (in a real app, save to database)
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
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
        
        /* Cart animations */
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
        
        @keyframes ripple {
            to {
                transform: scale(2);
                opacity: 0;
            }
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%); }
            100% { transform: translateX(100%) translateY(100%); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body>
    @include('partial.navbar')

    <div class="min-h-screen bg-gradient-to-br from-green-950 to-green-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white bg-opacity-95 backdrop-blur-md rounded-3xl shadow-xl overflow-hidden">
                <!-- Header Section -->
                <header class="relative text-center py-16 px-6 bg-gradient-to-br from-gray-800 to-green-500 text-white rounded-t-2xl overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute -top-1/2 -left-1/2 w-[200%] h-[200%] bg-[repeating-linear-gradient(45deg,transparent,transparent_2px,rgba(255,255,255,0.1)_2px,rgba(255,255,255,0.1)_4px)] animate-[shimmer_20s_linear_infinite]"></div>
                    </div>
                    <div class="relative z-10">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-shadow-lg">🌿 Our Professional Services</h1>
                        <p class="text-lg md:text-xl opacity-90">Transform your outdoor space with our comprehensive landscaping solutions</p>
                    </div>
                </header>

                <!-- Services Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-6 md:p-8">
                    <!-- Service Card 1 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-lg transition-all duration-400 ease-[cubic-bezier(0.175,0.885,0.32,1.275)] hover:-translate-y-2 hover:scale-[1.02] hover:shadow-2xl overflow-hidden group cursor-pointer">
                    <div class="absolute top-5 right-5 bg-red-500 text-white px-4 py-1 rounded-full text-sm font-bold animate-pulse">2-Year Warranty</div>
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-5 transition-transform duration-300 group-hover:rotate-[360deg] group-hover:scale-110">🌱</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Landscape Design & Installation</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Custom landscape design tailored to your vision and property needs. From concept to completion, we create stunning outdoor environments.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>3D Design Visualization</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Native Plant Selection</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Hardscape Integration</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Drainage Solutions</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Soil Analysis & Preparation</span>
                        </li>
                    </ul>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl text-center">
                        <div class="text-xl font-bold text-gray-800">Starting at $2,500</div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-all duration-500 group-hover:left-full"></div>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-lg transition-all duration-400 ease-[cubic-bezier(0.175,0.885,0.32,1.275)] hover:-translate-y-2 hover:scale-[1.02] hover:shadow-2xl overflow-hidden group cursor-pointer">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-5 transition-transform duration-300 group-hover:rotate-[360deg] group-hover:scale-110">🚿</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Smart Irrigation Systems</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Water-efficient irrigation solutions with smart controls and weather monitoring for optimal plant health and water conservation.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Drip Irrigation Systems</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Smart Controllers</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Rain Sensors</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Zone Programming</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Seasonal Adjustments</span>
                        </li>
                    </ul>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl text-center">
                        <div class="text-xl font-bold text-gray-800">Starting at $1,800</div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-all duration-500 group-hover:left-full"></div>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-lg transition-all duration-400 ease-[cubic-bezier(0.175,0.885,0.32,1.275)] hover:-translate-y-2 hover:scale-[1.02] hover:shadow-2xl overflow-hidden group cursor-pointer">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-5 transition-transform duration-300 group-hover:rotate-[360deg] group-hover:scale-110">✂️</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Landscape Maintenance</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Comprehensive year-round maintenance programs to keep your landscape looking pristine through all seasons.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Weekly/Monthly Service</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Pruning & Trimming</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Fertilization Programs</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Pest & Disease Control</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Seasonal Cleanups</span>
                        </li>
                    </ul>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl text-center">
                        <div class="text-xl font-bold text-gray-800">$150-400/month</div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-all duration-500 group-hover:left-full"></div>
                    </div>
                </div>

                <!-- Service Card 4 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-lg transition-all duration-400 ease-[cubic-bezier(0.175,0.885,0.32,1.275)] hover:-translate-y-2 hover:scale-[1.02] hover:shadow-2xl overflow-hidden group cursor-pointer">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-5 transition-transform duration-300 group-hover:rotate-[360deg] group-hover:scale-110">🌳</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Tree & Palm Services</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Professional tree care including installation, pruning, health assessment, and removal when necessary.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Tree Installation</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Crown Pruning</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Health Assessments</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Palm Trimming</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Emergency Removal</span>
                        </li>
                    </ul>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl text-center">
                        <div class="text-xl font-bold text-gray-800">$200-1,500</div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-all duration-500 group-hover:left-full"></div>
                    </div>
                </div>

                <!-- Service Card 5 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-lg transition-all duration-400 ease-[cubic-bezier(0.175,0.885,0.32,1.275)] hover:-translate-y-2 hover:scale-[1.02] hover:shadow-2xl overflow-hidden group cursor-pointer">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-5 transition-transform duration-300 group-hover:rotate-[360deg] group-hover:scale-110">🏗️</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Hardscaping & Masonry</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Custom stonework, patios, walkways, retaining walls, and outdoor living spaces built to last.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Paver Patios</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Natural Stone Work</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Retaining Walls</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Fire Pits & Features</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Outdoor Kitchens</span>
                        </li>
                    </ul>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl text-center">
                        <div class="text-xl font-bold text-gray-800">Starting at $3,500</div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-all duration-500 group-hover:left-full"></div>
                    </div>
                </div>

                <!-- Service Card 6 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-lg transition-all duration-400 ease-[cubic-bezier(0.175,0.885,0.32,1.275)] hover:-translate-y-2 hover:scale-[1.02] hover:shadow-2xl overflow-hidden group cursor-pointer">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-5 transition-transform duration-300 group-hover:rotate-[360deg] group-hover:scale-110">🌾</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Lawn Care & Sod Installation</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Complete lawn renovation services including sod installation, seeding, and ongoing turf management.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Sod Installation</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Lawn Renovation</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Artificial Turf</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Overseeding</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Soil Conditioning</span>
                        </li>
                    </ul>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl text-center">
                        <div class="text-xl font-bold text-gray-800">$1.50-3.00/sq ft</div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-all duration-500 group-hover:left-full"></div>
                    </div>
                </div>

                <!-- Service Card 7 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-lg transition-all duration-400 ease-[cubic-bezier(0.175,0.885,0.32,1.275)] hover:-translate-y-2 hover:scale-[1.02] hover:shadow-2xl overflow-hidden group cursor-pointer">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-5 transition-transform duration-300 group-hover:rotate-[360deg] group-hover:scale-110">💡</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Outdoor Lighting</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Enhance your landscape's beauty and security with professionally designed LED lighting systems.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>LED Path Lighting</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Accent Lighting</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Security Lighting</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Timer Controls</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Low-Voltage Systems</span>
                        </li>
                    </ul>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl text-center">
                        <div class="text-xl font-bold text-gray-800">Starting at $1,200</div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-all duration-500 group-hover:left-full"></div>
                    </div>
                </div>

                <!-- Service Card 8 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-lg transition-all duration-400 ease-[cubic-bezier(0.175,0.885,0.32,1.275)] hover:-translate-y-2 hover:scale-[1.02] hover:shadow-2xl overflow-hidden group cursor-pointer">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-5 transition-transform duration-300 group-hover:rotate-[360deg] group-hover:scale-110">🏡</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Property Cleanup & Restoration</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Complete property makeovers including debris removal, soil rehabilitation, and landscape restoration.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Debris Removal</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Overgrowth Clearing</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Soil Restoration</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Erosion Control</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Fresh Mulching</span>
                        </li>
                    </ul>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl text-center">
                        <div class="text-xl font-bold text-gray-800">$500-2,500</div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-all duration-500 group-hover:left-full"></div>
                    </div>
                </div>

                <!-- Service Card 9 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-lg transition-all duration-400 ease-[cubic-bezier(0.175,0.885,0.32,1.275)] hover:-translate-y-2 hover:scale-[1.02] hover:shadow-2xl overflow-hidden group cursor-pointer">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-5 transition-transform duration-300 group-hover:rotate-[360deg] group-hover:scale-110">🏢</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Commercial Landscaping</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Professional landscaping services for businesses, HOAs, and commercial properties with maintenance programs.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Property Assessment</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Curb Appeal Design</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Maintenance Contracts</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Seasonal Displays</span>
                        </li>
                        <li class="flex items-start text-gray-700">
                            <span class="text-green-500 font-bold mr-2">✓</span>
                            <span>Budget Planning</span>
                        </li>
                    </ul>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-xl text-center">
                        <div class="text-xl font-bold text-gray-800">Custom Quote</div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-all duration-500 group-hover:left-full"></div>
                    </div>
                </div>
            </div>    
                

                <!-- CTA Section -->
                <div class="relative bg-gradient-to-br from-green-600 to-green-500 text-white p-12 text-center rounded-b-2xl overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute -top-1/2 -left-1/2 w-[200%] h-[200%] bg-[radial-gradient(circle,rgba(255,255,255,0.1)_1px,transparent_1px)] bg-[length:20px_20px] animate-[float_15s_ease-in-out_infinite]"></div>
                    </div>
                    <div class="relative z-10">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Landscape?</h2>
                        <p class="text-lg md:text-xl mb-8">Get a free consultation and detailed quote for your project. Our experts are ready to bring your vision to life!</p>
                        <a href="#contact" class="inline-block bg-white text-green-600 px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                            Get Free Quote Today
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>   

    <!-- Footer -->
    @include('partial.footer')

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('loginModal')">&times;</span>
            <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
            <form method="POST" action="">
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
            <form method="POST" action="">
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
        // Cart functionality
        let cart = <?php echo json_encode($_SESSION['cart']); ?>;
        
        function addToCart(plantName, price, plantId, imageUrl) {
            const plant = {
                id: plantId,
                name: plantName,
                price: price,
                image: imageUrl,
                quantity: 1
            };
            
            // Send to server via AJAX
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(plant)
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('cart-count').textContent = data.cartCount;
                showNotification(`${plantName} added to cart!`);
            })
            .catch(error => console.error('Error:', error));
        }
        
        function updateCartCount() {
            document.getElementById('cart-count').textContent = cart.length;
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
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
        
        // Add ripple effect to buttons
        document.querySelectorAll('a[href="#contact"]').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    top: ${e.clientY - rect.top - size/2}px;
                    left: ${e.clientX - rect.left - size/2}px;
                    pointer-events: none;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    </script>
</body>
</html>