@extends('layouts.layout')
@section('content')
今は辰巳の場所を出してる
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
        <h3>画像</h3>
        <img src="{{ '/storage/' . $allrecord['image']}}" class='w-25 p-3'/>

        </div>

        <!-- ここにマップ -->
        <!-- 各会場を選択した際の場所にピン止めしたい（if文でtouridと照らし合わせて表示したい） -->
        <div id="map" style="height:350px"></div>
        <script src="{{ asset('/js/map.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBaUny4XRpZn6j19805-MeXsPpRR9vcDCY&callback=initMap" async defer></script>

        <!-- ここに編集、削除ボタン（管理者[role1]は編集、削除、完全削除、あと復元 -->
        <!-- 一般人は編集、論理のみ、管理者は編集、完全削除、論理or復元 -->
        <div class="d-flex justify-content-center mt-3">
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
                </a>
                @else
                <!-- 復元（管理者のみの権限[del_flgを1→0にする]） -->
                <a href="{{ route('backup',$allrecord) }}">
                    <button class="btn btn-light">データ復元</button>
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