<?php $__env->startSection('content'); ?>
    <div>
        <h1 class="title">新しいパスワードを設定</h1>
        <form method="POST" action="<?php echo e(route('password_reset.update')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="reset_token" value="<?php echo e($userToken->token); ?>">
            <div class="input-group">
                <label for="password" class="label">パスワード</label>
                <input type="password" name="password" class="input <?php echo e($errors->has('password') ? 'incorrect' : ''); ?>">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php $__errorArgs = ['token'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-group">
                <label for="password_confirmation" class="label">パスワードを再入力</label>
                <input type="password" name="password_confirmation" class="input <?php echo e($errors->has('password_confirmation') ? 'incorrect' : ''); ?>">
            </div>
            <button type="submit">パスワードを再設定</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/passChange.blade.php ENDPATH**/ ?>