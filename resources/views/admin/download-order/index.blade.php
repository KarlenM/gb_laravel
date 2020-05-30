@extends('layouts.admin')

@section('content')
@include('admin.partials.messages')
    <div id="download-order-list">
        {{ $downloadOrder->links() }}
        <div>№</div>
        <div>Дата</div>
        <div>Имя</div>
        <div>Телефон</div>
        <div>Email</div>
        <div>Сообщение</div>
        <div>Управление</div>
        <hr>
        @foreach($downloadOrder as $downloadOrderOne)
            <div>{{ $downloadOrderOne['id'] }}</div>
            <div>{{ date('d.m.y', strtotime($downloadOrderOne['created_at'])) }}</div>
            <div>{{ $downloadOrderOne['firstname'] }}</div>
            <div>{{ $downloadOrderOne['tel'] }}</div>
            <div>{{ $downloadOrderOne['email'] }}</div>
            <div>{{ $downloadOrderOne['message'] }}</div>
            <div class="control">
                <a 
                    @if ($loop->first) dusk="edit-button" @endif
                    href="{{
                        route('admin.download-order.edit',
                            [
                                'download_order' => $downloadOrderOne
                            ]
                        )
                    }}"
                    title="Редактировать"
                >Редактировать</a>
                <form action="{{
                    route('admin.download-order.destroy',
                        [
                            'download_order' => $downloadOrderOne
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
        {{ $downloadOrder->links() }}
    </div>
@endsection