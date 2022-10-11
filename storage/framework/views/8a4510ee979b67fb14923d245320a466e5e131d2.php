<?php $__env->startSection('content'); ?>
<main class="py-4">
        <div class="col-md-7 mx-auto">
            <div class="card shadow mb-3 bg-body rounded">
                <div class="card-header">
                    <h1 class='text-center'>新規登録</h1>
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

                        <form action="<?php echo e(route('result.create')); ?>" method="post" enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
                            <!-- 日付 -->
                            <label for='date' class='mt-2'>日付(Date)</label>
                                <input type='date' class='form-control' name='date' id='date' value="<?php echo e(old('date')); ?>"/>

                            <!-- 選手 -->
                            <label for='player' class='mt-2'>選手(Player)</label>
                            <select name='player_id' class='form-control' value="<?php echo e(old('player_id')); ?>">
                                <option value='' hidden>選手</option>
                                <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($player['playerid']); ?>"><?php echo e($player['playername']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <a href="<?php echo e(route('player.create')); ?>">選手登録</a>←選手の登録はコチラからお願いします<br>

                            <!-- 場所 -->
                            <label for='place' class='mt-2'>場所(Place)</label>
                            <select name='place_id' class='form-control' >
                            <option value='' hidden>場所</option>
                                <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($place['placeid']); ?>"><?php echo e($place['placename']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <!-- 大会名 -->
                            <label for='tournament' class='mt-2'>大会名(Tournament)</label>
                            <select name='tournament_id' class='form-control'>
                            <option value='' hidden>大会名</option>
                                <?php $__currentLoopData = $tournaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tournament): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tournament['tourid']); ?>"><?php echo e($tournament['tourname']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <!-- 種目 -->
                            <label for='event' class='mt-2'>種目(Event)</label>
                            <select name='event_id' class='form-control'>
                            <option value='' hidden>種目</option>
                                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($event['eventid']); ?>"><?php echo e($event['eventname']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                                
                            <!-- 記録 -->
                            <label for='result'>記録(Result)</label>
                                <input type='text' class='form-control' name='result' value="<?php echo e(old('result')); ?>"/>

                            <!-- メモ、写真アップロード -->
                            <label for='memo' class='mt-2'>メモ、画像(Memo.Image)</label>
                            <input type="file" class="form-control-file" name='image' id="image">
                                <textarea class='form-control' name='memo' value=""><?php echo e(old('memo')); ?></textarea>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>
                    </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/Create.blade.php ENDPATH**/ ?>