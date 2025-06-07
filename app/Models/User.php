<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔗 Relasi tambahan

    public function supporterProfile(): HasOne
    {
        return $this->hasOne(SupporterProfile::class, 'supporter_id');
    }

    public function creatorProfile(): HasOne
    {
        return $this->hasOne(CreatorProfile::class, 'creator_id');
    }

    public function donationsMade(): HasMany
    {
        return $this->hasMany(Donation::class, 'supporter_id');
    }

    public function donationsReceived(): HasMany
    {
        return $this->hasMany(Donation::class, 'creator_id');
    }
}
