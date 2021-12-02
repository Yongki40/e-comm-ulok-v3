<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webite Ulos</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.css') }}">
    <script src="{{ asset('js/admin/adminlte.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Register</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/register">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Nama"
                                name="nama_user">
                            @error('nama_user')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
                                name="email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail3" placeholder="Nomor HP"
                                name="nomor_hp">
                            @error('nomor_hp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                                name="password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                                name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label>Jenis User</label>
                        <select class="form-control" name="jenis_user">
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    @if (\Session::has('msg'))
                        <div class="alert alert-success">{{ \Session::get('msg') }}</div>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Register</button>
                    <a href="/login" class=" btn btn-info">Ke Login</a>
                    <a href="/" class=" btn btn-info">Kembali ke Home</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>

</body>

</html>
