@extends('layouts.master')

@section('content')
    <div class="main-page">
        <div class="add-form">
            <h1>Обратная связь</h1>
            @if(session('success'))
                <h2>{{session('success')}}</h2>
            @else
            <form method="POST" action="{{ route('feedback') }}">
                @csrf
                <span>Имя</span>
                <input type="text" name="firstname" value="{{ old('firstname') }}">
                @error('firstname')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
                <span class="merge">Отзыв</span>
                <textarea name="message" cols="30" rows="4" class="merge">{{ old('message') }}</textarea>
                @error('message')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary merge">Отправить</button>
            </form>
            @endif
        </div>
        <div id="feedback-list">
            <div>№</div>
            <div>Дата</div>
            <div>Имя</div>
            <div>Отзыв</div>
            <hr>
            @foreach($feedbacks as $feedback)
                <div>{{ $feedback['id'] }}</div>
                <div>{{ date('d.m.y', strtotime($feedback['created_at'])) }}</div>
                <div>{{ $feedback['firstname'] }}</div>
                <div>{{ $feedback['message'] }}</div>
            @endforeach
        </div>
    </div>
@stop