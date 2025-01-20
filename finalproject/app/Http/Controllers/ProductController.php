<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display all products (shop page).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Paginate products (adjust the number to control how many products per page)
        $products = Product::paginate(12); // 12 products per page (adjust as needed)

        
        return view('customer.shop', compact('products'));
    }

    /**
     * Display the specified product (product detail page).
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Find the product by ID or fail if not found
        $product = Product::findOrFail($id);

        // Return the 'product.show' view with the product data
        return view('customer.product', compact('product'));
    }
}
