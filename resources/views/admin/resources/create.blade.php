@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('admin.resources.store') }}">
            @csrf
            @include('admin.resources.partials.messages')
            <span>Наименование</span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Спорт">
                @error('name')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <button type="submit" class="btn btn-primary merge">Добавить</button>
        </form>
    </div>
@endsection