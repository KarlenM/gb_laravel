<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    // Добавление 
    public static function addFeedback($data)
    {
        return Feedback::create($data);
    }

    // Список последних добавленных
    public static function getLast($count)
    {
        return Feedback::select('id', 'firstname', 'message', 'created_at')
        ->orderBy('id', 'DESC')
        ->offset(0)
        ->limit(5)
        ->get();
    }

    // Обязательные ячейки
    protected $fillable = ['firstname', 'message', 'ip'];
}
