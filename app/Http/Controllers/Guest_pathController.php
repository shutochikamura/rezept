<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Guest_pathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest_path.password_store');
    }

    public function register(Request $request)
    {

        $form = $request->guest_password;

        return view('guest_path.password_check', compact('form'));
    }
    public function registered(Request $request)
    {
        $user = User::find($request->id);

        $user->guest_password = $request->guest_password;
        $user->save();
        return view('guest_path.created');
    }
    public function edit()
    {
        return view('guest_path.password_edit');
    }
    public function update(Request $request){
        $user = User::find($request->id);

        if($user->guest_password == $request->guest_password){

            return view('guest_path.password_reset');
        }else {
            $form = 'ゲスト用パスワードが違います';
            return view('guest_path.password_edit', compact('form'));
        }
    }
    public function showCheck(Request $request){
        $form = $request->guest_password;
        return view('guest_path.password_edit_check', compact('form'));
    }

    public function reset(Request $request){
        $user = User::find($request->id);

        $user->guest_password = $request->guest_password;
        $user->save();
        return view('guest_path.password_new_registered');
    }
}
