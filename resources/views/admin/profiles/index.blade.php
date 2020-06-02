@extends('layouts.admin')

@section('content')
@include('admin.partials.messages')
    <div id="profiles-list">
        {{ $profiles->links() }}
        <div>№</div>
        <div>Имя</div>
        <div>Email</div>
        <div>Права администратора</div>
        <div>Дата регистрации</div>
        <div>Управление</div>
        <hr>
        @foreach($profiles as $profile)
            <div>{{ $profile['id'] }}</div>
            <div>{{ $profile['name'] }}</div>
            <div>{{ $profile['email'] }}</div>
            <div>@if($profile['admin']) Да @else Нет @endif</div>
            <div>{{ date('d.m.y', strtotime($profile['created_at'])) }}</div>
            <div class="control">
                <a 
                    @if ($loop->first) dusk="edit-button" @endif
                    href="{{
                        route('admin.profiles.edit', 
                            [
                                'profile' => $profile
                            ]
                        )
                    }}"
                    title="Редактировать"
                >Редактировать</a>
            </div>
            <hr>
        @endforeach
        {{ $profiles->links() }}
    </div>
@endsection