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
        var_dump($allrecording);
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

    public function Detail(int $resultid){
        // $recording = new Record;
        // $allrecording = $recording->join('players','records.player_id','players.id')
        // ->join('places','records.place_id','places.id')
        // ->join('events','records.event_id','events.id')
        // ->join('tournaments','records.tournament_id','tournaments.id')->get()->toArray();

        $recording = Record::where('id',$resultid)
        ->join('players','records.player_id','players.playerid')
        ->join('places','records.place_id','places.placeid')
        ->join('events','records.event_id','events.eventid')
        ->join('tournaments','records.tournament_id','tournaments.tourid')->get()->toarray();

        var_dump($recording);
        //var_dump($resultid);

        return view('Detail',[
            'allrecord' => $recording,
        ]);
    }

    public function Admin(){

        return view('Admin',[

        ]);
    }
}
