@extends('layouts.app')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">  <!-- Fixed typo: "mx-auo" to "mx-auto" -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Featured Plants</h2>
            <p class="text-xl text-gray-600">Discover our most popular plants</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">  <!-- Added responsive columns -->
            @foreach($featuredPlants as $plant)  <!-- Use dynamic data instead of hardcoded -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $plant->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $plant->description }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs. {{ number_format($plant->price, 2) }}</span>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div> 
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

