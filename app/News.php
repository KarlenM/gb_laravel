<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    public static function getAll()
    {
        return News::WithCategoriesNames()
        ->select('*', 'news.id as id')
        ->orderBy('news.id', 'DESC')
        ->get();
    }

    public static function getPage($id)
    {
        return News::where('news.id', $id)
        ->WithCategoriesNames()
        ->first();
    }

    public static function getCategories()
    {
        $result = DB::table('news_category')
        ->select('id', 'name_cyr', 'name_lat')
        ->get();

        return (array) json_decode($result, true);
    }

    public static function addNews($data)
    {
        $news = new News;

        $news->author = \Auth::id();
        $news->title = $data['title'];
        $news->img = $data['img'];
        $news->category_id = $data['category_id'];
        $news->text = $data['text'];
        $news->ip = \Request::ip();
        $news->created_user_id = \Auth::id();
        $news->updated_user_id = \Auth::id();

        $saved = $news->save();

        return $saved;
    }

    public static function downloadOrder($data){
        
    }

    public function scopeWithCategoriesNames($query)
    {
        $query
        ->leftJoin(
            'news_category',
            'news_category.id', '=', 'news.category_id'
        );
    }
}
