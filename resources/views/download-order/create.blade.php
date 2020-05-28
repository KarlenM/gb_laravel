@extends('layouts.master', ['categories' => $categories])

@section('content')
@include('download-order.partials.messages')
    <div class="main-page">
        <div class="add-form">
            <h1>Заказ выгрузки данных</h1>
            <form method="POST" action="{{ route('download-order.store') }}">
                @csrf
                <span>Имя</span>
                <input type="text" name="firstname" value="{{ old('firstname') }}">
                @error('firstname')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
                <span>Номер телефона</span>
                <input type="number" name="tel" value="{{ old('tel') }}" placeholder="89214445566">
                @error('tel')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
                <span>E-mail</span>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
                <span class="merge">Что вы хотите получить?</span>
                <textarea name="message" cols="30" rows="4" class="merge">{{ old('message') }}</textarea>
                @error('message')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary merge">Заказать</button>
            </form>
        </div>
    </div>
@stop