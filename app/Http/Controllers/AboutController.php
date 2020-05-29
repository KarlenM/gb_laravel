<?php

namespace App\Http\Controllers;

use \App\Models\Categories;

class AboutController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
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
