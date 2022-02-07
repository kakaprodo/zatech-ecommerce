<?php

namespace App\Http\Controllers\Auth\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;

class RegisterUserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(RegisterRequest $request)
    {
        $user = $this->userService->create($request->validated());

        $token = $user->createToken($user->id . $user->name);

        return response()->json(['token' => $token->plainTextToken]);
    }
}
