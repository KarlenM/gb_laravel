<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadOrderPostRequest;
use \App\Models\Categories;
use \App\Models\DownloadOrder;

class DownloadOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::select(
            'id',
            'name_lat',
            'name_cyr'
        )->get();

        return view('download-order.create',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DownloadOrderPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DownloadOrder $downloadOrder, DownloadOrderPostRequest $request)
    {
        $downloadOrder->fill($request->validated())->save();

        if($downloadOrder)
            return redirect()->route('download-order.index')
                ->with('success', 'Заказ создан');
        else
            return back()->with('error', 'Ошибка добавления заказа');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
