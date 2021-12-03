<div class="grid-container" style="margin-top:-2%;">
    @foreach ($products as $product)
        <div class="product-left grid-item">
            <div class="p-one simpleCart_shelfItem">
                <img src="{{ asset($product->gambar) }}" alt="{{ $product->gambar }}" />
                @if ($url_detail == '/kategori/detail/')
                    <div class="mask">
                        <span>
                            <a href="{{ $url_detail . $product->slug }}" style="text-decoration: none; color: white;">
                                Lihat Item
                            </a>
                        </span>
                    </div>
                @else
                    <div class="mask">
                        <span>
                            <a href="{{ $url_detail . $product->id }}" style="text-decoration: none; color: white;">
                                Lihat Item
                            </a>
                        </span> <br> <br>
                        <span>Tambahkan ke Favorite</span>
                    </div>
                @endif
                <h4>{{ $product->nama }}</h4>
                @if ($url_detail != '/kategori/detail/')
                    <p><a class="item_add" href="#"><i></i> <span class=" item_price">Rp.
                                {{ number_format($product->harga, 0, ',', '.') }}
                            </span></a></p>
                @endif

            </div>
        </div>
    @endforeach

    <div class="clearfix"> </div>
</div>
