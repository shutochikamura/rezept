<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Board;
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

    public function check(Guest_pathRequest $request)
    {
        $form = $request->guest_password;
        return view('guest_path.password_check', compact('form'));
    }

    public function register(Request $request)
    {
        $user = User::find($request->id);
        $user->guest_password = $request->guest_password;
        $user->save();

        $email = new GuestpasswordVerification($user);
        Mail::to($user->email)->send($email);
        return view('guest_path.registered');
    }

    public function edit()
    {
        $form = '';
        return view('guest_path.new_password_edit', compact('form'));
    }

    public function update(Request $request)
    {

        $user = User::find($request->id);

        if ($user->guest_password == $request->guest_password) {
            return view('guest_path.new_password_register');
        } else {
            $form = '・無効なパスワードです';
            return view('guest_path.new_password_edit', compact('form'));
        }
    }

    public function validation()
    {

        return view('guest_path.new_password_register');
    }

    public function showCheck(Guest_pathRequest $request)
    {
        $form = $request->guest_password;
        return view('guest_path.new_password_edit_check', compact('form'));
    }

    public function reset(Request $request)
    {
        $user = User::find($request->id);
        $user->guest_password = $request->guest_password;
        $user->save();
        $email = new NewGuestpasswordVerification($user);
        Mail::to($user->email)->send($email);
        return view('guest_path.new_password_registered');
    }

    public function confirm(Request $request)
    {
        $name = $request->name;
        $guest_password = $request->guest_password;
        $user = User::where('name', '=', $name)->first();
        if($user == null){
            //名前が間違っている
            $home_form = '名前またはパスワードが間違っています';
            return view('home', compact('home_form'));
        }

        if ($user->guest_password === $guest_password) {
            //hostのもの
            $host_id = User::find($user->id);
            //guestのもの
            $auth = User::find(Auth::id());
            $auth->guest_id = $host_id->id;
            $auth->guest_password = $guest_password;
            $auth->save();

            $guest_items = Board::where('user_id', '=', $user->id)->get();
            return view('guest.confirm', compact('user'));
        } else {
            //名前合ってるけどパスワード間違っている
            $home_form = '名前またはパスワードが間違っています';
            return view('home', compact('home_form'));
        }
    }
}
