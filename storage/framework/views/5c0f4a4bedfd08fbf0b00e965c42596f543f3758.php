    <?php $__env->startSection('content'); ?>

    大会の会場の、緯度経度について<br>
    見た目をもっとオリジナリティに<br>
    var_dumpを消す<br>

    <main>

    <div class="container py-3">
        
        <?php if($role[0]['violation'] == 0): ?>
        <h2>あなたは管理者になります</h2>
        <div class="mb-4">
            <a href="<?php echo e(route ('result.create')); ?>">
                <button type="button" class="btn btn-primary btn-lg">新規登録</button>
            </a>
            <?php if($role[0]['role'] == 1): ?>
            <a href="<?php echo e(route ('admin')); ?>">
                <button type="button" class="btn btn-secondary">管理者ページ</button>
            </a>
            <?php else: ?>
            <!-- role=0　何も表示しない -->
            <?php endif; ?>
        </div>

        <form action="<?php echo e(route('serch')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('get')); ?>

            <div class="form-group">
                <input type="text" class="form-control col-md-4" placeholder="条件入力（フリーワード）" name="name">
                <button type="submit" class="btn btn-success col-md-1">検索</button>
            </div>
        </form><br>
        
        <div class="card shadow bg-body rounded">
        <!-- ここに記録一覧の表示 -->
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
        <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope='col'><a href="<?php echo e(route ('result.detail',['record' => $allrecord['id']])); ?>"><?php echo e($allrecord['id']); ?></a></th>
                <th><?php echo e($allrecord['date']); ?></th>
                <th><?php echo e($allrecord['playername']); ?></th>
                <th><?php echo e($allrecord['tourname']); ?></th>
                <th><?php echo e($allrecord['eventname']); ?></th>
                <th><?php echo e($allrecord['result']); ?></th>
                <?php if($role[0]['role'] == 1): ?>
                    <?php if($allrecord['del_flg'] == 0): ?>
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
        </div>
        <?php echo e($allrecords->links()); ?>

    </div>
    <?php else: ?>
    <h1>アカウントは違反により停止されています</h1>
    <?php endif; ?>
        
    </main>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/home.blade.php ENDPATH**/ ?>