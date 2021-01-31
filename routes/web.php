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
    Route::resource('guest_path', App\Http\Controllers\Guest_pathController::class);
});
