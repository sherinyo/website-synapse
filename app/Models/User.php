<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'points',
        'role',
        'IsVerified',
        'VerificationToken',
        'TokenExpires',
        'Status_Delete',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'IsVerified' => 'boolean',
            'TokenExpires' => 'datetime',
            'password' => 'hashed',
        ];
    }

     public function historyPoints()
    {
        return $this->hasMany(SynapointHistory::class);
    }

    public function requestPoints()
    {
        return $this->hasMany(SynapointRequest::class, 'user_ID');
    }
}
