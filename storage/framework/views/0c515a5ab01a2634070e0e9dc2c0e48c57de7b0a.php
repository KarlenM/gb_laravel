<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <a 
        href="<?php echo e(route('admin.sources.create')); ?>" 
        title="Добавить источник" 
        id="sources" 
        class="add-link"
    >Добавить ресурс</a>

    <div id="sources-list">
        <?php echo e($sources->links()); ?>

        <div>№</div>
        <div>Дата</div>
        <div>Наименование</div>
        <div>RSS</div>
        <div>Управление</div>
        <hr>
        <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($source['id']); ?></div>
            <div><?php echo e(date('d.m.y', strtotime($source['created_at']))); ?></div>
            <div><?php echo e($source['name']); ?></div>
            <div><?php echo e($source['link']); ?></div>
            <div class="control">
                <a 
                    <?php if($loop->first): ?> dusk="edit-button" <?php endif; ?>
                    href="<?php echo e(route('admin.sources.edit',
                            [
                                'source' => $source
                            ]
                        )); ?>"
                    title="Редактировать"
                >Редактировать</a>
                <form action="<?php echo e(route('admin.sources.destroy',
                        [
                            'source' => $source
                        ]
                    )); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button
                        <?php if($loop->first): ?> dusk="delete-button" <?php endif; ?>
                        type="submit"
                    >Удалить</button>
                </form>
            </div>
            <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($sources->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/sources/index.blade.php ENDPATH**/ ?>