<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'judul',
        'img',
        'tag',
        'url',
    ];

    /**
     * Relasi ke user (hanya kreator)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
