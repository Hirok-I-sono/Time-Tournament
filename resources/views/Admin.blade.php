@extends('layouts.layout')
@section('content')

<main>

<div class="container py-4">
    <h2>管理者トップページ</h2>

    <div class="mb-4">
    <a href="{{route ('tour.admin')}}"> 
        <button type="button" class="btn btn-secondary btn-lg">大会名編集</button>
    </a>
    <a href="{{route ('event.admin')}}"> 
        <button type="button" class="btn btn-secondary btn-lg">種目編集</button>
    </a>
    <a href="{{route ('place.admin')}}"> 
        <button type="button" class="btn btn-secondary btn-lg">場所編集</button>
    </a>
    </div>
    

    <form action="{{ route('serch.user')}}" method="post">
        {{ csrf_field()}}
        {{method_field('get')}}
        <div class="form-group">
            <input type="text" class="form-control col-md-4" placeholder="ユーザー名" name="name">
            <button type="submit" class="btn btn-success col-md-1">検索</button>
        </div>
    </form>

<div class="card">
    <!-- ここに記録一覧の表示 -->
    <table class='table table-striped table-hover'>
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
                    <a href="{{ route('violate.out',['id' => $data['id']]) }}"><button class="btn btn-secondary">違反者を解除する</button></a>
                    @endif
                </th>
                <th><a href="{{ route('admin.data.edit',['user' => $data['id']]) }}"><button class="btn btn-primary">編集</button></a></th>
                <th><a href="{{ route('user.delete',['user' => $data['id']]) }}"><button class="btn btn-danger">削除</button></a></th>
            </tr>    
        @endforeach
        </div>
    </table>
</div>
{{ $datas->links() }}
</div>

</main>

@endsection