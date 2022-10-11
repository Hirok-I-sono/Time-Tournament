<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Record;
use App\Player;
use App\Place;
use App\Event;
use App\Http\Requests\CreateError;
use App\Http\Requests\EventError;
use App\Http\Requests\TourError;
use App\Tournament;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Admin(){//管理者トップ

        $admin = new User;
        //var_dump($admin);
        $data = $admin->paginate(10);
        //var_dump($data);

        return view('Admin',[//ユーザー編集ページに飛ぶには$data（foreachで$datasから$dataにしてる）の中のidカラムを引っ張る必要がある
            'datas' => $data
        ]);
    }

    //ユーザーの編集入力ページ
    public function AdminDataEdit(User $user){//usersテーブルは'id'で登録してるからfind使える

        //var_dump($user);

        return view('AdminEdit',[
            'data' => $user
        ]);
    }

    public function AdminDataPost(CreateError $user,Request $request){//変更して送る

        $user->name = $request->name;   
        $user->save();

        return redirect('/admin');
    }
    
    //大会名編集ページトップ
    public function TourAdmin(){

        $tournament = new Tournament;
        $tour = $tournament->get()->toArray();
        //var_dump($tour);

        return view('TournameEdit',[//大会名編集ページに飛ぶには$tour（foreachで$datasから$dataにしてる）の中のtouridカラムを引っ張る必要がある
            'tours' => $tour
        ]);
    }

    //種目編集ページトップ
    public function EventAdmin(){

        $eve = new Event;
        $event = $eve->get()->toArray();
        //var_dump($event);

        return view('EventEdit',[
            'events' => $event
        ]);
    }

    //大会名編集入力ページ
    public function TourEdit(int $id){//tournamentsテーブルのid番号のカラムは'tourid'なのでfindは使えない

        //$tournament = new Tournament;
        $tournament = Tournament::where('tourid',$id)->get()->toArray();
        
        //var_dump($tournament[0]);

        return view('TournameUpdate',[
            'tour' => $tournament
        ]);
    }

    public function TourPost(int $id,TourError $request){

        $instance = new Tournament;
        $tournament = $instance->where('tourid',$id)->first();
    
        $tournament['tourid'] = $id;
        $tournament['tourname'] = $request['tourname'];
        
        //var_dump($request);
        //dd($tournament);
        //var_dump($tournament[0]);
        // var_dump($request['tourid']);
        // var_dump($id);
        // var_dump($tournament['tourname']);
        
        $tournament->update([
            'tourid' => $tournament['tourid'],
            'tourname' => $tournament['tourname']
        ]);

        return redirect('/admin/tour');

    }

    //種目編集ページ
    public function EventEdit(int $id){//eventsテーブルのid番号のカラムは'eventid'なのでfindは使えない

        $event = Event::where('eventid',$id)->get()->toArray();
        
        //var_dump($event[0]);

        return view('EventUpdate',[
            'event' => $event
        ]);
    }

    public function EventPost(int $id,EventError $request){
        $instance = new Event;
        $event = $instance->where('eventid',$id)->first();
    
        $event['eventid'] = $id;
        $event['eventname'] = $request['eventname'];
        
        // var_dump($request['eventid']);
        // var_dump($id);
        // var_dump($event['tourname']);
        
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

    //ユーザー検索
    public function SerchUser(Request $request){

        $query = User::query();
        $search = $request->input('name');
        if ($request->has('name') && $search != '') {//各テーブルと連結が必要かも
            $query->where('name', 'like', '%'.$search.'%')->get();
        }
        $data = $query->paginate(10);
        //var_dump($data);
        //var_dump($search);

        if($search == NULL){
            $message = "検索結果はありません";
        }else{
            $message = "「". $search."」を含む名前の検索が完了しました。";
        }

        return view('serchUser',[
            'datas' => $data,
            'message' => $message,
            'search' => $search,
        ]);
    }

    //管理者権限の習得、解除
    public function RoleIn(int $id){//権限取得
        
        $role = User::find($id);
        $role->role = 1;
        $role->save();

        return redirect('/admin');
    }

    public function RoleOut(int $id){//権限解除

        $role = User::find($id);
        $role->role = 0;
        $role->save();

        return redirect('/admin');
    }

    //違反のオンオフ
    public function ViolationIn(int $id){//違反者にする
        
        $violate = User::find($id);
        $violate->violation = 1;
        $violate->save();

        return redirect('/admin');
    }

    public function ViolationOut(int $id){//違反者の解除

        $violate = User::find($id);
        $violate->violation = 0;
        $violate->save();

        return redirect('/admin');
    }
}