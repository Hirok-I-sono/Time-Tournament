<?php $__env->startSection('content'); ?>

<main class="py-4">

    <h4><a href="<?php echo e(route ('admin')); ?>">管理者ページトップへ戻る</a></h4>

    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>大会名編集</h4>
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

                <form action="<?php echo e(route ('admin.tour.edit',['id' => $tour[0]['tourid']])); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <label for='tourname' class='mt-2'>大会名</label>
                    <textarea class='form-control' name='tourname' value=""><?php echo e($tour[0]['tourname']); ?></textarea>
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/TournameUpdate.blade.php ENDPATH**/ ?>