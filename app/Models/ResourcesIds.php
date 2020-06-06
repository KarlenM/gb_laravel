<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourcesIds extends Model
{
    protected $table = 'news_resources_ids';

    protected $fillable = [
        'resources_author_ids'
    ];
}
