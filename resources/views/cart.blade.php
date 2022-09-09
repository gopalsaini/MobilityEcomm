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

<div class="va-page-strip-tag">
    <ul>
        <li> <a href="{{url('/')}}">Home</a> </li>
        <li>/ &nbsp; My Cart </li>
    </ul>
</div>

  
<div class="va-my-cart-inner-box">
    <div class="my-cart-product-details">
        <div class="product-filter-wrapper">
            <div class="filter-text">
                <p>Shoping Cart</p>
            </div>
            <div class="filter-text">
                <p><span class="total_count">0</span> items</p>
            </div>
        </div>
        <span id="cartPageData">
                        <!--Ajax content here-->
        </span>
        
        <div class="continue-btn-wrapper">
            <a href="{{ url('/') }}"> <span><svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.5625 8.14383H4.51375L9.73188 2.22721C9.97587 1.95009 10.0933 1.59281 10.0582 1.23398C10.0232 0.875146 9.83856 0.544153 9.545 0.313814C9.25144 0.0834754 8.87297 -0.0273416 8.49286 0.00574224C8.11275 0.038826 7.76212 0.213101 7.51812 0.490227L0.330625 8.63235C0.282269 8.69712 0.239026 8.76515 0.20125 8.83591C0.20125 8.90376 0.20125 8.94447 0.100625 9.01232C0.0354684 9.16792 0.00135286 9.33354 0 9.50085C0.00135286 9.66815 0.0354684 9.83378 0.100625 9.98938C0.100625 10.0572 0.100625 10.0979 0.20125 10.1658C0.239026 10.2365 0.282269 10.3046 0.330625 10.3693L7.51812 18.5115C7.65328 18.6647 7.82253 18.7878 8.01384 18.8723C8.20515 18.9567 8.41382 19.0003 8.625 19C8.96087 19.0006 9.28638 18.8902 9.545 18.6879C9.69056 18.574 9.81088 18.4341 9.89907 18.2762C9.98727 18.1183 10.0416 17.9455 10.059 17.7678C10.0763 17.59 10.0564 17.4108 10.0002 17.2404C9.94411 17.0699 9.85292 16.9116 9.73188 16.7745L4.51375 10.8579H21.5625C21.9437 10.8579 22.3094 10.7149 22.579 10.4604C22.8486 10.2059 23 9.86075 23 9.50085C23 9.14094 22.8486 8.79578 22.579 8.54129C22.3094 8.2868 21.9437 8.14383 21.5625 8.14383Z" fill=""/>
            </svg>
            </span> Continue Shopping</a>
        </div>
    </div>
    <div class="my-cart-sidebar">
         <div class="filter-text">
            <p>Order Summary</p>
         </div>
        <div class="cart-form">
            <div class="form-group row">
                <div class="col-12">
                    <label> Shipping </label>
                    <select name="shippingdata" class="selectShipping">
                        <option value=""> -- Select -- </option>
                    @if(!empty($shipping))
                        @foreach($shipping as $shivalue)
                            <option value="{{$shivalue->id}}">{{ucwords($shivalue->label)}} - {{$shivalue->sign}}{{$shivalue->value}}</option>
                        @endforeach
                    @endif
                    </select>
                    <span id="ShippingMessage" style="font-size: 13px;font-weight: 400;">
                        <!--Ajax content here-->
                    </span>
                </div>
            </div>
        </div>
        <span id="price_details">
                        <!--Ajax content here-->
        </span>
         <div class="cart-form">
           
               
            <div class="form-group row">
                <div class="col-12">
                    <label> Coupon Code </label>
                    <div class='d-flex input-box'>
                    <input style='width:62%;margin-right:2%;' type="box" class="form-control" id="coupon_code" />
                    <button type="button" class="checkcouponcode"
                        id="chkCouponButton">Apply
                        <pre class="spinner-border spinner-border-sm couponLoader" style="display:none"></pre>
                    </button>
                    <button type="button" class="cancelcouponcode" style="display:none;">Remove </button>
                </div>
                </div>
            </div>
            
         </div>
        
         @if(Session::has('5ferns_user') && $resultData['data']['designation_id'] == '3')
            <form action="{{ url('checkout') }}" method="Post" class="m-0" id="checkout" autocomplete="off">

                <input type="hidden" name="address_id" value="{{\App\Helpers\commonHelper::getUserAddressId($resultData['data']['id'])}}" >
                @csrf
                <input type="hidden" id="featured-2" name="payment_type" checked  value="1">
                <input type="hidden" name="shipping" id="shipping" value="">
                <input type="hidden" id="featured-2" name="coupon_id" checked  value="@if(Session::has('coupon_id')){{Session::get('coupon_id')}}@else{{'0'}}@endif">
                <div class="payment_card ">
                    <button type="submit" class="va_btn" id="checkoutSubmit" style="border:none;width: 100%;height: 57px;">Place Order

                        <pre class="spinner-border spinner-border-sm checkoutloader"
                            style="color:white;font-size: 100%;position:relative;top:6%;display:none"></pre>
                    </button>
                </div>
            </form>
         @else
            <a class="va_btn" href="{{url('checkout')}}">Checkout</a>
         @endif
         <div class="secure-payment-wrapper">
            <div class="payment-icon">
               <span><svg width="36" height="38" viewBox="0 0 36 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5128 0.141834C0.352148 1.81886 0.862141 1.3339 0.87876 10.2473C0.893301 17.7918 1.31968 20.2799 3.33369 24.5664C5.15813 28.4497 11.5881 34.9932 15.278 36.7224L18.0046 38L20.7311 36.7224C24.421 34.9932 30.851 28.4497 32.6754 24.5664C34.6848 20.2899 35.1158 17.7918 35.1304 10.3481C35.1392 5.63465 34.9424 3.44259 34.449 2.75711C34.0371 2.18403 32.4033 1.49802 30.4241 1.06636C27.053 0.33075 14.378 -0.288768 11.5128 0.141834ZM28.8271 10.5824C28.9575 11.2763 27.2332 13.3992 23.1195 17.6092C19.8778 20.9274 16.7883 23.8872 16.2533 24.1875C15.4333 24.6476 14.7633 24.2112 11.9688 21.397C8.46789 17.8715 8.17031 17.2509 9.46139 16.1622C10.1454 15.5849 10.6522 15.8704 12.8454 18.0651L15.4245 20.6461L20.9991 14.9712C26.6173 9.2515 28.3909 8.25731 28.8271 10.5824Z" fill="#A56852"/>
                  </svg>
                  </span>
            </div>
            <div class="payment-text">
               <p>Safe & Secure Payments. Easy returns.
                  100% Authentic Products.</p>
            </div>
         </div>
      </div>
   </div>
  
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