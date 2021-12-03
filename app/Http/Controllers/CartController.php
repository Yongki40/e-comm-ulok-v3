<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart(Request $request)
    {

        $isLogin = json_decode($request->cookie('isLogin'));
        // $request->session()->forget('cart.' . $isLogin->nomor_hp);
        $carts = [];
        if ($request->session()->has('cart.' . $isLogin->nomor_hp)) {
            $cartUser = $request->session()->get('cart.' . $isLogin->nomor_hp);
            $carts = $cartUser;
        }
        // dd($carts);
        return view('cart', compact(['isLogin', 'carts']));
    }

    public function tambahkanCart(Request $request)
    {
        if (isset($request->btnAddCart)) {
            $id = $request->btnAddCart;
            $request->validate(
                [
                    'jumlah' => ['required', 'numeric'],
                ],
                [
                    'jumlah.required' => 'harap masukan jumlah barang yang ingin dipesan',
                    'jumlah.numeric' => 'jumlah barang harus nomor',
                ]
            );
        }

        $product = Product::find($id);
        $isLogin = json_decode($request->cookie('isLogin'));
        if ($request->jumlah <= 0) {
            // dd($request->jumlah <= 0);
            return back()->with(['msg' => 'jumlah tidak boleh 0']);
        }

        if ($product->stok < $request->jumlah) {
            return back()->with('msg', 'stok tidak mencukupi jumlah yang anda mau');
        }

        // $request->session()->push('cart.' . $isLogin->nomor_hp, $product);
        // dd($request->session()->get('cart.' . $isLogin->nomor_hp));

        if ($request->session()->has('cart.' . $isLogin->nomor_hp)) {
            $cartUser = $request->session()->get('cart.' . $isLogin->nomor_hp);
            foreach ($cartUser as $value) {
                if ($value['id'] == $product->id) {
                    return back()->with('msg', 'sudah ada pada cart');
                }
            }

            $cart = [];
            $cart['id'] = $product->id;
            $cart['product'] = $product;
            $cart['jumlah'] = $request->jumlah;
            $cart['total'] = $request->jumlah * $product->harga;
            $request->session()->push('cart.' . $isLogin->nomor_hp, $cart);
        } else {
            $cart = [];
            $cart['id'] = $product->id;
            $cart['product'] = $product;
            $cart['jumlah'] = $request->jumlah;
            $cart['total'] = $request->jumlah * $product->harga;
            $request->session()->push('cart.' . $isLogin->nomor_hp, $cart);
        }

        return back()->with('berhasil', 'berhasil tambahkan ke cart');
    }

    public function minItem($id, Request $request)
    {
        $isLogin = json_decode($request->cookie('isLogin'));
        $cartUser = $request->session()->get('cart.' . $isLogin->nomor_hp);
        for ($i = 0; $i < count($cartUser); $i++) {
            if ($cartUser[$i]['id'] == $id) {
                $cartUser[$i]['jumlah']--;
                $cartUser[$i]['total'] = $cartUser[$i]['jumlah'] * $cartUser[$i]['product']->harga;
                if ($cartUser[$i]['jumlah'] == 0) {
                    unset($cartUser[$i]);
                }
            }
        }
        $cartUser = array_values($cartUser);
        $request->session()->put('cart.' . $isLogin->nomor_hp, $cartUser);
        return back();
    }

    public function plusItem($id, Request $request)
    {
        $isLogin = json_decode($request->cookie('isLogin'));
        $product = Product::find($id);
        $cartUser = $request->session()->get('cart.' . $isLogin->nomor_hp);

        $isValid = false;
        for ($i = 0; $i < count($cartUser); $i++) {
            if ($cartUser[$i]['id'] == $id && $cartUser[$i]['jumlah'] + 1 <= $product->stok) {
                $cartUser[$i]['jumlah']++;
                $cartUser[$i]['total'] = $cartUser[$i]['jumlah'] * $cartUser[$i]['product']->harga;
                $isValid = true;
            }
        }

        if (!$isValid) {
            return back()->with('msg', 'stok tidak mencukupi');
        }

        $request->session()->put('cart.' . $isLogin->nomor_hp, $cartUser);
        return back();
    }
}
