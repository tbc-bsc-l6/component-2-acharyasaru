<?php

// app/Http/Controllers/ShopController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller 
{
    public function index(Request $request)
    {
        // Base query for products
        $query = Product::query();

        // Filter by price range
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        // Sorting
        if ($request->has('sort_by')) {
            $sort = $request->sort_by;
            if ($sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            } elseif ($sort == 'name_asc') {
                $query->orderBy('name', 'asc');
            } elseif ($sort == 'name_desc') {
                $query->orderBy('name', 'desc');
            }
        }

        // Get products with pagination
        $products = $query->paginate(8); // Adjust pagination as necessary

        return view('customer.shop', compact('products'));
    }
}
