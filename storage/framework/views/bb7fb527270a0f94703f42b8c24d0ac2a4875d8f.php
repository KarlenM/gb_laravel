<?php $__env->startSection('content'); ?>
<div class="featured-post-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="row">
                    <!-- Single Featured Post -->
                    <div class="col-12 col-lg-12">
                        <div class="single-blog-post featured-post">
                            <div class="post-data">
                                
                                <a href="#" class="post-title">
                                    <h6><?php echo e($news['title']); ?></h6>
                                </a>
                                <div class="post-meta">
                                <?php $__currentLoopData = explode("\n", $news['text']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="post-author"><?php echo e($text); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="post-thumb">
                            <img src="/img/bg-img/<?php echo e($news['img']); ?>.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', ['categories' => $categories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/news/show.blade.php ENDPATH**/ ?>