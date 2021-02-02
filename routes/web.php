<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuestpassController;

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
    return view('welcome');
});
Auth::routes(['verify' => true]);
//メールで仮登録、本登録処理
Route::post('register/pre_check', 'App\Http\Controllers\Auth\RegisterController@pre_check')->name('register.pre_check');
Route::get('register/verify/{token}', 'App\Http\Controllers\Auth\RegisterController@showForm');
Route::post('register/main_check', 'App\Http\Controllers\Auth\RegisterController@mainCheck')->name('register.main_check');
Route::post('register/main_register', 'App\Http\Controllers\Auth\RegisterController@mainRegister')->name('register.main.registered');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('guest_home', 'App\Http\Controllers\Guest_pathController@confirm');

Route::resource('board', App\Http\Controllers\BoardController::class);

Route::get('guest_home', 'App\Http\Controllers\GuestController@index');
Route::resource('guest', App\Http\Controllers\GuestController::class);



Route::group(['middleware' => ['auth', 'can:manager']],function (){
    //guest_password作成処理
    Route::get('guest_password', 'App\Http\Controllers\Guest_pathController@index');
    Route::post('guest_password/check', 'App\Http\Controllers\Guest_pathController@check')->name('guest_password.check');
    Route::post('guest_password/register', 'App\Http\Controllers\Guest_pathController@register')->name('guest_password.register');
    //guest-password変更処理
    Route::get('guest_password/edit', 'App\Http\Controllers\Guest_pathController@edit');
    Route::get('guest_password/update', 'App\Http\Controllers\Guest_pathController@validation')->name('guest_password.update');
    Route::post('guest_password/update', 'App\Http\Controllers\Guest_pathController@update')->name('guest_password.update');
    Route::post('guest_password/password_edit_check', 'App\Http\Controllers\Guest_pathController@showCheck')->name('guest_password.password_edit_check');
    Route::post('guest_password/password_new_registered', 'App\Http\Controllers\Guest_pathController@reset')->name('guest_password.password_new_registered');
});
