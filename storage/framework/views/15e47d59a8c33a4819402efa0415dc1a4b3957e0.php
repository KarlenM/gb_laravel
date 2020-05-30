<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="download-order-list">
        <?php echo e($downloadOrder->links()); ?>

        <div>№</div>
        <div>Дата</div>
        <div>Имя</div>
        <div>Телефон</div>
        <div>Email</div>
        <div>Сообщение</div>
        <div>Управление</div>
        <hr>
        <?php $__currentLoopData = $downloadOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $downloadOrderOne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($downloadOrderOne['id']); ?></div>
            <div><?php echo e(date('d.m.y', strtotime($downloadOrderOne['created_at']))); ?></div>
            <div><?php echo e($downloadOrderOne['firstname']); ?></div>
            <div><?php echo e($downloadOrderOne['tel']); ?></div>
            <div><?php echo e($downloadOrderOne['email']); ?></div>
            <div><?php echo e($downloadOrderOne['message']); ?></div>
            <div class="control">
                <a 
                    <?php if($loop->first): ?> dusk="edit-button" <?php endif; ?>
                    href="<?php echo e(route('admin.download-order.edit',
                            [
                                'download_order' => $downloadOrderOne
                            ]
                        )); ?>"
                    title="Редактировать"
                >Редактировать</a>
                <form action="<?php echo e(route('admin.download-order.destroy',
                        [
                            'download_order' => $downloadOrderOne
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
        <?php echo e($downloadOrder->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/download-order/index.blade.php ENDPATH**/ ?>