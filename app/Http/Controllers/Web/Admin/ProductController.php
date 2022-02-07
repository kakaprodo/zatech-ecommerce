<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('products.index');
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
}
