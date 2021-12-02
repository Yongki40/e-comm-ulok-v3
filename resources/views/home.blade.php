@extends('layouts.user')

@section('content')

    <!--top-header-->
    <div class="top-header">
        {{-- <div class="container">
            <div class="top-header-main">
                <div class="col-md-4 top-header-left">
                    <div class="search-bar">
                        <input type="text" value="Search" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Search';}">
                        <input type="submit" value="">
                    </div>
                </div>
                <div class="col-md-4 top-header-middle">
                    <a href="index.html"><img src="{{ '/images/logo_ulos.jpg' }}" alt="" /></a>
                </div>
                <div class="col-md-4 top-header-right">
                    <div class="cart box_1">
                        <a href="checkout.html">
                            <h3>
                                <div class="total">
                                    <span class="simpleCart_total"></span> (<span id="simpleCart_quantity"
                                        class="simpleCart_quantity"></span> items)
                                </div>
                                <img src="images/cart-1.png" alt="" />
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div> --}}
        @include('layouts.navbar')
    </div>
    <!--top-header-->
    <!--bottom-header-->
    <div class="header-bottom" style="background: gainsboro;">
        <div class="container">
            <div class="top-nav">
                <ul class="memenu skyblue">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li class="grid"><a href="#">Men</a>
                        <div class="mepanel">
                            <div class="row">
                                <div class="col1 me-one">
                                    <h4>Shop</h4>
                                    <ul>
                                        <li><a href="products.html">New Arrivals</a></li>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">login</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">My Shopping Bag</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Style Zone</h4>
                                    <ul>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Style Videos</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Popular Brands</h4>
                                    <ul>
                                        <li><a href="products.html">Levis</a></li>
                                        <li><a href="products.html">Persol</a></li>
                                        <li><a href="products.html">Nike</a></li>
                                        <li><a href="products.html">Edwin</a></li>
                                        <li><a href="products.html">New Balance</a></li>
                                        <li><a href="products.html">Jack & Jones</a></li>
                                        <li><a href="products.html">Paul Smith</a></li>
                                        <li><a href="products.html">Ray-Ban</a></li>
                                        <li><a href="products.html">Wood Wood</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="grid"><a href="#">Women</a>
                        <div class="mepanel">
                            <div class="row">
                                <div class="col1 me-one">
                                    <h4>Shop</h4>
                                    <ul>
                                        <li><a href="products.html">New Arrivals</a></li>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">login</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">My Shopping Bag</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Style Zone</h4>
                                    <ul>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Style Videos</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Popular Brands</h4>
                                    <ul>
                                        <li><a href="products.html">Levis</a></li>
                                        <li><a href="products.html">Persol</a></li>
                                        <li><a href="products.html">Nike</a></li>
                                        <li><a href="products.html">Edwin</a></li>
                                        <li><a href="products.html">New Balance</a></li>
                                        <li><a href="products.html">Jack & Jones</a></li>
                                        <li><a href="products.html">Paul Smith</a></li>
                                        <li><a href="products.html">Ray-Ban</a></li>
                                        <li><a href="products.html">Wood Wood</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="grid"><a href="#">Kids</a>
                        <div class="mepanel">
                            <div class="row">
                                <div class="col1 me-one">
                                    <h4>Shop</h4>
                                    <ul>
                                        <li><a href="products.html">New Arrivals</a></li>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">login</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">My Shopping Bag</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Style Zone</h4>
                                    <ul>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Style Videos</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Popular Brands</h4>
                                    <ul>
                                        <li><a href="products.html">Levis</a></li>
                                        <li><a href="products.html">Persol</a></li>
                                        <li><a href="products.html">Nike</a></li>
                                        <li><a href="products.html">Edwin</a></li>
                                        <li><a href="products.html">New Balance</a></li>
                                        <li><a href="products.html">Jack & Jones</a></li>
                                        <li><a href="products.html">Paul Smith</a></li>
                                        <li><a href="products.html">Ray-Ban</a></li>
                                        <li><a href="products.html">Wood Wood</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="grid"><a href="#">Sports</a>
                        <div class="mepanel">
                            <div class="row">
                                <div class="col1 me-one">
                                    <h4>Shop</h4>
                                    <ul>
                                        <li><a href="products.html">New Arrivals</a></li>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">login</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">My Shopping Bag</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Style Zone</h4>
                                    <ul>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Style Videos</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Popular Brands</h4>
                                    <ul>
                                        <li><a href="products.html">Levis</a></li>
                                        <li><a href="products.html">Persol</a></li>
                                        <li><a href="products.html">Nike</a></li>
                                        <li><a href="products.html">Edwin</a></li>
                                        <li><a href="products.html">New Balance</a></li>
                                        <li><a href="products.html">Jack & Jones</a></li>
                                        <li><a href="products.html">Paul Smith</a></li>
                                        <li><a href="products.html">Ray-Ban</a></li>
                                        <li><a href="products.html">Wood Wood</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="grid"><a href="#">Brands</a>
                        <div class="mepanel">
                            <div class="row">
                                <div class="col1 me-one">
                                    <h4>Shop</h4>
                                    <ul>
                                        <li><a href="products.html">New Arrivals</a></li>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">login</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">My Shopping Bag</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Style Zone</h4>
                                    <ul>
                                        <li><a href="products.html">Men</a></li>
                                        <li><a href="products.html">Women</a></li>
                                        <li><a href="products.html">Brands</a></li>
                                        <li><a href="products.html">Kids</a></li>
                                        <li><a href="products.html">Accessories</a></li>
                                        <li><a href="products.html">Style Videos</a></li>
                                    </ul>
                                </div>
                                <div class="col1 me-one">
                                    <h4>Popular Brands</h4>
                                    <ul>
                                        <li><a href="products.html">Levis</a></li>
                                        <li><a href="products.html">Persol</a></li>
                                        <li><a href="products.html">Nike</a></li>
                                        <li><a href="products.html">Edwin</a></li>
                                        <li><a href="products.html">New Balance</a></li>
                                        <li><a href="products.html">Jack & Jones</a></li>
                                        <li><a href="products.html">Paul Smith</a></li>
                                        <li><a href="products.html">Ray-Ban</a></li>
                                        <li><a href="products.html">Wood Wood</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--bottom-header-->
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
