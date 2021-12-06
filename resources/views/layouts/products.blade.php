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
                        <span>
                            <a href="/wishlist/tambah/{{ $product->id }}"
                                style="text-decoration: none; color: white;">
                                Tambahkan ke Favorite
                            </a>
                        </span>
                    </div>
                @endif
                <h4>{{ $product->nama }}</h4>
                @if ($url_detail != '/kategori/detail/')
                    <p><span class=" item_price">Rp.
                            {{ number_format($product->harga, 0, ',', '.') }}
                        </span></p>
                @endif

            </div>
        </div>
    @endforeach
    @if ($products->count() == 0)
        <h1>Tidak ada produk</h1>
    @endif
    <div class="clearfix"> </div>
</div>
