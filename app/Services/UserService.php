<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create(array $userInfo)
    {
        $userInfo = array_merge($userInfo, [
            'password' => Hash::make($userInfo['password'])
        ]);

        return User::create($userInfo);
    }
}
