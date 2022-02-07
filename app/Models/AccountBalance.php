<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'movement_type', // can be in or out
        'description',
    ];

    const MOVEMENT_IN = 'in';
    const MOVEMENT_OUT = 'out';

    const DESCRIPTION_PURCHASE = 'PURCHASE';
    const DESCRIPTION_TOPUP = 'TOPUP';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
