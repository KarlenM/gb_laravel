<?php

namespace App\Http\Controllers\Admin;

use \App\Models\Resources;
use \App\Http\Controllers\Controller;
use \App\Http\Requests\ResourcesPostRequest;

class ResourcesController extends Controller
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
        $resources = Resources::select(
            'id',
            'name',
            'created_at'
        )
        ->paginate(10);

        return view('admin.resources.index',
            ['resources' => $resources]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ResourcesPostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Resources $resources, ResourcesPostRequest $request)
    {
        $resources->fill($request->validated())->save();

        if($resources)
            return redirect()->route('admin.resources.index')
                ->with('success', 'Ресурс добавлена');
        else
            return back()->with('error', 'Ошибка добавления ресурса');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resources  $resources
     * @return \Illuminate\Http\Response
     */
    public function show(Resources $resources)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resources  $resources
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resources = Resources::select(
            'id',
            'name',
            'created_at'
        )->find($id);

        return view('admin.resources.edit', 
            ['resources' => $resources]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ResourcesPostRequest  $request
     * @param  \App\Resources  $resources
     * @return \Illuminate\Http\Response
     */
    public function update(ResourcesPostRequest $request, $id)
    {
        $result = Resources::find($id)->update($request->validated());

        if($result)
            return redirect()->route('admin.resources.index')
                ->with('success', 'Ресурс изменен');
        else
            return back()->with('error', 'Ошибка изменения ресурса');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resources  $resources
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Resources::find($id)->destroy($id);

        if($result)
            return redirect()->route('admin.resources.index')
                ->with('success', 'Ресурс удален');
        else
            return back()->with('error', 'Ошибка удаления ресурса');
    }
}
