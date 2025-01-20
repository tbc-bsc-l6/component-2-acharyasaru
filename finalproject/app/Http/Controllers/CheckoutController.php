<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Show the checkout page
    public function showCheckoutPage()
    {
        return view('customer.checkout');
    }

    // Process the checkout form submission
    public function processCheckout(Request $request)
    {
        // Validate the checkout form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
        ]);

        // For now, we just simulate order processing
        session()->flash('success', 'Your order has been placed successfully!');

        // Clear the cart (in a real scenario, you'd save the order to the database)
        session()->forget('cart');

        // Redirect to the cart page or a success page
        return redirect()->route('cart')->with('success', 'Order placed successfully!');
    }
}
