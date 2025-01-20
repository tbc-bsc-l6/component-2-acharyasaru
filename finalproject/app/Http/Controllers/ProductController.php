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

    /**
     * Show the form for creating a new product (Admin).
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created product in the database (Admin).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store product details in the database
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified product (Admin).
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    /**
     * Update the specified product in the database (Admin).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the product to update
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        // Update image if uploaded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image) {
                unlink(public_path('images') . '/' . $product->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from the database (Admin).
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the product to delete
        $product = Product::findOrFail($id);

        // Delete image if it exists
        if ($product->image) {
            unlink(public_path('images') . '/' . $product->image);
        }

        // Delete the product from the database
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }
}
