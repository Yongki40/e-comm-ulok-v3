<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $isLogin = json_decode($request->cookie('isLogin'));
        $products = Product::all()->take(4);
        if (!$isLogin) {
            return view('home', compact(['products']));
        }

        return view('home', compact(['isLogin', 'products']));
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('isLogin'));
        return redirect('/login');
    }
}
