@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{
            route('admin.resources.update',
                [
                    'resource' => $resource
                ]
            )
        }}">
            @csrf
            @method('PUT')
            <span>Наименование</span>
            <input type="text" name="name" value="{{ $resource->name }}">
                @error('name')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
@endsection