<?php

namespace App\Http\Controllers;

use App\Models\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LogindanRegisterController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $isLogin = User::where([
            ['email', $request->nomor],
            ['password', $request->password]
        ])->first();

        if (!$isLogin) {
            return back()->withErrors('msg', 'email atau password salah');
        }

        if ($isLogin->isDeleted) {
            return back()->withErrors('msg', 'User Sudah Diban');
        }

        Cookie::queue('isLogin', json_encode($isLogin), 60);
    }

    public function register(Request $request)
    {
        User::insert([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'password' => $request->password,
            'jenis_user' => $request->jenis_user,
        ]);

        return back()->with('msg', 'berhasil lakukan register');
    }
}
