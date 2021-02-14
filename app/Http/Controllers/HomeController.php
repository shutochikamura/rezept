<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
<<<<<<< HEAD
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $is_production;
    	
    public function __construct()
    {
	    $this->middleware('verified');
	    $this->is_production = env('APP_ENV') === 'production' ? true : false;
=======
    protected $is_production;

    public function __construct()
    {
        $this->middleware('verified');
        $this->is_production = env('APP_ENV') === 'production' ? true : false;
>>>>>>> 413703e4d325ea1270879f0e38855f4137e50ea4
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
