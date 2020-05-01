<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel GeekBrains</title>
        <link href="/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            @yield('header')
        </header>
        <nav>
            <div class="links">
                @yield('nav')
            </div>
        </nav>
        <div>
            <div class="content">
                @yield('content')
            </div>
        </div>
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>
