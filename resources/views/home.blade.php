@extends('layouts.layout')

    @section('content')
    <main>

    <div class="container py-4">
        <h3>やることリスト<h3><br>
        google map API←地図表示はOK、各会場で選択した所にピン止めしたい<br>
        パスリセの細かな修正<br>
        検索引っ掛からなかった時のエラー（recordsの各種idは引っかからないようにしたい）<br>
        
        @if($role[0]['violation'] == 0)
        <div class="">
            <a href="{{route ('result.create') }}">
                <button type="button" class="btn btn-primary">新規登録</button>
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
                <h3>検索</h3>
                <input type="text" class="form-control col-md-4" placeholder="条件入力（フリーワード）" name="name">
                <button type="submit" class="btn btn-primary col-md-1">検索</button>
            </div>
        </form><br>
        
        <div class="card">
        <!-- ここに記録一覧の表示 -->
        <table class='table'>
        <thead>
            <tr>
                <th scope='col'>詳細</th>
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
                <th scope='col'><a href="{{ route ('result.detail',['record' => $allrecord['id']]) }}">#</a></th>
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