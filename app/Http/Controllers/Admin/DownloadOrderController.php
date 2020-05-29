<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Requests\DownloadOrderPostRequest;
use App\Http\Controllers\Controller;
use App\Models\DownloadOrder;

class DownloadOrderController extends Controller
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
        $downloadOrder = DownloadOrder::select(
            'id',
            'firstname',
            'tel',
            'email',
            'message',
            'created_at',
        )
        ->orderBy('id', 'DESC')
        ->paginate(5);

        return view('admin.download-order.index',
            ['downloadOrder' => $downloadOrder]
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(DownloadOrder $downloadOrder)
    {
        return view('admin.download-order.edit', 
            ['downloadOrder' => DownloadOrder::find($downloadOrder->id)]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DownloadOrderPostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DownloadOrder $downloadOrder, DownloadOrderPostRequest $request)
    {
        $result = DownloadOrder::find($downloadOrder->id)->update($request->validated());

        if($result)
            return redirect()->route('admin.download-order.index')
                ->with('success', 'Заказ выгрузки изменена');
        else
            return back()->with('error', 'Ошибка изменения заказа выгрузки');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DownloadOrder $downloadOrder)
    {
        $result = DownloadOrder::find($downloadOrder->id)->destroy($downloadOrder->id);

        if($result)
            return redirect()->route('admin.download-order.index')
                ->with('success', 'Заказ выгрузки удален');
        else
            return back()->with('error', 'Ошибка удаления заказа выгрузки');
    }
}
