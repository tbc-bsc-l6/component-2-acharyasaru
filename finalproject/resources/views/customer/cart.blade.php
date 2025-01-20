@extends('layout')

@section('title', 'Your Cart')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Your Shopping Cart</h1>

        <!-- Display success message if product is added/removed/updated -->
        @if(session('success'))
            <div class="mb-4 text-green-500">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="border-b">
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $productId => $item)
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <img src="{{ asset('images/'.$item['image']) }}" class="w-16 h-16 object-cover rounded" alt="{{ $item['name'] }}">
                                {{ $item['name'] }}
                            </td>
                            <td class="px-4 py-2">${{ number_format($item['price'], 2) }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('cart.update', $productId) }}" method="POST" class="flex items-center">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 px-2 py-1 border border-gray-300 rounded">
                                    <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-400">Update</button>
                                </form>
                            </td>
                            <td class="px-4 py-2">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('cart.remove', $productId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-400">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Total Price -->
            <div class="mt-6 text-right">
                <h2 class="text-2xl font-semibold">Total: ${{ number_format(array_sum(array_map(function($item) {
                    return $item['price'] * $item['quantity'];
                }, $cart)), 2) }}</h2>
            </div>

            <!-- Checkout Button -->
            <div class="mt-8 text-right">
                <a href="{{ route('checkout') }}" class="bg-green-600 text-white py-3 px-8 rounded-md hover:bg-green-500">Proceed to Checkout</a>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
