<?php

namespace App\Services;

use App\Models\Product;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\SearchProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;


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

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return $product->fresh();
    }

    public function searchProduct(SearchProductRequest $request)
    {
        $value = $request->search_value;

        return Product::where('name', 'like', "%{$value}%")->paginate();
    }

    public function delete(Product $product)
    {
        $product->delete();
    }
}
