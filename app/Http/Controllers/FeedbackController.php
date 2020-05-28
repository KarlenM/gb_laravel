<?php

namespace App\Http\Controllers;

use \App\Http\Requests\FeedBackPostRequest;
use \App\Models\Categories;
use \App\Models\Feedback;

class FeedbackController extends Controller
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

        return view('feedback.create',
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
     * @param  \App\Http\Requests\FeedBackPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Feedback $feedback, FeedBackPostRequest $request)
    {
        $feedback->fill($request->validated())->save();

        if($feedback)
            return redirect()->route('feedback.index')
                ->with('success', 'Обратная связь заказана, скоро с вами свяжустся');
        else
            return back()->with('error', 'Ошибка добавления');
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
