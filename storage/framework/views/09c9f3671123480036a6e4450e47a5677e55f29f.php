<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <a
        href="<?php echo e(route('admin.categories.create')); ?>"
        title="Добавить категорию"
        id="news"
        class="add-link"
    >Добавить категорию</a>

    <div id="categories-list">
        <?php echo e($categories->links()); ?>

        <div>№</div>
        <div>Дата</div>
        <div>Наименование<br>ru</div>
        <div>Наименование<br>en</div>
        <div>Управление</div>
        <hr>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($category['id']); ?></div>
            <div><?php echo e(date('d.m.y', strtotime($category['created_at']))); ?></div>
            <div><?php echo e($category['name_cyr']); ?></div>
            <div><?php echo e($category['name_lat']); ?></div>
            <div class="control">
                <a 
                    <?php if($loop->first): ?> dusk="edit-button" <?php endif; ?>
                        href="<?php echo e(route('admin.categories.edit',
                            [
                                'category' => $category
                            ]
                        )); ?>" 
                    title="Редактировать"
                >Редактировать</a>
                <form action="<?php echo e(route('admin.categories.destroy',
                        [
                            'category' => $category
                        ]
                    )); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button 
                        <?php if($loop->first): ?> dusk="delete-button" <?php endif; ?>
                        type="submit"
                    >Удалить</button>
                </form>
            </div>
            <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($categories->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>