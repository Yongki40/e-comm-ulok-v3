<div class="in-check">
    <ul class="unit">
        <li><span></span></li>
        <li><span>Nama Barang</span></li>
        <li><span>Harga Satuan</span></li>
        <li><span>Jumlah Pesanan</span></li>
        <li><span>Total</span></li>
        <li> </li>
        <div class="clearfix"> </div>
    </ul>
    <ul class="cart-header">
        @php
            $total = 0;
        @endphp
        @foreach ($carts as $cart)
            @php
                $total += $cart['total'];
            @endphp
            <li class="ring-in">
                <a href="/shop/detail/{{ $cart['product']->id }}" style="margin-left: 18%">
                    <img src="{{ asset($cart['product']->gambar) }}" class="img-responsive"
                        alt="{{ $cart['product']->gambar }}" style="width:53%;">
                </a>
            </li>
            <li><span style="margin-left: -56%;">
                    <div class="overflow">
                        {{ $cart['product']->nama }}
                    </div>
                </span></li>
            <li><span style="margin-left: -56%;">Rp. {{ number_format($cart['product']->harga, 0, ',', '.') }} </span>
            </li>
            <li><span style="margin-left: -56%;">
                    <div>
                        <a href="/cart/kurang/{{ $cart['product']->id }}" class="btn btn-primary">-</a>
                        {{ $cart['jumlah'] }}
                        <a href="/cart/tambah/{{ $cart['product']->id }}" class="btn btn-primary">+</a>
                    </div>
                </span></li>
            <li><span style="margin-left: -56%;">{{ number_format($cart['total'], 0, ',', '.') }} </span></li>
            <div class="clearfix"> </div>
        @endforeach
        @if ($carts)
            <h1 class="mt-1" style="margin-left:50%">Total Belanja Anda:
                {{ number_format($total, 0, ',', '.') }} </h1>
        @endif

        @if (Session::has('msg'))
            <div class="alert alert-danger">{{ Session::get('msg') }}</div>
        @endif

        @if (!$carts)
            <h1>tidak ada item dalam cart</h1>
        @endif
    </ul>
    @php
        $isEmpty = false;
        if (
            request()
                ->session()
                ->has('cart.' . $isLogin->nomor_hp)
        ) {
            $isEmpty = true;
        }
    @endphp
    @if ($carts)
        <h1>
            Saldo Anda: Rp. {{ number_format($isLogin->saldo, 0, ',', '.') }}
        </h1>
        <a href="/profile" class="btn btn-primary btn-lg">Top Up ?</a>
    @endif
    <a href="/cart/pageCheckOut" @class([
        'btn',
        'btn-success',
        'btn-lg',
        'btn-lg',
        'disabled' => !$isEmpty,
    ])>Checkout</a>
    @if (Session::has('pesanSaldo'))
        <div class="alert alert-danger">{{ Session::get('pesanSaldo') }}</div>
    @endif

</div>
