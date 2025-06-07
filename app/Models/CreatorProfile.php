<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreatorProfile extends Model
{
    protected $fillable = ['creator_id', 'display_name', 'bio'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
