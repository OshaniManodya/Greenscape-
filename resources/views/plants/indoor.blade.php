@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-green-700 mb-6">Indoor Plants</h1>
        
        <!-- Your indoor plants specific content here -->
        <p class="text-gray-600 mb-4">Discover our collection of plants perfect for indoor spaces.</p>
        
        <!-- Example plant listing -->
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($indoorPlants as $plant)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="{{ asset($plant->image) }}" alt="{{ $plant->name }}" class="w-full h-48 object-cover mb-4">
                    <h3 class="text-xl font-semibold">{{ $plant->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ $plant->description }}</p>
                    <span class="text-green-600 font-bold">Rs. {{ $plant->price }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection