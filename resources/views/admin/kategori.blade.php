@extends('layouts.admin.admin')

@section('jenis_admin', 'Kategori')
@section('content')
    {{-- @if (\Session::has('msg'))
        <div class="alert alert-danger">{{ \Session::get('msg') }}</div>
    @endif --}}
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="/admin/user/TambahKategori" method="post">
        @csrf
        <input type="file" name="gambar" id="">
        <input type="submit" value="Submit">
    </form>
@endsection
