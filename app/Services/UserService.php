<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function findByIdentifier($indentifier)
    {
        return User::where('email', $indentifier)
            ->orWhere('id', $indentifier)
            ->first();
    }

    public function create(array $userInfo)
    {
        $userInfo = array_merge($userInfo, [
            'password' => Hash::make($userInfo['password'])
        ]);

        return User::create($userInfo);
    }
}
