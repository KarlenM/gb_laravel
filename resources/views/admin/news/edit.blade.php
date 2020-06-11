@extends('layouts.admin')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger merge">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif
    <div class="add-form">
        <form method="POST" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('PUT')
            <span>Заголовок</span>
            <input type="text" name="title" value="{{ $news->title }}">
                @error('title')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Автор</span>
            <input type="text" name="author" value="{{ $news->author }}">
                @error('author')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Категория</span>
            <select name="category_id">
                <option 
                    disabled
                    @if(empty($news->category_id)) selected @endif
                >Выбрать</option>
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}"
                        @if($news->category_id == $category['id']) selected @endif
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
                    @if(empty($news->category_id)) selected @endif
                >Выбрать</option>
                @foreach($resources as $resource)
                    <option value="{{ $resource['id'] }}"
                        @if($news->resource_id == $resource['id']) selected @endif
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
            <textarea id="text" name="text" cols="30" rows="10" class="merge">{{ $news->text }}</textarea>
                @error('text')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
        <!-- CKEditro -->
        <script src="{{ asset("js/jquery/jquery-2.2.4.min.js") }}"></script>
        <script src="{{ asset("ckeditor/ckeditor.js") }}"></script>
        <script src="{{ asset("ckeditor/adapters/jquery.js") }}"></script>
        <script>
            $(document).ready(function () {
                CKEDITOR.replace('text', {
                    language: 'ru',
                    height: '300',
                    filebrowserBrowseUrl: '/filemanager?type=Images',
                    filebrowserUploadUrl: '/filemanager/upload?type=Images&_token=',
                    filebrowserImageBrowseUrl: '/filemanager?type=Files',
                    filebrowserImageUploadUrl: '/filemanager/upload?type=Files&_token=',
                });
            });
        </script>
@endsection