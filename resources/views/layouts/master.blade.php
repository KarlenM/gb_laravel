@extends('layouts.structure')

{{-- Шапка --}}
@section('header')
    <h1>Новостной агрегатор</h1>
@stop

{{-- Меню --}}
@section('nav')
@if (Route::has('login'))
    @auth
        <a href="{{ url('/home') }}">Личный Кабинет</a>
    @else
        <a href="{{ route('login') }}">Войти</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}">Регистрация</a>
        @endif
    @endauth
    @endif
    <a href="{{ route('news') }}">Новости</a>
    <a href="{{ route('categories') }}">Категории</a>
    <a href="{{ route('about') }}">О проекте</a>
    <a href="{{ route('main') }}">Главная</a>
@stop

{{-- Подвал --}}
@section('footer')
    <span>copyright © 2020 all rights reserved</span>
@stop