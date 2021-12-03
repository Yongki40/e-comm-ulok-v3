<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //ganti sama yang terlaku 3
        $products_caro = Product::all()->take(3);

        //ganti take sama last 4
        $products = Product::all()->sortByDesc('created_at')->take(4);

        $url_detail = '/shop/detail/';
        return view('home', compact(['products', 'products_caro', 'url_detail']));
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('isLogin'));
        return redirect('/login');
    }
}
