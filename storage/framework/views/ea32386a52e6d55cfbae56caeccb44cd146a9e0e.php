<?php $__env->startSection('content'); ?>
    <div class="add-form">
        <form method="POST" action="<?php echo e(route('admin.download-order.update', ['downloadOrder' => $downloadOrder])); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('admin.download-order.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <span>Имя</span>
            <input type="text" name="firstname" value="<?php echo e($downloadOrder->firstname); ?>">
                <?php if ($errors->has('firstname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstname'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span>Телефон</span>
            <input type="text" name="tel" value="<?php echo e($downloadOrder->tel); ?>">
                <?php if ($errors->has('tel')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tel'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span>Email</span>
            <input type="text" name="email" value="<?php echo e($downloadOrder->email); ?>">
                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span>Сообщение</span>
            <textarea name="message"><?php echo e($downloadOrder->message); ?></textarea>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/download-order/edit.blade.php ENDPATH**/ ?>