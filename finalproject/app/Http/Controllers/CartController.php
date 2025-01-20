<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the cart page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the cart items from session
        $cart = session()->get('cart', []);
        return view('customer.cart', compact('cart'));
    }

    /**
     * Add a product to the cart.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $productId)
    {
        // Get the product from the database
        $product = Product::findOrFail($productId);

        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart
        if (isset($cart[$productId])) {
            // Increment the quantity if product is already in the cart
            $cart[$productId]['quantity']++;
        } else {
            // Add new product to the cart
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        // Update the cart in session
        session()->put('cart', $cart);

        return redirect()->route('customer.cart')->with('success', 'Product added to cart');
    }

    /**
     * Remove a product from the cart.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($productId)
    {
        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Remove product from the cart
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        // Update the cart in session
        session()->put('cart', $cart);

        return redirect()->route('customer.cart')->with('success', 'Product removed from cart');
    }

    /**
     * Update the quantity of a product in the cart.
     *
     * @param  int  $productId
     * @param  int  $quantity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $productId)
    {
        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Check if product exists in cart
        if (isset($cart[$productId])) {
            // Update the quantity
            $cart[$productId]['quantity'] = $request->quantity;
        }

        // Update the cart in session
        session()->put('cart', $cart);

        return redirect()->route('customer.cart')->with('success', 'Cart updated');
    }
}
