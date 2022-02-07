<?php

namespace App\Services;

use App\Models\User;


class TransactionService
{
    public function userTransactions(User $user)
    {
        return $user->transactions()->paginate();
    }
}
