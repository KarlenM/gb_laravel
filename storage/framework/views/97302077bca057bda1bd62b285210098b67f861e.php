<?php $__env->startSection('header'); ?>
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?php echo e(route('main')); ?>"><img src="/img/core-img/logo.png" alt=""></a>
                        </div>
                        <!-- Login Search Area -->
                        <div class="login-search-area d-flex align-items-center">
                            <!-- Login -->
                            <div class="login d-flex">
                                <?php if(Route::has('login')): ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <a href="<?php echo e(url('/home')); ?>">Личный Кабинет</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>">Войти</a>
                                    <?php if(Route::has('register')): ?>
                                        <a href="<?php echo e(route('register')); ?>">Регистрация</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('nav'); ?>
    <!-- Navbar Area -->
    <div class="newspaper-main-menu" id="stickyMenu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="newspaperNav">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="<?php echo e(route('main')); ?>"><img src="/img/core-img/logo.png" alt=""></a>
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
                                <li <?php if(Route::currentRouteName() == 'main'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('main')); ?>">Главная</a></li>
                                <li <?php if(request()->path() == 'news/politics'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('news')); ?>/politics">Политика</a></li>
                                <li <?php if(request()->path() == 'news/economics'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('news')); ?>/economics">Экономика</a></li>
                                <li <?php if(request()->path() == 'news/it'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('news')); ?>/it">ИТ</a></li>
                                <li <?php if(request()->path() == 'news/sport'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('news')); ?>/sport">Спорт</a></li>
                                <li <?php if(Route::currentRouteName() == 'download-order'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('download-order')); ?>">Выгрузка данных</a></li>
                                <li <?php if(Route::currentRouteName() == 'feedback'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('feedback')); ?>">Обратная связь</a></li>
                                <li <?php if(Route::currentRouteName() == 'about'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('about')); ?>">О проекте</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
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
                            <li><a href="<?php echo e(route('news')); ?>/politics">Политика</a></li>
                            <li><a href="<?php echo e(route('news')); ?>/economics">Экономика</a></li>
                            <li><a href="<?php echo e(route('news')); ?>/it">ИТ</a></li>
                            <li><a href="<?php echo e(route('news')); ?>/sport">Спорт</a></li>
                            <li><a href="<?php echo e(route('about')); ?>">О проекте</a></li>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.structure', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/layouts/master.blade.php ENDPATH**/ ?>