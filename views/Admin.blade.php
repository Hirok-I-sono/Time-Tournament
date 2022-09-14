@extends('layouts.layout')
@section('content')

このビューはロールが１のユーザーのみが入れるようにする<br>
検索<br>
リスト表示（id、名前、登録数）編集、削除

<main>

<div class="container py-4">
    <h2>管理者トップページ</h2>

    <a href="{{route ('tour.admin')}}"> 
        <button type="button" class="btn btn-secondary">大会名編集</button>
    </a>
    <a href="{{route ('event.admin')}}"> 
        <button type="button" class="btn btn-secondary">種目編集</button>
    </a>

<div class="card">
    <!-- ここに記録一覧の表示 -->
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>ユーザー名</th>
                <th scope='col'>登録数</th>
                <th scope='col'>編集</th>
                <th scope='col'>削除</th>
            </tr>
        </thead>
        <div class="col">
        @foreach($datas as $data)
            <tr>
                <th>{{$data['id']}}</th>
                <th>{{$data['name']}}</th>
                <th>ここは後で調べる</th>
                <th><a href="{{ route('admin.data.edit',['user' => $data['id']]) }}"><button class="btn btn-primary">編集</button></a></th>
                <th><a href="{{ route('user.delete',['user' => $data['id']]) }}"><button class="btn btn-danger">削除</button></a></th>
            </tr>    
        @endforeach
        </div>
    </table>
</div>

</div>

</main>

@endsection