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
                'value' => 0,
                'min_price' => 50,
                'max_price' => 100,
                'rule' => Discount::RULE_BETWEEN
            ],
            [
                'description' => 'Price 112 - 115 give 0.25% discount',
                'value' => 0.25,
                'min_price' => 112,
                'max_price' => 115,
                'rule' => Discount::RULE_BETWEEN
            ],
            [
                'description' => 'Discount for above 120 price give 0.50% discount',
                'value' => 0.50,
                'min_price' => null,
                'max_price' => 120,
                'rule' => Discount::RULE_ABOVE_MAX
            ],
        ];

        foreach ($discounts as $key => $discount) {
            $discount = Discount::create($discount);
        }
    }
}
