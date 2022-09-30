@extends('layouts.layout')
@section('content')
<div class="container"><br>
    <!--検索ボタンが押された時に表示されます-->
<h3>検索条件に一致したデータを表示します</h3>
        @if(!empty($data))
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>詳細</th>
                    <th scope='col'>日付</th>
                    <th scope='col'>選手</th>
                    <th scope='col'>大会名</th>
                    <th scope='col'>種目</th>
                    <th scope='col'>結果</th>
                </tr>
            </thead>
            <div class="col">
                @foreach($data as $item)
                <tr>
                    <th scope='col'><a href="{{ route ('result.detail',['record' => $item['id']]) }}">#</a></th>
                    <th>{{$item['date']}}</th>
                    <th>{{$item['playername']}}</th>
                    <th>{{$item['tourname']}}</th>
                    <th>{{$item['eventname']}}</th>
                    <th>{{$item['result']}}</th>
                </tr>
                @endforeach
            </div>
        </table>
            {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
        @endif
</div>
@endsection