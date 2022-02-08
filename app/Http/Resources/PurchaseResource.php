<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $product = $this->product;

        return [
            'id' => $this->id,
            'product_name' => $product->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'discount' => $this->discount,
            'discount_amount' => $this->discount_amount,
            'total' => $this->total,
            'created_at' => $this->created_at
        ];
    }
}
