<?php

namespace Database\Seeders;

use App\Models\SpecificationProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpecificationProduct::create([
            'product_id' => 1,
            'specification_id' => 1
        ]);
    }
}
