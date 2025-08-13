@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto my-10 bg-white p-8 rounded-xl shadow-md">
    <div class="text-center mb-8">
        <i class="fas fa-leaf text-green-500 text-5xl mb-4"></i>
        <h2 class="text-3xl font-bold text-gray-800">Create Account</h2>
        <p class="text-gray-600 mt-2">Join GreenScape today</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="w-full px-4 py-2 border border-gray-500 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('name') @enderror"
                   placeholder="John Doe">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
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

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="w-full px-4 py-2 border border-gray-500 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                   placeholder="••••••••">
        </div>

        <button type="submit" class="w-full bg-green-600 text-white py-3 px-4 rounded-lg hover:bg-green-700 transition duration-300 font-medium">
            Create Account
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-600">Already have an account? 
            <a href="{{ route('login') }}" class="text-green-600 font-medium hover:text-green-800">
                Sign in
            </a>
        </p>
    </div>
</div>
@endsection