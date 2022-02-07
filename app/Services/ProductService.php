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
}
