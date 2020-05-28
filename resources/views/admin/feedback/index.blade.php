@extends('layouts.admin')

@section('content')
@include('admin.feedback.partials.messages')
    <div id="feedback-list">
        {{ $feedback->links() }}
        <div>№</div>
        <div>Дата</div>
        <div>Имя</div>
        <div>Сообщение</div>
        <div>Управление</div>
        <hr>
        @foreach($feedback as $feedbackOne)
            <div>{{ $feedbackOne['id'] }}</div>
            <div>{{ date('d.m.y', strtotime($feedbackOne['created_at'])) }}</div>
            <div>{{ $feedbackOne['firstname'] }}</div>
            <div>{{ $feedbackOne['message'] }}</div>
            <div class="control">
                <a href="{{ route('admin.feedback.edit', ['feedback' => $feedbackOne]) }}" title="Редактировать">Редактировать</a>
                <form action="{{ route('admin.feedback.destroy', ['feedback' => $feedbackOne])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
            <hr>
        @endforeach
        {{ $feedback->links() }}
    </div>
@endsection