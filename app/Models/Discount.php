<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected  $fillable = [
        'description',
        'value',
        'min_price',
        'max_price',
        'rule'
    ];

    const RULE_BETWEEN = 'between';
    const RULE_ABOVE_MAX = 'above_max';
}
