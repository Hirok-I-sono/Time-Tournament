<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Record;
use App\Player;
use App\Place;
use App\Event;
use App\Tournament;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(){
        $recording = new Record;
        // $all = $recording->all()->toArray();
        // var_dump($all);

        // 選手、大会名、種目
        // $playing = new Player;
        // $player = $playing->all()->toArray();
        // //var_dump($player);
        // $tournamenting = new Tournament;
        // $tournament = $tournamenting->all()->toArray();
        // $eventing = new Event;
        // $event = $eventing->all()->toArray();

        $user = Auth::user()->id;
        var_dump($user);
        
        $allrecording = Auth::user()->record()->get();
        $allrecording = $recording->where('del_flg','0')->where('records.user_id',$user)
        ->join('players','records.player_id','players.playerid')
        ->join('places','records.place_id','places.placeid')
        ->join('events','records.event_id','events.eventid')
        ->join('tournaments','records.tournament_id','tournaments.tourid')->get()->toArray();
        //var_dump($allrecording);
        
        // $places = $recording->join('places','records.place_id','places.id')->get()->toArray();
        // var_dump($places);
        // $events = $recording->join('events','records.event_id','events.id')->get()->toArray();
        // var_dump($events);
        // $tournaments = $recording->join('tournaments','records.tournament_id','tournaments.id')->get()->toArray();

        // 詳細＃、日付、選手名、大会名、種目、記録（タイム）
        return view('home',[
            'allrecords' => $allrecording,
            // 'records' => $all,
            // 'players' => $player,
            // 'tournaments' => $tournament,
            // 'events' => $event,
            // 'placename' => $places,
            // 'eventname' => $events,
            // 'tournamentname' => $tournaments,
        ]);
    }

    public function Detail(Record $record){
        // $recording = new Record;
        // $allrecording = $recording->join('players','records.player_id','players.id')
        // ->join('places','records.place_id','places.id')
        // ->join('events','records.event_id','events.id')
        // ->join('tournaments','records.tournament_id','tournaments.id')->get()->toArray();

        // $recording = Record::where('id',$record)
        // ->join('players','records.player_id','players.playerid')
        // ->join('places','records.place_id','places.placeid')
        // ->join('events','records.event_id','events.eventid')
        // ->join('tournaments','records.tournament_id','tournaments.tourid')->get()->toarray();

        var_dump($record);
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

    public function Reset(){
        return view('mail/passwordreset');
    }

    //検索機能
    // public function Serched(){
    //     return view('/serch',[]);
    // }

    public function Serch(Request $request){//検索で引っ張ってきたワード

        // $user = Auth::user()->id;
        // //var_dump($user);
        // //var_dump($request);
        
        // $recording = new Record;
        // $allrecording = Auth::user()->record()->get();
        // $allrecording = $recording->where('del_flg','0')->where('records.user_id',$user)
        // ->join('players','records.player_id','players.playerid')
        // ->join('places','records.place_id','places.placeid')
        // ->join('events','records.event_id','events.eventid')
        // ->join('tournaments','records.tournament_id','tournaments.tourid')->get()->toArray();

        // $keyword = $request;
    
        //     $query = $recording()->join('players','records.player_id','players.playerid')
        //     ->join('places','records.place_id','places.placeid')
        //     ->join('events','records.event_id','events.eventid')
        //     ->join('tournaments','records.tournament_id','tournaments.tourid');
        //     $serchrecord = $query->where('name','like', '%' .$keyword. '%')->get();//name検索
        //     $message = "「". $keyword."」を含む検索が完了しました。";
        //     dd($query);
        // return view('/serch',[
        //     'serchrecords' => $serchrecord,
        //     'message' => $message,
        //     ]);

        $query = Record::query()->join('players','records.player_id','players.playerid')
        ->join('places','records.place_id','places.placeid')
        ->join('events','records.event_id','events.eventid')
        ->join('tournaments','records.tournament_id','tournaments.tourid');

        $search = $request->all();
        //dd($search['name']);
        if ($request->has('name') && $search != '') {//各テーブルと連結が必要かも
            $query->where(DB::raw("CONCAT(playername,' ',tourname,' ',eventname,' ',date,' ',memo)"),'like','%'.$search['name'].'%');
        }
        $data = $query->paginate(20);
        var_dump($search);
        //var_dump($query);
        return view('serch',[
            'data' => $data
        ]);
    }
}


// else{
//     $message = "検索結果はありません。";
//     return view('/serch')->with('message',$message);
// }
