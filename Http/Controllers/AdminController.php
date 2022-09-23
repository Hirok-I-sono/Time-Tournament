<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Record;
use App\Player;
use App\Place;
use App\Event;
use App\Tournament;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Admin(){

        $admin = new User;
        //var_dump($admin);
        $data = $admin->get()->toArray();
        var_dump($data);

        return view('Admin',[//ユーザー編集ページに飛ぶには$data（foreachで$datasから$dataにしてる）の中のidカラムを引っ張る必要がある
            'datas' => $data
        ]);
    }

    //ユーザーの編集入力ページ
    public function AdminDataEdit(User $user){//usersテーブルは'id'で登録してるからfind使える

        var_dump($user);

        return view('AdminEdit',[
            'data' => $user
        ]);
    }

    public function AdminDataPost(User $user,Request $request){//変更して送る

        $user->name = $request->name;   
        $user->save();

        return redirect('/admin');
    }
    
    //大会名編集ページトップ
    public function TourAdmin(){

        $tournament = new Tournament;
        $tour = $tournament->get()->toArray();
        var_dump($tour);

        return view('TournameEdit',[//大会名編集ページに飛ぶには$tour（foreachで$datasから$dataにしてる）の中のtouridカラムを引っ張る必要がある
            'tours' => $tour
        ]);
    }

    //種目編集ページトップ
    public function EventAdmin(){

        $eve = new Event;
        $event = $eve->get()->toArray();
        var_dump($event);

        return view('EventEdit',[
            'events' => $event
        ]);
    }

    //大会名編集入力ページ
    public function TourEdit(int $id){//tournamentsテーブルのid番号のカラムは'tourid'なのでfindは使えない

        //$tournament = new Tournament;
        $tournament = Tournament::where('tourid',$id)->get()->toArray();
        
        var_dump($tournament[0]);

        return view('TournameUpdate',[
            'tour' => $tournament
        ]);
    }

    public function TourPost(int $id,Request $request){

        $instance = new Tournament;
        $tournament = $instance->where('tourid',$id)->first();
    
        $tournament['tourid'] = $id;
        $tournament['tourname'] = $request['tourname'];
        
        //var_dump($request);
        //dd($tournament);
        //var_dump($tournament[0]);
        var_dump($request['tourid']);
        var_dump($id);
        var_dump($tournament['tourname']);
        
        $tournament->update([
            'tourid' => $tournament['tourid'],
            'tourname' => $tournament['tourname']
        ]);

        return redirect('/admin/tour');

    }

    //種目編集ページ
    public function EventEdit(int $id){//eventsテーブルのid番号のカラムは'eventid'なのでfindは使えない

        $event = Event::where('eventid',$id)->get()->toArray();
        
        var_dump($event[0]);

        return view('EventUpdate',[
            'event' => $event
        ]);
    }

    public function EventPost(int $id,Request $request){
        $instance = new Event;
        $event = $instance->where('eventid',$id)->first();
    
        $event['eventid'] = $id;
        $event['eventname'] = $request['eventname'];
        
        var_dump($request['eventid']);
        var_dump($id);
        var_dump($event['tourname']);
        
        $event->update([
            'eventid' => $event['eventid'],
            'eventname' => $event['eventname']
        ]);

        return redirect('/admin/event');
    }

    //削除
    //ユーザー
    public function UserDelete(User $user){

        $user->delete();

        return redirect('/admin');
    }

    //大会名
    public function TourDelete(int $id){

        $tour = Tournament::where('tourid',$id)->first();
        $tour->delete();

        return redirect('/admin/tour');
    }

    //種目
    public function EventDelete(int $id){
        $event = Event::where('eventid',$id)->first();
        $event->delete();

        return redirect('/admin/event');
    }
}
