@extends('layout')

@section('title', 'Order Confirmation')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Order Confirmation</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Order Details</h2>

            <p><strong>Order ID:</strong> #{{ $order->id }}</p>
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Shipping Address:</strong> {{ $order->address }}</p>
            <p><strong>Total Price:</strong> ${{ number_format($order->total, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

            <h3 class="text-xl font-semibold mt-4 mb-2">Ordered Products</h3>
            <ul>
                @foreach($order->products as $product)
                    <li>{{ $product->name }} - Quantity: {{ $product->pivot->quantity }} - Price: ${{ number_format($product->price, 2) }}</li>
                @endforeach
            </ul>

            <a href="{{ route('shop') }}" class="mt-6 inline-block bg-blue-600 text-white py-3 px-8 rounded-lg hover:bg-blue-500">Back to Shop</a>
        </div>
    </div>
@endsection
