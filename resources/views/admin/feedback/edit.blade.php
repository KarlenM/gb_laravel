@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('admin.feedback.update', ['feedback' => $feedback]) }}">
            @csrf
            @method('PUT')
            @include('admin.feedback.partials.messages')
            <span>Имя</span>
            <input type="text" name="firstname" value="{{ $feedback->firstname }}">
                @error('firstname')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Сообщение</span>
            <textarea name="message">{{ $feedback->message }}</textarea>
                @error('message')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
@endsection