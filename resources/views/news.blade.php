@extends('layouts.master')

@section('content')
<div class="title m-b-md">
    Новости
</div>
<div class="container-news">
        <div>
            <strong>Новость 1</strong>
            <a href="{{ url('news/1') }}">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, itaque et vel quae sapiente eius quidem cum iusto odit natus aperiam laboriosam totam ratione, laborum deserunt similique, aspernatur cupiditate dolores.</p>
            </a>
        </div>
    </a>
    <div>
        <strong>Новость 2</strong>
        <a href="{{ url('news/2') }}">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, itaque et vel quae sapiente eius quidem cum iusto odit natus aperiam laboriosam totam ratione, laborum deserunt similique, aspernatur cupiditate dolores.</p>
        </a>
    </div>
    <div>
        <strong>Новость 3</strong>
        <a href="{{ url('news/3') }}">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, itaque et vel quae sapiente eius quidem cum iusto odit natus aperiam laboriosam totam ratione, laborum deserunt similique, aspernatur cupiditate dolores.</p>
        </a>
    </div>
</div>
@stop