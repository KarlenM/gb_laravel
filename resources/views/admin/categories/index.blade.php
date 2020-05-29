@extends('layouts.admin')

@section('content')
@include('admin.partials.messages')
    <a
        href="{{route('admin.categories.create') }}"
        title="Добавить категорию"
        id="news"
        class="add-link"
    >Добавить категорию</a>

    <div id="categories-list">
        {{ $categories->links() }}
        <div>№</div>
        <div>Дата</div>
        <div>Наименование<br>ru</div>
        <div>Наименование<br>en</div>
        <div>Управление</div>
        <hr>
        @foreach($categories as $category)
            <div>{{ $category['id'] }}</div>
            <div>{{ date('d.m.y', strtotime($category['created_at'])) }}</div>
            <div>{{ $category['name_cyr'] }}</div>
            <div>{{ $category['name_lat'] }}</div>
            <div class="control">
                <a href="{{
                    route('admin.categories.edit',
                        [
                            'category' => $category
                        ]
                    )
                }}" title="Редактировать">Редактировать</a>
                <form action="{{
                    route('admin.categories.destroy',
                        [
                            'category' => $category
                        ]
                    )
                }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
            <hr>
        @endforeach
        {{ $categories->links() }}
    </div>
@endsection