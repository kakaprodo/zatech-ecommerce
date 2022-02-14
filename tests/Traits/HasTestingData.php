<?php

namespace Tests\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait HasTestingData
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

    public function createUser($userInfo = null): User
    {
        $userInfo = $userInfo ?? $this->registrationInfo();

        $record = array_merge($userInfo, [
            'password' => Hash::make($userInfo['password'])
        ]);

        return User::create($record);
    }

    public function generateUserToken($user)
    {
        $token = $user->createToken($user->id . $user->name);

        return $token->plainTextToken;
    }
}
