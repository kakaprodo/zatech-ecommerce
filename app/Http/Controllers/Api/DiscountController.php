<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\DiscountService;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function index()
    {
        $discounts =  $this->discountService->getAll();

        return response()->json($discounts);
    }
}
