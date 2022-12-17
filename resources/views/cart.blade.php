@extends('layouts.app')

@section('title','Cart Checkout')
@section('meta_keywords','Cart Checkout')
@section('meta_description','Cart Checkout')

@push('custom_css')
    <style>
        .labelbold{
            font-weight: bold;
        }
    </style>
@endpush
@section('content')



<main class="main__content_wrapper">

        
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container-fluid">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">Cart</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">My Cart</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="cart__section section--padding">
            <div class="container-fluid">
                <div class="cart__section--inner">
                    
                    <h2 class="cart__title mb-40">Shopping Cart</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart__table">
                                <span class="cart__table" id="cartPageData" style="width: 100%;">
                                    
                                </span>
                                <div class="continue__shopping d-flex justify-content-between">
                                    <a class="continue__shopping--link" href="{{url('product-listing')}}">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__summary border-radius-10">
                                <div class="coupon__code mb-30">
                                    <h3 class="coupon__code--title">Coupon</h3>
                                    <p class="coupon__code--desc">Enter your coupon code if you have one.</p>
                                    <div class="coupon__code--field d-flex">
                                        <label>
                                            <input class="coupon__code--field__input border-radius-5" placeholder="Coupon code" type="text" id="coupon_code">
                                        </label>
                                        <button class="coupon__code--field__btn primary__btn checkcouponcode" id="chkCouponButton" type="submit">Apply Coupon
                                            <pre class="spinner-border spinner-border-sm couponLoader" style="display:none"></pre>
                                        </button>
                                        <button type="button" class="coupon__code--field__btn primary__btn cancelcouponcode" style="display:none;">Remove </button>
                                    </div>
                                </div>
                                
                                <div class="cart__summary--total mb-20" id="price_details">
                                    
                                </div>
                                <div class="cart__summary--footer">
                                    <ul class="d-flex justify-content-between">
                                        <li><a class="cart__summary--footer__btn primary__btn checkout" href="{{ url('checkout')}}">Check Out</a></li>
                                        <li><a class="cart__summary--footer__btn primary__btn " href="{{ url('guest-checkout')}}">Guest Check Out</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
       
        
        <!-- <section class="product__section section--padding pt-0">
            <div class="container-fluid">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">New Products</h2>
                </div>
                <div class="product__section--inner product__swiper--column5 swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img" src="assets/img/product/product1.webp" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="assets/img/product/product2.webp" alt="product-img">
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">New</span>
                                    </div>
                                    <ul class="product__items--action d-flex justify-content-center">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                    <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="compare.html">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="16.47" height="13.088" viewBox="0 0 15.47 11.088">
                                                    <g  transform="translate(0 -72.508)">
                                                      <path  data-name="Path 114" d="M15.359,80.9l-2.011-2.011a.525.525,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49l1.106,1.106H10.576L8.3,78.052l2.273-2.274h1.618l-1.106,1.106a.287.287,0,0,0,.2.49h1.683a.531.531,0,0,0,.374-.155l2.011-2.011a.38.38,0,0,0,0-.535l-.859-.859a.227.227,0,1,0-.32.321l.806.806L13.027,76.9a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542h-2.04a.227.227,0,0,0-.16.066l-2.34,2.34-.544-.544,2.519-2.519a.382.382,0,0,1,.272-.112h2.293a.317.317,0,0,0,.225-.542l-1.054-1.054h1.282a.076.076,0,0,1,.053.022l.4.4a.227.227,0,1,0,.32-.321l-.4-.4a.531.531,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49L12.194,74.1H10.229a.832.832,0,0,0-.592.245L7.118,76.867,4.6,74.349a.832.832,0,0,0-.592-.245H.378A.378.378,0,0,0,0,74.481v.92a.378.378,0,0,0,.378.378H3.66l2.273,2.274L3.66,80.326H.378A.378.378,0,0,0,0,80.7v.92A.378.378,0,0,0,.378,82H4.007a.835.835,0,0,0,.592-.245l2.519-2.519.8.8a.227.227,0,1,0,.32-.32L3.914,75.392a.227.227,0,0,0-.16-.066H.453v-.769H4.007a.382.382,0,0,1,.272.113l6.043,6.043a.227.227,0,0,0,.16.066h2.04a.317.317,0,0,0,.224-.542l-1.054-1.054h1.282a.075.075,0,0,1,.053.022l1.958,1.958-1.958,1.958a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542H10.229a.383.383,0,0,1-.272-.113l-.968-.968a.227.227,0,0,0-.32.32l.968.968a.833.833,0,0,0,.592.245h1.965l-1.105,1.105a.287.287,0,0,0,.2.49h1.683a.525.525,0,0,0,.374-.155l2.011-2.011A.379.379,0,0,0,15.359,80.9Zm-11.08.539a.389.389,0,0,1-.272.113H.453v-.769h3.3a.226.226,0,0,0,.16-.066l2.34-2.34.543.544Z" transform="translate(0 0)" fill="currentColor"/>
                                                    </g>
                                                </svg>
                                                <span class="visually-hidden">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__items--content text-center">
                                    <div class="product__items--color">
                                        <ul class="product__items--color__wrapper d-flex justify-content-center">
                                            <li class="product__items--color__list"><a class="product__items--color__link one" href="javascript:void(0)"><span class="visually-hidden">Color 1</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link two" href="javascript:void(0)"><span class="visually-hidden">Color 2</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link three" href="javascript:void(0)"><span class="visually-hidden">Color 3</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link four" href="javascript:void(0)"><span class="visually-hidden">Color 4</span></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="product__items--content__title h4"><a href="product-details.html">Fashion Plastic Chair</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$150.00</span>
                                        <span class="old__price">$200.00</span>
                                    </div>
                                    <a class="product__items--action__cart--btn primary__btn" href="cart.html">
                                        <svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
                                            <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                        </svg>
                                        <span class="add__to--cart__text"> Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img" src="assets/img/product/product3.webp" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="assets/img/product/product4.webp" alt="product-img">
                                    </a>
                                    <ul class="product__items--action d-flex justify-content-center">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                    <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="compare.html">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="16.47" height="13.088" viewBox="0 0 15.47 11.088">
                                                    <g  transform="translate(0 -72.508)">
                                                      <path  data-name="Path 114" d="M15.359,80.9l-2.011-2.011a.525.525,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49l1.106,1.106H10.576L8.3,78.052l2.273-2.274h1.618l-1.106,1.106a.287.287,0,0,0,.2.49h1.683a.531.531,0,0,0,.374-.155l2.011-2.011a.38.38,0,0,0,0-.535l-.859-.859a.227.227,0,1,0-.32.321l.806.806L13.027,76.9a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542h-2.04a.227.227,0,0,0-.16.066l-2.34,2.34-.544-.544,2.519-2.519a.382.382,0,0,1,.272-.112h2.293a.317.317,0,0,0,.225-.542l-1.054-1.054h1.282a.076.076,0,0,1,.053.022l.4.4a.227.227,0,1,0,.32-.321l-.4-.4a.531.531,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49L12.194,74.1H10.229a.832.832,0,0,0-.592.245L7.118,76.867,4.6,74.349a.832.832,0,0,0-.592-.245H.378A.378.378,0,0,0,0,74.481v.92a.378.378,0,0,0,.378.378H3.66l2.273,2.274L3.66,80.326H.378A.378.378,0,0,0,0,80.7v.92A.378.378,0,0,0,.378,82H4.007a.835.835,0,0,0,.592-.245l2.519-2.519.8.8a.227.227,0,1,0,.32-.32L3.914,75.392a.227.227,0,0,0-.16-.066H.453v-.769H4.007a.382.382,0,0,1,.272.113l6.043,6.043a.227.227,0,0,0,.16.066h2.04a.317.317,0,0,0,.224-.542l-1.054-1.054h1.282a.075.075,0,0,1,.053.022l1.958,1.958-1.958,1.958a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542H10.229a.383.383,0,0,1-.272-.113l-.968-.968a.227.227,0,0,0-.32.32l.968.968a.833.833,0,0,0,.592.245h1.965l-1.105,1.105a.287.287,0,0,0,.2.49h1.683a.525.525,0,0,0,.374-.155l2.011-2.011A.379.379,0,0,0,15.359,80.9Zm-11.08.539a.389.389,0,0,1-.272.113H.453v-.769h3.3a.226.226,0,0,0,.16-.066l2.34-2.34.543.544Z" transform="translate(0 0)" fill="currentColor"/>
                                                    </g>
                                                </svg>
                                                <span class="visually-hidden">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__items--content text-center">
                                    <div class="product__items--color">
                                        <ul class="product__items--color__wrapper d-flex justify-content-center">
                                            <li class="product__items--color__list"><a class="product__items--color__link one" href="javascript:void(0)"><span class="visually-hidden">Color 1</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link two" href="javascript:void(0)"><span class="visually-hidden">Color 2</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link three" href="javascript:void(0)"><span class="visually-hidden">Color 3</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link four" href="javascript:void(0)"><span class="visually-hidden">Color 4</span></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="product__items--content__title h4"><a href="product-details.html">Modern Swivel Chair</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$160.00</span>
                                        <span class="old__price">$210.00</span>
                                    </div>
                                    <a class="product__items--action__cart--btn primary__btn" href="cart.html">
                                        <svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
                                            <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                        </svg>
                                        <span class="add__to--cart__text"> Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img" src="assets/img/product/product5.webp" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="assets/img/product/product6.webp" alt="product-img">
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">New</span>
                                    </div>
                                    <ul class="product__items--action d-flex justify-content-center">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                    <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="compare.html">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="16.47" height="13.088" viewBox="0 0 15.47 11.088">
                                                    <g  transform="translate(0 -72.508)">
                                                      <path  data-name="Path 114" d="M15.359,80.9l-2.011-2.011a.525.525,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49l1.106,1.106H10.576L8.3,78.052l2.273-2.274h1.618l-1.106,1.106a.287.287,0,0,0,.2.49h1.683a.531.531,0,0,0,.374-.155l2.011-2.011a.38.38,0,0,0,0-.535l-.859-.859a.227.227,0,1,0-.32.321l.806.806L13.027,76.9a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542h-2.04a.227.227,0,0,0-.16.066l-2.34,2.34-.544-.544,2.519-2.519a.382.382,0,0,1,.272-.112h2.293a.317.317,0,0,0,.225-.542l-1.054-1.054h1.282a.076.076,0,0,1,.053.022l.4.4a.227.227,0,1,0,.32-.321l-.4-.4a.531.531,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49L12.194,74.1H10.229a.832.832,0,0,0-.592.245L7.118,76.867,4.6,74.349a.832.832,0,0,0-.592-.245H.378A.378.378,0,0,0,0,74.481v.92a.378.378,0,0,0,.378.378H3.66l2.273,2.274L3.66,80.326H.378A.378.378,0,0,0,0,80.7v.92A.378.378,0,0,0,.378,82H4.007a.835.835,0,0,0,.592-.245l2.519-2.519.8.8a.227.227,0,1,0,.32-.32L3.914,75.392a.227.227,0,0,0-.16-.066H.453v-.769H4.007a.382.382,0,0,1,.272.113l6.043,6.043a.227.227,0,0,0,.16.066h2.04a.317.317,0,0,0,.224-.542l-1.054-1.054h1.282a.075.075,0,0,1,.053.022l1.958,1.958-1.958,1.958a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542H10.229a.383.383,0,0,1-.272-.113l-.968-.968a.227.227,0,0,0-.32.32l.968.968a.833.833,0,0,0,.592.245h1.965l-1.105,1.105a.287.287,0,0,0,.2.49h1.683a.525.525,0,0,0,.374-.155l2.011-2.011A.379.379,0,0,0,15.359,80.9Zm-11.08.539a.389.389,0,0,1-.272.113H.453v-.769h3.3a.226.226,0,0,0,.16-.066l2.34-2.34.543.544Z" transform="translate(0 0)" fill="currentColor"/>
                                                    </g>
                                                </svg>
                                                <span class="visually-hidden">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__items--content text-center">
                                    <div class="product__items--color">
                                        <ul class="product__items--color__wrapper d-flex justify-content-center">
                                            <li class="product__items--color__list"><a class="product__items--color__link one" href="javascript:void(0)"><span class="visually-hidden">Color 1</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link two" href="javascript:void(0)"><span class="visually-hidden">Color 2</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link three" href="javascript:void(0)"><span class="visually-hidden">Color 3</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link four" href="javascript:void(0)"><span class="visually-hidden">Color 4</span></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="product__items--content__title h4"><a href="product-details.html">Design Living Sofa</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$155.00</span>
                                        <span class="old__price">$205.00</span>
                                    </div>
                                    <a class="product__items--action__cart--btn primary__btn" href="cart.html">
                                        <svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
                                            <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                        </svg>
                                        <span class="add__to--cart__text"> Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img" src="assets/img/product/product7.webp" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="assets/img/product/product8.webp" alt="product-img">
                                    </a>
                                    <ul class="product__items--action d-flex justify-content-center">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                    <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="compare.html">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="16.47" height="13.088" viewBox="0 0 15.47 11.088">
                                                    <g  transform="translate(0 -72.508)">
                                                      <path  data-name="Path 114" d="M15.359,80.9l-2.011-2.011a.525.525,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49l1.106,1.106H10.576L8.3,78.052l2.273-2.274h1.618l-1.106,1.106a.287.287,0,0,0,.2.49h1.683a.531.531,0,0,0,.374-.155l2.011-2.011a.38.38,0,0,0,0-.535l-.859-.859a.227.227,0,1,0-.32.321l.806.806L13.027,76.9a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542h-2.04a.227.227,0,0,0-.16.066l-2.34,2.34-.544-.544,2.519-2.519a.382.382,0,0,1,.272-.112h2.293a.317.317,0,0,0,.225-.542l-1.054-1.054h1.282a.076.076,0,0,1,.053.022l.4.4a.227.227,0,1,0,.32-.321l-.4-.4a.531.531,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49L12.194,74.1H10.229a.832.832,0,0,0-.592.245L7.118,76.867,4.6,74.349a.832.832,0,0,0-.592-.245H.378A.378.378,0,0,0,0,74.481v.92a.378.378,0,0,0,.378.378H3.66l2.273,2.274L3.66,80.326H.378A.378.378,0,0,0,0,80.7v.92A.378.378,0,0,0,.378,82H4.007a.835.835,0,0,0,.592-.245l2.519-2.519.8.8a.227.227,0,1,0,.32-.32L3.914,75.392a.227.227,0,0,0-.16-.066H.453v-.769H4.007a.382.382,0,0,1,.272.113l6.043,6.043a.227.227,0,0,0,.16.066h2.04a.317.317,0,0,0,.224-.542l-1.054-1.054h1.282a.075.075,0,0,1,.053.022l1.958,1.958-1.958,1.958a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542H10.229a.383.383,0,0,1-.272-.113l-.968-.968a.227.227,0,0,0-.32.32l.968.968a.833.833,0,0,0,.592.245h1.965l-1.105,1.105a.287.287,0,0,0,.2.49h1.683a.525.525,0,0,0,.374-.155l2.011-2.011A.379.379,0,0,0,15.359,80.9Zm-11.08.539a.389.389,0,0,1-.272.113H.453v-.769h3.3a.226.226,0,0,0,.16-.066l2.34-2.34.543.544Z" transform="translate(0 0)" fill="currentColor"/>
                                                    </g>
                                                </svg>
                                                <span class="visually-hidden">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__items--content text-center">
                                    <div class="product__items--color">
                                        <ul class="product__items--color__wrapper d-flex justify-content-center">
                                            <li class="product__items--color__list"><a class="product__items--color__link one" href="javascript:void(0)"><span class="visually-hidden">Color 1</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link two" href="javascript:void(0)"><span class="visually-hidden">Color 2</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link three" href="javascript:void(0)"><span class="visually-hidden">Color 3</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link four" href="javascript:void(0)"><span class="visually-hidden">Color 4</span></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="product__items--content__title h4"><a href="product-details.html">Plastic Chair Wooden</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$190.00</span>
                                        <span class="old__price">$200.00</span>
                                    </div>
                                    <a class="product__items--action__cart--btn primary__btn" href="cart.html">
                                        <svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
                                            <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                        </svg>
                                        <span class="add__to--cart__text"> Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img" src="assets/img/product/product9.webp" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="assets/img/product/product10.webp" alt="product-img">
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">New</span>
                                    </div>
                                    <ul class="product__items--action d-flex justify-content-center">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                    <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="compare.html">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="16.47" height="13.088" viewBox="0 0 15.47 11.088">
                                                    <g  transform="translate(0 -72.508)">
                                                      <path  data-name="Path 114" d="M15.359,80.9l-2.011-2.011a.525.525,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49l1.106,1.106H10.576L8.3,78.052l2.273-2.274h1.618l-1.106,1.106a.287.287,0,0,0,.2.49h1.683a.531.531,0,0,0,.374-.155l2.011-2.011a.38.38,0,0,0,0-.535l-.859-.859a.227.227,0,1,0-.32.321l.806.806L13.027,76.9a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542h-2.04a.227.227,0,0,0-.16.066l-2.34,2.34-.544-.544,2.519-2.519a.382.382,0,0,1,.272-.112h2.293a.317.317,0,0,0,.225-.542l-1.054-1.054h1.282a.076.076,0,0,1,.053.022l.4.4a.227.227,0,1,0,.32-.321l-.4-.4a.531.531,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49L12.194,74.1H10.229a.832.832,0,0,0-.592.245L7.118,76.867,4.6,74.349a.832.832,0,0,0-.592-.245H.378A.378.378,0,0,0,0,74.481v.92a.378.378,0,0,0,.378.378H3.66l2.273,2.274L3.66,80.326H.378A.378.378,0,0,0,0,80.7v.92A.378.378,0,0,0,.378,82H4.007a.835.835,0,0,0,.592-.245l2.519-2.519.8.8a.227.227,0,1,0,.32-.32L3.914,75.392a.227.227,0,0,0-.16-.066H.453v-.769H4.007a.382.382,0,0,1,.272.113l6.043,6.043a.227.227,0,0,0,.16.066h2.04a.317.317,0,0,0,.224-.542l-1.054-1.054h1.282a.075.075,0,0,1,.053.022l1.958,1.958-1.958,1.958a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542H10.229a.383.383,0,0,1-.272-.113l-.968-.968a.227.227,0,0,0-.32.32l.968.968a.833.833,0,0,0,.592.245h1.965l-1.105,1.105a.287.287,0,0,0,.2.49h1.683a.525.525,0,0,0,.374-.155l2.011-2.011A.379.379,0,0,0,15.359,80.9Zm-11.08.539a.389.389,0,0,1-.272.113H.453v-.769h3.3a.226.226,0,0,0,.16-.066l2.34-2.34.543.544Z" transform="translate(0 0)" fill="currentColor"/>
                                                    </g>
                                                </svg>
                                                <span class="visually-hidden">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__items--content text-center">
                                    <div class="product__items--color">
                                        <ul class="product__items--color__wrapper d-flex justify-content-center">
                                            <li class="product__items--color__list"><a class="product__items--color__link one" href="javascript:void(0)"><span class="visually-hidden">Color 1</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link two" href="javascript:void(0)"><span class="visually-hidden">Color 2</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link three" href="javascript:void(0)"><span class="visually-hidden">Color 3</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link four" href="javascript:void(0)"><span class="visually-hidden">Color 4</span></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="product__items--content__title h4"><a href="product-details.html">Folding Tables Chairs</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$175.00</span>
                                        <span class="old__price">$190.00</span>
                                    </div>
                                    <a class="product__items--action__cart--btn primary__btn" href="cart.html">
                                        <svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
                                            <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                        </svg>
                                        <span class="add__to--cart__text"> Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img" src="assets/img/product/product11.webp" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="assets/img/product/product12.webp" alt="product-img">
                                    </a>
                                    <ul class="product__items--action d-flex justify-content-center">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                    <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="compare.html">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="16.47" height="13.088" viewBox="0 0 15.47 11.088">
                                                    <g  transform="translate(0 -72.508)">
                                                      <path  data-name="Path 114" d="M15.359,80.9l-2.011-2.011a.525.525,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49l1.106,1.106H10.576L8.3,78.052l2.273-2.274h1.618l-1.106,1.106a.287.287,0,0,0,.2.49h1.683a.531.531,0,0,0,.374-.155l2.011-2.011a.38.38,0,0,0,0-.535l-.859-.859a.227.227,0,1,0-.32.321l.806.806L13.027,76.9a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542h-2.04a.227.227,0,0,0-.16.066l-2.34,2.34-.544-.544,2.519-2.519a.382.382,0,0,1,.272-.112h2.293a.317.317,0,0,0,.225-.542l-1.054-1.054h1.282a.076.076,0,0,1,.053.022l.4.4a.227.227,0,1,0,.32-.321l-.4-.4a.531.531,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49L12.194,74.1H10.229a.832.832,0,0,0-.592.245L7.118,76.867,4.6,74.349a.832.832,0,0,0-.592-.245H.378A.378.378,0,0,0,0,74.481v.92a.378.378,0,0,0,.378.378H3.66l2.273,2.274L3.66,80.326H.378A.378.378,0,0,0,0,80.7v.92A.378.378,0,0,0,.378,82H4.007a.835.835,0,0,0,.592-.245l2.519-2.519.8.8a.227.227,0,1,0,.32-.32L3.914,75.392a.227.227,0,0,0-.16-.066H.453v-.769H4.007a.382.382,0,0,1,.272.113l6.043,6.043a.227.227,0,0,0,.16.066h2.04a.317.317,0,0,0,.224-.542l-1.054-1.054h1.282a.075.075,0,0,1,.053.022l1.958,1.958-1.958,1.958a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542H10.229a.383.383,0,0,1-.272-.113l-.968-.968a.227.227,0,0,0-.32.32l.968.968a.833.833,0,0,0,.592.245h1.965l-1.105,1.105a.287.287,0,0,0,.2.49h1.683a.525.525,0,0,0,.374-.155l2.011-2.011A.379.379,0,0,0,15.359,80.9Zm-11.08.539a.389.389,0,0,1-.272.113H.453v-.769h3.3a.226.226,0,0,0,.16-.066l2.34-2.34.543.544Z" transform="translate(0 0)" fill="currentColor"/>
                                                    </g>
                                                </svg>
                                                <span class="visually-hidden">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__items--content text-center">
                                    <div class="product__items--color">
                                        <ul class="product__items--color__wrapper d-flex justify-content-center">
                                            <li class="product__items--color__list"><a class="product__items--color__link one" href="javascript:void(0)"><span class="visually-hidden">Color 1</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link two" href="javascript:void(0)"><span class="visually-hidden">Color 2</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link three" href="javascript:void(0)"><span class="visually-hidden">Color 3</span></a></li>
                                            <li class="product__items--color__list"><a class="product__items--color__link four" href="javascript:void(0)"><span class="visually-hidden">Color 4</span></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="product__items--content__title h4"><a href="product-details.html">Modern Fabric Chair</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$165.00</span>
                                        <span class="old__price">$210.00</span>
                                    </div>
                                    <a class="product__items--action__cart--btn primary__btn" href="cart.html">
                                        <svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
                                            <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                        </svg>
                                        <span class="add__to--cart__text"> Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
         -->

    </main>

    @endsection


    @push('custom_js')
    
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        //$('.selectbox').fSelect();

        var couponId = "@if(Session::has('coupon_id')){{Session::get('coupon_id')}}@else{{'0'}}@endif";
        var countryId = 0;
        var couponDiscType = "@if(Session::has('discount_type')){{Session::get('discount_type')}}@else{{'0'}}@endif";
        var couponDiscAmt = "@if(Session::has('discount_amount')){{Session::get('discount_amount')}}@else{{'0'}}@endif";

        function getPriceDetail() {

            $.ajax({
                url: "{{ route('cart-price-details') }}",
                dataType: 'json',
                type: 'get',
                async: false,
                data: {
                    "coupondisc_type": couponDiscType,
                    "coupondisc_amount": couponDiscAmt,
                    "countryId":countryId
                },
                beforeSend: function () {

                    $('#price_details').html(loading_set);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {
                        showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                    } else {
                        showMsg('error', xhr.status + ': ' + xhr.statusText);
                    }

                },
                success: function (data) {

                    $('#price_details').html(data.html);
                    
                    $('.total_count').html(data.total_count);

                },
                cache: false,
                timeout: 5000
            });
        }

        function getSavedAddress() {

            $.ajax({
                url: "{{ route('get-cart-saved-address') }}",
                dataType: 'json',
                type: 'get',
                async: false,
                beforeSend: function () {

                    $('#addaddressget').html(loading_set);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {
                        showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                    } else {
                        showMsg('error', xhr.status + ': ' + xhr.statusText);
                    }

                },
                success: function (data) {

                    $('#addaddressget').html(data.html);

                },
                cache: false,
                timeout: 5000
            });

        }

        getPriceDetail();

        @if(Session::has('5ferns_user'))

        getSavedAddress();

        $("form#address").submit(function (e) {

            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            $.ajax({
                url: formAction,
                data: new FormData(this),
                dataType: 'json',
                type: 'post',
                async: false,
                beforeSend: function () {
                    $('.addressloader').css('display', 'inline-block');
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {

                        showMsg('error', xhr.responseJSON.message);

                    } else {

                        showMsg('error', xhr.statusText);

                    }

                    $('.addressloader').css('display', 'none');
                },
                success: function (data) {

                    $('.addressloader').css('display', 'none');

                    showMsg('success', data.message);

                    $('#' + formId)[0].reset();

                    $('#add-address-modal').modal('toggle');

                    getSavedAddress();

                    countryId=0;

                    getPriceDetail();
                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });

        });

        @endif

        $("form#checkout").submit(function (e) {

            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            var formData = new FormData(this);
            formData.append("coupon_id", couponId)

            $.ajax({
                url: formAction,
                data: formData,
                dataType: 'json',
                type: 'post',
                async: false,
                beforeSend: function () {
                    $('.checkoutloader').css('display', 'inline-block');
                    $('#' + formId + 'Submit').prop('disabled', true);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {

                        showMsg('error', xhr.responseJSON.message);

                    } else {

                        showMsg('error', xhr.statusText);

                    }

                    $('.checkoutloader').css('display', 'none');
                    $('#' + formId + 'Submit').prop('disabled', false);
                },
                success: function (data) {

                    $('.checkoutloader').css('display', 'none');
                    $('#' + formId + 'Submit').prop('disabled', false);

                    if (data.checkout_type == 'cod') {

                        location.href = "{{ url('order-placed') }}/" + data.checkout_order_id;

                    } else{
                        
                        if(data.type=='paypal'){

                            location.href=data.link;

                        }else{

                            location.href = "{{ url('order-initiate') }}/" + data.checkout_order_id;

                        }
                    }

                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });

        });

        $('.checkcouponcode').click(function () {

            var couponCode = $('#coupon_code').val();
            var amountForCoupon = $('#amountForCoupon').val();

            $.ajax({
                url: "{{ route('check-coupon-code') }}",
                data: {
                    "coupon_code": couponCode,
                    "amountForCoupon":amountForCoupon
                },
                dataType: 'json',
                type: 'get',
                async: false,
                beforeSend: function () {
                    $('.couponLoader').css('display', 'block');
                    $('#chkCouponButton').prop('disabled', true);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {

                        showMsg('error', xhr.responseJSON.message);

                    } else {

                        showMsg('error', xhr.statusText);

                    }

                    $('.couponLoader').css('display', 'none');
                    $('#chkCouponButton').prop('disabled', false);
                },
                success: function (data) {

                    $('.couponLoader').css('display', 'none');
                    $('#chkCouponButton').prop('disabled', false);

                    couponId = data.coupon_id;
                    couponDiscType = data.discount_type;
                    couponDiscAmt = data.discount_amount;

                    $('#coupon_code').prop('readonly', true);
                    $('.cancelcouponcode').css('display', 'block');
                    $('.checkcouponcode').css('display', 'none');

                    getPriceDetail();

                },
                cache: false,
                timeout: 5000
            });

        });

        $('.cancelcouponcode').click(function () {

            couponId = 0;
            couponDiscType = 0;
            couponDiscAmt = 0;

            $('.cancelcouponcode').css('display', 'none');
            $('.checkcouponcode').css('display', 'block');
            $('#coupon_code').prop('readonly', false).val('').focus();

            getPriceDetail();
        });

        function getcountryidguest(){

            countryId=$('.country').val();

            getPriceDetail();
        }

		$("#checkoutGuest").click(function(){
            $(".checkoutGuestForm").show();
        })

        
        function change_quantity(qty,cartId,productId){
          
            $.ajax({
                url: baseUrl + '/update-cart',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'id': cartId,
                    'product_id': productId,
                    'qty': qty
                },
                dataType: 'json',
                type: 'post',
                error: function(xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {
                        showMsg('error', xhr.responseJSON.message);
                    } else {
                        showMsg('error', xhr.statusText);
                    }
                },
                success: function(data) {

                    showMsg('success', data.message);

                    getCartPageDetailRender();
                },
                cache: false,
                timeout: 5000
            });

        }

        getCartPageDetailRender();

        function getCartPageDetailRender() {

            $.ajax({
                url: "{{ url('cart') }}",
                dataType: 'json',
                type: 'get',
                async: false,
                
                beforeSend: function () {

                    $('#cartPageData').html(loading_set);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {
                        showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                    } else {
                        showMsg('error', xhr.status + ': ' + xhr.statusText);
                    }

                },
                success: function (data) {

                    $('#cartPageData').html(data.html);
                    getPriceDetail();
                    getTotalCartProduct();
                    $('.total_count').html(data.total_count);

                },
                cache: false,
                timeout: 5000
            });
        }


        

        $('.selectShipping').on('change', function() {

            var shippingid = $(this).val();
            $.ajax({
                url: "{{ route('check-shipping-charge') }}",
                data: {
                    "shipping_id": shippingid,
                },
                dataType: 'json',
                type: 'get',
                async: false,
                beforeSend: function () {
          
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {

                        showMsg('error', xhr.responseJSON.message);

                    } else {

                        showMsg('error', xhr.statusText);

                    }

                },
                success: function (data) {

                    getPriceDetail();
                    $("#shipping").val(shippingid);
                    $("#ShippingMessage").html(data.message);
                },
                cache: false,
                timeout: 5000
            });

        });

        
    </script>
    @endpush