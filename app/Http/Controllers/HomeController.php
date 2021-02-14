<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    protected $is_production;

    public function __construct()
    {
        $this->middleware('verified');
        $this->is_production = env('APP_ENV') === 'production' ? true : false;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home_form = '';
        return view('home', compact('home_form'));
    }

    public function destroy(){
        $user = Auth::user();

        Auth::logout();
        $user->delete();

        return redirect('/');
    }
}
