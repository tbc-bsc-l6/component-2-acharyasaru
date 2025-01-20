@extends('layout')

@section('title', 'Welcome to E-Shop')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Hero Section -->
        <div class="text-center py-20 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-lg">
            <h1 class="text-5xl font-bold mb-4">Welcome to E-Clothing</h1>
            <p class="text-lg mb-8">Discover a wide range of products at unbeatable prices. Shop your favorites today!</p>
            <a href="{{ url('/shop') }}" class="bg-yellow-500 text-white px-8 py-4 rounded-lg text-xl hover:bg-yellow-400">
                Start Shopping
            </a>
        </div>

        <!-- Featured Products Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-center mb-8">Featured Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($featuredProducts as $product)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img src="{{ asset('images/'.$product->image) }}" class="w-full h-64 object-cover" alt="{{ $product->name }}">
                        <div class="p-4">
                            <h5 class="font-semibold text-lg mb-2">{{ $product->name }}</h5>
                            <p class="text-gray-700">${{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('customer.product', $product->id) }}" class="mt-3 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-400">
                                View Product
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- About Section -->
        <div class="mt-20 text-center">
            <h2 class="text-3xl font-semibold mb-4">About E-Shop</h2>
            <p class="text-lg mb-8">E-Shop offers a broad range of products from electronics, fashion, home goods, and more. Our goal is to provide the best online shopping experience with top-quality customer service.</p>
            <a href="{{ url('/about') }}" class="bg-green-500 text-white px-8 py-4 rounded-lg text-xl hover:bg-green-400">
                Learn More About Us
            </a>
        </div>
    </div>
@endsection
