@extends('layouts.app')

@section('title','Order Placed')
@section('meta_keywords','Order Placed')
@section('meta_description','Order Placed')

@section('content')

<div class="va-page-strip-tag">
    <ul>
        <li> <a href="index.html">Home</a> </li>
        <li>/ &nbsp;  <a href="{{url('checkout')}}">Checkout</a> </li>
        <li>/ &nbsp; Order Placement </li>
    </ul>
</div> 



<div class="va-terns-condition-wrapper">
    <div class="container">
        <div class="order-pacement-wrapper">
            
            <p>Thank You for purchasing</p>
            <div class="notice-box">
                <p>Thank You  for Shopping with us. Your Account haas been charged and your transaction is successful. We will be processing your order soon.</p>
            </div>
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
            <p>Pay with cash upon delivery</p>
            <div class="order-billing-wrapper">
                <h4>Order Details</h4>
                <table class="table">
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
                           <!-- <tr>
                              <td>GST 3%</td>
                              <td> <strong>₹ 45.00</strong> </td>
                           </tr> -->
                           <!-- <tr>
                              <td>Payment Method</td>
                              <td> <strong>Cash on delivery</strong> </td>
                           </tr> -->
                           <tr>
                              <th>TOTAL</tdh>
                              <td> <strong>{{\App\Helpers\commonHelper::getpriceIconByCountry($result['net_amount'],$result['currency_id'])}}</strong> </td>
                           </tr>
                         </tbody>
                     </table>
                     <div class="billing-address-wrapper">
                        <div class="billing-add">
                           <h4>BILLING ADDRESS</h4>
                           <p>{{$result['address_line1']}}, {{$result['address_line2']}}, {{\App\Helpers\commonHelper::getCityNameById($result['city_id'])}}</p>
                           <p> {{\App\Helpers\commonHelper::getStateNameById($result['state_id'])}}</p>
                           <p> {{$result['mobile']}}</p>
                           <p>{{$result['email']}}</p>
                        </div>
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
            
    </div>

@endsection