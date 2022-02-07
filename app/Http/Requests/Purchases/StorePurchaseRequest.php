<?php

namespace App\Http\Requests\Purchases;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
{

    /**
     * @var Product
     */
    public $product;


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
            'quantity' => ['required', 'numeric', 'min:1', 'max:1']
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $product = Product::find($this->product_id);

            if (!$product) return;

            $this->setProduct($product);

            $total = $product->price - $product->calculateDiscount();

            // check if user has enough money
            $userHasMoney = $this->user()->getBalance() >= $total;

            if ($userHasMoney) return;

            $validator->errors()
                ->add(
                    'product_id',
                    "You don't have enough money, please topup your account balance"
                );
        });
    }
}
