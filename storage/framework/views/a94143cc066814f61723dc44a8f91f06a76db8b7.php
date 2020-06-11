<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger merge">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
    <div class="add-form">
        <form method="POST" action="<?php echo e(route('admin.news.update', ['news' => $news])); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <span>Заголовок</span>
            <input type="text" name="title" value="<?php echo e($news->title); ?>">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <span>Автор</span>
            <input type="text" name="author" value="<?php echo e($news->author); ?>">
                <?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <span>Категория</span>
            <select name="category_id">
                <option 
                    disabled
                    <?php if(empty($news->category_id)): ?> selected <?php endif; ?>
                >Выбрать</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category['id']); ?>"
                        <?php if($news->category_id == $category['id']): ?> selected <?php endif; ?>
                    ><?php echo e($category['name_cyr']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <span>Ресурс</span>
            <select name="resource_id">
                <option 
                    disabled
                    <?php if(empty($news->category_id)): ?> selected <?php endif; ?>
                >Выбрать</option>
                <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($resource['id']); ?>"
                        <?php if($news->resource_id == $resource['id']): ?> selected <?php endif; ?>
                    ><?php echo e($resource['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <span>Картинка</span>
            <input name="img" type="file">
                <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <span class="merge">Новость</span>
            <textarea id="text" name="text" cols="30" rows="10" class="merge"><?php echo e($news->text); ?></textarea>
                <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <button type="submit" class="btn btn-primary merge">Сохранить</button>
        </form>
    </div>
        <!-- CKEditro -->
        <script src="<?php echo e(asset("js/jquery/jquery-2.2.4.min.js")); ?>"></script>
        <script src="<?php echo e(asset("ckeditor/ckeditor.js")); ?>"></script>
        <script src="<?php echo e(asset("ckeditor/adapters/jquery.js")); ?>"></script>
        <script>
            $(document).ready(function () {
                CKEDITOR.replace('text', {
                    language: 'ru',
                    height: '300',
                    filebrowserBrowseUrl: '/filemanager?type=Images',
                    filebrowserUploadUrl: '/filemanager/upload?type=Images&_token=',
                    filebrowserImageBrowseUrl: '/filemanager?type=Files',
                    filebrowserImageUploadUrl: '/filemanager/upload?type=Files&_token=',
                });
            });
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/news/edit.blade.php ENDPATH**/ ?>