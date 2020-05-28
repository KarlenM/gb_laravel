<?php $__env->startSection('content'); ?>
    <div class="main-page">
        <div class="add-form">
            <h1>Заказ выгрузки данных</h1>
            <?php if(session('success')): ?>
                <h2><?php echo e(session('success')); ?></h2>
            <?php else: ?>
            <form method="POST" action="<?php echo e(route('download-order.store')); ?>">
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
                <span>Номер телефона</span>
                <input type="number" name="tel" value="<?php echo e(old('tel')); ?>" placeholder="89214445566">
                <?php if ($errors->has('tel')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tel'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                <span>E-mail</span>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>">
                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                <span class="merge">Что вы хотите получить?</span>
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
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', ['categories' => $categories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/download-order.blade.php ENDPATH**/ ?>