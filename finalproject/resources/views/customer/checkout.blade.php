@extends('layout')

@section('title', 'Checkout')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-8 text-center">Checkout</h1>

        <!-- Display success message if order is placed -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <!-- Checkout Form -->
        <form action="{{ route('checkout.process') }}" method="POST" class="max-w-lg mx-auto space-y-6">
            @csrf

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-lg font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>

            <!-- Address Field -->
            <div>
                <label for="address" class="block text-lg font-medium text-gray-700">Shipping Address</label>
                <textarea id="address" name="address" rows="4" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="w-full py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">Place Order</button>
            </div>
        </form>
    </div>
@endsection
