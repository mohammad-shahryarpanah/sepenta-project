<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Product 1',
            'sku' => 'SKU001',
            'slug' => 'product-1',
            'status' => 1,
            'price' => 1000,
            'discount_price' => 800,
            'description' => 'Description for product 1'
        ]);
    }
}
