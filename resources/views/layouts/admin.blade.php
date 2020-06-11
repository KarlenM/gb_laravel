<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel GeekBrains</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.main') }}">
                    Личный кабинет
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.login') }}">Войти</a>
                            </li>
                            @if (Route::has('admin.register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                                            <a href="{{ route('admin.parser.index') }}" title="Управление Заказами выгрузки">
                                                Парсер новостей
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
