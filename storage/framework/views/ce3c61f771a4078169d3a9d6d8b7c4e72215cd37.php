<?php $__env->startSection('content'); ?>
<div class="featured-post-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="row">
                <?php if(isset($selectedCategory)): ?>
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $categoryNews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(strtolower($categoryNews['name_lat']) == $selectedCategory): ?>
                        <!-- Single Featured Post -->
                        <?php if($skey == 0): ?>
                        <div class="col-12 col-lg-7">
                        <?php elseif($skey == 1): ?>
                        <div class="col-12 <?php if($skey == 0): ?> col-lg-7 <?php else: ?> col-lg-5 <?php endif; ?>">
                        <?php endif; ?>
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="/img/bg-img/<?php echo e($key); ?>.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory"><?php echo e($categoryNews['name_cyr']); ?></a>
                                    <a href="<?php echo e(route('news') . '/' . strtolower($categoryNews['name_lat']) . '/' . $categoryNews['id']); ?>" class="post-title">
                                        <h6><?php echo e($categoryNews['title']); ?></h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-excerp"><?php echo e(Str::limit($categoryNews['text'], 327, ' ...')); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php if($skey == 0): ?> </div> <?php endif; ?>
                        <?php $skey++ ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $allNews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="#"><img src="/img/bg-img/<?php echo e($allNews['id']); ?>.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="<?php echo e(route('news') . '/' . strtolower($allNews['name_lat'])); ?>" class="post-catagory"><?php echo e($allNews['name_cyr']); ?></a>
                        <div class="post-meta">
                        <a href="<?php echo e(route('news') . '/' . strtolower($allNews['name_lat']) . '/' . $allNews['id']); ?>" class="post-title">
                                <h6><?php echo e($allNews['title']); ?></h6>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/karlen/Projects/web/gb-laravel/docker/web/resources/views/categories.blade.php ENDPATH**/ ?>