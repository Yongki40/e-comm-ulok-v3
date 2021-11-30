@extends('layouts.admin.admin')

@section('jenis_admin', 'Produk')
@section('content')
    @if (\Session::has('msg'))
        <div class="alert alert-danger">{{ \Session::get('msg') }}</div>
    @endif
    <form action="/admin/user/TambahUser" method="post">
        @csrf
        <span class="text-danger">nama_user</span>
        <input type="text" name="nama_user" id=""> <br>
        @error('nama_user')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        email
        <input type="text" name="email" id=""> <br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        nomor
        <input type="text" name="nomor_hp" id=""> <br>
        @error('nomor_hp')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        password
        <input type="text" name="password" id=""> <br>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        password_confirmation
        <input type="text" name="password_confirmation" id=""> <br>
        <select name="jenis_user" id="">
            <option value="customer">Customer</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" value="Submit">
        @error('jenis_user')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </form>
@endsection
