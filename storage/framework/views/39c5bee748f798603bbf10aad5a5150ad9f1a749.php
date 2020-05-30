<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <a 
        href="<?php echo e(route('admin.resources.create')); ?>" 
        title="Добавить ресурс" 
        id="news" 
        class="add-link"
    >Добавить ресурс</a>

    <div id="resources-list">
        <?php echo e($resources->links()); ?>

        <div>№</div>
        <div>Дата</div>
        <div>Наименование</div>
        <div>Управление</div>
        <hr>
        <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($resource['id']); ?></div>
            <div><?php echo e(date('d.m.y', strtotime($resource['created_at']))); ?></div>
            <div><?php echo e($resource['name']); ?></div>
            <div class="control">
                <a 
                    <?php if($loop->first): ?> dusk="edit-button" <?php endif; ?>
                    href="<?php echo e(route('admin.resources.edit',
                            [
                                'resource' => $resource
                            ]
                        )); ?>"
                    title="Редактировать"
                >Редактировать</a>
                <form action="<?php echo e(route('admin.resources.destroy',
                        [
                            'resource' => $resource
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
        <?php echo e($resources->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/resources/index.blade.php ENDPATH**/ ?>