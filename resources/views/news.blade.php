@extends('layouts.master')

@section('content')
<div class="title m-b-md" id="page">
    Новости
</div>
<div class="container-news">
    @foreach($news as $news)
        <div>
            <strong>{{ $news['title'] }}</strong>
            <a href="{{ url('news/' . $news['name_lat'] . '/' . $news['id']) }}">
            @foreach(explode("\n", $news['text']) as $text)
                <p>{{ $text }}</p>
            @endforeach
            </a>
        </div>
    @endforeach
    
</div>
@stop