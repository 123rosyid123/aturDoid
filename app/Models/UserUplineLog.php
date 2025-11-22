<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserUplineLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_upline_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'upline_user_id',
        'referral_code',
        'action',
        'ip_address',
        'user_agent',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the upline user.
     */
    public function uplineUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'upline_user_id');
    }
}
