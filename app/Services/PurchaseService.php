<?php

namespace App\Services;

use App\Models\Purchase;
use App\Mail\ProductPurchased;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Purchases\StorePurchaseRequest;


class PurchaseService
{
    public function allPurchases()
    {
        return Purchase::with(['customer', 'product'])
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

        Mail::to(UserService::findAdminUser())
            ->send(new ProductPurchased($purchase));

        return $purchase;
    }
}
