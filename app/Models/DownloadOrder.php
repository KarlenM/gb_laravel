<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadOrder extends Model
{
    protected $table = 'download_orders';

    // Добавление
    public static function addOrder($data)
    {
        return DownloadOrder::create($data);
    }

    // Список последних добавленных
    public static function getLast($count)
    {
        return DownloadOrder::select('id', 'firstname', 'tel', 'email', 'message', 'created_at')
        ->orderBy('id', 'DESC')
        ->offset(0)
        ->limit(5)
        ->get();
    }

    // Обязательные ячейки
    protected $fillable = ['firstname', 'message', 'tel', 'email', 'ip'];
}
