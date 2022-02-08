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
}
