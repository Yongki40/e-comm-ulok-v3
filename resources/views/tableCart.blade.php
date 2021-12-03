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
        @foreach ($carts as $cart)
            {{-- <div class="close1"> </div> --}}
            <li class="ring-in">
                <a href="/shop/detail/{{ $cart['product']->id }}" style="margin-left: 18%">
                    <img src="{{ asset($cart['product']->gambar) }}" class="img-responsive" alt="" style="width:53%;">
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
    </ul>
    <span class="btn btn-success">Checkout</span>
</div>
