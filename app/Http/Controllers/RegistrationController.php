<?php

namespace App\Http\Controllers;

use App\Record;
use App\Player;
use App\Place;
use App\Event;
use App\Tournament;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\Http\Requests\CreateError;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function CreateForm(){

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

    public function Create(CreateData $request){

        $record = new Record();

        $record->date = $request->date;
        $record->player_id = $request->player_id;
        $record->place_id = $request->place_id;
        $record->tournament_id = $request->tournament_id;
        $record->event_id = $request->event_id;
        $record->result = $request->result;
        $record->memo = $request->memo;

        Auth::user()->record()->save($record);

        return redirect('/');
    }

    public function CreatePlayer(){
        
        return view('PlayerCreate',[

        ]);
    }

    public function PlayerCreate(CreateError $request){

        $player = new Player;
        $player->playername = $request->playername;

        Auth::user()->player()->save($player);

        return redirect('create');
    }
}
