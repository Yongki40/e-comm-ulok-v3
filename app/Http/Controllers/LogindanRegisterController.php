<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

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
            ['email', $request->email],
        ])->first();
        $isValid = password_verify($request->password, $isLogin->password);

        if (!$isLogin) {
            return back()->with('msg', 'email tidak terdaftar');
        }

        if (!$isValid) {
            return back()->with('msg', 'password anda salah');
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

        User::insert([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'password' => Hash::make($request->password),
            'jenis_user' => 'customer',
        ]);

        return back()->with('msg', 'berhasil lakukan register');
    }
}
