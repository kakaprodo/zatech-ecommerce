<?php

namespace App\Models;

use App\Services\ProductService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'discount_id'
    ];

    public function getImageAttribute()
    {
        $imgName = 'img-' . rand(1, 4) . '.jpeg';

        return $this->image ?? asset("img/{$imgName}");
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    // Discount in percentage
    public function getDiscount()
    {
        return optional($this->discount)->value
            ?? ProductService::findTheDiscount($this->price);
    }

    public function calculateDiscount()
    {
        return round(($this->price * $this->getDiscount()) / 100, 2);
    }
}
