<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PurchaseService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseResource;
use App\Http\Requests\Purchases\StorePurchaseRequest;

class PurchaseController extends Controller
{
    protected $purchaseeService;

    public function __construct(PurchaseService $purchaseeService)
    {
        $this->purchaseeService = $purchaseeService;
    }

    public function store(StorePurchaseRequest $request)
    {
        $purchase = $this->purchaseeService->create($request);

        return response()->json([
            'message' => 'Successfully created',
            'purchase' => new PurchaseResource($purchase)
        ], Response::HTTP_CREATED);
    }
}
