<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="profiles-list">
        <?php echo e($profiles->links()); ?>

        <div>№</div>
        <div>Имя</div>
        <div>Email</div>
        <div>Права администратора</div>
        <div>Дата регистрации</div>
        <div>Управление</div>
        <hr>
        <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($profile['id']); ?></div>
            <div><?php echo e($profile['name']); ?></div>
            <div><?php echo e($profile['email']); ?></div>
            <div><?php if($profile['admin']): ?> Да <?php else: ?> Нет <?php endif; ?></div>
            <div><?php echo e(date('d.m.y', strtotime($profile['created_at']))); ?></div>
            <div class="control">
                <a 
                    <?php if($loop->first): ?> dusk="edit-button" <?php endif; ?>
                    href="<?php echo e(route('admin.profiles.edit', 
                            [
                                'profile' => $profile
                            ]
                        )); ?>"
                    title="Редактировать"
                >Редактировать</a>
            </div>
            <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($profiles->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/profiles/index.blade.php ENDPATH**/ ?>