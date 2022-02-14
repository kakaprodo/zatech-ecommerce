<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Tests\Traits\HasTestingData;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopupAccountTest extends TestCase
{
    use RefreshDatabase, HasTestingData;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_topup_user_account()
    {
        $user = $this->createUser();

        $userToken = $this->generateUserToken($user);

        $amount = 100;

        $response = $this->withToken($userToken)->postJson(route('api.topup.account'), [
            'amount' => $amount
        ]);

        $response->assertCreated();

        $this->assertEquals($user->getBalance(), $amount);
    }
}
