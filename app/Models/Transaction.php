<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = ['donation_id', 'midtrans_transaction_id', 'payment_method', 'status'];

    public function donation(): BelongsTo
    {
        return $this->belongsTo(Donation::class);
    }
}
