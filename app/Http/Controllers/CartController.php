<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Td_Jual;
use App\Models\Th_Jual;
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
            return back()->with('msg', 'stok barang tidak mencukupi');
        }

        $request->session()->put('cart.' . $isLogin->nomor_hp, $cartUser);
        return back();
    }


    public function pageCheckOut(Request $request)
    {
        $isLogin = json_decode($request->cookie('isLogin'));
        $cartUser = $request->session()->get('cart.' . $isLogin->nomor_hp);
        $total = 0;
        foreach ($cartUser as $cart) {
            $total += $cart['total'];
        }

        if ($isLogin->saldo < $total) {
            return back()->with('pesanSaldo', 'saldo anda kurang harap top up');
        }
        return view('pageCheckOut');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
        ]);

        $isLogin = json_decode($request->cookie('isLogin'));
        $cartUser = $request->session()->get('cart.' . $isLogin->nomor_hp);

        $total = 0;
        foreach ($cartUser as $cart) {
            $total += $cart['total'];
        }

        Th_Jual::insert([
            'user_id' => $isLogin->id,
            'total' => $total,
            'alamat' => $request->alamat,
            'created_at' => now()
        ]);

        $header = Th_Jual::latest()->first();

        foreach ($cartUser as $cart) {
            Td_Jual::insert([
                'th__jual_id' => $header->id,
                'product_id' => $cart['product']->id,
                'harga' => $cart['product']->harga,
                'jumlah' => $cart['jumlah'],
                'subtotal' => $cart['total'],
                'created_at' => now()
            ]);
            $product = Product::find($cart['product']->id);
            // dd($product->stok - $cart['jumlah']);
            $product->update(['stok' => $product->stok - $cart['jumlah']]);
            // dd($product);
        }
        $request->session()->forget('cart.' . $isLogin->nomor_hp);
        $user = User::find($isLogin->id);
        $user->update([
            'saldo' => $user->saldo - $total
        ]);
        $isLogin = $user;
        return redirect('/thankYou');
    }

    public function thankYou(Request $request)
    {
        return view('thankYou');
    }
}
