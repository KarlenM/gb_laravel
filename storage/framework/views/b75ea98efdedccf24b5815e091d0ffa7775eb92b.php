<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="feedback-list">
        <?php echo e($feedback->links()); ?>

        <div>№</div>
        <div>Дата</div>
        <div>Имя</div>
        <div>Сообщение</div>
        <div>Управление</div>
        <hr>
        <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedbackOne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($feedbackOne['id']); ?></div>
            <div><?php echo e(date('d.m.y', strtotime($feedbackOne['created_at']))); ?></div>
            <div><?php echo e($feedbackOne['firstname']); ?></div>
            <div><?php echo e($feedbackOne['message']); ?></div>
            <div class="control">
                <a href="<?php echo e(route('admin.feedback.edit',
                        [
                            'feedback' => $feedbackOne
                        ]
                    )); ?>" title="Редактировать">Редактировать</a>
                <form action="<?php echo e(route('admin.feedback.destroy',
                        [
                            'feedback' => $feedbackOne
                        ]
                    )); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit">Удалить</button>
                </form>
            </div>
            <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($feedback->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/feedback/index.blade.php ENDPATH**/ ?>