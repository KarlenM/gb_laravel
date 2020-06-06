<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger merge">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
    <div id="parser">
        <form action="<?php echo e(route('admin.parser.store')); ?>" mathod="POST">
            <div>
                <input type="radio" name="rss" id="news" value="http://www.reddit.com/r/news/.rss">
                <label for="news">http://www.reddit.com/r/news/.rss</label>
                <input type="radio" name="rss" id="alienth" value="http://www.reddit.com/user/alienth/.rss">
                <label for="alienth">http://www.reddit.com/user/alienth/.rss</label>
                <input type="radio" name="rss" id="wtf" value="http://www.reddit.com/r/news+wtf.rss">
                <label for="wtf">http://www.reddit.com/r/news+wtf.rss</label>
            </div>
            <button class="btn btn-primary">Добавить новости из стороннего источника</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/parser/index.blade.php ENDPATH**/ ?>