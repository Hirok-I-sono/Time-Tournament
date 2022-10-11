<?php $__env->startSection('content'); ?>
<div style="margin-top:50px;">
<h1>検索結果</h1>
<?php if(!empty($message)): ?>
<div class="alert alert-primary" role="alert"><?php echo e($message); ?></div>
<?php endif; ?>

    <div class="card">
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>詳細</th>
                    <th scope='col'>日付</th>
                    <th scope='col'>選手</th>
                    <th scope='col'>大会名</th>
                    <th scope='col'>種目</th>
                    <th scope='col'>記録</th>
                </tr>
            </thead>
        </table>

        <div class="col">
        <?php $__currentLoopData = $serchrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serchrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope='col'><a href="<?php echo e(route ('result.detail',['record' => $serchrecord['id']])); ?>">#</a></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views//serch.blade.php ENDPATH**/ ?>