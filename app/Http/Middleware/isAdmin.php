<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class isAdmin
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
        if (!Cookie::has('isLogin')) {
            return redirect('/login')->with('msg', 'login dulu sebagai admin');
        }

        $isLogin = json_decode($request->cookie('isLogin'));
        if ($isLogin->jenis_user != 'admin') {
            return back()->with('msg', 'Anda Bukan Admin!');
        }
        // $request->request->add(['isLogin', $isLogin]);
        $request->request->add(['isLogin' => $isLogin]);
        return $next($request);
    }
}
