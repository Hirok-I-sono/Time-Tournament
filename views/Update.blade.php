@extends('layouts.layout')
@section('content')
編集画面の作成
recors.idが見つからないというエラー表示がおこる、後回し
<?php var_dump($allrecord); ?>
<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>編集</h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{route('update',['id' => $allrecord[0]['record_id']])}}" method="post">
                        @csrf
                        <!-- 日付 -->
                        <label for='date' class='mt-2'>日付</label>
                            <input type='date' class='form-control' name='date' id='date'/>

                        <!-- 選手 -->
                        <label for='player' class='mt-2'>選手</label>
                        <select name='player_id' class='form-control'>
                            <option value='' hidden>選手</option>
                            @foreach($players as $player)
                            <option value="{{ $player['id']}}">{{ $player['playername'] }}</option>
                            @endforeach
                        </select>

                        <!-- 場所 -->
                        <label for='place' class='mt-2'>場所</label>
                        <select name='place_id' class='form-control'>
                        <option value='' hidden>場所</option>
                            @foreach($places as $place)
                            <option value="{{ $place['id']}}">{{ $place['placename'] }}</option>
                            @endforeach
                        </select>

                        <!-- 大会名 -->
                        <label for='tournament' class='mt-2'>大会名</label>
                        <select name='tournament_id' class='form-control'>
                        <option value='' hidden>大会名</option>
                            @foreach($tournaments as $tournament)
                            <option value="{{ $tournament['id']}}">{{ $tournament['tourname'] }}</option>
                            @endforeach
                        </select>

                        <!-- 種目 -->
                        <label for='event' class='mt-2'>種目</label>
                        <select name='event_id' class='form-control'>
                        <option value='' hidden>種目</option>
                            @foreach($events as $event)
                            <option value="{{ $event['id']}}">{{ $event['eventname'] }}</option>
                            @endforeach
                        </select>
                            
                        <!-- 記録 -->
                        <label for='result'>記録</label>
                            <input type='text' class='form-control' name='result'/>

                        <!-- メモ、写真アップロード -->
                        <label for='memo' class='mt-2'>メモ</label>
                            <textarea class='form-control' name='memo'></textarea>
                        <div class='row justify-content-center'>
                            <button type='submit' class='btn btn-primary w-25 mt-3'>変更</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection