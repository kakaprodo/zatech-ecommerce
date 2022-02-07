<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AccountBalanceService;
use App\Http\Requests\User\TopupAccountRequest;

class AccountBalanceController extends Controller
{
    protected $accountBalanceService;

    public function __construct(AccountBalanceService $accountBalanceService)
    {
        $this->accountBalanceService = $accountBalanceService;
    }

    public function topup(TopupAccountRequest $request)
    {
        $this->accountBalanceService->addMoney($request);

        return response()->json([
            'message' => 'Account Successfully topup'
        ]);
    }
}
