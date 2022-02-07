<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'discount_id'
    ];

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function getDiscount()
    {
        return optional($this->discount)->value ?? 0;
    }
}
