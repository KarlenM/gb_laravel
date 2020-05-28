<?php

namespace App\Http\Controllers;

use \App\Models\Categories;

class AboutController extends Controller
{
    public function index() {
        $categories = Categories::select(
            'id',
            'name_lat',
            'name_cyr'
        )->get();

        return view('about',
            ['categories' => $categories]
        );
    }
}
