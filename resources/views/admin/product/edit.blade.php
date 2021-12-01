@extends('layouts.admin.admin')

@section('jenis_admin', 'Produk')
@section('content')
    @if (\Session::has('msg'))
        <div class="alert alert-success">{{ \Session::get('msg') }}</div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Admin Produk</h3>
        </div>
        <!-- form start -->
        <form action="/admin/produk/editProduct" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Produk</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Product"
                        name="nama" value="{{ $product->nama }}">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Preview Gambar</label> <br>
                    <img src="{{ url($product->gambar) }}" alt="{{ $product->gambar }}" width="150px;">
                    @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gambar Produk</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="gambar">
                    @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga Produk</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Harga Produk"
                        name="harga" value="{{ $product->harga }}">
                    @error('harga')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stok Produk</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Stok Produk"
                        name="stok" value="{{ $product->stok }}">
                    @error('stok')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" name="deskripsi">{{ $product->deskripsi }}</textarea>
                        <label for="floatingTextarea2 text-secondary">Deskripsi Produk</label>
                    </div>
                    @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pilih Kategori Produk</label>
                    <select class="form-control" name="kategori_id">
                        @foreach ($kategories as $kategori)
                            @if ($kategori->id == $product->kategori->id)
                                <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                            @else
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" value="{{ $product->id }}" name="idUpdate"> Submit</button>
            </div>
        </form>
    </div>
@endsection
