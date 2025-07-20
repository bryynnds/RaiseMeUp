<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupporterProfile extends Model
{
    protected $fillable = ['supporter_id', 'nickname', 'bio', 'deskripsi','pp_url','fotosampul_url'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supporter_id');
    }
}
