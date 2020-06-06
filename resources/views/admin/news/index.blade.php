@extends('layouts.admin')

@section('content')
@include('admin.partials.messages')
    <a href="{{ route('admin.news.create') }}" title="Добавить новость" id="news" class="add-link">Добавить новость</a>
    <div id="news-list">
        {{ $news->links() }}
        <div>№</div>
        <div>Дата</div>
        <div>Автор</div>
        <div>Категория</div>
        <div>Ресурс</div>
        <div>Заголовок</div>
        <div>Текст</div>
        <div>Картинка</div>
        <div>Управление</div>
        <hr>
        @foreach($news as $oneNews)
            <div>{{ $oneNews['id'] }}</div>
            <div>{{ date('d.m.y', strtotime($oneNews['created_at'])) }}</div>
            <div>{{ $oneNews['author'] }}</div>
            <div>{{ $oneNews->categories->name_cyr }}</div>
            <div>{{ $oneNews->resources->name }}</div>
            <div>{{ $oneNews['title'] }}</div>
            <div>{{ Str::limit($oneNews['text'], 327, ' ...') }}</div>
            <div>{{ $oneNews['img'] }}</div>
            <div class="control">
                <a 
                    @if ($loop->first) dusk="edit-button" @endif
                    href="{{
                        route('admin.news.edit', 
                            [
                                'news' => $oneNews
                            ]
                        )
                    }}" 
                    title="Редактировать"
                >Редактировать</a>
                <form action="{{
                    route('admin.news.destroy',
                        [
                            'news' => $oneNews
                        ]
                    )
                }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        @if ($loop->first) dusk="delete-button" @endif
                        type="submit"
                    >Удалить</button>
                </form>
            </div>
            <hr>
        @endforeach
        {{ $news->links() }}
    </div>
@endsection