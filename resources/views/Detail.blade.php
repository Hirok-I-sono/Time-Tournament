@extends('layouts.layout')
@section('content')

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
                    <th scope="col">{{ $allrecord['date']}}</th>
                    <th scope="col">{{ $player[0]['playername']}}</th>
                    <th scope="col">{{ $tournament[0]['tourname']}}</th>
                    <th scope="col">{{ $place[0]['placename']}}</th>
                    <th scope="col">{{ $event[0]['eventname']}}</th>
                    <th scope="col">{{ $allrecord['result']}}</th>
                    <th scope="col">{{ $allrecord['memo']}}</th>
                </tr>
            </tbody>
        </table>
        @if($allrecord['image'] != NULL)
        <h3>画像</h3>
        <img src="{{ '/storage/' . $allrecord['image']}}" class='w-25 p-3'/>
        @else
        <h3>画像はありません</h3>
        @endif

        </div>

        <!-- ここにマップ -->
        @if($place[0]['lat'] != NULL)
        <div id="map" style="height:350px"></div>
        <!-- <script src="{{ asset('/js/map.js') }}"></script> -->
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
        @else
        <!-- 地図出さない -->
        @endif 

        <!-- ここに編集、削除ボタン（管理者[role1]は編集、削除、完全削除、あと復元 -->
        <!-- 一般人は編集、論理のみ、管理者は編集、完全削除、論理or復元 -->
        <div class="d-flex mt-3">
            <a href="{{ route('result.update',$allrecord) }}">
                <button class="btn btn-primary">編集</button>
            </a>
            @if($role[0]['role'] == 1)
            <!-- role1編集完全削除論理削除復元 -->
            <a href="{{ route('delete',$allrecord) }}">
                <button class="btn btn-danger">完全削除</button>
            </a>
                @if($allrecord['del_flg'] == 0)
                <a href="{{ route('delete.destroy',$allrecord) }}">
                    <button class="btn btn-warning">削除</button>
                </a>←削除ステータスを非表示にします（管理者でないユーザーは表示からは消えます）
                @else
                <!-- 復元（管理者のみの権限[del_flgを1→0にする]） -->
                <a href="{{ route('backup',$allrecord) }}">
                    <button class="btn btn-outline-dark">データ復元</button>
                </a>
                @endif
            @else
            <!-- role0 -->
            <a href="{{ route('delete.destroy',$allrecord) }}">
                <button class="btn btn-warning">削除</button>
            </a>
            @endif
        </div>
    </div>
</main>

@endsection