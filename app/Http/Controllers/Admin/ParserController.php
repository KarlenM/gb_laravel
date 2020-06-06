<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\Models\Parser;
use App\Http\Requests\ParserPostRequest;

class ParserController extends Controller
{
    public function index()
    {
        return view('admin.parser.index');
    }

    public function store(ParserPostRequest $request)
    {
        $rss = $request->validated()['rss'];

        $result = (new Parser)->run($rss);

        if($rss && $result)
            return redirect()->route('admin.parser.index')
                ->with('success', 'Сторонний ресурс ' . $rss . ' обработан. Добавлено ' . $result['count']);
        else
            return back()->with('error', 'Ошибка добавления новостей из стороннего ресурса');
    }
}