<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        'referral_code',
        'upline_code',
        'is_verified',
        'verification_code',
        'account_type',
        'first_name',
        'last_name',
        'title',
        'address',
        'city',
        'zip',
        'date_of_birth',
        'marital_status',
        'occupation',
        'religion',
        'google_id',
        'avatar',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
        ];
    }

    /**
     * Get the upline user (referrer) based on upline_code.
     */
    public function upline()
    {
        return $this->belongsTo(User::class, 'upline_code', 'referral_code');
    }

    /**
     * Get the downline users (referrals) based on referral_code.
     */
    public function downlines()
    {
        return $this->hasMany(User::class, 'upline_code', 'referral_code');
    }
}
