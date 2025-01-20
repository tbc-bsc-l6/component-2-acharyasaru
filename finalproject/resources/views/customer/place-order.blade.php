@extends('layout')

@section('title', 'Order Confirmation')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-8 text-center">Thank You for Your Order!</h1>

        <!-- Success Message -->
        @if(session('order_success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                {{ session('order_success') }}
            </div>
        @endif

        <!-- Order Details -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6">Order Summary</h2>

            <!-- Customer Info -->
            <div class="mb-6">
                <h3 class="font-medium text-lg text-gray-700">Customer Information</h3>
                <p class="text-gray-600">Name: {{ $order->name }}</p>
                <p class="text-gray-600">Email: {{ $order->email }}</p>
                <p class="text-gray-600">Shipping Address: {{ $order->address }}</p>
            </div>

            <!-- Products List -->
            <div class="mb-6">
                <h3 class="font-medium text-lg text-gray-700">Products Ordered</h3>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Product</th>
                            <th class="px-4 py-2 text-left">Quantity</th>
                            <th class="px-4 py-2 text-left">Price</th>
                            <th class="px-4 py-2 text-left">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->products as $product)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ $product->pivot->quantity }}</td>
                                <td class="px-4 py-2">${{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-2">${{ number_format($product->pivot->quantity * $product->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Total Amount -->
            <div class="flex justify-between items-center font-semibold text-xl mt-4">
                <span>Total:</span>
                <span>${{ number_format($order->total, 2) }}</span>
            </div>
        </div>

    </div>
@endsection
