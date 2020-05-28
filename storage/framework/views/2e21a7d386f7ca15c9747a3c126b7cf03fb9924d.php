<?php $__env->startSection('content'); ?>
    <div class="add-form">
        <form method="POST" action="<?php echo e(route('admin.categories.update', ['categories' => $categories])); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('admin.categories.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <span>Наименование (ru)</span>
            <input type="text" name="name_cyr" value="<?php echo e($categories->name_cyr); ?>">
                <?php if ($errors->has('name_cyr')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name_cyr'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span>Наименование (en)</span>
            <input type="text" name="name_lat" value="<?php echo e($categories->name_lat); ?>">
                <?php if ($errors->has('name_lat')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name_lat'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/categories/edit.blade.php ENDPATH**/ ?>