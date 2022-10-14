@extends('layouts.layout')

    @section('content')

    場所登録時に緯度経度の登録<br>
    管理者は全てのデータを見れるようにする（すべき）<br>
    ジオコーディングの内容の理解

    <main>

    <div class="container py-3">
        
        @if($role[0]['violation'] == 0)
        <h2>あなたは管理者になります</h2>
        <div class="mb-4">
            <a href="{{route ('result.create') }}">
                <button type="button" class="btn btn-primary btn-lg">新規登録</button>
            </a>
            @if($role[0]['role'] == 1)
            <a href="{{route ('admin')}}">
                <button type="button" class="btn btn-secondary">管理者ページ</button>
            </a>
            @else
            <!-- role=0　何も表示しない -->
            @endif
        </div>

        <form action="{{ route('serch')}}" method="post">
        {{ csrf_field()}}
        {{method_field('get')}}
            <div class="form-group">
                <input type="text" class="form-control col-md-4" placeholder="条件入力（フリーワード）" name="name">
                <button type="submit" class="btn btn-success col-md-1">検索</button>
            </div>
        </form><br>
        
        <div class="card shadow bg-body rounded">
        <!-- ここに記録一覧の表示 -->
        <table class='table table-striped table-hover'>
        <thead>
            <tr>
                <th scope='col'>詳細(ID no.)</th>
                <th scope='col'>日付</th>
                <th scope='col'>選手</th>
                <th scope='col'>大会名</th>
                <th scope='col'>種目</th>
                <th scope='col'>記録</th>
                @if($role[0]['role'] == 1)
                <th scope='col'>削除ステータス</th>
                @else
                <!-- role=0　何も表示しない -->
                @endif
            </tr>
        </thead>

        <div class="col">
        @foreach($allrecords as $allrecord)
            <tr>
                <th scope='col'><a href="{{ route ('result.detail',['record' => $allrecord['id']]) }}">{{$allrecord['id']}}</a></th>
                <th>{{$allrecord['date']}}</th>
                <th>{{$allrecord['playername']}}</th>
                <th>{{$allrecord['tourname']}}</th>
                <th>{{$allrecord['eventname']}}</th>
                <th>{{$allrecord['result']}}</th>
                @if($role[0]['role'] == 1)
                    @if($allrecord['del_flg'] == 0)
                    <th scope='col' class="text-primary">表示中</th>
                    @else
                    <th scope='col' class="text-danger">非表示中</th>
                    @endif
                @else
                <!-- role=0　何も表示しない -->
                @endif
            </tr>    
        @endforeach
        </div>

        </table>
        </div>
        {{ $allrecords->links() }}
    </div>
    @else
    <h1>アカウントは違反により停止されています</h1>
    @endif
        
    </main>
    @endsection