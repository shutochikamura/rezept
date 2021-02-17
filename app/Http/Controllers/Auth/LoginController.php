<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//Googleログイン作る時に作成
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    private $user_model;
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $maxAttempts = 10;
    protected $decayMinutes = 30;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        Auth::logout();
        return $this->render();
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $gUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $gUser->email)->first();
        // 見つからなければ新しくユーザーを作成

        if ($user == null) {

            $glmessage = '登録しているメールアドレスと一致しません';
            return view('auth.login')->with(compact('glmessage'));
        }
        if ($user->role == null) {

            return view('auth.main.role_register', compact('user'));
        }

        \Auth::login($user, true);
        return redirect('/home');
    }

}
