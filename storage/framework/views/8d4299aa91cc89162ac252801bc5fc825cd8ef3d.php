<?php $__env->startSection('content'); ?>
    <div class="add-form">
        <form method="POST" action="<?php echo e(route('admin.feedback.update', ['feedback' => $feedback])); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('admin.feedback.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <span>Имя</span>
            <input type="text" name="firstname" value="<?php echo e($feedback->firstname); ?>">
                <?php if ($errors->has('firstname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstname'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span>Сообщение</span>
            <textarea name="message"><?php echo e($feedback->message); ?></textarea>
                <?php if ($errors->has('message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('message'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/feedback/edit.blade.php ENDPATH**/ ?>