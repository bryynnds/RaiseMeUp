<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreatorProfile extends Model
{
    /* --- kolom yang dapat diisi --- */
    protected $fillable = [
        'creator_id',
        'nickname',
        'bio',
        'deskripsi',
        'pp_url',
        'fotosampul_url',
        'job',
        'portfolio_url',
        'post_image',
        'youtube_url',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'goal_amount',
        'current_amount',
    ];

    /* --- relasi ke tabel users --- */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
