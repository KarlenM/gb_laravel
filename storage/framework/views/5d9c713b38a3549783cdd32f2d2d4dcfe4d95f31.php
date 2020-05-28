<?php $__env->startSection('content'); ?>
<?php echo $__env->make('feedback.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-page">
        <div class="add-form">
            <h1>Обратная связь</h1>
            <form method="POST" action="<?php echo e(route('feedback.store')); ?>">
                <?php echo csrf_field(); ?>
                <span>Имя</span>
                <input type="text" name="firstname" value="<?php echo e(old('firstname')); ?>">
                    <?php if ($errors->has('firstname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstname'); ?>
                        <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                <span class="merge">Отзыв</span>
                <textarea name="message" cols="30" rows="4" class="merge"><?php echo e(old('message')); ?></textarea>
                    <?php if ($errors->has('message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('message'); ?>
                        <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                <button type="submit" class="btn btn-primary merge">Заказать</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', ['categories' => $categories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/feedback/create.blade.php ENDPATH**/ ?>