@extends('layouts.layout')

    @section('content')
    <main>

    <div class="container py-4">
        
        <div class="">
            <a href="{{route ('result.create') }}">
                <button type="button" class="btn btn-primary">新規登録</button>
            </a>
            <a href="{{route ('admin')}}">
                <button type="button" class="btn btn-secondary">管理者ページ</button>
            </a>
        </div>
        1、CRUD機能OK  2、検索機能まだ  3、画像登録表示OK  4、複数ユーザー権限異なるユーザーの処理OK<br>
        5、ajax、APIまだ  6、3つ以上のDBはOK  7、ResourceControlllerまだ<br><br>
        <h1>残り→パスワードリセット、検索、ajax,API</h1>

        <form action="{{ route('serch')}}" method="post">
        {{ csrf_field()}}
        {{method_field('get')}}
            <div class="form-group">
                <h2>検索</h2>
                <input type="text" class="form-control col-md-4" placeholder="条件入力" name="name">
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
            </tr>    
        @endforeach
        </div>

        </table>
        </div>
    </div>
        
    </main>
    @endsection
    
</html>