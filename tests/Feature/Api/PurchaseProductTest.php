<?php

namespace Tests\Feature\Api;

use App\Http\Requests\Purchases\StorePurchaseRequest;
use Tests\TestCase;
use Tests\Traits\HasTestingData;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PurchaseProductTest extends TestCase
{
    use RefreshDatabase, HasTestingData, WithFaker;

    public $user;
    public $product;
    public $userToken;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');

        $this->user = $this->createUser();

        $this->topupUserAccount($this->user, 100);

        $this->user = $this->user->refresh();

        $this->product =  $this->createProduct(['price' => 30]);

        $this->userToken = $this->generateUserToken($this->user);
    }

    public function test_purchase_product()
    {
        $userBalance = $this->user->getBalance();

        $purchaseInfo = $this->purchaseInfo([
            'product_id' => $this->product->id
        ]);

        $response = $this->withToken($this->userToken)
            ->postJson(route('api.purchases.store'), $purchaseInfo);

        $response->assertCreated();

        $this->assertEquals(
            (float) $this->user->getBalance(),
            ($userBalance - $this->product->price)
        );
    }

    public function test_user_can_not_purchase_a_product_if_he_doesnot_have_enough_money()
    {
        $purchaseInfo = $this->purchaseInfo([
            'product_id' => $this->product->id,
            'quantity' => 10
        ]);

        $response = $this->withToken($this->userToken)
            ->postJson(route('api.purchases.store'), $purchaseInfo);


        $response->assertJsonValidationErrors([
            'product_id' => StorePurchaseRequest::NO_MONEY_MESSAGE
        ]);
    }

    public function test_user_can_gain_discount_if_total_price_is_between_112_and_115()
    {
        $this->topupUserAccount($this->user, 100);

        $this->product->update(['price' => 9.5]);

        $purchaseInfo = $this->purchaseInfo([
            'product_id' => $this->product->id,
            'quantity' => 12
        ]);

        $response = $this->withToken($this->userToken)
            ->postJson(route('api.purchases.store'), $purchaseInfo);

        $response->assertCreated()
            ->assertJsonFragment(['discount' => 0.25]);
    }

    public function test_user_can_gain_discount_if_total_price_is_above_120()
    {
        $this->topupUserAccount($this->user, 100);

        $purchaseInfo = $this->purchaseInfo([
            'product_id' => $this->product->id,
            'quantity' => 5
        ]);

        $response = $this->withToken($this->userToken)
            ->postJson(route('api.purchases.store'), $purchaseInfo);

        $response->assertCreated()
            ->assertJsonFragment(['discount' => 0.5]);
    }
}
