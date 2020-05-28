@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('admin.categories.update', ['categories' => $categories]) }}">
            @csrf
            @method('PUT')
            @include('admin.categories.partials.messages')
            <span>Наименование (ru)</span>
            <input type="text" name="name_cyr" value="{{ $categories->name_cyr }}">
                @error('name_cyr')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Наименование (en)</span>
            <input type="text" name="name_lat" value="{{ $categories->name_lat }}">
                @error('name_lat')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
@endsection