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

    public function showRegister()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $isLogin = User::where([
            ['email', $request->email]
        ])->first();
        if (!$isLogin) {
            return back()->with('msg', 'email atau password salah');
        }

        if ($isLogin->isDeleted) {
            return back()->with('msg', 'User Sudah Diban');
        }

        Cookie::queue('isLogin', json_encode($isLogin), 60);
        return redirect('/');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'nama_user' => ['required', 'min:3'],
            // 'nomor_hp' => ['required', 'min:12', 'max:16', 'unique:users,nomor_hp'],
            'password' => ['required', 'confirmed']
        ], [
            'email.unique' => ':attribute sudah pernah dipakai',
            'nomor_hp.unique' => 'nomor hp sudah pernah dipakai',
            'email.required' => ':attribute harus diisi',
            'email.email' => 'email tidak sesuai format',
            'nama_user.required' => ':attribute harus diisi',
            'noHp.required' => ':attribute harus diisi',
            'password.required' => ':attribute harus diisi',
            'password.confirmed' => 'password dan konfirmasi tidak sama'
        ]);

        if ($request->jenis_user != 'customer') {
            if ($request->jenis_user != 'admin') {
                return back()->withErrors(['jenis_user' => 'bukan jenis user yang benar']);
            }
        }

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
