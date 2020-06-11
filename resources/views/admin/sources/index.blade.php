@extends('layouts.admin')

@section('content')
@include('admin.partials.messages')
    <a 
        href="{{route('admin.sources.create') }}" 
        title="Добавить источник" 
        id="sources" 
        class="add-link"
    >Добавить ресурс</a>

    <div id="sources-list">
        {{ $sources->links() }}
        <div>№</div>
        <div>Дата</div>
        <div>Наименование</div>
        <div>RSS</div>
        <div>Управление</div>
        <hr>
        @foreach($sources as $source)
            <div>{{ $source['id'] }}</div>
            <div>{{ date('d.m.y', strtotime($source['created_at'])) }}</div>
            <div>{{ $source['name'] }}</div>
            <div>{{ $source['link'] }}</div>
            <div class="control">
                <a 
                    @if ($loop->first) dusk="edit-button" @endif
                    href="{{
                        route('admin.sources.edit',
                            [
                                'source' => $source
                            ]
                        )
                    }}"
                    title="Редактировать"
                >Редактировать</a>
                <form action="{{
                    route('admin.sources.destroy',
                        [
                            'source' => $source
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
        {{ $sources->links() }}
    </div>
@endsection