@extends('layouts.layout')
@section('content')

<div class="container py-4">

    <h3><a href="{{ route ('admin') }}">管理者ページトップへ戻る</a></h3>

    <h2>種目編集<h2>
    <div class="card">
        <table class='table table-success table-striped'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>場所名</th>
                    <th scope='col'>編集</th>
                    <th scope='col'>削除</th>
                </tr>
            </thead>
            <div class="col">
            @foreach($places as $place)
                <tr>
                    <th>{{$place['placeid']}}</th>
                    <th>{{$place['placename']}}</th>
                    <th><a href="{{ route ('admin.place.edit',['id' => $place['placeid']]) }}"><button class="btn btn-primary">編集</button></a></th>
                    <th><a href="{{ route ('place.delete',['id' => $place['placeid']]) }}"><button class="btn btn-danger">削除</button></a></th>
                </tr>    
            @endforeach
            </div>
        </table>        
    </div>
</div>

@endsection