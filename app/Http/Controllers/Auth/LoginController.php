<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//Googleログイン作る時に作成
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Socialite;
use Carbon\Carbon;

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

            $user = $this->createUserByGoogle($gUser);
        }
        if ($user->role == null) {
            \Auth::login($user, true);
            return view('auth.main.role_register');
        }

        \Auth::login($user, true);
        return redirect('/home');
    }
    public function createUserByGoogle($gUser)
    {
        $user = User::create([
            'name' => $gUser->name,
            'email'    => $gUser->email,
            'password' => \Hash::make(uniqid()),
        ]);
        $user->email_verified_at = Carbon::now();
        $user->status = 1;
        $user->save();

        return $user;
    }
}
