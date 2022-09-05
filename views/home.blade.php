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
        新規登録（登録できた）、管理者ページ（ロール１）<br>
        カテゴリの追加<br>
        今やること→編集
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
                <th scope='col'><a href="{{ route ('result.detail',['id' => $allrecord['record_id']]) }}">#</a></th>
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