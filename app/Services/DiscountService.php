<?php
namespace App\Services;

use App\Models\Discount;

class DiscountService
{
    public function getAll()
    {
        return Discount::latest()->get();
    }

    public static function calcDiscount($price)
    {
        $discounts = Discount::all();
        $discountValue = 0;

        foreach ($discounts as $discount) {

            $priceMatches = self::priceMatchDiscountRule($price, $discount);

            if ($priceMatches) {
                $discountValue = $discount->value;
                break;
            }
            
        }

        return $discountValue;
    }

    public static function priceMatchDiscountRule($price, Discount $discount)
    {
        $minPrice = $discount->min_price;
        $maxPrice = $discount->max_price;
        
        return [
            Discount::RULE_BETWEEN => function($price) use($minPrice, $maxPrice) {
                if ($price >= $minPrice &&  $price <= $maxPrice) return true;

                return false;
            },
            Discount::RULE_ABOVE_MAX => function($price) use($maxPrice) {

                if ($price > $maxPrice) return true;

                return false;
            }
        ][$discount->rule]($price);

    }
}