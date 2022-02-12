<?php

namespace App\Http\Controllers\Auth\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $user = $request->user();

        $token = $user->createToken($user->id . $user->name);

        return response()->json(
            ['token' => $token->plainTextToken],
            Response::HTTP_OK
        );
    }
}
