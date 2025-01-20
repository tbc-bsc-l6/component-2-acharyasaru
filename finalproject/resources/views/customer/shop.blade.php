@extends('layout')

@section('title', 'Shop')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Shop Our Products</h1>

        <!-- Filters -->
        <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Price Range Filter -->
            <div>
                <h3 class="font-semibold text-lg mb-2">Price Range</h3>
                <form action="{{ route('shop') }}" method="GET">
                    <div class="flex space-x-2">
                        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-1/2 p-3 border border-gray-300 rounded-lg">
                        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-1/2 p-3 border border-gray-300 rounded-lg">
                    </div>
                    <button type="submit" class="mt-3 w-full bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-400">Apply</button>
                </form>
            </div>

            <!-- Sort Filter -->
            <div>
                <h3 class="font-semibold text-lg mb-2">Sort By</h3>
                <form action="{{ route('shop') }}" method="GET">
                    <select name="sort_by" class="w-full p-3 border border-gray-300 rounded-lg">
                        <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                        <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Name: Z to A</option>
                    </select>
                    <button type="submit" class="mt-3 w-full bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-400">Apply</button>
                </form>
            </div>
        </div>

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
            {{ $products->appends(request()->except('page'))->links() }}
        </div>
    </div>
@endsection
