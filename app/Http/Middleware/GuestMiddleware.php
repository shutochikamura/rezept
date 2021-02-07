<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Board;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        //自分のデータ
        $guest_data = Auth::user()->guest_id;
        $guest_password = Auth::user()->guest_password;
        //ホストのデータ
        $items = Board::where('user_id', '=', Auth::user()->guest_id)->get();
        $host = User::where('id', '=', Auth::user()->guest_id)->first();

        $request->merge(compact('guest_data', 'guest_password', 'host', 'items'));
        return $next($request);
    }
}
