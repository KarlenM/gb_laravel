@extends('layouts.master')

@section('content')
<div class="title m-b-md">
    Категории новостей
</div>
<div class="container-categories">
    <ul>
    @foreach($categories as $key => $category)
        <li><a href="/news/{{ key($category) }}/" title="{{ $category[key($category)] }}">{{ $category[key($category)] }}</a></li>
    @endforeach
    </ul>
</div>
<div class="container-news">
    @if(isset($selectedCategory))
        @foreach($news as $key => $news)
            @if(key($news['category']) == $selectedCategory)
                <div>
                    {{-- @dd($news['category']); --}}
                    <strong>{{ $news['title'] }}</strong>
                    <a href="{{ url('news/'.key($news['category']).'/'.$key) }}">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, itaque et vel quae sapiente eius quidem cum iusto odit natus aperiam laboriosam totam ratione, laborum deserunt similique, aspernatur cupiditate dolores.</p>
                    </a>
                </div>
                @endif
        @endforeach
    @endif
</div>
@stop