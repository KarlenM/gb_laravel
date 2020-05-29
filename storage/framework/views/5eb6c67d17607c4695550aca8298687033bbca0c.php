<?php if(session()): ?>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success merge">
            <?php echo e(session()->get('success')); ?>

        </div>
    <?php elseif(session()->has('error')): ?>
        <div class="alert alert-danger merge">
            <?php echo e(session()->get('error')); ?>

        </div>
    <?php endif; ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/admin/news/partials/messages.blade.php ENDPATH**/ ?>