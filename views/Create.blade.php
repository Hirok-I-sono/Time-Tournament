@extends('layouts.layout')
@section('content')
選手追加はできた(何番のユーザーidで登録したかもOK)<br>
プルダウン欄の入力保持（選手、場所、大会名、種目）<br>
バリデーション（Create.bladeのみ）<br>
<main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class='text-center'>新規登録</h1>
                </div>

                    <div class="card-body">

                    <div class="panel-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $message)
                                <li>{{$message}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                        <form action="{{ route('result.create')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <!-- 日付 -->
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date' value="{{ old('date') }}"/>

                            <!-- 選手 -->
                            <label for='player' class='mt-2'>選手</label>
                            <select name='player_id' class='form-control' value="{{ old('player_id') }}">
                                <option value='' hidden>選手</option>
                                @foreach($players as $player)
                                <option value="{{ $player['playerid']}}">{{ $player['playername'] }}</option>
                                @endforeach
                            </select>
                            <a href="{{route('player.create')}}">選手登録</a><br>

                            <!-- 場所 -->
                            <label for='place' class='mt-2'>場所</label>
                            <select name='place_id' class='form-control' >
                            <option value='' hidden>場所</option>
                                @foreach($places as $place)
                                <option value="{{ $place['placeid']}}">{{ $place['placename'] }}</option>
                                @endforeach
                            </select>

                            <!-- 大会名 -->
                            <label for='tournament' class='mt-2'>大会名</label>
                            <select name='tournament_id' class='form-control'>
                            <option value='' hidden>大会名</option>
                                @foreach($tournaments as $tournament)
                                <option value="{{ $tournament['tourid']}}">{{ $tournament['tourname'] }}</option>
                                @endforeach
                            </select>

                            <!-- 種目 -->
                            <label for='event' class='mt-2'>種目</label>
                            <select name='event_id' class='form-control'>
                            <option value='' hidden>種目</option>
                                @foreach($events as $event)
                                <option value="{{ $event['eventid']}}">{{ $event['eventname'] }}</option>
                                @endforeach
                            </select>
                                
                            <!-- 記録 -->
                            <label for='result'>記録</label>
                                <input type='text' class='form-control' name='result' value="{{ old('result') }}"/>

                            <!-- メモ、写真アップロード -->
                            <label for='memo' class='mt-2'>メモ　ここに画像を取り込む（enctype）</label>
                            <input type="file" class="form-control-file" name='image' id="image">
                                <textarea class='form-control' name='memo' value="">{{ old('memo') }}</textarea>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>
                    </div>
            </div>
        </div>
    </main>
@endsection