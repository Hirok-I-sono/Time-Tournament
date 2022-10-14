<?php $__env->startSection('content'); ?>

<main class="py-4">

    <h4><a href="<?php echo e(route ('admin')); ?>">管理者ページトップへ戻る</a></h4>

    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>場所編集</h4>
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

                <form action="<?php echo e(route ('admin.place.edit',['id' => $place[0]['placeid']])); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <label for='placename' class='mt-2'>種目</label>
                    <textarea class='form-control' name='placename' value=""><?php echo e($place[0]['placename']); ?></textarea>

                <!-- ジオコーディング -->
                
                <label for='lat' class='mt-2'></label>
                    緯度：<input type="text" id="lat" name="lat">
                <label for='lng' class='mt-2'></label>
                    経度：<input type="text" id="lng" name="lng"><br>
                <!-- <a href="http://www.geocoding.jp/">緯度経度を調べる（http://www.geocoding.jp/）</a><br> -->
                <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBaUny4XRpZn6j19805-MeXsPpRR9vcDCY&callback=initMap" async defer></script>
                <script src="<?php echo e(asset('/js/getLatLng.js')); ?>"></script>

                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                    </div>
                </form>
                <input type="text" id="addressInput">
                    <button id="searchGeo" onclick="getLatLng()">緯度経度変換</button><br>
            </div>
        </div>
        


    </div>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/PlaceUpdate.blade.php ENDPATH**/ ?>