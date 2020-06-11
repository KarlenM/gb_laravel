<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    Вы вошли!
                    <h3 class="control">Управление</h3>
                    <hr>
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
                        <li>
                            <a href="<?php echo e(route('admin.profiles.index')); ?>" title="Управление Профилями">
                                Профили
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.parser.index')); ?>" title="Парсер RSS">
                                Парсер новостей
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.sources.index')); ?>" title="Парсер RSS">
                                RSS Источники
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/index.blade.php ENDPATH**/ ?>