<?php

namespace Tests\Traits;

use App\Models\User;
use App\Models\Product;
use App\Models\AccountBalance;
use Illuminate\Support\Facades\Hash;

trait HasTestingData
{

    public function registrationInfo($attributes = [])
    {
        $password = 'password';

        return array_merge([
            'name' => 'testuser',
            'email' => 'test@gmail.com',
            'password' => $password,
            'password_confirmation' => $password,
        ], $attributes);
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

    public function purchaseInfo($addAttributes = [])
    {
        $product = $this->createProduct();

        return array_merge([
            'product_id' => $product->id,
            'quantity' => 1
        ], $addAttributes);
    }

    public function createProduct($attributes = [])
    {
        return Product::factory()->createOne($attributes);
    }

    public function topupUserAccount($user, $amount)
    {
        $user->accountBalanceLogs()->create([
            'amount' => $amount,
            'movement_type' => AccountBalance::MOVEMENT_IN,
            'description' => AccountBalance::DESCRIPTION_TOPUP,
        ]);
    }
}
