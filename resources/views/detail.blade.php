@extends('layouts.user')
@section('content')
    <div class="top-header">
        @include('layouts.navbar')
    </div>
    <div class="container mx-10 mt-3 d-flex">
        <form action="/shop/tambahkanCart" method="post">
            @csrf
            <div class="px-5 d-flex">
                <img src="{{ asset($product->gambar) }}" alt="" class="border border-1 border-secondary p-2" width="50%"
                    style="margin-right:2%;">
                <div>
                    <h3>{{ $product->nama }}</h3>
                    <p class="availability">
                        Jumlah Stok: <span class="color">{{ $product->stok }} </span>
                    </p>
                    <h2 class="quick">Deskripsi</h2>
                    <p class="quick_desc text-break">
                        {{ $product->deskripsi }}
                    </p>
                    <div class="quantity_box">
                        <ul class="product-qty">
                            <span>Jumlah:</span>
                            <input type="number" class="form-control" placeholder="Contoh: 2" name="jumlah">
                        </ul>
                        @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @if (Session::has('msg'))
                            <div class="alert alert-danger">{{ Session::get('msg') }}</div>
                        @endif
                        @if (Session::has('berhasil'))
                            <div class="alert alert-success">{{ Session::get('berhasil') }}</div>
                        @endif
                    </div>
                    <div class="single-but item_add">
                        <button type="submit" class="btn btn-danger" value="{{ $product->id }}"
                            name="btnAddCart">Tambahkan ke Keranjang</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="text-center">
            <h1>Barang Relevan</h1>
            @foreach ($relevans as $item)
                <div class="border border-1 border-secondary p-2 m-auto" style="width:30%;">
                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->gambar }}" width="100%"
                        style="margin-right:2%;"> <br>
                    <span>{{ $item->nama }}</span> <br>
                    <span>Rp. {{ $item->harga }}</span>
                </div>
                <br>
            @endforeach

        </div>
    </div>
@endsection
