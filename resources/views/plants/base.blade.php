@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-green-700 mb-6">{{ $pageTitle }}</h1>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($plants as $plant)
        <div class="bg-white rounded-lg shadow-md p-4">
            <img src="{{ asset('storage/'.$plant->image) }}" 
                 alt="{{ $plant->name }}"
                 class="w-full h-48 object-cover mb-4">
            <h3 class="text-xl font-semibold">{{ $plant->name }}</h3>
            <p class="text-gray-600 mb-2">{{ $plant->description }}</p>
            <span class="text-green-600 font-bold">Rs. {{ number_format($plant->price, 2) }}</span>
        </div>
        @endforeach
    </div>
</div>
@endsection