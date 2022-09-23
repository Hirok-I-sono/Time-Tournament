@extends('layouts.layout')
@section('content')
    <div>
        <h1>パスワードリセットメールを送信しました。</h1>

        <a href="{{ route('login') }}">TOPへ</a>
    </div>
@endsection