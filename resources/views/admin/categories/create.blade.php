@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            @include('admin.categories.partials.messages')
            <span>Наименование (ru)</span>
            <input type="text" name="name_cyr" value="{{ old('title') }}" placeholder="Спорт">
                @error('name_cyr')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Наименование (en)</span>
            <input type="text" name="name_lat" value="{{ old('author') }}" placeholder="Sport">
                @error('name_lat')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Добавить</button>
        </form>
    </div>
@endsection