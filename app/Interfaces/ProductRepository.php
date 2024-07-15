<?php

namespace App\Interfaces;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }


    public function create($value)
    {
        return Product::create([
            'title' => $value['title'],
            'sku' => 'SKU331',
            'slug' => $value['slug'],
            'status' =>$value['status'],
            'price' => $value['price'],
            'discount_price' => $value['discount_price'],
            'description' => $value['description']
        ]);
    }

    public function update($id, $value)
    {
        return Product::query()->where('id',$id)->update([
            'title' => $value['title'],
            'sku' => 'SKU331',
            'slug' => $value['slug'],
            'status' =>$value['status'],
            'price' => $value['price'],
            'discount_price' => $value['discount_price'],
            'description' => $value['description']
        ]);
    }

    public function delete($id)
    {
        return Product::destroy($id);
    }
}
