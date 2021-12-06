@extends('layouts.user')

@section('content')

    @include('layouts.carousel')
    <!--start-shoes-->
    <div class="shoes">
        <div class="container">
            <h1>4 Product Terbaru</h1>
            @include('layouts.products')
        </div>
    </div>
    <!--end-shoes-->
@endsection
