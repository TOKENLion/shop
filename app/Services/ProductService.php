<?php

namespace App\Services;

use App\Product;

class ProductService
{
    public function getAllProducts()
    {
        return Product::with('category', 'user')->get();
    }

    public function getOnceProduct($id = 0)
    {
        return Product::with('category', 'user')->findOrFail($id);
    }
}