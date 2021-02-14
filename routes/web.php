<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuestpassController;
use App\Http\Middleware\GuestMiddleware;

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



Route::get('/', function () {
    return view('rezept');
});
Auth::routes(['verify' => true]);

//メールで仮登録、本登録処理
Route::post('register/pre_check', 'App\Http\Controllers\Auth\RegisterController@pre_check');
Route::get('register/verify/{token}', 'App\Http\Controllers\Auth\RegisterController@showForm');
Route::post('register/main_check', 'App\Http\Controllers\Auth\RegisterController@mainCheck');
Route::post('register/main_register', 'App\Http\Controllers\Auth\RegisterController@mainRegister');
Route::post('/user_role/register', 'App\Http\Controllers\Auth\RegisterController@role');

//googleloginで使う
Route::get('login/google', 'App\Http\Controllers\Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'App\Http\Controllers\Auth\LoginController@handleGoogleCallback');

Route::get('/log_destroy', 'App\Http\Controllers\HomeController@destroy');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//自分のレシピ画面
Route::resource('board', App\Http\Controllers\BoardController::class);
Route::post('board_search', 'App\Http\Controllers\BoardController@search');

Route::post('guest_home', 'App\Http\Controllers\Guest_pathController@confirm');


//guestのguest_passwordとhostのguest_passwordが合ってるか参照
Route::group(['middleware' => ['guest-mdl']],
function (){
    Route::resource('guest', App\Http\Controllers\GuestController::class);
    Route::post('guest_search', 'App\Http\Controllers\GuestController@search');
    Route::get('guest_home', 'App\Http\Controllers\GuestController@index');
});

//manager,製造長の処理
Route::group(['middleware' => ['auth', 'can:manager']], function () {
    //guest_password作成処理
    Route::get('guest_password', 'App\Http\Controllers\Guest_pathController@index');
    Route::post('guest_password/check', 'App\Http\Controllers\Guest_pathController@check');
    Route::post('guest_password/register', 'App\Http\Controllers\Guest_pathController@register');
    //guest-password変更処理
    Route::get('guest_password/edit', 'App\Http\Controllers\Guest_pathController@edit');
    Route::get('guest_password/update', 'App\Http\Controllers\Guest_pathController@validation');
    Route::post('guest_password/update', 'App\Http\Controllers\Guest_pathController@update');
    Route::post('guest_password/password_edit_check', 'App\Http\Controllers\Guest_pathController@showCheck');
    Route::post('guest_password/password_new_registered', 'App\Http\Controllers\Guest_pathController@reset');
});
