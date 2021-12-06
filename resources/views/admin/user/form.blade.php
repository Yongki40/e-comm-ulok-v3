@if (\Session::has('msg'))
    <div class="alert alert-success">{{ \Session::get('msg') }}</div>
@endif
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Admin User</h3>
    </div>
    <!-- form start -->
    <form action="/admin/user/TambahUser" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama User</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama User"
                    name="nama_user">
                @error('nama_user')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Email"
                    name="email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Saldo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Saldo"
                    name="saldo">
                @error('saldo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nomor HP</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor Telepon"
                    name="nomor_hp">
                @error('nomor_hp')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                    name="password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Konfirmasi Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                    name="password_confirmation">
            </div>
            <div class="form-group">
                <label>Jenis User</label>
                <select class="form-control" name="jenis_user">
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
