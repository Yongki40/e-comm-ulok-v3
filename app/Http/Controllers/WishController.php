<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function showWish(Request $request)
    {
        $isLogin = json_decode($request->cookie('isLogin'));
        // $request->session()->forget('wish.' . $isLogin->nomor_hp);
        $wishs = [];
        if ($request->session()->has('wish.' . $isLogin->nomor_hp)) {
            $wishUser = $request->session()->get('wish.' . $isLogin->nomor_hp);
            $wishs = $wishUser;
        }
        // dd($wishs);
        return view('wish', compact(['isLogin', 'wishs']));
    }

    public function tambahWish($id, Request $request)
    {
        $product = Product::find($id);
        $isLogin = json_decode($request->cookie('isLogin'));

        if ($request->session()->has('wish.' . $isLogin->nomor_hp)) {
            $wishUser = $request->session()->get('wish.' . $isLogin->nomor_hp);
            foreach ($wishUser as $value) {
                if ($value['id'] == $product->id) {
                    return back()->with('msg', 'sudah ada pada wishlist');
                }
            }

            $wish = [];
            $wish['id'] = $product->id;
            $wish['product'] = $product;
            $request->session()->push('wish.' . $isLogin->nomor_hp, $wish);
        } else {
            $wish = [];
            $wish['id'] = $product->id;
            $wish['product'] = $product;
            $request->session()->push('wish.' . $isLogin->nomor_hp, $wish);
        }

        return back()->with('berhasil', 'berhasil tambahkan ke wishlist');
    }

    public function hapusWish($id, Request $request)
    {
        $isLogin = json_decode($request->cookie('isLogin'));
        $wishUser = $request->session()->get('wish.' . $isLogin->nomor_hp);
        for ($i = 0; $i < count($wishUser); $i++) {
            if ($wishUser[$i]['id'] == $id) {
                unset($wishUser[$i]);
            }
        }
        $wishUser = array_values($wishUser);
        $request->session()->put('wish.' . $isLogin->nomor_hp, $wishUser);
        return back();
    }
}
