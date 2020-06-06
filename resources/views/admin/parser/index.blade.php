@extends('layouts.admin')

@section('content')
@include('admin.partials.messages')
{{-- @dump($errors->all()); --}}
@if ($errors->any())
    <div class="alert alert-danger merge">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif
    <div id="parser">
        <form action="{{ route('admin.parser.store') }}" mathod="POST">
            <div>
                <input type="radio" name="rss" id="news" value="http://www.reddit.com/r/news/.rss">
                <label for="news">http://www.reddit.com/r/news/.rss</label>
                <input type="radio" name="rss" id="alienth" value="http://www.reddit.com/user/alienth/.rss">
                <label for="alienth">http://www.reddit.com/user/alienth/.rss</label>
                <input type="radio" name="rss" id="wtf" value="http://www.reddit.com/r/news+wtf.rss">
                <label for="wtf">http://www.reddit.com/r/news+wtf.rss</label>
            </div>
            <button class="btn btn-primary">Добавить новости из стороннего источника</button>
        </form>
    </div>
@endsection