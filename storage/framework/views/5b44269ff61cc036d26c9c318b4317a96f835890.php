<?php $__env->startSection('content'); ?>
    <div>
        <h1>パスワードリセットメールを送信しました。</h1>

        <a href="<?php echo e(route('login')); ?>">TOPへ</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/user/reset_password/send_complete.blade.php ENDPATH**/ ?>