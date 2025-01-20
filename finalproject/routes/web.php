<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/welcome', function () {
    return view('welcome'); 
});

Route::get('/', function () {
    return view('customer.home'); // This will load the 'home.blade.php' view.
})->name('home');




// Registration Routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// Logout Route (POST method)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product Routes
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index'); // Shop page with all products
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show'); // Product detail page




Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// Shop Route (All products with pagination)
Route::get('/shop', [ProductController::class, 'index'])->name('customer.shop');

// Product Detail Route (View a single product by ID)
Route::get('/product/{id}', [ProductController::class, 'show'])->name('customer.product');

use App\Http\Controllers\CartController;

Route::prefix('cart')->group(function () {
    // Cart index (view cart)
    Route::get('/', [CartController::class, 'index'])->name('customer.cart');
    
    // Add product to cart
    Route::post('/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    
    // Remove product from cart
    Route::delete('/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
    
    // Update product quantity in cart
    Route::post('/update/{productId}', [CartController::class, 'update'])->name('cart.update');
});

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');


use App\Http\Controllers\CheckoutController;

Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');



use App\Http\Controllers\OrderController;


// Show the checkout page (from the cart page)
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

// Process the checkout form (place order)
Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('checkout.process');

// Show the order confirmation page after placing the order
Route::get('/order/{order}', [OrderController::class, 'showOrder'])->name('customer.order');

// Define the shop route
Route::get('/shop', [ProductController::class, 'index'])->name('shop');