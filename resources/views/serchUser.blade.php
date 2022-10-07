@extends('layouts.layout')
@section('content')
<div class="container"><br>
<h4><a href="{{ route ('admin') }}">管理者ページトップへ戻る</a></h4>
    <!--検索ボタンが押された時に表示されます-->
<h3>検索条件に一致したユーザを表示します</h3>
        @if(!empty($datas))
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>ユーザー名</th>
                    <th scope='col'>管理者権限</th>
                    <th scope='col'>違反</th>
                    <th scope='col'>編集</th>
                    <th scope='col'>削除</th>
                </tr>
            </thead>
            <div class="col">
                @foreach($datas as $data)
                <tr>
                    <th>{{$data['id']}}</th>
                    <th>{{$data['name']}}</th>
                    <th>
                        @if($data['role'] === 1)
                        <a href="{{ route('role.out',['id' => $data['id']]) }}"><button class="btn btn-warning">管理者権限を解除</button></a>
                        @else
                        <a href="{{ route('role.in',['id' => $data['id']]) }}"><button class="btn btn-info">管理者権限を取得</button></a>
                        @endif
                    </th>
                    <th>
                        @if($data['violation'] === 0)
                        <a href="{{ route('violate.in',['id' => $data['id']]) }}"><button class="btn btn-dark">違反者にする</button></a>
                        @else
                        <a href="{{ route('violate.out',['id' => $data['id']]) }}"><button class="btn btn-dark">違反者を解除する</button></a>
                        @endif
                    </th>
                    <th><a href="{{ route('admin.data.edit',['user' => $data['id']]) }}"><button class="btn btn-primary">編集</button></a></th>
                    <th><a href="{{ route('user.delete',['user' => $data['id']]) }}"><button class="btn btn-danger">削除</button></a></th>
                </tr>    
                @endforeach
            </div>
        </table>
            {{ $datas->appends(request()->input())->render('pagination::bootstrap-4') }}
        @endif
</div>
@endsection