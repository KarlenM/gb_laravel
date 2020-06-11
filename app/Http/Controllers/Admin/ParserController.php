<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\XMLParserService;
use App\Jobs\NewsParsing;
use App\Models\Sources;

class ParserController extends Controller
{
    public function index(XMLParserService $xMLParserService)
    {
        $start = date('c');

        $links = Sources::pluck('link')->toArray();

        foreach($links as $link)
            NewsParsing::dispatch($link, \Auth::id());

        return $start . ' - ' . date('c') . '<br>';
    }
}