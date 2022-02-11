<?php

namespace App\Http\Controllers\Auth\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $user = $this->userService->findByIdentifier($request->email);

        $token = $user->createToken($user->id . $user->name);

        return response()->json(
            ['token' => $token->plainTextToken],
            Response::HTTP_OK
        );
    }
}
