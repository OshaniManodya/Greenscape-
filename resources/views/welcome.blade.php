@extends('layouts.app')

@section('content')
<div class="text-center py-12">
    <h1 class="text-4xl font-bold text-green-700 mb-6">Welcome to GreenScape</h1>
    <p class="text-lg mb-8">Your one-stop solution for all gardening and landscaping needs</p>
    
    <div class="flex justify-center space-x-4">
        <a href="{{ route('login') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
            Login
        </a>
        <a href="{{ route('register') }}" class="bg-white text-green-600 px-6 py-3 rounded-lg border border-green-600 hover:bg-green-50 transition">
            Register
        </a>
    </div>
</div>
@endsection