<?php $__env->startSection('content'); ?>

<main class="py-4">

    <h4><a href="<?php echo e(route ('admin')); ?>">管理者ページトップへ戻る</a></h4>

    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>種目編集</h4>
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

                <form action="<?php echo e(route ('admin.event.edit',['id' => $event[0]['eventid']])); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <label for='eventname' class='mt-2'>種目</label>
                    <textarea class='form-control' name='eventname' value=""><?php echo e($event[0]['eventname']); ?></textarea>
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/EventUpdate.blade.php ENDPATH**/ ?>