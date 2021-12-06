@extends('layouts.user')

<style>
    .detail {
        width: 90%;
        margin: 0 auto;
        background: #f6a5ae;
    }

</style>
@section('content')
    <div class="container detail text-center">
        <img src="{{ asset('/images/back-2.png') }}" alt="" srcset="" width="17%">
        <div class="text-center m-auto mb-5" style="padding-bottom: 3%;">
            <span class="text-break fs-2">
                Terima kasih, transaksimu sudah selesai. Mohon menunggu barang terkirim.
            </span> <br>
            <a href="/" class="btn btn-primary">Kembali Ke Home</a>
        </div>
    </div>
@endsection
