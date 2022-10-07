<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Auth;


//use App\Http\Controllers\RegistrationController;
//use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

// パスワードリセット関連
Route::prefix('password_reset')->name('password_reset.')->group(function () {
    Route::prefix('email')->name('email.')->group(function () {
        // パスワードリセットメール送信フォームページ
        Route::get('/', [PasswordController::class, 'emailFormResetPassword'])->name('form');
        // メール送信処理
        Route::post('/', [PasswordController::class, 'sendEmailResetPassword'])->name('send');
        // メール送信完了ページ
        Route::get('/send_complete', [PasswordController::class, 'sendComplete']);
    });
    // パスワード再設定ページ
    Route::get('/edit', [PasswordController::class, 'edit'])->name('edit');
    // パスワード更新処理
    Route::post('/update', [PasswordController::class, 'update'])->name('update');
    // パスワード更新終了ページ
    Route::get('/edited', [PasswordController::class, 'edited'])->name('edited');
});



Route::group(['middleware' => 'auth'],function(){

Route::group(['middlware' => 'can:view,record'],function(){

//ビュー、詳細の表示、管理者画面
//Route::get('/',[DisplayController::class,'index']);
Route::get('/detail/{record}',[DisplayController::class,'Detail'])->name('result.detail');

//検索機能
Route::get('/serch',[DisplayController::class,'Serch'])->name('serch');//条件入力して一致するものがあったら'/serch'に飛ぶ
Route::get('/serchuser',[AdminController::class,'SerchUser'])->name('serch.user');

//新規登録、記録の作成
//Route::get('/create',[RegistrationController::class,'CreateForm'])->name('result.create'); 
//Route::post('/create',[RegistrationController::class,'Create']);

//カテゴリ追加
Route::get('/create/player',[RegistrationController::class,'CreatePlayer'])->name('player.create');
Route::post('/create/player',[RegistrationController::class,'PlayerCreate']);

//編集
//Route::get('/update/{record}',[UpdateController::class,'Update'])->name('update');
//Route::post('/update/{record}',[UpdateController::class,'UpdatePost']);

//完全削除
//Route::get('/delete/{record}',[UpdateController::class,'Delete'])->name('delete');
//論理削除
Route::get('/deletedestroys/{record}',[UpdateController::class,'DeleteDestroy'])->name('delete.destroy');
Route::get('/deletebackup/{record}',[UpdateController::class,'Backup'])->name('backup');

//管理者ページ
Route::get('/admin',[AdminController::class,'Admin'])->name('admin');
Route::get('/admin/tour',[AdminController::class,'TourAdmin'])->name('tour.admin');
Route::get('/admin/event',[AdminController::class,'EventAdmin'])->name('event.admin');
Route::get('/admin/rolein/{id}',[AdminController::class,'RoleIn'])->name('role.in');
Route::get('/admin/roleout/{id}',[AdminController::class,'RoleOut'])->name('role.out');
Route::get('/admin/violatein/{id}',[AdminController::class,'ViolationIn'])->name('violate.in');
Route::get('/admin/violateout/{id}',[AdminController::class,'ViolationOut'])->name('violate.out');
//ユーザー編集
Route::get('/admin/data/{user}',[AdminController::class,'AdminDataEdit'])->name('admin.data.edit');
Route::post('/admin/data/{user}',[AdminController::class,'AdminDataPost']);
//大会名編集
Route::get('/admin/tourdata/{id}',[AdminController::class,'TourEdit'])->name('admin.tour.edit');
Route::post('/admin/tourdata/{id}',[AdminController::class,'TourPost']);
//種目編集
Route::get('/admin/eventdata/{id}',[AdminController::class,'EventEdit'])->name('admin.event.edit');
Route::post('/admin/eventdata/{id}',[AdminController::class,'EventPost']);
//削除
Route::get('/userdelete/{user}',[AdminController::class,'UserDelete'])->name('user.delete');
Route::get('/tourelete/{id}',[AdminController::class,'TourDelete'])->name('tour.delete');
Route::get('/eventelete/{id}',[AdminController::class,'EventDelete'])->name('event.delete');

//リソースコントローラー
Route::resource('/', 'RecordController');
Route::get('/',[RecordController::class,'index']);//トップ
Route::get('/create',[RecordController::class,'create'])->name('result.create');//新規投稿
Route::get('/detail/{record}',[RecordController::class,'show'])->name('result.detail');//詳細
Route::post('/create',[RecordController::class,'store']);//新規投稿の保存
Route::get('/edit/{record}',[RecordController::class,'edit'])->name('result.update');//編集ページの表示
Route::post('/edit/{record}',[RecordController::class,'update']);//投稿の更新
Route::get('/delete/{record}',[RecordController::class,'destroy'])->name('delete');//削除

//API
// Route::get('/google_map', function () {
//     return view('google_map');
// });

});

});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
