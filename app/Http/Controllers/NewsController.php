<?php

namespace App\Http\Controllers;

use \App\Models\Categories;
use \App\Models\News;

class NewsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news){
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
        )->find($news->id);

        return view('news.show', 
            [
                'news' => $news,
                'categories' => $categories,
            ]
        );
    }
}
