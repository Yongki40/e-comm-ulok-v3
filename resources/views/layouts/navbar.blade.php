<div class="container d-flex justify-content-between">
    <div>
        <img src="/images/logo_ulos.jpg" alt="" srcset="" width="26%" style="margin-top:-20px;">
    </div>
    <div>
        @php
            $isLogin = json_decode(request()->cookie('isLogin'));
        @endphp
        @if ($isLogin)
            <span style="font-size:20pt;">Welcome, {{ $isLogin->nama_user }}</span>
            <a href="/cart" style="text-decoration:none;padding-left: 10px;">
                <img src="{{ asset('/images/cart.png') }}" alt="" style="margin-top:-1vh;">
            </a>
            <a href="/logout" class="btn btn-sm btn-danger mx-2" style="margin-top: -6px;">Logout</a>
        @else
            <a href="/login" class="btn btn-primary mx-2" style="margin-top: -6px;">Login atau Register</a>
        @endif
    </div>
</div>
<div class="header-bottom" style="background: gainsboro;">
    <div class="container">
        <div class="top-nav">
            <ul class="memenu skyblue">
                <li class="active"><a href="/">Home</a></li>
                <li class="grid"><a href="/shop">Shop</a> </li>
                <li class="grid"><a href="/kategori">Kategori</a> </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div
