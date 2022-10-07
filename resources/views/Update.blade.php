@extends('layouts.layout')
@section('content')
入力保持したい
<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>編集</h4>
            </div>

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
            
                <div class="card-body">
                    <form action="{{ route('result.update',$allrecord) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- 日付 -->
                        <label for='date' class='mt-2'>日付</label>
                            <input type='date' class='form-control' name='date' id='date' value="{{ $allrecord['date'] }}" />

                        <!-- 選手 -->
                        <label for='player' class='mt-2'>選手</label>
                        <select name='player_id' class='form-control'>
                            <option value='' hidden>選手</option>
                            <!-- 初期値(selected)は、元の入力値とidが一致するもの
                                 ビューに表示したいのはplayersテーブルのplayername
                                 recordsのplayer_idとplayersのplayeridが一致するように -->
                            @foreach($players as $player)
                                @if($player['playerid'] == $allrecord['player_id'])
                                <!-- recordsのidで登録しているplayernameを頭に出したい -->
                                <option value="{{ $player['playerid']}}"  selected>{{ $player['playername'] }}</option>
                                @else
                                <option value="{{ $player['playerid']}}">{{ $player['playername'] }}</option>
                                @endif
                            @endforeach
                        </select>

                        <!-- 場所 -->
                        <label for='place' class='mt-2'>場所</label>
                        <select name='place_id' class='form-control'>
                        <option value='' hidden>場所</option>
                            @foreach($places as $place)
                                @if($place['placeid'] == $allrecord['place_id'])
                                <!-- recordsのidで登録しているplacenameを頭に出したい -->
                                <option value="{{ $place['placeid']}}"  selected>{{ $place['placename'] }}</option>
                                @else
                                <option value="{{ $place['placeid']}}">{{ $place['placename'] }}</option>
                                @endif
                            @endforeach
                        </select>

                        <!-- 大会名 -->
                        <label for='tournament' class='mt-2'>大会名</label>
                        <select name='tournament_id' class='form-control'>
                        <option value='' hidden>大会名</option>
                            @foreach($tournaments as $tournament)
                                @if($tournament['tourid'] == $allrecord['tournament_id'])
                                <!-- recordsのidで登録しているplacenameを頭に出したい -->
                                <option value="{{ $tournament['tourid']}}"  selected>{{ $tournament['tourname'] }}</option>
                                @else
                                <option value="{{ $tournament['tourid']}}">{{ $tournament['tourname'] }}</option>
                                @endif
                            @endforeach
                        </select>

                        <!-- 種目 -->
                        <label for='event' class='mt-2'>種目</label>
                        <select name='event_id' class='form-control'>
                        <option value='' hidden>種目</option>
                            @foreach($events as $event)
                                @if($event['eventid'] == $allrecord['event_id'])
                                <!-- recordsのidで登録しているplacenameを頭に出したい -->
                                <option value="{{ $event['eventid']}}"  selected>{{ $event['eventname'] }}</option>
                                @else
                                <option value="{{ $event['eventid']}}">{{ $event['eventname'] }}</option>
                                @endif
                            @endforeach
                        </select>
                            
                        <!-- 記録 -->
                        <label for='result'>記録</label>
                            <input type='text' class='form-control' name='result' value="{{ $allrecord['result'] }}"/>

                        <!-- メモ、写真アップロード -->
                        <label for='memo' class='mt-2'>メモ、写真</label>
                        <input type="file" class="form-control-file" name='image' id="image">
                            <textarea class='form-control' name='memo'>{{ $allrecord['memo'] }}</textarea>
                        <div class='row justify-content-center'>
                            <button type='submit' class='btn btn-primary w-25 mt-3'>変更</button>
                        </div> 
                    </form>
                </div>

        </div>
    </div>
</main>
@endsection