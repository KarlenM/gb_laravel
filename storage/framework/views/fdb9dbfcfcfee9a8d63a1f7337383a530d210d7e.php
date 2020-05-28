<?php $__env->startSection('content'); ?>
    <div class="add-form">
        <form method="POST" action="<?php echo e(route('admin.resources.store')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('admin.resources.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <span>Наименование</span>
            <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Спорт">
                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <button type="submit" class="btn btn-primary merge">Добавить</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/resources/create.blade.php ENDPATH**/ ?>