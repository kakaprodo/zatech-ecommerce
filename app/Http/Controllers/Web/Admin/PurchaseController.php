<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Services\PurchaseService;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    protected $purchaseService;

    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }

    public function index()
    {
        $purchases = $this->purchaseService->allPurchases();

        return view('purchases.index')->withPurchases($purchases);
    }
}
