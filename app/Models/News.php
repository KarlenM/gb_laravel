<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'author',
        'category_id',
        'resource_id',
        'title',
        'img',
        'text',
        'updated_user_id',
        'created_user_id',
        'ip',
    ];

    protected $hidden = ['token'];

    public function categories()
    {
        return $this->belongsTo('\App\Models\Categories', 'category_id', 'id');
    }

    public function resources()
    {
        return $this->belongsTo('\App\Models\Resources', 'resource_id', 'id');
    }
}
