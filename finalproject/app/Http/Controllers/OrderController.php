<?php 
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Show the checkout form.
     *
     * @return \Illuminate\View\View
     */
    public function checkout()
    {
        // Get the cart data from session (assuming cart data is stored in the session)
        $cart = session()->get('cart', []);

        // Check if cart is empty
        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        // Calculate total price of the cart
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        return view('customer.checkout', compact('cart', 'total'));
    }

    /**
     * Process the checkout and place the order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCheckout(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:1000',
        ]);

        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        // If the cart is empty, redirect back to the shop
        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        // Calculate the total order amount
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Create a new order
        $order = Order::create([
            'user_id' => Auth::id(),  // Use Auth::id() to link the order to a logged-in user (if applicable)
            'name' => $validated['name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'total' => $total,
            'status' => 'processing',  // Default status
        ]);

        // Attach the products to the order
        foreach ($cart as $productId => $item) {
            $order->products()->attach($productId, ['quantity' => $item['quantity']]);
        }

        // Clear the cart session after placing the order
        session()->forget('cart');

        // Redirect to the order confirmation page
        return redirect()->route('customer.place-order', $order->id)->with('success', 'Your order has been placed successfully!');
    }

    /**
     * Show the order confirmation page.
     *
     * @param  int  $orderId
     * @return \Illuminate\View\View
     */
    public function showOrder($orderId)
    {
        // Retrieve the order with its associated products
        $order = Order::with('products')->findOrFail($orderId);

        return view('customer.place-order', compact('order'));
    }
}
