<div class="in-check">
    <ul class="unit">
        <li><span></span></li>
        <li><span>Nama Barang</span></li>
        <li><span>Harga Satuan</span></li>
        <li><span>Aksi</span></li>
        <li> </li>
        <div class="clearfix"> </div>
    </ul>
    <ul class="cart-header">
        @foreach ($wishs as $wish)
            {{-- <div class="close1"> </div> --}}
            <li class="ring-in my-1">
                <a href="/shop/detail/{{ $wish['product']->id }}" style="margin-left: 18%">
                    <img src="{{ asset($wish['product']->gambar) }}" class="img-responsive" alt="" style="width:53%;">
                </a>
            </li>
            <li><span style="margin-left: -56%;">
                    <div class="overflow">
                        {{ $wish['product']->nama }}
                    </div>
                </span></li>
            <li><span style="margin-left: -56%;">Rp. {{ number_format($wish['product']->harga, 0, ',', '.') }} </span>
            </li>
            <li>
                <span style="margin-left: -56%;">
                    <a class="btn btn-danger" href="/wishlist/hapus/{{ $wish['id'] }}">Hapus item</a>
                </span>
            </li>
            <div class="clearfix"> </div>
        @endforeach
        @if (!$wishs)
            <h1>tidak ada item dalam wish list</h1>
        @endif
    </ul>

</div>
