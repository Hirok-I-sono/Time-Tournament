@extends('layouts.layout')
@section('content')
<div class="container"><br>
    
<h3>検索条件に一致したデータを表示します</h3>
<!-- 入力して一致するものが無かった時もエラー出したい -->
@if(!empty($message))
<div class="alert alert-primary" role="alert">{{ $message }}</div>
@endif
        @if($search['name'] != '')
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
                @foreach($data as $item)
                <tr>
                    <th scope='col'><a href="{{ route ('result.detail',['record' => $item['id']]) }}">{{$item['id']}}</a></th>
                    <th>{{$item['date']}}</th>
                    <th>{{$item['playername']}}</th>
                    <th>{{$item['tourname']}}</th>
                    <th>{{$item['eventname']}}</th>
                    <th>{{$item['result']}}</th>
                    @if($role[0]['role'] == 1)
                        @if($item['del_flg'] == 0)
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
            {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
        @else
        <!-- 何も出さない -->
        @endif
</div>
@endsection