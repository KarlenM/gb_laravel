<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Requests\FeedBackPostRequest;
use App\Http\Controllers\Controller;
use App\Models\Feedback;

class FeedbackController extends Controller
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
        $feedback = Feedback::select(
            'id',
            'firstname',
            'message',
            'created_at',
        )
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('admin.feedback.index',
            ['feedback' => $feedback]
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
    public function edit($id)
    {
        return view('admin.feedback.edit', 
            ['feedback' => Feedback::find($id)]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FeedBackPostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeedBackPostRequest $request, $id)
    {
        $result = Feedback::find($id)->update($request->validated());

        if($result)
            return redirect()->route('admin.feedback.index')
                ->with('success', 'Обратная связь изменена');
        else
            return back()->with('error', 'Ошибка изменения обратной связи');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Feedback::find($id)->destroy($id);

        if($result)
            return redirect()->route('admin.feedback.index')
                ->with('success', 'Обратная связь удалена');
        else
            return back()->with('error', 'Ошибка удаления обратной связи');
    }
}
