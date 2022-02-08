<?php

namespace App\Services;

use App\Http\Requests\Purchases\StorePurchaseRequest;


class PurchaseeService
{
    public function create(StorePurchaseRequest $request)
    {
        $customer = $request->user();

        $product = $request->product;
        $discountAmount = $product->calculateDiscount();
        $total = $product->price - $discountAmount;

        $purchase = $customer->purchases()->create([
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'discount' => $product->getDiscount(),
            'discount_amount' => $discountAmount,
            'total' => $total
        ]);

        AccountBalanceService::chargeAccountForPurchase($purchase);

        return $purchase;
    }
}
