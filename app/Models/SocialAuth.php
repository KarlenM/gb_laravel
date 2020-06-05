<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\User;

class SocialAuth extends Model
{
    protected $table = "users_social_accounts";

    protected $fillable = [
        'user_id',
        'provider_id',
        'provider_user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(SocialProviders::class);
    }
}
