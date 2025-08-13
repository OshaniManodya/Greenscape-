<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo/Brand -->
            <div class="flex items-center">
                <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                <a href="{{ route('home') }}" class="text-xl font-bold text-green-800">GreenScape</a>
            </div>

            <!-- Primary Navigation (Desktop) -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 transition duration-300 flex items-center">
                    Home
                </a>
                
                <!-- Plants Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-green-600 transition duration-300 flex items-center">
                        Plants <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg mt-2 w-48 z-50">
                        <a href="{{ route('plants.indoor') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">Indoor Plants</a>
                        <a href="{{ route('plants.outdoor') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">Outdoor Plants</a>
                        <a href="{{ route('plants.herb') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">Herb Plants</a>
                        <a href="{{ route('plants.flowering') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">Flowering Plants</a>
                    </div>
                </div>
                
                <a href="{{ route('landscaping') }}" class="text-gray-700 hover:text-green-600 transition duration-300 flex items-center">
                    Landscaping
                </a>
                <a href="{{ route('service') }}" class="text-gray-700 hover:text-green-600 transition duration-300 flex items-center">
                    Services
                </a>
            </div>

            <!-- Right Side Navigation -->
            <div class="flex items-center space-x-4">
                <!-- Cart -->
                <a href="{{ route('cart') }}" class="text-gray-700 hover:text-green-600 transition duration-300 relative">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-green-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs" id="cart-count">0</span>
                </a>

                <!-- Authentication Links -->
                @auth
                    <!-- User Dropdown -->
                    <div class="relative group ml-4">
                        <button class="flex items-center space-x-1 text-gray-700 hover:text-green-600">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-green-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Login/Register Links -->
                    <a href="{{ route('login') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="text-gray-500 hover:text-green-600 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" onclick="toggleMobileMenu()">
                    <span class="sr-only">Open main menu</span>
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:text-green-600">Home</a>
            
            <!-- Mobile Plants Dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="w-full flex justify-between items-center px-3 py-2 text-gray-700 hover:text-green-600">
                    <span>Plants</span>
                    <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </button>
                <div x-show="open" class="pl-4">
                    <a href="{{ route('plants.indoor') }}" class="block px-3 py-2 text-gray-700 hover:text-green-600">Indoor Plants</a>
                    <a href="{{ route('plants.outdoor') }}" class="block px-3 py-2 text-gray-700 hover:text-green-600">Outdoor Plants</a>
                    <a href="{{ route('plants.herb') }}" class="block px-3 py-2 text-gray-700 hover:text-green-600">Herb Plants</a>
                    <a href="{{ route('plants.flowering') }}" class="block px-3 py-2 text-gray-700 hover:text-green-600">Flowering Plants</a>
                </div>
            </div>
            
            <a href="{{ route('landscaping') }}" class="block px-3 py-2 text-gray-700 hover:text-green-600">Landscaping</a>
            <a href="{{ route('service') }}" class="block px-3 py-2 text-gray-700 hover:text-green-600">Services</a>
            
            @auth
                <a href="{{ route('profile') }}" class="block px-3 py-2 text-gray-700 hover:text-green-600">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 text-gray-700 hover:text-green-600">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 text-green-600 font-medium">Login</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 text-green-600 font-medium">Register</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>