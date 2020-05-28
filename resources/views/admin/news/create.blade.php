@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('admin.news.store') }}">
            @csrf
            @include('admin.news.partials.messages')
            <span>Заголовок</span>
            <input type="text" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Автор</span>
            <input type="text" name="author" value="{{ old('author') }}">
                @error('author')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Категория</span>
            <select name="category_id">
                <option 
                    disabled
                    @if(empty(old('category_id'))) selected @endif
                >Выбрать</option>
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}"
                        @if(old('category_id') == $category['id']) selected @endif
                    >{{ $category['name_cyr'] }}</option>
                @endforeach
            </select>
                @error('message')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Ресурс</span>
            <select name="resource_id">
                <option 
                    disabled
                    @if(empty(old('category_id'))) selected @endif
                >Выбрать</option>
                @foreach($resources as $resource)
                    <option value="{{ $resource['id'] }}"
                        @if(old('resource_id') == $resource['id']) selected @endif
                    >{{ $resource['name'] }}</option>
                @endforeach
            </select>
                @error('message')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Картинка</span>
            <input name="img" type="file">
            @error('img')
                <div class="alert alert-danger merge">{{ $message }}</div>
            @enderror
            <span class="merge">Новость</span>
            <textarea name="text" cols="30" rows="10" class="merge">{{ old('text') }}</textarea>
                @error('text')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Добавить</button>
        </form>
    </div>
@endsection