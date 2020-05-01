@extends('layouts.master')

@section('content')
<div class="title m-b-md">
    {{ $news[$id]['title'] }}
</div>
<span>{{ $news[$id]['category'][key($news[$id]['category'])] }}</span>
<div class="container-news page">
    @foreach(explode("\n", $news[$id]['text']) as $text)
        <p>{{ $text }}</p>
    @endforeach
</div>
@stop