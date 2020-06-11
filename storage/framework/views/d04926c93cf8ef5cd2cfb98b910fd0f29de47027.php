<?php $__env->startSection('content'); ?>

<div class="featured-post-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="row">
                    <!-- Single Featured Post -->
                    <div class="col-12 col-lg-7">
                        <div class="single-blog-post featured-post">
                            <div class="post-thumb">
                                <a href="<?php echo e(route('news.show',
                                        [
                                            'category' => $news[0]->categories->name_lat,
                                            'id' => $news[0]->id
                                        ]
                                    )); ?>"><img src="img/bg-img/3.jpg" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="<?php echo e(route('news.category',
                                        [
                                            'category' => $news[0]->categories->name_lat
                                        ]
                                    )); ?>" class="post-catagory"><?php echo e($news[0]->categories->name_cyr); ?></a>
                                <a href="<?php echo e(route('news.show',
                                        [
                                            'category' => $news[0]->categories->name_lat, 
                                            'id' => $news[0]->id
                                        ]
                                    )); ?>" class="post-title">
                                    <h6><?php echo e($news[0]['title']); ?></h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#"><?php echo e($news[0]['author']); ?></a></p>
                                    <p class="post-excerp"><?php echo Str::limit($news[0]['text'], 327, ' ...'); ?></p>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                        <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(($key != 0 && $key <= 2)): ?>
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post-2">
                            <div class="post-thumb">
                                <a href="<?php echo e(route('news.show',
                                        [
                                            'category' => $news->categories->name_lat,
                                            'id' => $news->id
                                        ]
                                    )); ?>"><img src="img/bg-img/<?php echo e($key); ?>.jpg" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="<?php echo e(route('news.category',
                                        [
                                            'category' => $news->categories->name_lat
                                        ]
                                    )); ?>" class="post-catagory"><?php echo e($news->categories->name_cyr); ?></a>
                                <div class="post-meta">
                                    <a href="<?php echo e(route('news.show',
                                            [
                                                'category' => $news->categories->name_lat,
                                                'id' => $news->id
                                            ]
                                        )); ?>" class="post-title">
                                        <h6><?php echo e($news['title']); ?></h6>
                                    </a>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                        <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
            <?php $__currentLoopData = $allNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key < 7): ?>
                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="<?php echo e(route('news.show',
                                [
                                    'category' => $news->categories->name_lat,
                                    'id' => $news->id
                                ]
                            )); ?>"><img src="img/bg-img/<?php echo e($key); ?>.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="<?php echo e(route('news.category',
                                [
                                    'category' => $news->categories->name_lat
                                ]
                            )); ?>" class="post-catagory"><?php echo e($news->categories->name_cyr); ?></a>
                        <div class="post-meta">
                            <a href="<?php echo e(route('news.show',
                                    [
                                        'category' => $news->categories->name_lat, 
                                        'id' => $news->id
                                    ]
                                )); ?>" class="post-title">
                                <h6><?php echo e($news['title']); ?></h6>
                            </a>
                            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', ['categories' => $categories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/news/categories/index.blade.php ENDPATH**/ ?>