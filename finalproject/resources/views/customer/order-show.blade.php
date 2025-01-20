@extends('layout')

@section('title', 'Order Confirmation')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Order Confirmation</h1>

        <div class="bg-white p-8 rounded-xl shadow-lg">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Order Details</h2>
                <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full text-sm font-semibold">{{ ucfirst($order->status) }}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="space-y-4">
                    <p class="text-gray-700"><strong>Order ID:</strong> #{{ $order->id }}</p>
                    <p class="text-gray-700"><strong>Name:</strong> {{ $order->name }}</p>
                    <p class="text-gray-700"><strong>Email:</strong> {{ $order->email }}</p>
                    <p class="text-gray-700"><strong>Shipping Address:</strong> {{ $order->address }}</p>
                    <p class="text-gray-700"><strong>Total Price:</strong> ${{ number_format($order->total, 2) }}</p>
                </div>

                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">Payment Method</h3>
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <p class="text-gray-700">Cash on Delivery</p>
                    </div>
                </div>
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Ordered Products</h3>
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <ul class="space-y-4 text-gray-700">
                    @foreach($order->products as $product)
                        <li class="flex justify-between items-center">
                            <div>
                                <span class="font-semibold">{{ $product->name }}</span> 
                                <span class="text-sm text-gray-500">x{{ $product->pivot->quantity }}</span>
                            </div>
                            <span class="font-semibold text-gray-800">${{ number_format($product->price, 2) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-between items-center mt-8">
                <a href="{{ route('shop') }}" class="inline-block bg-blue-600 text-white py-3 px-6 rounded-lg text-center hover:bg-blue-500 transition duration-300">
                    Continue Shopping
                </a>
                <a href="{{ route('customer.order-show', $order->id) }}" class="inline-block bg-gray-300 text-gray-800 py-3 px-6 rounded-lg text-center hover:bg-gray-200 transition duration-300">
                    View Order Again
                </a>
            </div>
        </div>
    </div>
@endsection
