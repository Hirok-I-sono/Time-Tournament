<?php $__env->startSection('content'); ?>
<div class="container"><br>
    
<h3>検索条件に一致したデータを表示します</h3>
<!-- 入力して一致するものが無かった時もエラー出したい -->
<?php if(!empty($message)): ?>
<div class="alert alert-primary" role="alert"><?php echo e($message); ?></div>
<?php endif; ?>
        <?php if($search['name'] != ''): ?>
        <table class='table table-striped table-hover'>
            <thead>
                <tr>
                    <th scope='col'>詳細(ID no.)</th>
                    <th scope='col'>日付</th>
                    <th scope='col'>選手</th>
                    <th scope='col'>大会名</th>
                    <th scope='col'>種目</th>
                    <th scope='col'>記録</th>
                    <?php if($role[0]['role'] == 1): ?>
                    <th scope='col'>削除ステータス</th>
                    <?php else: ?>
                    <!-- role=0　何も表示しない -->
                    <?php endif; ?>
                </tr>
            </thead>
            <div class="col">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope='col'><a href="<?php echo e(route ('result.detail',['record' => $item['id']])); ?>"><?php echo e($item['id']); ?></a></th>
                    <th><?php echo e($item['date']); ?></th>
                    <th><?php echo e($item['playername']); ?></th>
                    <th><?php echo e($item['tourname']); ?></th>
                    <th><?php echo e($item['eventname']); ?></th>
                    <th><?php echo e($item['result']); ?></th>
                    <?php if($role[0]['role'] == 1): ?>
                        <?php if($item['del_flg'] == 0): ?>
                        <th scope='col' class="text-primary">表示中</th>
                        <?php else: ?>
                        <th scope='col' class="text-danger">非表示中</th>
                        <?php endif; ?>
                    <?php else: ?>
                    <!-- role=0　何も表示しない -->
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </table>
            <?php echo e($data->appends(request()->input())->render('pagination::bootstrap-4')); ?>

        <?php else: ?>
        <!-- 何も出さない -->
        <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/serch.blade.php ENDPATH**/ ?>