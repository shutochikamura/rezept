<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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
Route::post('register/pre_check', 'App\Http\Controllers\Auth\RegisterController@pre_check')->name('register.pre_check');
Route::get('register/verify/{token}', 'App\Http\Controllers\Auth\RegisterController@showForm');
Route::post('register/main_check', 'App\Http\Controllers\Auth\RegisterController@mainCheck')->name('register.main_check');
Route::post('register/main_register', 'App\Http\Controllers\Auth\RegisterController@mainRegister')->name('register.main.registered');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('board', App\Http\Controllers\BoardController::class);


Route::group(['middleware' => ['auth', 'can:manager']],function (){
    Route::get('guest_path', 'App\Http\Controllers\Guest_pathController@index');
    Route::post('guest_password/register', 'App\Http\Controllers\Guest_pathController@register')->name('guest_password.register');
    Route::post('guest_password/registered', 'App\Http\Controllers\Guest_pathController@registered')->name('guest_password.registered');
    //guest-password変更処理
    Route::get('guest_path/edit', 'App\Http\Controllers\Guest_pathController@edit');
    Route::get('guest_password/update', 'App\Http\Controllers\Guest_pathController@validation')->name('guest_password.update');
    Route::post('guest_password/update', 'App\Http\Controllers\Guest_pathController@update')->name('guest_password.update');
    Route::post('guest_password/password_edit_check', 'App\Http\Controllers\Guest_pathController@showCheck')->name('guest_password.password_edit_check');
    Route::post('guest_password/password_new_registered', 'App\Http\Controllers\Guest_pathController@reset')->name('guest_password.password_new_registered');
});
