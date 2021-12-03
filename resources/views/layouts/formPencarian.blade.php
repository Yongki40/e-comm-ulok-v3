<div class="d-flex" style="margin-left: 2%;">
    <form action="{{ $url_form }}" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="{{ $placeholder }}" aria-describedby="button-addon2"
                name="nama">
            <input type="number" class="form-control" placeholder="jumlah" aria-describedby="button-addon2"
                name="paginate" value="5">
            <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
        </div>
    </form>
</div>
