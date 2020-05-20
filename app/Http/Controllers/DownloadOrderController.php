<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\DownloadOrder;

class DownloadOrderController extends Controller
{
    // Просмотр
    public function index(Request $request){
        return view('download-order', ['orders' => DownloadOrder::getLast(5)]);
    }

    // Добавление
    public function add(Request $request){
        // Добавление ip в $request
        $request->request->add(['ip' => $request->ip()]);
        
        // Валидация
        request()->validate([
            'firstname' => 'required|min:3|max:20',
            'tel' => 'required|string|min:7|max:11',
            'email' => 'required|email',
            'message' => 'required',
            'ip' => 'required|ipv4'
        ]);

        // Отправка в модель
        DownloadOrder::addOrder($request->all());
        
        // Сообщение при успехе
        return redirect()->back()->withSuccess('Ваш запрос отправлен.');
    }
}
