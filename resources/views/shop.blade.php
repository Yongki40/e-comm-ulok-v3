@extends('layouts.user')
<style>
    .font-paginate-link {
        font-size: 20pt;
    }

</style>
@section('content')
    <div class="shoes" style="margin-top: -6%;">
        <div class="container">
            @if (isset($kategori))
                <h1 style="margin-left: 2%;">Produk Ulos kategori {{ $kategori->nama }}</h1>
            @else
                <h1 style="margin-left: 2%;">Semua Produk Ulos</h1>
            @endif

            @include('layouts.formPencarian')
            @include('layouts.products')
            @if ($products->count() > 0)
                <div class="d-flex justify-content-around font-paginate-link">
                    Halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" style="font-size: 15pt;"
                                href="{{ $products->appends($_GET)->previousPageUrl() }}">Sebelum</a>
                        </li>
                        <li class="page-item"><a class="page-link" style="font-size: 15pt;"
                                href="{{ $products->appends($_GET)->nextPageUrl() }}">Selanjutnya</a>
                        </li>
                    </ul>
                </div>
            @endif


        </div>
    </div>
@endsection
