<?php $__env->startSection('content'); ?>

<main>

<div class="container py-4">
    <h2>管理者トップページ</h2>

    <div class="mb-4">
    <a href="<?php echo e(route ('tour.admin')); ?>"> 
        <button type="button" class="btn btn-secondary btn-lg">大会名編集</button>
    </a>
    <a href="<?php echo e(route ('event.admin')); ?>"> 
        <button type="button" class="btn btn-secondary btn-lg">種目編集</button>
    </a>
    </div>
    

    <form action="<?php echo e(route('serch.user')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('get')); ?>

        <div class="form-group">
            <input type="text" class="form-control col-md-4" placeholder="ユーザー名" name="name">
            <button type="submit" class="btn btn-success col-md-1">検索</button>
        </div>
    </form>

<div class="card">
    <!-- ここに記録一覧の表示 -->
    <table class='table table-striped table-hover'>
        <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>ユーザー名</th>
                <th scope='col'>管理者権限</th>
                <th scope='col'>違反</th>
                <th scope='col'>編集</th>
                <th scope='col'>削除</th>
            </tr>
        </thead>
        <div class="col">
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo e($data['id']); ?></th>
                <th><?php echo e($data['name']); ?></th>
                <th>
                    <?php if($data['role'] === 1): ?>
                    <a href="<?php echo e(route('role.out',['id' => $data['id']])); ?>"><button class="btn btn-warning">管理者権限を解除</button></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('role.in',['id' => $data['id']])); ?>"><button class="btn btn-info">管理者権限を取得</button></a>
                    <?php endif; ?>
                </th>
                <th>
                    <?php if($data['violation'] === 0): ?>
                    <a href="<?php echo e(route('violate.in',['id' => $data['id']])); ?>"><button class="btn btn-dark">違反者にする</button></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('violate.out',['id' => $data['id']])); ?>"><button class="btn btn-secondary">違反者を解除する</button></a>
                    <?php endif; ?>
                </th>
                <th><a href="<?php echo e(route('admin.data.edit',['user' => $data['id']])); ?>"><button class="btn btn-primary">編集</button></a></th>
                <th><a href="<?php echo e(route('user.delete',['user' => $data['id']])); ?>"><button class="btn btn-danger">削除</button></a></th>
            </tr>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </table>
</div>
<?php echo e($datas->links()); ?>

</div>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/Admin.blade.php ENDPATH**/ ?>