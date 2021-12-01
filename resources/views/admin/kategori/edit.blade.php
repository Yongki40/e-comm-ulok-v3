@extends('layouts.admin.admin')

@section('jenis_admin', 'Kategori')
@section('content')
    @if (\Session::has('msg'))
        <div class="alert alert-success">{{ \Session::get('msg') }}</div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Update Kategori</h3>
        </div>
        <!-- form start -->
        <form action="/admin/kategori/editKategori" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Kategori"
                        name="nama" value="{{ $kategori->nama }}">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Preview Gambar</label> <br>
                    <img src="{{ url($kategori->gambar) }}" alt="{{ $kategori->gambar }}" width="150px;">
                    @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gambar Kategori</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Kategori"
                        name="gambar">
                    @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="idUpdate" value="{{ $kategori->id }}">Submit</button>
            </div>
        </form>
    </div>
@endsection
