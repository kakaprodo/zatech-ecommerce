<?php

namespace Tests\Feature\Auth\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\HasTestingData;

class LoginTest extends TestCase
{
    use RefreshDatabase, HasTestingData;


    public function test_api_user_login()
    {
        $registerInfo = $this->registrationInfo();

        $this->createUser($registerInfo);

        $response = $this->postJson(route('api.login'), [
            'email' => $registerInfo['email'],
            'password' => $registerInfo['password']
        ]);

        $response->assertOk()
            ->assertJsonStructure(['token']);
    }

    public function test_api_user_can_not_login_with_wrong_credentials()
    {
        $response = $this->postJson(route('api.login'), [
            'email' => 'wrong@gmail.com',
            'password' => 'fake_password'
        ]);

        $response->assertUnprocessable();
    }
}
