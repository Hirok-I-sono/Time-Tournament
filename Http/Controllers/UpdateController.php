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
    public function Update(Record $record){

        $user = Auth::user()->id;

        // $allrecord = Record::where('id',$record)
        // ->join('players','records.player_id','players.playerid')
        // ->join('places','records.place_id','places.placeid')
        // ->join('events','records.event_id','events.eventid')
        // ->join('tournaments','records.tournament_id','tournaments.tourid')->get()->toarray();

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

    public function UpdatePost(Record $record,CreateData $request){

        $columns = ['date','player_id','place_id','event_id','result','memo','image'];
        foreach($columns as $column){
            $record->$column = $request->$column;
        }

        // $instance = new Record;
        // $record = $instance->find($id);

        // $record->date = $request->date;
        // $record->player_id = $request->player_id;
        // $record->place_id = $request->place_id;
        // $record->tournament_id = $request->tournament_id;
        // $record->event_id = $request->event_id;
        // $record->result = $request->result;
        // $record->memo = $request->memo;

        $image = $request->file('image');
        $path = isset($image) ? $image->store('images', 'public') : '';
        $record->image = $path;

        $record->save();

        return redirect('/');
    }

    //DB上からも消す
    public function Delete(Record $record){
        
        $record->delete();
      
        return redirect('/');
    }

    //del_flgを立てて表示上から消す
    public function DeleteDestroy(Record $record){

        //$record = Record::find($id);
        //var_dump($record);
        $record->del_flg = 1;
        $record->save();

        return redirect('/');
    }
}
