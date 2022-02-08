<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::truncate();

        $discounts = [
            [
                'description' => 'Price 50 - 100 give 0% discount',
                'value' => 0
            ],
            [
                'description' => 'Price 112 - 115 give 0.25% discount',
                'value' => 0.25
            ],
            [
                'description' => 'Discount for above 120 price give 0.50% discount',
                'value' => 0.50
            ],
        ];

        foreach ($discounts as $key => $discount) {
            $discount = Discount::create($discount);

            Product::factory()->count(20)->for($discount)->create();
        }
    }
}
