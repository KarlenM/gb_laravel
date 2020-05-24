<?php $__env->startSection('content'); ?>
<div class="title m-b-md" id="page">
    Новости
</div>
<div class="container-news">
    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <strong><?php echo e($news['title']); ?></strong>
            <a href="<?php echo e(url('news/' . $news['name_lat'] . '/' . $news['id'])); ?>">
            <?php $__currentLoopData = explode("\n", $news['text']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($text); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/news.blade.php ENDPATH**/ ?>