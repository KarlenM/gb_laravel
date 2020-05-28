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
            ['categories' => $categories]
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
     * @param  \App\Http\Requests\CategoriesPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Categories $categories, CategoriesPostRequest $request)
    {
        $categories->fill($request->validated())->save();

        if($categories)
            return redirect()->route('admin.categories.create')
                ->with('success', 'Категория добавлена');
        else
            return back()->with('error', 'Ошибка добавления категории');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.categories.edit', 
            ['categories' => Categories::find($id)]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoriesPostRequest  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesPostRequest $request, $id)
    {
        $result = Categories::find($id)->update($request->validated());

        if($result)
            return redirect()->route('admin.categories.edit')
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
    public function destroy($id)
    {
        $result = Categories::find($id)->destroy($id);

        if($result)
            return redirect()->route('admin.categories.create')
                ->with('success', 'Категория удалена');
        else
            return back()->with('error', 'Ошибка удаления категории');
    }
}
