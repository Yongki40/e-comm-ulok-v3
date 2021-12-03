@extends('layouts.user')

@section('content')

    <div class="top-header">
        @include('layouts.navbar')
    </div>
    @include('layouts.carousel')
    <!--start-shoes-->
    <div class="shoes">
        <div class="container">
            <h1>4 Product Terbaru</h1>
            @include('layouts.products')
        </div>
    </div>
    <!--end-shoes-->
    <!--start-footer-->
    <div class="footer">
        <div class="container">
            <div class="footer-top d-flex justify-content-center">
                <div class="col-md-3 footer-left">
                    <h3>ABOUT US</h3>
                    <ul>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#">Team</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-left">
                    <h3>YOUR ACCOUNT</h3>
                    <ul>
                        <li><a href="account.html">Your Account</a></li>
                        <li><a href="#">Personal Information</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-left">
                    <h3>CATEGORIES</h3>
                    <ul>
                        <li><a href="#">Sports Shoes</a></li>
                        <li><a href="#">Casual Shoes</a></li>
                        <li><a href="#">Formal Shoes</a></li>
                        <li><a href="#">Party Shoes</a></li>
                        <li><a href="#">Ethnic</a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--end-footer-->
    <!--end-footer-text-->
    <div class="footer-text">
        <div class="container">
            <div class="footer-main">
                <p class="footer-class">© 2021 Website Ulos All Rights Reserved</p>
            </div>
        </div>
    </div>
    <!--end-footer-text-->
@endsection
