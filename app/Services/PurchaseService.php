<?php

namespace App\Services;

use App\Models\User;
use App\Models\Purchase;
use App\Jobs\PurchaseCreatedJob;
use App\Http\Requests\Purchases\StorePurchaseRequest;


class PurchaseService
{
    public function allPurchases()
    {
        return Purchase::with(['customer', 'product'])
                    ->latest()
                    ->paginate();
    }

    public function userPurchases(User $user)
    {
        return $user->purchases()
                    ->latest()
                    ->paginate();
    }

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

        PurchaseCreatedJob::dispatch($purchase);

        return $purchase;
    }
}
