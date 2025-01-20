<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'E-commerce Website')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom styles (optional) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @stack('styles') <!-- For additional styles -->
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-900 text-white p-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a class="text-2xl font-bold" href="{{ url('/') }}">E-Shop</a>
            <div class="space-x-4 hidden md:flex">
                <a href="{{ url('/') }}" class="hover:text-gray-400">Home</a>
                <a href="{{ url('/shop') }}" class="hover:text-gray-400">Shop</a>
                <a href="{{ url('/about') }}" class="hover:text-gray-400">About Us</a>
                <a href="{{ url('/contact') }}" class="hover:text-gray-400">Contact</a>
                <a href="{{ url('/cart') }}" class="hover:text-gray-400">Cart </a>
                
            </div>
            <button class="md:hidden text-white" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden mt-4 space-y-2 text-center">
            <a href="{{ url('/') }}" class="block hover:text-gray-400">Home</a>
            <a href="{{ url('/shop') }}" class="block hover:text-gray-400">Shop</a>
            <a href="{{ url('/about') }}" class="block hover:text-gray-400">About Us</a>
            <a href="{{ url('/contact') }}" class="block hover:text-gray-400">Contact</a>
            <a href="{{ url('/cart') }}" class="block hover:text-gray-400">Cart</a>
            @auth
                <a href="{{ url('/dashboard') }}" class="block hover:text-gray-400">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block hover:text-gray-400">Login</a>
            @endauth
        </div>
    </nav>

    <!-- Main content section -->
    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h5 class="font-bold text-xl mb-4">About E-Shop</h5>
                <p>Your one-stop shop for all things amazing. We offer a wide variety of products at great prices.</p>
            </div>
            <div>
                <h5 class="font-bold text-xl mb-4">Quick Links</h5>
                <ul>
                    <li><a href="{{ url('/') }}" class="hover:text-gray-400">Home</a></li>
                    <li><a href="{{ url('/shop') }}" class="hover:text-gray-400">Shop</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:text-gray-400">About Us</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-gray-400">Contact</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-bold text-xl mb-4">Contact Us</h5>
                <ul>
                    <li>Email: support@eshop.com</li>
                    <li>Phone: 1-800-123-4567</li>
                    <li>Address: 123 E-Shop St., City, Country</li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-8">
            &copy; {{ date('Y') }} E-Shop. All rights reserved.
        </div>
    </footer>

    <!-- Tailwind Scripts -->
    <script>
        // Toggle mobile menu
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>

    @stack('scripts') <!-- For additional scripts -->
</body>
</html>
