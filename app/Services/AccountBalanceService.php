<?php

namespace App\Services;

use App\Models\User;
use App\Models\AccountBalance;

class AccountBalanceService
{
    public function addMoney($request)
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
}
