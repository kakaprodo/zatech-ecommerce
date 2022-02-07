<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'type',
        'account_balance_id'
    ];

    public function acountBalanceLog()
    {
        return $this->belongsTo(AccountBalance::class, 'account_balance_id');
    }
}
