@extends('layouts.user')

@section('content')
    <div class="d-flex">
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            @include('layouts.aboutProfile',[
            'nama'=> 'Lasma N',
            'url_insta'=> 'https://www.instagram.com/lasma_n/',
            'username_insta' => '@lasma_n',
            'nrp'=>'NRP: [nanti diisi manual]',
            ])

            @include('layouts.aboutProfile',[
            'nama'=> 'Lasma N',
            'url_insta'=> 'https://www.instagram.com/lasma_n/',
            'username_insta' => '@lasma_n',
            'nrp'=>'NRP: [nanti diisi manual2]',
            ])

            @include('layouts.aboutProfile',[
            'nama'=> 'Lasma N',
            'url_insta'=> 'https://www.instagram.com/lasma_n/',
            'username_insta' => '@lasma_n',
            'nrp'=>'NRP: [nanti diisi manual3]',
            ])
        </div>
    </div>


@endsection
