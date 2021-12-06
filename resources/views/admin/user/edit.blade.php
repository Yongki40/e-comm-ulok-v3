@extends('layouts.admin.admin')

@section('jenis_admin', 'User')
@section('content')
    @if (\Session::has('msg'))
        <div class="alert alert-success">{{ \Session::get('msg') }}</div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Update User</h3>
        </div>
        <!-- form start -->
        <form action="/admin/user/editUser" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama User</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama User"
                        name="nama_user" value="{{ $user->nama_user }}">
                    @error('nama_user')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Email"
                        name="email" value="{{ $user->email }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Saldo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $user->saldo }}"
                        name="saldo">
                    @error('saldo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor HP</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor Telepon"
                        name="nomor_hp" value="{{ $user->nomor_hp }}">
                    @error('nomor_hp')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis User</label>
                    <select class="form-control" name="jenis_user">
                        @if ($user->jenis_user == 'admin')
                            <option value="customer">Customer</option>
                            <option value="admin" selected>Admin</option>
                        @else
                            <option value="customer" selected>Customer</option>
                            <option value="admin">Admin</option>
                        @endif
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="idUpdate" value="{{ $user->id }}">Update</button>
            </div>
        </form>
    </div>
@endsection
