<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'admin'
    ];

    protected $hidden = [
        'token', 'remember_token',
    ];
}
