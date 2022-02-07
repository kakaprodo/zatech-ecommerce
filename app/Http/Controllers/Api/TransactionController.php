<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TransactionService;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function userTransactions(Request $request)
    {
        $transactions = $this->transactionService->userTransactions(
            $request->user()
        );

        return TransactionResource::collection($transactions);
    }
}
