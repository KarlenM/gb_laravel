<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $hidden = ['token'];

    protected $fillable = [
        'firstname',
        'message',
        'updated_user_id',
        'created_user_id',
        'ip'
    ];



    // // Добавление
    // public static function addFeedback($data)
    // {
    //     return Feedback::create($data);
    // }

    // // Список последних добавленных
    // public static function getLast($count)
    // {
    //     return Feedback::select('id', 'firstname', 'message', 'created_at')
    //     ->orderBy('id', 'DESC')
    //     ->offset(0)
    //     ->limit(5)
    //     ->get();
    // }
}
