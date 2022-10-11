<?php $__env->startSection('content'); ?>
<div class="container"><br>
<h4><a href="<?php echo e(route ('admin')); ?>">管理者ページトップへ戻る</a></h4>
    <!--検索ボタンが押された時に表示されます-->
<h3>検索条件に一致したユーザを表示します</h3>
<?php if(!empty($message)): ?>
<div class="alert alert-primary" role="alert"><?php echo e($message); ?></div>
<?php endif; ?>
        <?php if($search != ''): ?>
        <table class='table'>
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
                        <a href="<?php echo e(route('violate.out',['id' => $data['id']])); ?>"><button class="btn btn-dark">違反者を解除する</button></a>
                        <?php endif; ?>
                    </th>
                    <th><a href="<?php echo e(route('admin.data.edit',['user' => $data['id']])); ?>"><button class="btn btn-primary">編集</button></a></th>
                    <th><a href="<?php echo e(route('user.delete',['user' => $data['id']])); ?>"><button class="btn btn-danger">削除</button></a></th>
                </tr>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </table>
            <?php echo e($datas->appends(request()->input())->render('pagination::bootstrap-4')); ?>

        <?php else: ?>
        <!-- 何も出さない -->
        <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/serchUser.blade.php ENDPATH**/ ?>