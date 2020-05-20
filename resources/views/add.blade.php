@extends('layouts.app')

@section('content')
    @push('redir')
        <script>
            setTimeout(function() { window.location.href = '/news/add' }, 3000)
        </script>
    @endpush
    <div class="add-form">
        <form method="POST" action="{{ route('news-add') }}">
            @csrf
        @empty($result)
            <span>Заголовок</span>
            <input type="text" name="title">
            <span>Категория</span>
            <select name="category">
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name_cyr'] }}</option>
                @endforeach
            </select>
            <span>Картинка</span>
            <input name="img" type="file">
            <span class="merge">Новость</span>
            <textarea name="news" cols="30" rows="10" class="merge"></textarea>
            <button type="submit" class="btn btn-primary merge">Добавить</button>
        @endempty
        @isset($result)
            @stack('redir')
            <span class="success merge">
                @if($result)
                    Новость добавлена
                @else
                    Ошибка добавления
                @endif
            </span>
        @endisset
        </form>
    </div>
@endsection