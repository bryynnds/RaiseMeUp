<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupporterProfile extends Model
{
    protected $fillable = ['supporter_id', 'display_name', 'bio'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supporter_id');
    }
}
