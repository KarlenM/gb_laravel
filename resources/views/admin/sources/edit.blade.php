@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{
            route('admin.sources.update',
                [
                    'source' => $source
                ]
            )
        }}">
            @csrf
            @method('PUT')
            <span>Наименование</span>
            <input type="text" name="name" value="{{ $source->name }}">
                @error('name')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>RSS Ссылка</span>
            <input type="text" name="link" value="{{ $source->link }}">
                @error('link')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                    @enderror
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
@endsection