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
            <?php //var_dump($allrecord[0]); ?>
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
        <h3>画像</h3>
        <img src="{{ '/storage/' . $allrecord['image']}}" class='w-25 p-3'/>

        </div>

        <!-- ここにマップ -->
        <a href="google_map" >Google Map</a>
        <!-- <div id="map" style="height:350px">マップ出てほしい</div>
        <script src="{{ asset('/js/map.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=[AIzaSyA5j4z75-XO4QdXFVZAmS4tRmEJTD7sx34]&callback=initMap" async defer></script> -->

        <!-- ここに編集、削除ボタン（管理者は編集、削除、完全削除 -->
        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('result.update',$allrecord) }}">
                <button class="btn btn-primary">編集</button>
            </a>
            <a href="{{ route('delete',$allrecord) }}">
                <button class="btn btn-danger">完全削除</button>
            </a>
            <a href="{{ route('delete.destroy',$allrecord) }}">
                <button class="btn btn-warning">論理削除</button>
            </a>
        </div>
    </div>
</main>
@endsection