@extends('layouts.admin')

@section('content')
@include('admin.download-order.partials.messages')
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
                <a href="{{ route('admin.download-order.edit', ['downloadOrder' => $downloadOrderOne]) }}" title="Редактировать">Редактировать</a>
                <form action="{{ route('admin.download-order.destroy', ['downloadOrder' => $downloadOrderOne])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
            <hr>
        @endforeach
        {{ $downloadOrder->links() }}
    </div>
@endsection