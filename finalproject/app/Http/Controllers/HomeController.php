<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the homepage with featured products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch featured products (you can adjust the query based on your needs)
        $featuredProducts = Product::where('is_featured', true)->take(4)->get();

        // Return the home view with the featured products
        return view('customer.home', compact('featuredProducts'));
    }
}
