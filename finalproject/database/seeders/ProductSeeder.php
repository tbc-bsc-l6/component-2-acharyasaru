<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Sample Product 1',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Sample Product 2',
            'price' => 19.99,
            'description' => 'Description of Sample Product 2',
            'image' => 'sample-product2.jpg',
            'is_featured' => false,
        ]);

        Product::create([
            'name' => 'Sample Product 1',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Sample Product 1',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Sample Product 1',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Sample Product 1',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Sample Product 1',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Sample Product 1',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Sample Product 1',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Sample Product 1',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        
    }
}
