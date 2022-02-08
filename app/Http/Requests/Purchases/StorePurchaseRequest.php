<?php

namespace App\Http\Requests\Purchases;

use App\Models\Product;
use App\Services\DiscountService;
use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
{

    /**
     * @var Product
     */
    public $product;
    public $discount;
    public $discountAmount;
    public $total;


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => ['required', 'numeric', 'exists:products,id'],
            'quantity' => ['required', 'numeric', 'min:1']
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if ($this->userHasMoney()) return;

            $validator->errors()
                ->add(
                    'product_id',
                    "You don't have enough money, please topup your account balance"
                );
        });
    }

    private function userHasMoney()
    {
        $this->product = Product::find($this->product_id);

        if (!$this->product) return;

        $grossAmount = $this->product->price * $this->quantity;
        $this->discount = DiscountService::calcDiscount($grossAmount);
        $this->discountAmount = round(($grossAmount * $this->discount) / 100, 2);
        $this->total = $grossAmount - $this->discountAmount;

        return $this->user()->getBalance() >= $this->total;
    }
}
