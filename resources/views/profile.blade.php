@extends('layouts.user')

@section('content')
    <div class="container mt-2">
        <div class="card card-info">
            <div class="card-header bg-info">
                <h3 class="card-title">Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            {{ $user->nama_user }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-10">
                            {{ $user->nomor_hp }}
                        </div>
                    </div>
                    <h1>Saldo anda: Rp. {{ number_format($user->saldo, 0, ',', '.') }}</h1>
                    <form action="/profile/topUp" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="inputEmail3" placeholder="Contoh 10000"
                                        name="jumlah">
                                    <button class="btn btn-primary">Top Up</button>
                                </div>
                                @error('jumlah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @if (\Session::has('msg'))
                                    <div class="alert alert-success">{{ \Session::get('msg') }}</div>
                                @endif
                            </div>
                        </div>
                </div>

            </div>
            <!-- /.card-body -->


            </form>
        </div>
    </div>
@endsection
