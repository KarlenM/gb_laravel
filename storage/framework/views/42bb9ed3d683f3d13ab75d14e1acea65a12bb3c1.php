<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Laravel HW 4 - класс Request и тестирование</title>
        <link rel="icon" href="/img/core-img/favicon.ico">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <header class="header-area">
            <?php echo $__env->yieldContent('header'); ?>
            <?php echo $__env->yieldContent('nav'); ?>
        </header>
        <?php echo $__env->yieldContent('content'); ?>
        <footer class="footer-area">
            <?php echo $__env->yieldContent('footer'); ?>
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
<?php /**PATH /var/www/html/resources/views/layouts/structure.blade.php ENDPATH**/ ?>