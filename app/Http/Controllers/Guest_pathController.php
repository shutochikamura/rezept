<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Guest_pathRequest;
use App\Mail\GuestpasswordVerification;
use App\Mail\NewGuestpasswordVerification;
use Mail;

class Guest_pathController extends Controller
{

    public function index()
    {
        return view('guest_path.password_store');
    }

    public function register(Guest_pathRequest $request)
    {
        $form = $request->guest_password;
        return view('guest_path.password_check',compact('form'));
    }

    public function registered(Request $request)
    {
        $user = User::find($request->id);
        $user->guest_password = $request->guest_password;
        $user->save();

        $email = new GuestpasswordVerification($user);
        Mail::to($user->email)->send($email);
        return view('guest_path.created');
    }

    public function edit()
    {
        $form = '';
        return view('guest_path.new_password_edit', compact('form'));
    }

    public function update(Request $request){
        $user = User::find($request->id);

        if($user->guest_password == $request->guest_password){
            return view('guest_path.new_password_register');
        }else {
            $form = '・無効なパスワードです';
            return view('guest_path.new_password_edit', compact('form'));
        }
    }

    public function validation(Request $request){
            return view('guest_path.new_password_register');
    }

    public function showCheck(Guest_pathRequest $request){
        $form = $request->guest_password;
        return view('guest_path.new_password_edit_check', compact('form'));
    }

    public function reset(Request $request){
        $user = User::find($request->id);
        $user->guest_password = $request->guest_password;
        $user->save();
        $email = new NewGuestpasswordVerification($user);
        Mail::to($user->email)->send($email);
        return view('guest_path.new_password_registered');
    }

}
