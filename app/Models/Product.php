<?php

namespace App\Models;

use App\Services\ProductService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'discount_id'
    ];

    protected static function booted()
    {
        static::creating(function ($product) {
            $imgName = 'img-' . rand(1, 4) . '.jpeg';
            $product->image = $imgName;
        });
    }

    public function getImageAttribute($imageName)
    {
        return asset("img/". $imageName);
    }
}
