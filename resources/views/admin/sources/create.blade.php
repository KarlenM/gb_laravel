@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('admin.sources.store') }}">
            @csrf
            <span>Наименование</span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Здоровье">
                @error('name')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>RSS Ссылка</span>
            <input type="text" name="link" value="{{ old('link') }}" placeholder="https://news.yandex.ru/health.rss">
                @error('link')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Добавить</button>
        </form>
    </div>
@endsection