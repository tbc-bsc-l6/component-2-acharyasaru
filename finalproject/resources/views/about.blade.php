@extends('layout')

@section('title', 'About Us')

@section('content')
    <div class="container mx-auto p-6">
        <!-- About Us Section -->
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-semibold text-gray-800 mb-4">About Us</h1>
            <p class="text-lg text-gray-600">
                Welcome to our online store! We are passionate about providing high-quality products and exceptional customer service. Our goal is to create a seamless shopping experience for you, where you can find everything you need with ease and confidence.
            </p>
        </div>

        <!-- Mission Section -->
        <div class="mb-12">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Our Mission</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                Our mission is to deliver the best products, carefully selected to meet the diverse needs of our customers. We are committed to providing exceptional value, quality, and service every time you shop with us.
            </p>
        </div>

        <!-- Vision Section -->
        <div class="mb-12">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Our Vision</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                We envision being a leading provider of high-quality products, trusted by our customers for our commitment to excellence, customer satisfaction, and innovation. We aim to foster long-lasting relationships with our customers by consistently exceeding their expectations.
            </p>
        </div>

        <!-- Team Section -->
        <div class="mt-12">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Meet Our Team</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{ asset('images/team-member-1.jpg') }}" alt="Team Member 1" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-gray-800">John Doe</h4>
                    <p class="text-gray-600">CEO & Founder</p>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{ asset('images/team-member-2.jpg') }}" alt="Team Member 2" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-gray-800">Jane Smith</h4>
                    <p class="text-gray-600">Marketing Manager</p>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{ asset('images/team-member-3.jpg') }}" alt="Team Member 3" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-gray-800">David Lee</h4>
                    <p class="text-gray-600">Product Specialist</p>
                </div>
            </div>
        </div>
    </div>
@endsection
