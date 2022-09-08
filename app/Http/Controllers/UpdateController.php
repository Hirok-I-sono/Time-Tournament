<?php

namespace App\Http\Controllers;

use App\Record;
use App\Player;
use App\Place;
use App\Event;
use App\Http\Requests\CreateData;
use App\Tournament;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateError;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function Update(int $id){

        $user = Auth::user()->id;

        $allrecord = Record::where('id',$id)
        ->join('players','records.player_id','players.playerid')
        ->join('places','records.place_id','places.placeid')
        ->join('events','records.event_id','events.eventid')
        ->join('tournaments','records.tournament_id','tournaments.tourid')->get()->toarray();

        $playername = Player::where('players.user_id',$user)->get()->toarray();
        $placename = Place::get()->toarray();
        $eventrname = Event::get()->toarray();
        $tourname = Tournament::get()->toarray();

        var_dump($id);

        return view('Update',[
            'players' => $playername,
            'places' => $placename,
            'events' => $eventrname,
            'tournaments' => $tourname,
            'allrecord' => $allrecord,
        ]);
    }

    public function UpdatePost(int $id,CreateData $request){

        $instance = new Record;
        $record = $instance->find($id);

        $record->date = $request->date;
        $record->player_id = $request->player_id;
        $record->place_id = $request->place_id;
        $record->tournament_id = $request->tournament_id;
        $record->event_id = $request->event_id;
        $record->result = $request->result;
        $record->memo = $request->memo;

        $record->save();

        return redirect('/');
    }

    //DB上からも消す
    public function Delete(int $id){
        
        $record = Record::find($id);
        $record->delete();
      
        return redirect('/');
    }

    //del_flgを立てて表示上から消す
    public function DeleteDestroy(int $id){

        $record = Record::find($id);
        //var_dump($record);
        $record->del_flg = 1;
        $record->save();

        return redirect('/');
    }
}
