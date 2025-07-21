<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'metode_penarikan',
        'jumlah_penarikan',
        'status',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
