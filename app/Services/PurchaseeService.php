<?php

namespace App\Services;

use App\Http\Requests\Purchases\StorePurchaseRequest;


class PurchaseeService
{
    public function create(StorePurchaseRequest $request)
    {
        $user = $request->user();

        $product = $request->product;
        $discountAmount = $product->calculateDiscount();

        return $user->purchases()->create([
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'discount' => $product->getDiscount(),
            'discount_amount' => $discountAmount,
            'total' => $product->price - $discountAmount
        ]);
    }
}
