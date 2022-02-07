<?php

namespace App\Http\Resources;

use App\Models\AccountBalance;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $acountBalanceLog = $this->acountBalanceLog;

        return [
            'id' => $this->id,
            'description' => $this->description,
            'type' => $this->type,
            'amount' => $acountBalanceLog->amount,
            'is_debit' => $acountBalanceLog->movement_type == AccountBalance::MOVEMENT_OUT
        ];
    }
}
