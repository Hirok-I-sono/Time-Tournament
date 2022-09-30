@extends('layouts.layout')
@section('content')

<div class="container py-4">

    <h3><a href="{{ route ('admin') }}">管理者ページトップへ戻る</a></h3>

    <h2>大会名編集<h2>
    <div class="card">
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>大会名</th>
                    <th scope='col'>編集</th>
                    <th scope='col'>削除</th>
                </tr>
            </thead>
            <div class="col">
            @foreach($tours as $tour)
                <tr>
                    <th>{{$tour['tourid']}}</th>
                    <th>{{$tour['tourname']}}</th>
                    <th><a href="{{ route ('admin.tour.edit',['id' => $tour['tourid']]) }}"><button class="btn btn-primary">編集</button></a></th>
                    <th><a href="{{ route ('tour.delete',['id' => $tour['tourid']]) }}"><button class="btn btn-danger">削除</button></a></th>
                </tr>    
            @endforeach
            </div>
        </table>        
    </div>
</div>

@endsection