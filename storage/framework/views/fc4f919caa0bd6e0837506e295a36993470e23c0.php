<?php $__env->startSection('content'); ?>
    <div class="main-page">
        <div class="add-form">
            <h1>Обратная связь</h1>
            <?php if(session('success')): ?>
                <h2><?php echo e(session('success')); ?></h2>
            <?php else: ?>
            <form method="POST" action="<?php echo e(route('feedback')); ?>">
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
                <button type="submit" class="btn btn-primary merge">Отправить</button>
            </form>
            <?php endif; ?>
        </div>
        <div id="feedback-list">
            <div>№</div>
            <div>Дата</div>
            <div>Имя</div>
            <div>Отзыв</div>
            <hr>
            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><?php echo e($feedback['id']); ?></div>
                <div><?php echo e(date('d.m.y', strtotime($feedback['created_at']))); ?></div>
                <div><?php echo e($feedback['firstname']); ?></div>
                <div><?php echo e($feedback['message']); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/feedback.blade.php ENDPATH**/ ?>