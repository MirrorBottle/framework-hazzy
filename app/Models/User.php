<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    const ROLE_MASTER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_PJO = 3;
    const ROLE_USER = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // * RELATIONSHIP
    public function teams() {
        return $this->belongsToMany(Team::class, 'team_members');
    }

    // * ATTRIBUTES
    public function getTeamAttribute() {
        return $this->teams()->orderBy('id', 'desc')->first();
    }
    public function getRoleNameAttribute($value)
    {
        switch ($this->role) {
            case '1':
                return 'Master';
            case '2':
                return 'Admin';
            case '3':
                return 'PJO';
            case '4':
                return 'Pegawai';
        }
    }
}
