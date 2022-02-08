<?php

namespace App\Services;

use App\Models\Product;
use App\Http\Requests\Products\StoreProductRequest;


class ProductService
{
    public function allProducts()
    {
        return Product::paginate();
    }

    public function create(StoreProductRequest $request)
    {
        return Product::create($request->validated());
    }

    public static function findTheDiscount($price)
    {
        if ($price >= 50 &&  $price <= 100) return 0;

        if ($price >= 112 &&  $price <= 115) return 0.25;

        if ($price >= 120) return 0.50;

        return 0;
    }
}
