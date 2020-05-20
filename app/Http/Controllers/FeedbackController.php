<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \App\Feedback;

class FeedbackController extends Controller
{
    // Просмотр
    public function index(Request $request){
        return view('feedback', ['feedbacks' => Feedback::getLast(5)]);
    }

    // Добавление
    public function add(Request $request){
        // Добавление ip в $request
        $request->request->add(['ip' => $request->ip()]);
        
        // Валидация
        request()->validate([
            'firstname' => 'required|min:3|max:20',
            'message' => 'required',
            'ip' => 'required|ipv4'
        ]);

        // Отправка в модель
        Feedback::addFeedback($request->all());
        
        // Сообщение при успехе
        return redirect()->back()->withSuccess('Ваш запрос отправлен.');
    }
}
