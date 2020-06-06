@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Вы вошли!
                    <h3 class="control">Управление</h3>
                    <hr>
                    <ul>
                        <li>
                            <a href="{{ route('admin.news.index') }}" title="Управление новостями">
                                Новости
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.index') }}" title="Управление категориями">
                                Категории
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.resources.index') }}" title="Управление Заказами выгрузки">
                                Ресурсы
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.feedback.index') }}" title="Управление Обратной связью">
                                Обратная связь
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.download-order.index') }}" title="Управление Заказами выгрузки">
                                Заказ выгрузки
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.profiles.index') }}" title="Управление Профилями">
                                Профили
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.parser.index') }}" title="Парсер RSS">
                                Парсер новостей
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
