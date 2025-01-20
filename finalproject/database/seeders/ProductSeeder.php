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
            'name' => 'tshirt',
            'price' => 49.99,
            'description' => 'Description of Sample Product 1',
            'image' => 'images/cloth1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'bag',
            'price' => 19.99,
            'description' => 'Description of Sample Product 2',
            'image' => 'sample-product2.jpg',
            'is_featured' => false,
        ]);

        Product::create([
            'name' => 'sweater',
            'price' => 49.99,
            'description' => 'Description of Sample Product 3',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'pants',
            'price' => 49.99,
            'description' => 'Description of Sample Product 4',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'gloves',
            'price' => 49.99,
            'description' => 'Description of Sample Product 5',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'blazer',
            'price' => 49.99,
            'description' => 'Description of Sample Product 6',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'dress',
            'price' => 49.99,
            'description' => 'Description of Sample Product 7',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'shoes',
            'price' => 49.99,
            'description' => 'Description of Sample Product 8',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'socks',
            'price' => 49.99,
            'description' => 'Description of Sample Product 9',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'skirt',
            'price' => 49.99,
            'description' => 'Description of Sample Product 10',
            'image' => 'sample-product1.jpg',
            'is_featured' => true,
        ]);

        
        
        
    }
}
