<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('admin.news.create')); ?>" title="Добавить новость" id="news" class="add-link">Добавить новость</a>

    <div id="news-list">
        <?php echo e($news->links()); ?>

        <div>№</div>
        <div>Дата</div>
        <div>Автор</div>
        <div>Категория</div>
        <div>Ресурс</div>
        <div>Заголовок</div>
        <div>Текст</div>
        <div>Картинка</div>
        <div>Управление</div>
        <hr>
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneNews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($oneNews['id']); ?></div>
            <div><?php echo e(date('d.m.y', strtotime($oneNews['created_at']))); ?></div>
            <div><?php echo e($oneNews['author']); ?></div>
            <div><?php echo e($oneNews->categories->name_cyr); ?></div>
            <div><?php echo e($oneNews->resources->name); ?></div>
            <div><?php echo e($oneNews['title']); ?></div>
            <div><?php echo e(Str::limit($oneNews['text'], 327, ' ...')); ?></div>
            <div><?php echo e($oneNews['img']); ?></div>
            <div class="control">
                <a href="<?php echo e(route('admin.news.edit', ['news' => $oneNews])); ?>" title="Редактировать">Редактировать</a>
                <form action="<?php echo e(route('admin.news.destroy', ['news' => $oneNews])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit">Удалить</button>
                </form>
            </div>
            <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($news->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/news/index.blade.php ENDPATH**/ ?>