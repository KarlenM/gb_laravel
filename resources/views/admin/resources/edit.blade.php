@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('admin.resources.update', ['resources' => $resources]) }}">
            @csrf
            @method('PUT')
            @include('admin.resources.partials.messages')
            <span>Наименование</span>
            <input type="text" name="name" value="{{ $resources->name }}">
                @error('name')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
@endsection