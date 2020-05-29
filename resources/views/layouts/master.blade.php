<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Laravel HW 7 - Валидация данных в laravel</title>
        <link rel="icon" href="/img/core-img/favicon.ico">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <header class="header-area">
            <!-- Top Header Area -->
            <div class="top-header-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="top-header-content d-flex align-items-center justify-content-between">
                                <!-- Logo -->
                                <div class="logo">
                                    <a href="{{ route('main') }}"><img src="/img/core-img/logo.png" alt=""></a>
                                </div>
                                <!-- Login Search Area -->
                                <div class="login-search-area d-flex align-items-center">
                                    <!-- Login -->
                                    <div class="login d-flex">
                                        @if (Route::has('admin.login'))
                                        @auth
                                            <a href="{{ route('admin.main') }}">Личный Кабинет</a>
                                        @else
                                            <a href="{{ route('admin.login') }}">Войти</a>
                                            @if (Route::has('admin.register'))
                                                <a href="{{ route('admin.register') }}">Регистрация</a>
                                            @endif
                                        @endauth
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navbar Area -->
            <div class="newspaper-main-menu" id="stickyMenu">
                <div class="classy-nav-container breakpoint-off">
                    <div class="container">
                        <!-- Menu -->
                        <nav class="classy-navbar justify-content-between" id="newspaperNav">

                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{ route('main') }}"><img src="/img/core-img/logo.png" alt=""></a>
                            </div>

                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>

                            <!-- Menu -->
                            <div class="classy-menu">

                                <!-- close btn -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>

                                <!-- Nav Start -->
                                <div class="classynav">
                                    <ul>
                                        <li @if(Route::currentRouteName() == 'main') class="active" @endif>
                                            <a href="{{ route('main') }}">Главная</a>
                                        </li>
                                        @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('news.category', ['category' => strtolower($category['name_lat'])]) }}">{{ $category['name_cyr'] }}</a>
                                        </li>
                                        @endforeach
                                        <li @if(Route::currentRouteName() == 'download-order') class="active" @endif>
                                            <a href="{{ route('download-order.index') }}">Выгрузка данных</a>
                                        </li>
                                        <li @if(Route::currentRouteName() == 'feedback') class="active" @endif>
                                            <a href="{{ route('feedback.index') }}">Обратная связь</a>
                                        </li>
                                        <li @if(Route::currentRouteName() == 'about') class="active" @endif>
                                            <a href="{{ route('about') }}">О проекте</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Nav End -->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <footer class="footer-area">
            <!-- Main Footer Area -->
            <div class="main-footer-area">
                <div class="container">
                    <div class="row">

                        <!-- Footer Widget Area -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="footer-widget-area mt-80">
                                <!-- Footer Logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="/img/core-img/logo.png" alt=""></a>
                                </div>
                                <!-- List -->
                                <ul class="list">
                                    <li><a href="mailto:smokdog@mac.com">smokdog@mac.com</a></li>
                                    <li><a href="tel:+79210000000">+7 921 000 00 00</a></li>
                                    <li><a href="http://laravel.martinoff.ru/">http://laravel.martinoff.ru</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Widget Area -->
                        <div class="col-12 col-sm-6 col-lg-2"></div>
                            <div class="footer-widget-area mt-80">
                                <!-- Title -->
                                <h4 class="widget-title">News</h4>
                                <!-- List -->
                                <ul class="list">
                                    @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('news.category', ['category' => strtolower($category['name_lat'])]) }}">{{ $category['name_cyr'] }}</a>
                                    </li>
                                    @endforeach
                                    <li><a href="{{ route('about') }}">О проекте</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer Area -->
            <div class="bottom-footer-area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> all rights reserved</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ##### All Javascript Files ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="/js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="/js/bootstrap/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="/js/bootstrap/bootstrap.min.js"></script>
        <!-- All Plugins js -->
        <script src="/js/plugins/plugins.js"></script>
        <!-- Active js -->
        <script src="/js/active.js"></script>
    </body>
</html>