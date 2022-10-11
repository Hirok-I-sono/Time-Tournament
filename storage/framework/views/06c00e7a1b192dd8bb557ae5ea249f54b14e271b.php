<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <h3><a href="<?php echo e(route ('admin')); ?>">管理者ページトップへ戻る</a></h3>
    
    <div class="col mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>ユーザー編集</h4>
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
                
                <form action="<?php echo e(route('admin.data.edit',['user' => $data['id']])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <label for='name' class='mt-2'>ユーザー名</label>
                        <textarea class='form-control' name='name' value=""><?php echo e($data['name']); ?></textarea>
                        
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>変更</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/AdminEdit.blade.php ENDPATH**/ ?>