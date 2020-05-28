@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('admin.download-order.update', ['downloadOrder' => $downloadOrder]) }}">
            @csrf
            @method('PUT')
            @include('admin.download-order.partials.messages')
            <span>Имя</span>
            <input type="text" name="firstname" value="{{ $downloadOrder->firstname }}">
                @error('firstname')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Телефон</span>
            <input type="text" name="tel" value="{{ $downloadOrder->tel }}">
                @error('tel')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Email</span>
            <input type="text" name="email" value="{{ $downloadOrder->email }}">
                @error('email')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Сообщение</span>
            <textarea name="message">{{ $downloadOrder->message }}</textarea>
                @error('message')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
@endsection