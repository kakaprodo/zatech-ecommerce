<?php

namespace Tests\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait HasUserData
{

    public function registrationInfo()
    {
        $password = 'password';

        return [
            'name' => 'testuser',
            'email' => 'test@gmail.com',
            'password' => $password,
            'password_confirmation' => $password,
        ];
    }

    public function createUser($userInfo = null)
    {
        $userInfo = $userInfo ?? $this->registrationInfo();

        $record = array_merge($userInfo, [
            'password' => Hash::make($userInfo['password'])
        ]);

        return User::create($record);
    }
}
