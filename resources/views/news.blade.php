@extends('layouts.master')

@section('content')
<div class="title m-b-md" id="page">
    Новости
</div>
<div class="container-news">
    @foreach($news as $key => $news)
        <div>
            {{-- @dd($news['category']); --}}
            <strong>{{ $news['title'] }}</strong>
            <a href="{{ url('news/'.key($news['category']).'/'.$key) }}">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, itaque et vel quae sapiente eius quidem cum iusto odit natus aperiam laboriosam totam ratione, laborum deserunt similique, aspernatur cupiditate dolores.</p>
            </a>
        </div>
    @endforeach
    
</div>
@stop