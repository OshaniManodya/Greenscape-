@extends('layouts.app') {{-- If you have a layout file --}}
@section('title', 'Indoor Plants - GreenScape')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Indoor Plants</h2>
            <p class="text-xl text-gray-600">Bring nature indoors with our hand-picked indoor plant collection</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($plants as $plant)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/' . $plant['image']) }}" alt="{{ $plant['name'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $plant['name'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $plant['description'] }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rs.{{ number_format($plant['price'], 2) }}</span>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plant_id" value="{{ $plant['id'] }}">
                                <input type="hidden" name="plant_name" value="{{ $plant['name'] }}">
                                <input type="hidden" name="plant_price" value="{{ $plant['price'] }}">
                                <input type="hidden" name="plant_image" value="{{ $plant['image'] }}">
                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
