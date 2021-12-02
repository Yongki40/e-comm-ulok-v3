<div class="product-one d-flex">
    @foreach ($products as $product)
        <div class="col-md-3 product-left">
            <div class="p-one simpleCart_shelfItem">
                <a href="single.html">
                    <img src="{{ asset($product->gambar) }}" alt="{{ $product->gambar }}" />
                    <div class="mask">
                        <span>Lihat Item</span>
                    </div>
                </a>
                <h4>{{ $product->nama }}</h4>
                <p><a class="item_add" href="#"><i></i> <span class=" item_price">Rp.
                            {{ number_format($product->harga, 0, ',', '.') }}
                        </span></a></p>

            </div>
        </div>
    @endforeach

    <div class="clearfix"> </div>
</div>
