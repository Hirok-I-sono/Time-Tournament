<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-8">
        <nav class="card mt-5">
          <div class="card-header text-center"><h2>ログイン</h2></div>
          <div class="card-body">
            <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <p><?php echo e($message); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
            <form action="<?php echo e(route('login')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">送信</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-left">
          <a href="<?php echo e(route('password_reset.email.form')); ?>">パスワードをお忘れの方</a>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/auth/login.blade.php ENDPATH**/ ?>