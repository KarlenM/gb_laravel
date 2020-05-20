<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\News;

class NewsController extends Controller
{
    public function index(){
        return view('news', 
            [
                'news' => News::getAll()
            ]
        );
    }

    public function page($category, $id){
        return view('news-page', 
            [
                'news' => News::getPage($id),
            ]
        );
    }

    // public function categories(){
    //     return view('categories', 
    //         [
    //             'categories' => $this->categories
    //         ]
    //     );
    // }

    public function category($category){
        return view('categories', 
            [
                'news' => News::getAll(),
                'selectedCategory' => $category,
                'skey' => 0
            ]
        );
    }

    public function addView(){
        return view('add', 
            [
                'categories' => News::getCategories()
            ]
        );
    }

    public function add(Request $request){
        $data = [
            'title' => $request->title,
            'img' => $request->img,
            'category_id' => $request->category,
            'text' => $request->news
        ];


        return view('add',
            [
                'categories' => News::getCategories(),
                'result' => News::addNews($data)
            ]
        );
    }

    public function downloadOrder(Request $request){
        $data = [
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'message' => $request->message
        ];


        return view('main',
            [
                'result' => News::downloadOrder($data)
            ]
        );
    }
}
