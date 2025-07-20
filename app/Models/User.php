<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /* --- kolom yang dapat diisi mass‑assignment --- */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'role',           // enum: admin | kreator | supporter
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* --- relasi Eloquent --- */
    public function creatorProfile(): HasOne
    {
        return $this->hasOne(CreatorProfile::class, 'creator_id');
    }

    public function supporterProfile(): HasOne
    {
        return $this->hasOne(SupporterProfile::class, 'supporter_id');
    }

    public function donationsMade(): HasMany
    {
        return $this->hasMany(Donation::class, 'supporter_id');
    }

    public function donationsReceived(): HasMany
    {
        return $this->hasMany(Donation::class, 'creator_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'creator_id'); // jika like ditujukan ke user
    }

    public function portfolio(): HasMany
    {
        return $this->hasMany(Portfolio::class, 'creator_id');
    }

    public function getRoleNameAttribute()
    {
        return $this->attributes['role'];
    }
}
