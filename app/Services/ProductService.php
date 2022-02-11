<?php

namespace App\Services;

use App\Http\Requests\Products\SearchProductRequest;
use App\Models\Product;
use App\Http\Requests\Products\StoreProductRequest;


class ProductService
{
    public function allProducts()
    {
        return Product::latest()->paginate();
    }

    public function create(StoreProductRequest $request)
    {
        return Product::create($request->validated());
    }

    public function searchProduct(SearchProductRequest $request)
    {
        $value = $request->search_value;

        return Product::where('name', 'like', "%{$value}%")->paginate();
    }
}
