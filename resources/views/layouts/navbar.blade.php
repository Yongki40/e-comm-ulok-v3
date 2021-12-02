<div class="container d-flex justify-content-between">
    <div>
        <img src="/images/logo_ulos.jpg" alt="" srcset="" width="26%" style="margin-top:-20px;">
    </div>
    <div>
        @if (isset($isLogin))
            <span style="font-size:20pt;">Welcome, {{ $isLogin->nama_user }}</span>
            <a href="/logout" class="btn btn-sm btn-danger mx-2" style="margin-top: -6px;">Logout</a>
        @else
            <span>Home</span>

        @endif
    </div>
</div>
