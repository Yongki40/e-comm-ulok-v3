@extends('layouts.admin.admin')

@section('jenis_admin', 'Produk')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lihat Produk</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/admin/produk/cariProduct/" method="get">
                <div class="input-group mb-3" style="width:40%; float:left">
                    <input type="text" class="form-control" placeholder="Nama Produk" aria-describedby="button-addon2"
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
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->nama }}</td>
                            <td>
                                <img src="{{ url($product->gambar) }}" alt="" width="200px;">
                            </td>
                            <td>{{ $product->harga }}</td>
                            <td>{{ $product->stok }}</td>
                            <td>
                                <form action="/admin/produk/editOrDelete/" method="post">
                                    @csrf
                                    <a href="/admin/produk/editProduct/{{ $product->id }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger" value="{{ $product->id }}"
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
            Halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link"
                        href="{{ $products->appends($_GET)->previousPageUrl() }}">Sebelum</a>
                </li>
                <li class="page-item"><a class="page-link"
                        href="{{ $products->appends($_GET)->nextPageUrl() }}">Selanjutnya</a>
                </li>
            </ul>
        </div>
    </div>

@endsection
