@extends('layout')

@section('title', 'Contact Us')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Contact Us Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-semibold text-gray-800 mb-4">Contact Us</h1>
            <p class="text-lg text-gray-600">
                We’d love to hear from you! Whether you have a question, feedback, or need support, our team is here to help.
            </p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Contact Form -->
        <div class="w-full max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <!-- Name Field -->
                <div class="mb-6">
                    <label for="name" class="block text-lg font-medium text-gray-700">Your Name</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg" value="{{ old('name') }}" required>
                </div>

                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-medium text-gray-700">Your Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" value="{{ old('email') }}" required>
                </div>

                <!-- Subject Field -->
                <div class="mb-6">
                    <label for="subject" class="block text-lg font-medium text-gray-700">Subject</label>
                    <input type="text" id="subject" name="subject" class="w-full p-3 border border-gray-300 rounded-lg" value="{{ old('subject') }}" required>
                </div>

                <!-- Message Field -->
                <div class="mb-6">
                    <label for="message" class="block text-lg font-medium text-gray-700">Your Message</label>
                    <textarea id="message" name="message" rows="6" class="w-full p-3 border border-gray-300 rounded-lg" required>{{ old('message') }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-600 text-white py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-200">
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        <!-- Display Contact Data (for debugging, can be removed later) -->
        @if(session('contact_data'))
            <div class="mt-12 bg-gray-100 p-6 rounded-lg">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Submitted Form Data:</h3>
                <pre class="text-gray-700">{{ json_encode(session('contact_data'), JSON_PRETTY_PRINT) }}</pre>
            </div>
        @endif

        <!-- Contact Info Section -->
        <div class="mt-12 text-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Get in Touch</h2>
            <p class="text-lg text-gray-700">
                Feel free to reach out to us through the following ways:
            </p>

            <div class="mt-8 space-y-4">
                <p class="text-lg text-gray-700">📞 Phone: +123 456 7890</p>
                <p class="text-lg text-gray-700">📧 Email: support@yourstore.com</p>
                <p class="text-lg text-gray-700">🏢 Address: 123 E-Commerce St, City, Country</p>
            </div>
        </div>
    </div>
@endsection
