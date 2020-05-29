<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Controller;
use \App\Models\Categories;
use \App\Http\Requests\CategoriesPostRequest;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::select(
            'id',
            'name_cyr',
            'name_lat',
            'created_at',
        )
        ->paginate(10);

        return view('admin.categories.index',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Categories  $categories
     * @param  \App\Http\Requests\CategoriesPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Categories $categories, CategoriesPostRequest $request)
    {
        $categories->fill($request->validated())->save();

        if($categories)
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория добавлена');
        else
            return back()->with('error', 'Ошибка добавления категории');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {
        return view('admin.categories.edit', 
            [
                'category' => Categories::find($category->id)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Categories  $categories
     * @param  \App\Http\Requests\CategoriesPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Categories $category, CategoriesPostRequest $request)
    {
        $result = Categories::find($category->id)->update($request->validated());

        if($result)
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория изменена');
        else
            return back()->with('error', 'Ошибка изменения категории');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories  $category)
    {
        $result = Categories::find($category->id)->destroy($category->id);

        if($result)
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория удалена');
        else
            return back()->with('error', 'Ошибка удаления категории');
    }
}
