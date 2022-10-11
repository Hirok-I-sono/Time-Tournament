<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card mt-5">
        <h1>パスワード再設定メール送信フォーム</h1>
        <form method="POST" action="<?php echo e(route('password_reset.email.send')); ?>">
            <?php echo csrf_field(); ?>
            <div>
                <label for="email">メールアドレス</label>
                <input type="text" name="email" id="email" value="<?php echo e(old('email')); ?>">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <button class="btn btn-secondary">再設定用メールを送信</button>
            
        </form>

        <a href="<?php echo e(route('login')); ?>">戻る</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/email_form.blade.php ENDPATH**/ ?>