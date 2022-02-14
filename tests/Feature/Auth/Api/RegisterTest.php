<?php

namespace Tests\Feature\Auth\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\HasTestingData;

class RegisterTest extends TestCase
{
    use RefreshDatabase, HasTestingData;


    public function test_api_user_registration()
    {
        $registerInfo = $this->registrationInfo();

        $response = $this->postJson(route('api.register'), $registerInfo);

        $response->assertCreated()
            ->assertJsonStructure(['token']);
    }

    public function test_api_user_can_not_register_twice_with_same_email()
    {
        $registerInfo = $this->registrationInfo();

        $this->createUser($registerInfo);

        $response = $this->postJson(route('api.register'), $registerInfo);

        $response->assertUnprocessable();
    }
}
