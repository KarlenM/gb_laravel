@extends('layouts.master', ['categories' => $categories])

@section('content')
@include('feedback.partials.messages')
    <div class="main-page">
        <div class="add-form">
            <h1>Обратная связь</h1>
            <form method="POST" action="{{ route('feedback.store') }}">
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
                <button type="submit" class="btn btn-primary merge">Заказать</button>
            </form>
        </div>
    </div>
@stop