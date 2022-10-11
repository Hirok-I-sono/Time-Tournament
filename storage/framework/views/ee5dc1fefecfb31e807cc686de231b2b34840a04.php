<?php $__env->startSection('content'); ?>

<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>選手登録</h4>
            </div>
            <div class="card-body">

                <div class="panel-body">
                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>

                <form action="<?php echo e(route('player.create')); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <label for='playername' class='mt-2'>選手名</label>
                    <textarea class='form-control' name='playername' value=""><?php echo e(old('playername')); ?></textarea>
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/PlayerCreate.blade.php ENDPATH**/ ?>