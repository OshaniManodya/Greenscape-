<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'GreenScape') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    

    
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

<header class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                <span class="text-xl font-bold text-green-800">GreenScape</span>
            </div>
            
            <nav class="hidden md:flex space-x-8">
                <a href="{{ url('/home') }}" class="text-gray-700 hover:text-green-600 transition duration-300">Home</a>
                <a href="{{ url('/plants') }}" class="text-gray-700 hover:text-green-600 transition duration-300">Plants</a>
                <a href="{{ url('/landscaping') }}" class="text-gray-700 hover:text-green-600 transition duration-300">Landscaping</a>
                <a href="{{ url('/service') }}" class="text-gray-700 hover:text-green-600 transition duration-300">Services</a>
            </nav>
            
            <div class="flex items-center space-x-4">
                @auth
                    <div class="relative group">
                        <button class="flex items-center space-x-1 text-gray-700 hover:text-green-600">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-green-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>

<main class="flex-grow container mx-auto p-6">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif
    
    @yield('content')
</main>

</body>
</html>