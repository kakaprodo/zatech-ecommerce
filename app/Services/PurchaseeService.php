<?php

namespace App\Services;

use App\Http\Requests\Purchases\StorePurchaseRequest;


class PurchaseeService
{
    public function create(StorePurchaseRequest $request)
    {
        $customer = $request->user();

        $product = $request->product;

        $purchase = $customer->purchases()->create([
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'discount' => $request->discount,
            'discount_amount' => $request->discountAmount,
            'total' => $request->total
        ]);

        AccountBalanceService::chargeAccountForPurchase($purchase);

        return $purchase;
    }
}
