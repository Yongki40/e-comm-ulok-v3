<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //landing page admin user
        return view('admin.user.user');
    }

    public function lihatUser()
    {
        $users = User::paginate(5);
        return view('admin.user.lihatUser', compact(['users']));
    }

    public function cariUser(Request $request)
    {
        $nama_user = $request->nama_user;
        $paginate = $request->paginate == null ? 5 : $request->paginate;
        $users = User::where('nama_user', 'LIKE', $nama_user . '%')->paginate($paginate);
        return view('admin.user.lihatUser', compact(['users']));
        // return back()->with('users', $users);
    }

    public function validateUser(Request $req)
    {
        $req->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'nama_user' => ['required', 'min:3'],
            // 'nomor_hp' => ['required', 'min:12', 'max:16', 'unique:users,nomor_hp'],
            'password' => ['required', 'confirmed'],
            'saldo' => ['required', 'numeric', 'min:1000']
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

        if ($req->jenis_user != 'customer') {
            if ($req->jenis_user != 'admin') {
                return back()->withErrors(['jenis_user' => 'bukan jenis user yang benar']);
            }
        }
    }

    public function TambahUser(Request $req)
    {
        $this->validateUser($req);

        User::insert([
            'nama_user' => $req->nama_user,
            'email' => $req->email,
            'nomor_hp' => $req->nomor_hp,
            'password' => Hash::make($req->password),
            'jenis_user' => $req->jenis_user,
            'saldo' => $req->saldo
        ]);

        return back()->with('msg', 'berhasil masukan user baru');
    }

    public function editOrDelete(Request $req)
    {
        User::find($req->btnDelete)->delete();
        return back();
    }

    public function showEdit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact(['user']));
    }

    public function editUser(Request $req)
    {
        $req->validate([
            'email' => ['required', 'email'],
            'nama_user' => ['required', 'min:3'],
            // 'nomor_hp' => ['required', 'min:12', 'max:16', 'unique:users,nomor_hp'],
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

        if ($req->jenis_user != 'customer') {
            if ($req->jenis_user != 'admin') {
                return back()->withErrors(['jenis_user' => 'bukan jenis user yang benar']);
            }
        }

        $user = User::find($req->idUpdate);
        // dd($req->input());
        $user->update([
            'nama_user' => $req->nama_user,
            'email' => $req->email,
            'nomor_hp' => $req->nomor_hp,
            'jenis_user' => $req->jenis_user,
            'password' => $user->password,
            'saldo' => $req->saldo
        ]);

        return redirect('/admin/user/lihatUser');
    }
}
