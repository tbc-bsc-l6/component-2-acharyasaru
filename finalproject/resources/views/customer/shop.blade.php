@extends('layout')

@section('title', 'Shop')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Shop Our Products</h1>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ asset('images/'.$product->image) }}" class="w-full h-64 object-cover" alt="{{ $product->name }}">
                    <div class="p-4">
                        <h5 class="font-semibold text-lg mb-2">{{ $product->name }}</h5>
                        <p class="text-gray-700 text-lg">${{ number_format($product->price, 2) }}</p>

                        <!-- Add to Cart Button -->
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-400 w-full">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
@endsection
