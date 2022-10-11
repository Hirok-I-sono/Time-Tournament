@extends('layouts.layout')
@section('content')
<main class="py-4">
        <div class="col-md-7 mx-auto">
            <div class="card shadow mb-3 bg-body rounded">
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
                            <label for='date' class='mt-2'>日付(Date)</label>
                                <input type='date' class='form-control' name='date' id='date' value="{{ old('date') }}"/>

                            <!-- 選手 -->
                            <label for='player' class='mt-2'>選手(Player)</label>
                            <select name='player_id' class='form-control' value="{{ old('player_id') }}">
                                <option value='' hidden>選手</option>
                                @foreach($players as $player)
                                <option value="{{ $player['playerid']}}">{{ $player['playername'] }}</option>
                                @endforeach
                            </select>
                            <a href="{{route('player.create')}}">選手登録</a>←選手の登録はコチラからお願いします<br>

                            <!-- 場所 -->
                            <label for='place' class='mt-2'>場所(Place)</label>
                            <select name='place_id' class='form-control' >
                            <option value='' hidden>場所</option>
                                @foreach($places as $place)
                                <option value="{{ $place['placeid']}}">{{ $place['placename'] }}</option>
                                @endforeach
                            </select>

                            <!-- 大会名 -->
                            <label for='tournament' class='mt-2'>大会名(Tournament)</label>
                            <select name='tournament_id' class='form-control'>
                            <option value='' hidden>大会名</option>
                                @foreach($tournaments as $tournament)
                                <option value="{{ $tournament['tourid']}}">{{ $tournament['tourname'] }}</option>
                                @endforeach
                            </select>

                            <!-- 種目 -->
                            <label for='event' class='mt-2'>種目(Event)</label>
                            <select name='event_id' class='form-control'>
                            <option value='' hidden>種目</option>
                                @foreach($events as $event)
                                <option value="{{ $event['eventid']}}">{{ $event['eventname'] }}</option>
                                @endforeach
                            </select>
                                
                            <!-- 記録 -->
                            <label for='result'>記録(Result)</label>
                                <input type='text' class='form-control' name='result' value="{{ old('result') }}"/>

                            <!-- メモ、写真アップロード -->
                            <label for='memo' class='mt-2'>メモ、画像(Memo.Image)</label>
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