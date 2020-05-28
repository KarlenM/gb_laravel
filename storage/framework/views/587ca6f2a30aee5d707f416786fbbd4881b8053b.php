<?php $__env->startSection('content'); ?>
    <div class="add-form">
        <form method="POST" action="<?php echo e(route('news.store')); ?>">
            <?php echo csrf_field(); ?>
            <?php if(session()): ?>
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success merge">
                        <?php echo e(session()->get('success')); ?>

                    </div>
                <?php elseif(session()->has('error')): ?>
                    <div class="alert alert-danger merge">success
                        <?php echo e(session()->get('error')); ?>

                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <span>Заголовок</span>
            <input type="text" name="title" value="<?php echo e(old('title')); ?>">
                <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span>Автор</span>
            <input type="text" name="author" value="<?php echo e(old('author')); ?>">
                <?php if ($errors->has('author')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('author'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span>Категория</span>
            <select name="category_id">
                <option 
                    disabled
                    <?php if(empty(old('category_id'))): ?> selected <?php endif; ?>
                >Выбрать</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category['id']); ?>"
                        <?php if(old('category_id') == $category['id']): ?> selected <?php endif; ?>
                    ><?php echo e($category['name_cyr']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
                <?php if ($errors->has('message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('message'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span>Ресурс</span>
            <select name="resource_id">
                <option 
                    disabled
                    <?php if(empty(old('category_id'))): ?> selected <?php endif; ?>
                >Выбрать</option>
                <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($resource['id']); ?>"
                        <?php if(old('resource_id') == $resource['id']): ?> selected <?php endif; ?>
                    ><?php echo e($resource['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
                <?php if ($errors->has('message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('message'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span>Картинка</span>
            <input name="img" type="file">
            <?php if ($errors->has('img')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('img'); ?>
                <div class="alert alert-danger merge"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <span class="merge">Новость</span>
            <textarea name="text" cols="30" rows="10" class="merge"><?php echo e(old('text')); ?></textarea>
                <?php if ($errors->has('text')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('text'); ?>
                    <div class="alert alert-danger merge"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <button type="submit" class="btn btn-primary merge">Добавить</button>
        </form>
        <?php if(Route::current()->getName() == 'news.create'): ?>
            <div id="news-list">
                <div>№</div>
                <div>Дата</div>
                <div>Автор</div>
                <div>Категория</div>
                <div>Ресурс</div>
                <div>Заголовок</div>
                <div>Текст</div>
                <div>Картинка</div>
                <div>Управление</div>
                <hr>
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e($news['id']); ?></div>
                    <div><?php echo e(date('d.m.y', strtotime($news['created_at']))); ?></div>
                    <div><?php echo e($news['author']); ?></div>
                    <div><?php echo e($news['category_id']); ?></div>
                    <div><?php echo e($news['resource_id']); ?></div>
                    <div><?php echo e($news['title']); ?></div>
                    <div><?php echo e(Str::limit($news['text'], 327, ' ...')); ?></div>
                    <div><?php echo e($news['img']); ?></div>
                    <div class="control">
                        <a href="<?php echo e(route('news.edit', ['news' => $news])); ?>" title="Редактировать">Редактировать</a>
                        <form action="<?php echo e(route('news.destroy', ['news' => $news])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            
                            <button type="submit">Удалить</button>
                        </form>
                    </div>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/news.blade.php ENDPATH**/ ?>