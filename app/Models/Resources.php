<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $table = 'resources';
    
    protected $hidden = ['token'];

    protected $fillable = [
        'name',
        'updated_user_id',
        'created_user_id',
        'ip',
    ];

    public function news()
    {
        return $this->hasMany('\App\Models\News', 'id', 'resource_id');
    }
}
