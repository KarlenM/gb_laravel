<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialProviders extends Model
{
    protected $table = "social_providers";

    protected $fillable = ['name'];

    public function accounts()
    {
        return $this->hasMany('App\Models\SocialAuth', 'id', 'provider_id');
    }
}
