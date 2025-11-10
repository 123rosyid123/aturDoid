<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmailVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token',
        'expires_at',
        'verified',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'verified' => 'boolean',
    ];

    /**
     * Generate verification token for email
     */
    public static function createToken(string $email): string
    {
        // Delete old tokens for this email
        self::where('email', $email)->delete();

        // Generate new token
        $token = Str::random(64);

        // Create verification record
        self::create([
            'email' => $email,
            'token' => $token,
            'expires_at' => Carbon::now()->addHours(24),
            'verified' => false,
        ]);

        return $token;
    }

    /**
     * Verify token
     */
    public static function verifyToken(string $token): ?string
    {
        $verification = self::where('token', $token)
            ->where('verified', false)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if ($verification) {
            $verification->update(['verified' => true]);
            return $verification->email;
        }

        return null;
    }

    /**
     * Check if token is expired
     */
    public function isExpired(): bool
    {
        return Carbon::now()->greaterThan($this->expires_at);
    }
}
