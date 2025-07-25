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
                                <a href="" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Indoor Plants</a>
                                <a href="" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Outdoor Plants</a>
                                <a href="" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Herb Plants</a>
                                <a href="" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Flowering Plants</a>

                            </div>
                        </div>   
                        <a href="" class="text-gray-700 hover:text-green-600 transition-duration-300">Landscaping</a>
                        <a href="" class="text-gray-700 hover:text-green-600 transition-duration-300">Service</a>
                        <a href="" class="text-gray-700 hover:text-green-600 transition-duration-300">Booking</a>
                    </div>     

                    <div class="flex items-center space-x-4" >
                        <a href="" class="text-gray-700 hover:text-green-600 transition duration-300">
                            <i class="fas fa-shopping-cart text-xl"></i>
                            <span class="bg-green-600 text-white rounded-full px-2 py-1 text-xs ml-1" id="cart-count">0</span>
                        </a>    
                        <button onclick="openModal('loginModal')" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">Login</button>
                    <button onclick="openModal('registerModal')" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300">Register</button>
                    </div>
                </div>
        </div>    
    </nav> 