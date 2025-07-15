<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['supporter_id', 'creator_id'];

    public function supporter()
    {
        return $this->belongsTo(User::class, 'supporter_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
