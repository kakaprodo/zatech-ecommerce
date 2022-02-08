<?php

namespace App\Services;

use App\Models\User;
use App\Models\Purchase;
use App\Models\AccountBalance;

class AccountBalanceService
{
    public function topup($request)
    {
        $user = $request->user();

        $balanceLog = $user->accountBalanceLogs()->create([
            'amount' => $request->amount,
            'movement_type' => AccountBalance::MOVEMENT_IN,
            'description' => AccountBalance::DESCRIPTION_TOPUP,
        ]);

        $balanceLog->transaction()->create([
            'description' => __('Topup money to your account'),
            'type' => AccountBalance::DESCRIPTION_TOPUP,
        ]);

        return $balanceLog;
    }

    public static function calculateBalance(User $user)
    {
        $totalIn = $user->accountBalanceLogs()->in()->sum('amount');

        $totalOut = $user->accountBalanceLogs()->out()->sum('amount');

        return $totalIn - $totalOut;
    }

    public static function chargeAccountForPurchase(Purchase $purchase)
    {
        $user = $purchase->customer;

        $balanceLog = $user->accountBalanceLogs()->create([
            'amount' => $purchase->total,
            'movement_type' => AccountBalance::MOVEMENT_OUT,
            'description' => AccountBalance::DESCRIPTION_PURCHASE,
        ]);

        $balanceLog->transaction()->create([
            'description' => "Purchased {$purchase->product->name}",
            'type' => AccountBalance::DESCRIPTION_PURCHASE,
        ]);
    }
}
