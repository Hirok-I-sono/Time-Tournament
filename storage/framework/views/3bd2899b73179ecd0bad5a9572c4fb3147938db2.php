<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <h3><a href="<?php echo e(route ('admin')); ?>">管理者ページトップへ戻る</a></h3>

    <h2>種目編集<h2>
    <div class="card">
        <table class='table table-success table-striped'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>場所名</th>
                    <th scope='col'>編集</th>
                    <th scope='col'>削除</th>
                </tr>
            </thead>
            <div class="col">
            <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th><?php echo e($place['placeid']); ?></th>
                    <th><?php echo e($place['placename']); ?></th>
                    <th><a href="<?php echo e(route ('admin.place.edit',['id' => $place['placeid']])); ?>"><button class="btn btn-primary">編集</button></a></th>
                    <th><a href="<?php echo e(route ('place.delete',['id' => $place['placeid']])); ?>"><button class="btn btn-danger">削除</button></a></th>
                </tr>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </table>        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/PlaceEdit.blade.php ENDPATH**/ ?>