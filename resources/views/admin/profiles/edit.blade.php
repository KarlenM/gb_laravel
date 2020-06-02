@extends('layouts.admin')

@section('content')
    <div class="add-form">
        <form method="POST" action="{{ route('admin.profiles.update', ['profile' => $profile]) }}">
            @csrf
            @method('PUT')
            <span>Имя</span>
            <input type="text" name="name" value="{{ $profile->name }}">
                @error('name')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <span>Email</span>
            <input type="text" name="email" value="{{ $profile->email }}">
                @error('email')
                    <div class="alert alert-danger merge">{{ $message }}</div>
                @enderror
            <input type="checkbox" name="admin" value="{{ $profile->admin }}"
                @if($profile->admin) checked @endif
                onclick="$(this).val(this.checked ? true : false)"
            >
            <span>Права администраторы</span>
            @error('admin')
                <div class="alert alert-danger merge">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
@endsection