<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Create a sample order
        $order = Order::create([
            'user_id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'address' => '123 Main Street',
            'total' => 100.00,
            'status' => 'processing',
        ]);

        // Get some products to attach to the order
        $products = Product::take(2)->get(); // Get first 2 products for example

        // Attach products to the order with quantity
        foreach ($products as $product) {
            $order->products()->attach($product->id, ['quantity' => 1]);
        }
    }
}
