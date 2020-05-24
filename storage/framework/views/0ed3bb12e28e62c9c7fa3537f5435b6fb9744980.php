<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('redir'); ?>
        <script>
            setTimeout(function() { window.location.href = '/news/add' }, 3000)
        </script>
    <?php $__env->stopPush(); ?>
    <div class="add-form">
        <form method="POST" action="<?php echo e(route('news-add')); ?>">
            <?php echo csrf_field(); ?>
        <?php if(empty($result)): ?>
            <span>Заголовок</span>
            <input type="text" name="title">
            <span>Категория</span>
            <select name="category">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name_cyr']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span>Картинка</span>
            <input name="img" type="file">
            <span class="merge">Новость</span>
            <textarea name="news" cols="30" rows="10" class="merge"></textarea>
            <button type="submit" class="btn btn-primary merge">Добавить</button>
        <?php endif; ?>
        <?php if(isset($result)): ?>
            <?php echo $__env->yieldPushContent('redir'); ?>
            <span class="success merge">
                <?php if($result): ?>
                    Новость добавлена
                <?php else: ?>
                    Ошибка добавления
                <?php endif; ?>
            </span>
        <?php endif; ?>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/add.blade.php ENDPATH**/ ?>