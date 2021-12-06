@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Check Out Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/cart/checkout">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat yang dituju</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    @if (\Session::has('msg'))
                        <div class="alert alert-danger">{{ \Session::get('msg') }}</div>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Check Out</button>
                    <a href="/cart" class=" btn btn-info">Batalkan</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
@endsection
