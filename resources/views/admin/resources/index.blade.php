@extends('layouts.admin')

@section('content')
@include('admin.partials.messages')
    <a 
        href="{{route('admin.resources.create') }}" 
        title="Добавить ресурс" 
        id="news" 
        class="add-link"
    >Добавить ресурс</a>

    <div id="resources-list">
        {{ $resources->links() }}
        <div>№</div>
        <div>Дата</div>
        <div>Наименование</div>
        <div>Управление</div>
        <hr>
        @foreach($resources as $resource)
            <div>{{ $resource['id'] }}</div>
            <div>{{ date('d.m.y', strtotime($resource['created_at'])) }}</div>
            <div>{{ $resource['name'] }}</div>
            <div class="control">
                <a 
                    @if ($loop->first) dusk="edit-button" @endif
                    href="{{
                        route('admin.resources.edit',
                            [
                                'resource' => $resource
                            ]
                        )
                    }}"
                    title="Редактировать"
                >Редактировать</a>
                <form action="{{
                    route('admin.resources.destroy',
                        [
                            'resource' => $resource
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
        {{ $resources->links() }}
    </div>
@endsection