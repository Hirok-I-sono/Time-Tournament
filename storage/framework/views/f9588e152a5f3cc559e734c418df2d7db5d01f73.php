<?php $__env->startSection('content'); ?>

<main>
    <div class="container py-4">
        <div class="card">
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>日付</th>
                    <th scope='col'>選手</th>
                    <th scope='col'>大会名</th>
                    <th scope='col'>場所</th>
                    <th scope='col'>種目</th>
                    <th scope='col'>記録</th>
                    <th scope='col'>詳細、メモ</th>
                </tr>
            </thead>
            
            <!-- ここに詳細表示 -->
            <tbody>
                <tr>
                    <th scope="col"><?php echo e($allrecord['date']); ?></th>
                    <th scope="col"><?php echo e($player[0]['playername']); ?></th>
                    <th scope="col"><?php echo e($tournament[0]['tourname']); ?></th>
                    <th scope="col"><?php echo e($place[0]['placename']); ?></th>
                    <th scope="col"><?php echo e($event[0]['eventname']); ?></th>
                    <th scope="col"><?php echo e($allrecord['result']); ?></th>
                    <th scope="col"><?php echo e($allrecord['memo']); ?></th>
                </tr>
            </tbody>
        </table>
        <?php if($allrecord['image'] != NULL): ?>
        <h3>画像</h3>
        <img src="<?php echo e('/storage/' . $allrecord['image']); ?>" class='w-25 p-3'/>
        <?php else: ?>
        <h3>画像はありません</h3>
        <?php endif; ?>

        </div>

        <!-- ここにマップ -->
        <?php if($place[0]['lat'] != NULL): ?>
        <div id="map" style="height:350px"></div>
        <!-- <script src="<?php echo e(asset('/js/map.js')); ?>"></script> -->
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBaUny4XRpZn6j19805-MeXsPpRR9vcDCY&callback=initMap" async defer></script>
        <script>//配列をJSON形式に変更する。JSONをパース(解析)して受け取る。
            function initMap() {
                // 緯度・経度を変数に格納
                var lat = JSON.parse('<?php echo json_encode($place[0]['lat']) ?>');
                var lng = JSON.parse('<?php echo json_encode($place[0]['lng']) ?>');
                var mapLatLng = new google.maps.LatLng(lat, lng);
                // マップオプションを変数に格納
                var mapOptions = {
                    zoom : 15,          // 拡大倍率
                    center : mapLatLng  // 緯度・経度
                };
                //マップオブジェクト作成
                var map = new google.maps.Map(
                    document.getElementById("map"), // マップを表示する要素
                    mapOptions         // マップオプション
                );
                //　マップにマーカーを表示する
                var marker = new google.maps.Marker({
                    map : map,             // 対象の地図オブジェクト
                    position : mapLatLng   // 緯度・経度
                });
            }
        </script>
        <?php else: ?>
        <!-- 地図出さない -->
        <?php endif; ?> 

        <!-- ここに編集、削除ボタン（管理者[role1]は編集、削除、完全削除、あと復元 -->
        <!-- 一般人は編集、論理のみ、管理者は編集、完全削除、論理or復元 -->
        <div class="d-flex mt-3">
            <a href="<?php echo e(route('result.update',$allrecord)); ?>">
                <button class="btn btn-primary">編集</button>
            </a>
            <?php if($role[0]['role'] == 1): ?>
            <!-- role1編集完全削除論理削除復元 -->
            <a href="<?php echo e(route('delete',$allrecord)); ?>">
                <button class="btn btn-danger">完全削除</button>
            </a>
                <?php if($allrecord['del_flg'] == 0): ?>
                <a href="<?php echo e(route('delete.destroy',$allrecord)); ?>">
                    <button class="btn btn-warning">削除</button>
                </a>←削除ステータスを非表示にします（管理者でないユーザーは表示からは消えます）
                <?php else: ?>
                <!-- 復元（管理者のみの権限[del_flgを1→0にする]） -->
                <a href="<?php echo e(route('backup',$allrecord)); ?>">
                    <button class="btn btn-outline-dark">データ復元</button>
                </a>
                <?php endif; ?>
            <?php else: ?>
            <!-- role0 -->
            <a href="<?php echo e(route('delete.destroy',$allrecord)); ?>">
                <button class="btn btn-warning">削除</button>
            </a>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/Detail.blade.php ENDPATH**/ ?>