@extends('layouts.admin.admin')

@section('jenis_admin', 'Kategori')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lihat Kategori</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/admin/kategori/cariKategori/" method="get">
                <div class="input-group mb-3" style="width:40%; float:left">
                    <input type="text" class="form-control" placeholder="Nama Kategori" aria-describedby="button-addon2"
                        name="nama">
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
                        <th>Gambar</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategories as $kategori)
                        <tr>
                            <td>{{ $kategori->id }}</td>
                            <td>{{ $kategori->nama }}</td>
                            <td>
                                <img src="{{ url($kategori->gambar) }}" alt="" width="200px;">
                            </td>
                            <td>{{ $kategori->slug }}</td>
                            <td>
                                <form action="/admin/kategori/editOrDelete/" method="post">
                                    @csrf
                                    <a href="/admin/kategori/editKategori/{{ $kategori->id }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger" value="{{ $kategori->id }}"
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
            Halaman {{ $kategories->currentPage() }} dari {{ $kategories->lastPage() }}
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link"
                        href="{{ $kategories->appends($_GET)->previousPageUrl() }}">Sebelum</a>
                </li>
                <li class="page-item"><a class="page-link"
                        href="{{ $kategories->appends($_GET)->nextPageUrl() }}">Selanjutnya</a>
                </li>
            </ul>
        </div>
    </div>

@endsection
