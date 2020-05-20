@extends('layouts.master')

@section('content')
    <div class="main-page">
        <div class="add-form">
            <h1>Заказ выгрузки данных</h1>
            @if(session('success'))
                <h2>{{session('success')}}</h2>
            @else
            <form method="POST" action="{{ route('download-order') }}">
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
            @endif
        </div>
        <div id="orders-list">
            <div>№</div>
            <div>Имя</div>
            <div>Дата</div>
            <div>Телефон</div>
            <div>Email</div>
            <div>Сообщение</div>
            <hr>
            @foreach($orders as $order)
                <div>{{ $order['id'] }}</div>
                <div>{{ $order['firstname'] }}</div>
                <div>{{ date('d.m.y', strtotime($order['created_at'])) }}</div>
                <div>{{ $order['tel'] }}</div>
                <div>{{ $order['email'] }}</div>
                <div>{{ $order['message'] }}</div>
            @endforeach
        </div>
    </div>
@stop