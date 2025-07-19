@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-green-700 mb-6">{{ $pageTitle }}</h1>
    
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($indoorPlants as $plant)
        <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition">
            <img src="{{ asset('storage/'.$plant->image) }}" 
                 alt="{{ $plant->name }}"
                 class="w-full h-48 object-cover mb-4 rounded-lg">
            <h3 class="text-xl font-semibold">{{ $plant->name }}</h3>
            <p class="text-gray-600 mb-2">{{ $plant->description }}</p>
            <div class="flex justify-between items-center">
                <span class="text-green-600 font-bold">Rs. {{ number_format($plant->price, 2) }}</span>
                <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection