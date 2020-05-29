<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Requests\StoreNewsPost;
use \App\Models\News;
use \App\Models\Categories;
use \App\Models\Resources;
use \App\Http\Controllers\Controller;

class NewsController extends Controller
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
        $news = News::select(
            'id',
            'author',
            'category_id',
            'resource_id',
            'title',
            'img',
            'text',
            'active',
            'created_at',
        )
        ->orderBy('id', 'DESC')
        ->paginate(5);

        return view('admin.news.index', 
            [
                'news' => $news,
                'categories' => Categories::all(),
                'resources' => Resources::all()
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
        return view('admin.news.create', 
            [
                'categories' => Categories::all(),
                'resources' => Resources::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\News  $news
     * @param  \App\Http\Requests\StoreNewsPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(News $news, StoreNewsPost $request)
    {
        $news->fill($request->validated())->save();

        if($news)
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость добавлена');
        else
            return back()->with('error', 'Ошибка добавления новости');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Categories::select(
            'id',
            'name_lat',
            'name_cyr'
        )->get();

        $resources = Resources::select(
            'id',
            'name',
            'created_at'
        )->get();

        return view('admin.news.edit', 
            [
                'news' => News::find($news->id),
                'categories' => $categories,
                'resources' => $resources
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\News  $news
     * @param \App\Http\Requests\StoreNewsPost  $request
     * @return \Illuminate\Http\Response
     */
    public function update(News $news, StoreNewsPost $request)
    {
        $result = News::find($news->id)->update($request->validated());

        if($result)
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость изменена');
        else
            return back()->with('error', 'Ошибка изменения новости');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $result = News::find($news->id)->destroy($news->id);

        if($result)
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость удалена');
        else
            return back()->with('error', 'Ошибка удаления новости');
    }
}
