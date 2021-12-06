<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products_caro = Product::all()->sortByDesc('created_at')->take(3);

        $products = Product::all()->sortByDesc('created_at')->take(8);

        $url_detail = '/shop/detail/';
        return view('home', compact(['products', 'products_caro', 'url_detail']));
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('isLogin'));
        return redirect('/login');
    }
}
