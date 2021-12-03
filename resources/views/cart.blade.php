@extends('layouts.user')

@section('content')
    <div class="top-header">
        @include('layouts.navbar')
    </div>
    <div class="container">
        @include('tableCart')
    </div>
@endsection
