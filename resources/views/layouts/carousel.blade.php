<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @php
            $index_caro = 0;
        @endphp
        @foreach ($products_caro as $caro)
            @if ($index_caro == 0)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1"></button>
            @else
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            @endif
            @php
                $index_caro++;
            @endphp
        @endforeach

    </div>
    <div class="carousel-inner">
        @php
            $index_caro = 0;
        @endphp
        @foreach ($products_caro as $caro)
            @if ($index_caro == 0)
                <div class="carousel-item active">
                    <img src="{{ asset($caro->gambar) }}" class="d-block w-100" alt="{{ $caro->gambar }}"
                        height="800px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $caro->nama }}</h5>
                        <p class="text-break">{{ $caro->deskripsi }}</p>
                    </div>
                </div>
            @else
                <div class="carousel-item">
                    <img src="{{ asset($caro->gambar) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $caro->nama }}</h5>
                        <p class="text-break">{{ $caro->deskripsi }}</p>
                    </div>
                </div>
            @endif
            @php
                $index_caro++;
            @endphp
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
