<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\Http\Requests\SourcesPostRequest;
use App\Models\Sources;

class SourcesController extends Controller
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
        $sources = Sources::select(
            'id',
            'name',
            'link',
            'created_at',
        )
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('admin.sources.index',
            [
                'sources' => $sources
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
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Sources  $source
     * @param  \App\Http\Requests\SourcesPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sources $sources, SourcesPostRequest $request)
    {
        $sources->fill($request->validated())->save();

        if($sources)
            return redirect()->route('admin.sources.index')
                ->with('success', 'Источник данных добавлен');
        else
            return back()->with('error', 'Ошибка добавления источника данных');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sources  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Sources $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sources  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Sources $source)
    {
        return view('admin.sources.edit', 
            [
                'source' => Sources::find($source->id)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Sources  $source
     * @param  \App\Http\Requests\SourcesPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Sources $source, SourcesPostRequest $request)
    {
        $result = Sources::find($source->id)->update($request->validated());

        if($result)
            return redirect()->route('admin.sources.index')
                ->with('success', 'Ресурс изменен');
        else
            return back()->with('error', 'Ошибка изменения ресурса');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sources  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sources $source)
    {
        $result = Sources::find($source->id)->destroy($source->id);

        if($result)
            return redirect()->route('admin.sources.index')
                ->with('success', 'Ресурс удален');
        else
            return back()->with('error', 'Ошибка удаления ресурса');
    }
}
