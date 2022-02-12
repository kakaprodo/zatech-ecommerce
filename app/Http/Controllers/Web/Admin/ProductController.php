<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->allProducts();

        return view('products.index')->withProducts($products);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->create($request);

        return redirect()
            ->route('admin.products.index')
            ->withSuccess('Product successfully created');
    }

    public function show(Product $product)
    {
        return view('products.show')->withProduct($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productService->update($request, $product);

        return redirect()
            ->route('admin.products.index')
            ->withSuccess('Product successfully updated');
    }
}
