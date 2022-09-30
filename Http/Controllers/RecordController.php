<?php

namespace App\Http\Controllers;

use App\Record;
use App\Player;
use App\Place;
use App\Event;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;
use App\Http\Requests\CreateError;

class RecordController extends Controller
{
    // // ログイン認証をedit,update,destroyにだけかける
    // public function __construct()
    // {
    //     $this->middleware('auth', ['only' => ['edit', 'update', 'destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){//トップ画面表示

        $recording = new Record;

        $user = Auth::user()->id;
        var_dump($user);
        
        //$allrecording = Auth::user()->record()->get();
        $allrecording = $recording->where('del_flg','0')->where('records.user_id',$user)
        ->join('players','records.player_id','players.playerid')
        ->join('places','records.place_id','places.placeid')
        ->join('events','records.event_id','events.eventid')
        ->join('tournaments','records.tournament_id','tournaments.tourid')->paginate(10);
        //var_dump($allrecording);
        //$allrecording = Record::paginate(10);
        //var_dump($allrecording);

        return view('home',[
            'allrecords' => $allrecording,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){//新規投稿の画面表示

        $user = Auth::user()->id;

        $playername = Player::where('players.user_id',$user)->get()->toarray();
        $placename = Place::get()->toarray();
        $eventrname = Event::get()->toarray();
        $tourname = Tournament::get()->toarray();
        return view('Create',[
            'players' => $playername,
            'places' => $placename,
            'events' => $eventrname,
            'tournaments' => $tourname,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request){//新規投稿の保存

        $record = new Record();

        $record->date = $request->date;
        $record->player_id = $request->player_id;
        $record->place_id = $request->place_id;
        $record->tournament_id = $request->tournament_id;
        $record->event_id = $request->event_id;
        $record->result = $request->result;
        $record->memo = $request->memo;

        // アップロードされたファイルの取得
        $image = $request->file('image');
        // ファイルの保存とパスの取得
        $path = isset($image) ? $image->store('images', 'public') : '';
        
        $record->image = $path;

        Auth::user()->record()->save($record);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record){//詳細表示

        //モデルバインディング各テーブルの〇〇idと照らし合わせ（date,player,place,tournament,event,result,memo）
        $player = Player::where('playerid',$record['player_id'])->get()->toArray();
        var_dump($player);
        $place = Place::where('placeid',$record['place_id'])->get()->toArray();
        var_dump($place);
        $tournament = Tournament::where('tourid',$record['tournament_id'])->get()->toArray();
        var_dump($tournament);
        $event = Event::where('eventid',$record['event_id'])->get()->toArray();
        var_dump($event);

        return view('Detail',[
            'allrecord' => $record,
            'player' => $player,
            'place' => $place,
            'tournament' => $tournament,
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record){//編集ページの表示

        $user = Auth::user()->id;

        $playername = Player::where('players.user_id',$user)->get()->toarray();
        $placename = Place::get()->toarray();
        $eventrname = Event::get()->toarray();
        $tourname = Tournament::get()->toarray();

        var_dump($record);
        var_dump($user);

        return view('Update',[
            'players' => $playername,
            'places' => $placename,
            'events' => $eventrname,
            'tournaments' => $tourname,
            'allrecord' => $record,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, Record $record){//投稿の更新
        $columns = ['date','player_id','place_id','event_id','result','memo','image'];
        foreach($columns as $column){
            $record->$column = $request->$column;
        }

        $image = $request->file('image');
        $path = isset($image) ? $image->store('images', 'public') : '';
        $record->image = $path;

        $record->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record){//削除

        $record->delete();
      
        return redirect('/');
    }
}
