@extends('layouts.app')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('news-add') }}">
            @csrf
            <span>Название</span>
            <input type="text" name="name">
            <span>Категория</span>
            <select name="category">
                @foreach($categories as $category)
                    <option value="{{ key($category) }}">{{ $category[key($category)] }}</option>
                @endforeach
            </select>
            <span class="merge">Новость</span>
            <textarea name="news" cols="30" rows="10" class="merge"></textarea>
            <button type="submit" class="btn btn-primary merge">Добавить</button>
        </form>
    </div>
@endsection