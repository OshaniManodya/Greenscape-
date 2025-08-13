@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto my-10 bg-white p-8 rounded-xl shadow-md">
    <div class="text-center mb-8">
        <i class="fas fa-leaf text-green-500 text-5xl mb-4"></i>
        <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
        <p class="text-gray-600 mt-2">Sign in to your GreenScape account</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full px-4 py-2 border border-gray-500 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('email') @enderror"
                   placeholder="your@email.com">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full px-4 py-2 border border-gray-500 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('password') @enderror"
                   placeholder="••••••••">
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox"
                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Remember me
                </label>
            </div>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:text-green-800">
                    Forgot password?
                </a>
            @endif
        </div>

        <button type="submit" class="w-full bg-green-600 text-white py-3 px-4 rounded-lg hover:bg-green-700 transition duration-300 font-medium">
            Sign In
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-600">Don't have an account? 
            <a href="{{ route('register') }}" class="text-green-600 font-medium hover:text-green-800">
                Create one
            </a>
        </p>
    </div>
</div>
@endsection