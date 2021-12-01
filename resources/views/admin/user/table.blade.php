<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lihat User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="/admin/user/cariUser/" method="get">
            <div class="input-group mb-3" style="width:40%; float:left">
                <input type="text" class="form-control" placeholder="Nama User" aria-describedby="button-addon2"
                    name="nama_user">
                <input type="number" class="form-control" placeholder="jumlah" aria-describedby="button-addon2"
                    name="paginate" value="5">
                <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
            </div>
        </form>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Jenis User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama_user }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nomor_hp }}</td>
                        <td>
                            @if ($user->jenis_user == 'admin')
                                <span class="badge bg-warning">{{ $user->jenis_user }}</span>
                            @else
                                <span>{{ $user->jenis_user }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="/admin/user/editOrDelete/" method="post">
                                @csrf
                                <a href="/admin/user/editUser/{{ $user->id }}" class="btn btn-primary">
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-danger" value="{{ $user->id }}"
                                    name="btnDelete">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        Halaman {{ $users->currentPage() }} dari {{ $users->lastPage() }}
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link"
                    href="{{ $users->appends($_GET)->previousPageUrl() }}">Sebelum</a>
            </li>
            <li class="page-item"><a class="page-link"
                    href="{{ $users->appends($_GET)->nextPageUrl() }}">Selanjutnya</a>
            </li>
        </ul>
    </div>
</div>
