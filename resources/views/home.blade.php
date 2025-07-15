<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Greenscape - Transform Your Garden </title>
        <link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel ="stylesheet">
</head>
<body class="bg-gray-50">
    <!--Navigation-->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class ="max-w-7xl mx-auto px-4">
                <div class ="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <i class="flex items-center"></i>
                        <span class="text-xl font-bold text-green-800"> Greenscape</span>
                    </div>       
                    <div class="hidden md:flex space-x-8">
                        <a href="#home" class="text-gray-700 hover:text-green-600 transition-duration-300">Home</a>
                        <div class="relative group">
                            <a href="#" class="text-gray-700 hover:text-green-600 transition-duration-300">Plants</a>
                            <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg mt-2 w-48">
                                <a href="indoor-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Indoor Plants </a>
                                <a href="indoor-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Outdoor Plants </a>
                                <a href="indoor-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Herb Plants </a>
                                <a href="indoor-plants.php" class="block px-4 py-2 text-gray-700 hover:bg-green-50"> Flowering plants </a>
                            </div>
                        </div>   
                        <a href="#home" class="text-gray-700 hover:text-green-600 transition-duration-300">Landscaping</a>
                        <a href="#home" class="text-gray-700 hover:text-green-600 transition-duration-300">Service</a>
                        <a href="#home" class="text-gray-700 hover:text-green-600 transition-duration-300">Booking</a>
                    </div>     

                    <div class="flex items-center space-x-4" >
                        <a href="cart.php" class="text-gray-700 hover:text-green-600 transition-duration-300">
                            <i class="fas fa-shopping-cart text-xl"></i>
                            <span class="bg-green-600 text-white rounded-full px-2 py-1 text-xs ml-1" id="cart-count"></span>
                        </a>    
                        <button onclick="openModel('loginModel')" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">Login</button>
                        <button onclick="openModel('registerModel')" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300">Register</button>
                    </div>
                </div>
         </div>    
    </nav>        
    <!--Hero section with image slider-->
    <section class="slider-container">
        <div class="slider-track" id="slider-track">
            <div class="slider-slide" style="background-image: url('{{ asset('images/landscaping01.jpg') }}');">
                <div class="gradient-overlay w-full h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <hl class="text-5xl font-bold mb-4">Transform Your Garden</h1>
                        <p class="text-xl mb-8">Create beautiful landscapes with our expert services</p>
                        <button class="bg-white text-green-600 px-8 py-3 rounded-lg text-lg font-semubold btn-hover">Get started</button> 
                    </div>
                </div>
            </div> 
            
            <div class="slider-slide" style="background-image: url('{{ asset('images/landscaping02.jpg') }}');">
                <div class="gradient-overlay w-full h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <hl class="text-5xl font-bold mb-4">Premium Plant Collection</h1>
                        <p class="text-xl mb-8">Discover our wide range of indoor and outdoor plants</p>
                        <button class="bg-white text-green-600 px-8 py-3 rounded-lg text-lg font-semubold btn-hover">Get started</button> 
                    </div>
                </div>
            </div>    

            <div class="slider-slide" style="background-image: url('{{ asset('images/landscaping03.jpg') }}');">
                <div class="gradient-overlay w-full h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <hl class="text-5xl font-bold mb-4">Professional Landscaping</h1>
                        <p class="text-xl mb-8">Let us design your dream garden</p>
                        <button class="bg-white text-green-600 px-8 py-3 rounded-lg text-lg font-semubold btn-hover">Get started</button> 
                    </div>
                </div>
            </div>    

            <div class="slider-slide" style="background-image: url('{{ asset('images/landscaping04.jpg') }}');">
                <div class="gradient-overlay w-full h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <hl class="text-5xl font-bold mb-4">Convenient Booking </h1>
                        <p class="text-xl mb-8">You can keep trust on us.</p>
                        <button class="bg-white text-green-600 px-8 py-3 rounded-lg text-lg font-semubold btn-hover">Get started</button> 
                    </div>
                </div>
            </div> 
        </div> 
        
        <!--Slider Navigation-->
        <div class="absolute bottom-4 left-1/2 transform-translate-x-1/2 flex space-x-2">
            <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition duration-300" onclick="goToSlide(0)"></button>
            <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition duration-300" onclick="goToSlide(0)"></button>
            <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition duration-300" onclick="goToSlide(0)"></button>
        </div>
    </section>        









