@extends('layouts.app')

@section('title','Order Placed')
@section('meta_keywords','Order Placed')
@section('meta_description','Order Placed')

@section('content')



@extends('layouts.app')

@section('title','The womens Program')
@section('meta_keywords','The Womens Program')
@section('meta_description','The Womens Program')

@section('content')
   
   <style>
        li {
        
            line-height: 2 !important;
        }
    </style>

   <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">Order Placement</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Order Placement</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <section class="about__section section--padding ">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="about__content">
                            <span class="about__content--subtitle text__secondary mb-20"> Thank You for purchasing</span>
                            <p class="about__content--desc mb-20">Thank You  for Shopping with us. Your Account haas been charged and your transaction is successful. We will be processing your order soon.</p>
                            <div class="about__author position__relative">
                                <ul class="order-details">
                                    <li><p>Order No.: <span>{{$result['order_id']}}</span> </p></li>
                                    <li><p>Date: <span>{{date('M d Y',strtotime($result['created_at']))}}</span> </p></li>
                                    <li><p>Emal: <span>{{$result['email']}}</span> </p></li>
                                    <li><p>Total: <span>{{\App\Helpers\commonHelper::getpriceIconByCountry($result['net_amount'],$result['currency_id'])}}</span> </p></li>
                                    <li><p>Payment Method: <span>
                                        @if($result['payment_type'] == '1')
                                            Online
                                        @else
                                            Cash on delivery
                                        @endif
                                    </span> </p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="about__content">
                            <span class="about__content--subtitle text__secondary mb-20"> Order Details</span>
                            <div class="about__author position__relative">
                                <table class="table" style="width: 64%;text-align: left;">
                                    <thead>
                                        
                                        <tr>
                                            <th scope="col">PRODUCT</th>
                                            <th scope="col">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($result['getsalesdetailchild'] as $value)
                                            <tr>
                                                <td>{{$value['product_name']}}</td>
                                                <td> <strong>{{\App\Helpers\commonHelper::getpriceIconByCountry($value['amount'],$result['currency_id'])}}</strong> </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>Sub Total</td>
                                            <td> <strong>{{\App\Helpers\commonHelper::getpriceIconByCountry($result['subtotal'],$result['currency_id'])}}</strong> </td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td> <strong>{{\App\Helpers\commonHelper::getpriceIconByCountry($result['shipping'],$result['currency_id'])}}</strong> </td>
                                        </tr>
                                            
                                        <tr>
                                            <th>TOTAL</tdh>
                                            <td> <strong>{{\App\Helpers\commonHelper::getpriceIconByCountry($result['net_amount'],$result['currency_id'])}}</strong> </td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start about section -->
        <section class="about__section section--padding ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about__thumbnail d-flex">
                            
                            <div class="billing-add">
                            <h4>BILLING ADDRESS</h4>
                            <p>{{$result['address_line1']}}, {{$result['address_line2']}}, {{\App\Helpers\commonHelper::getCityNameById($result['city_id'])}}</p>
                            <p> {{\App\Helpers\commonHelper::getStateNameById($result['state_id'])}}</p>
                            <p> {{$result['mobile']}}</p>
                            <p>{{$result['email']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <div class="billing-add">
                            <h4>SHIPPING ADDRESS</h4>
                            <p>{{$result['billing_address_line1']}}, {{$result['billing_address_line2']}}, {{\App\Helpers\commonHelper::getCityNameById($result['city_id'])}}</p>
                            <p> {{\App\Helpers\commonHelper::getStateNameById($result['billing_state_id'])}}</p>
                            <p> {{$result['billing_mobile']}}</p>
                            <p>{{$result['billing_email']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about section -->

</main> 
      

@endsection

