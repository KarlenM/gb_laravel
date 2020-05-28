<?php

namespace App\Http\Controllers;

use \App\Models\Categories;
use \App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $news = News::select(
            'id',
            'author',
            'category_id',
            'resource_id',
            'title',
            'img',
            'text',
            'active',
            'created_at'
        )->get();

        $categories = Categories::select(
            'name_lat',
            'name_cyr'
        )->get();

        return view('index',
            [
                'news' => $news,
                'categories' => $categories
            ]
        );
    }

    public function show($category, $id){
        $categories = Categories::select(
            'name_lat',
            'name_cyr'
        )->get();

        $news = News::select(
            'id',
            'author',
            'category_id',
            'resource_id',
            'title',
            'img',
            'text',
            'active',
            'created_at'
        )->find($id);

        return view('news.show', 
            [
                'news' => $news,
                'categories' => $categories,
            ]
        );
    }
}
