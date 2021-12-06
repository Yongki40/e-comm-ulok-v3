<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProfileController extends Controller
{
    public function showProfile(Request $request)
    {
        $isLogin = json_decode($request->cookie('isLogin'));
        $user = User::find($isLogin->id);
        return view('profile', compact('user'));
    }

    public function topUp(Request $request)
    {
        $request->validate([
            'jumlah' => ['required', 'numeric', 'min:10000'],
        ], [
            'jumlah.min' => 'top up minimal 10.000',
            'numeric' => 'jumlah harus hanya angka saja',
            'required' => 'masukan jumlah berupa angka',
        ]);
        $isLogin = json_decode($request->cookie('isLogin'));
        $user = User::find($isLogin->id);
        $user->update([
            'saldo' => ($user->saldo + $request->jumlah)
        ]);
        $isLogin = $user;
        Cookie::queue('isLogin', json_encode($isLogin), 60);
        return back()->with('msg', 'berhasil Top Up');
    }
}
