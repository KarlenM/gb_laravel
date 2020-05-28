<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $hidden = ['token'];

    protected $fillable = [
        'name_cyr',
        'name_lat',
        'updated_user_id',
        'created_user_id',
        'ip'
    ];

    public function news()
    {
        return $this->hasMany('App\Models\News', 'id', 'category_id');
    }
}
