@extends('layout')

@section('title', 'Checkout')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Checkout</h1>

        <!-- Display success message if order is placed -->
        @if(session('success'))
            <div class="mb-4 text-green-500">
                {{ session('success') }}
            </div>
        @endif

        <!-- Checkout Form -->
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-lg font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Email Field -->
            <div class="mb-6">
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Address Field -->
            <div class="mb-6">
                <label for="address" class="block text-lg font-medium text-gray-700">Shipping Address</label>
                <textarea id="address" name="address" rows="4" class="w-full p-3 border border-gray-300 rounded-lg" required></textarea>
            </div>

            <!-- Payment Method -->
            <div class="mb-6">
                <label for="payment_method" class="block text-lg font-medium text-gray-700">Payment Method</label>
                <select id="payment_method" name="payment_method" class="w-full p-3 border border-gray-300 rounded-lg" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white py-3 px-8 rounded-lg hover:bg-blue-500">Place Order</button>
            </div>
        </form>
    </div>
@endsection
