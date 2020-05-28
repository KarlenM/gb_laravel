<?php

namespace App\Http\Controllers;

use \App\Models\News;
use \App\Models\Categories;

class CategoriesController extends Controller
{
    public function index($category) {
        $category_id = Categories::select('id')
        ->where('name_lat', $category)
        ->first()->id;

        $newsByCategory = News::where('category_id', $category_id)
        ->orderBy('id', 'DESC')
        ->get();

        $categories = Categories::select(
            'id',
            'name_cyr',
            'name_lat',
            'created_at'
        )->get();

        $allNews = News::select(
            'id',
            'author',
            'category_id',
            'resource_id',
            'title',
            'img',
            'text',
            'active',
            'created_at'
        )
        ->orderBy('id', 'DESC')
        ->get();

        return view('news.categories.index',
            [
                'allNews' =>    $allNews,
                'news' =>       $newsByCategory,
                'categories' => $categories
            ]
        );
    }
}
