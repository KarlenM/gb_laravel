<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Laravel GeekBrains</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(route('admin.main')); ?>">
                    Личный кабинет
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('admin.login')); ?>">Войти</a>
                            </li>
                            <?php if(Route::has('admin.register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('admin.register')); ?>">Регистрация</a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <ul>
                                        <li>
                                            <a href="<?php echo e(route('admin.news.index')); ?>" title="Управление новостями">
                                                Новости
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('admin.categories.index')); ?>" title="Управление категориями">
                                                Категории
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('admin.resources.index')); ?>" title="Управление Заказами выгрузки">
                                                Ресурсы
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('admin.feedback.index')); ?>" title="Управление Обратной связью">
                                                Обратная связь
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('admin.download-order.index')); ?>" title="Управление Заказами выгрузки">
                                                Заказ выгрузки
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                            
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/admin.blade.php ENDPATH**/ ?>