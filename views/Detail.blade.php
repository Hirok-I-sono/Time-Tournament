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
            <?php var_dump($allrecord[0]); ?>
                <tr>
                    <th scope="col">{{ $allrecord[0]['date']}}</th>
                    <th scope="col">{{ $allrecord[0]['playername']}}</th>
                    <th scope="col">{{ $allrecord[0]['tourname']}}</th>
                    <th scope="col">{{ $allrecord[0]['placename']}}</th>
                    <th scope="col">{{ $allrecord[0]['eventname']}}</th>
                    <th scope="col">{{ $allrecord[0]['result']}}</th>
                    <th scope="col">{{ $allrecord[0]['memo']}}</th>
                </tr>
            </tbody>
        </table>
        </div>
        <!-- ここに編集、削除ボタン（管理者は編集、削除、完全削除 -->
        ここに編集削除完全削除
        <div class="d-flex justify-content-center mt-3">
            <a href="{{route('update',['id' => $allrecord[0]['record_id']])}}">
                updateとupdateしたいid
                <button class="btn btn-primary">編集</button>
            </a>
            <a href="{{route('delete',['id' => $allrecord[0]['record_id']])}}">
                削除したいid
                <button class="btn btn-warning">削除</button>
            </a>
        </div>
    </div>
</main>
@endsection