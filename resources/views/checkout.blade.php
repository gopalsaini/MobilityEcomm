@extends('layouts.app')

@section('title',' Checkout')
@section('meta_keywords',' Checkout')
@section('meta_description',' Checkout')

@push('custom_css')
    <style>
        .labelbold{
            font-weight: bold;
        }
        .item-rate {
            width: 100%;
            display: flex;
            align-items: center;
            padding-top: 18px;
            justify-content: space-between;
        }
        .fs-wrap .fs-label-wrap{
            width: 100%;
            height: 46px;
            padding: 0px 6px;
            background: #FCF2E7;
            border: none;
        }
        .fs-wrap {
            display: inline-block;
            cursor: pointer;
            line-height: 1;
            width: 100% !important;
        }
        .fs-label-wrap .fs-label {
            padding: 14px 22px 14px 11px !important;
            text-overflow: ellipsis;
            white-space: nowrap;
            /* width: 120%; */
            overflow: hidden;
        }
        .fs-wrap {
			display: inline-block;
			cursor: pointer;
			line-height: 1;
			width: 100%;
		}
		.fs-dropdown {
			position: absolute;
			background-color: #FCF2E7;
			border: 1px solid #ddd;
			width: 100%;
			margin-top: 5px;
			z-index: 1000;
		}
        .va-my-cart-inner-box .my-cart-sidebar .cart-form .form-group select {
            width: 100%;
            height: 46px;
            padding: 0px 6px;
            background: #FCF2E7;
            border: none;
        }
        .va-checkout-maimn-wrapper .va-checkout-sidebar .review-order-wrapper h2 {
             padding: 0px !important;
        }
    </style>
@endpush
@section('content')

    <div class="va-page-strip-tag">
        <ul>
            <li> <a href="{{url('/')}}">Home</a> </li>
            <li>/ &nbsp; Checkout </li>
        </ul>
    </div>


    <div class="va-checkout-maimn-wrapper">
        <div class="va-checkout-billing-wrapper">
            <form action="{{ url('add-address') }}" method="Post" class="m-0" id="address" autocomplete="off">
                @csrf
                <input type="hidden" name="id" value="0" >
                <h2>Shipping Information</h2>
                <div class="checkout-form">
                
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label>First Name</label>
                            <input type="text" name="first_name" onkeypress="return /[A-Za-z ]/i.test(event.key)" required class=" address_true form-control" placeholder="Enter Here">
                        </div>
                        <div class="col-md-6 col-12">
                            <label>Last Name</label>
                            <input type="text" name="last_name" onkeypress="return /[A-Za-z ]/i.test(event.key)" required class="address_true form-control" placeholder="Enter Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label>Company Name (Optional)</label>
                            <input type="text" class="address_true form-control" placeholder="Enter Here">
                        </div>
                        <div class="col-md-6 col-12">
                            <label>Country / Region<span>*</span> </label>
                            <select class="selectbox country address_true" required name="country_id" data-state_id="0" data-city_id="0" onchange="getcountryidguest()" >
                                <option value="">--Select Country--</option>
                                @foreach($country as $con)
                                <option value="{{ $con['id'] }}">{{ ucfirst($con['name']) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="col-md-6 col-12">
                            <label>State<span>*</span></label>
                            <select class="selectbox state statehtml address_true" required name="state_id">
                                <option value="">--Select State--</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-12">
                            <label>Town / City<span>*</span></label>
                            <select class="selectbox cityHtml address_true" required name="city_id">
                                <option value="">--Select city</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label>Street Address<span>*</span></label>
                            <input type="text" name="address1" required class="form-control address_true" placeholder="House Number and Street Name">
                        </div>
                        <div class="col-md-6 col-12">
                            <label>Street Address (Optional)<span>*</span></label>
                            <input type="text" name="address2" class="form-control address_true" placeholder="Apartment, Suite, unit,etc">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label>PIN Code<span>*</span></label>
                            <input type="text" minlength="5" maxlength="6"  name="pin_code" onkeypress="return /[0-9 ]/i.test(event.key)" required class="form-control address_true" placeholder="455001">
                        </div>
                        <div class="col-md-6 col-12">
                            <label>Phone<span>*</span></label>
                            <input type="tel" name="mobile" onkeypress="return /[0-9 ]/i.test(event.key)" required class="form-control address_true" placeholder="+91 561 6515 616">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 col-12">
                            <label>Email Address</label>
                            <input type="email" name="email" required class="form-control address_true" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 col-12">
                            <label>Order Notes (Optional)<span>*</span></label>
                            <textarea class="form-control address_true" name="message" cols="30" rows="6" placeholder="Notes about your order, e.g.special notes for delivery"></textarea>
                        </div>
                    </div>
                        

                    <p>Billing address same as shipping address  &nbsp;&nbsp;<input type="checkbox" checked name="billing_address_checkbox" id="sameShppingAddress" value="1"></p>
                    <div style="display:none" id="billing_address"> 
                        <div class="form-group row">
                        
                            <div class="col-md-6 col-12">
                                <label>First Name</label>
                                <input type="text" name="billing_first_name" onkeypress="return /[A-Za-z ]/i.test(event.key)"  class="form-control billing" placeholder="Enter Here">
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" name="billing_last_name" onkeypress="return /[A-Za-z ]/i.test(event.key)"  class="form-control billing" placeholder="Enter Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label>Company Name (Optional)</label>
                                <input type="text" class="form-control" placeholder="Enter Here">
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Country / Region<span>*</span> </label>
                                <select class="selectbox billingcountry billing" name="billing_country_id" data-state_id="0" data-city_id="0" onchange="getcountryidguest()" >
                                    <option value="">--Select Country--</option>
                                    @foreach($country as $con)
                                    <option value="{{ $con['id'] }}">{{ ucfirst($con['name']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-md-6 col-12">
                                <label>State<span>*</span></label>
                                <select class="selectbox state billingstatehtml billing" name="billing_state_id">
                                    <option value="">--Select State--</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Town / City<span>*</span></label>
                                <select class="selectbox billingcityHtml billing" name="billing_city_id">
                                    <option value="">--Select city</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label>Street Address<span>*</span></label>
                                <input type="text" name="billing_address1"  class="form-control billing" placeholder="House Number and Street Name">
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Street Address (Optional)<span>*</span></label>
                                <input type="text" name="billing_address2" class="form-control" placeholder="Apartment, Suite, unit,etc">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label>PIN Code<span>*</span></label>
                                <input type="text" minlength="5" maxlength="6"  name="billing_pin_code" onkeypress="return /[0-9 ]/i.test(event.key)"  class="form-control billing" placeholder="455001">
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Phone<span>*</span></label>
                                <input type="tel" name="billing_mobile" onkeypress="return /[0-9 ]/i.test(event.key)"  class="form-control billing" placeholder="+91 561 6515 616">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-12">
                                <label>Email Address</label>
                                <input type="email" name="billing_email" class="form-control billing" placeholder="Enter Email">
                            </div>
                        </div>
                    </div>
                    <div class="payment_card ">
                        <button type="submit" class="va_btn" style="border:none;width: 19%;height: 57px;" id="addressSubmit">Submit

                            <pre class="spinner-border spinner-border-sm addressloader"
                                style="color:white;font-size: 100%;position:relative;top:6%;display:none"></pre>
                        </button>
                    </div>
                </div>
                
                </form>
            </div>
           
            <div class="va-checkout-sidebar">
            <form action="{{ url('checkout') }}" method="Post" class="m-0" id="checkout" autocomplete="off">
                @csrf
                <div class="review-order-wrapper p-0">
                
                    
                    <ul class="review-strip ">
                        <div class="cart-form">
                        
                        @if(Session::has('5ferns_user'))
                            @if(!empty($resultData))
                                <div class="cart-form">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <h2 style="font-size: 21px;"> Select Shipping Address </h2><br>
                        
                                            @foreach($resultData['result'] as $userAddress)
                                                <label>
                                                    <input type="radio" name="address_id" value="{{$userAddress['id']}}" >
                                                    <p class="add-title">{{\App\Helpers\commonHelper::getCityNameById($userAddress['city_id'])}}</p>
                                                    <p class="add-body">{{$userAddress['address_line1']}}, {{$userAddress['address_line2']}}, {{$userAddress['name']}}</p>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                            <div class="form-group row">
                                <div class="col-12">
                                    <h2 style="font-size: 21px;"> Shipping </h2><br>
                                    <select name="shipping" class="selectShipping form-control form-group">
                                        <option value=""> -- Select -- </option>
                                        
                                    </select>
                                    <span id="ShippingMessage" style="font-size: 13px;font-weight: 400;">
                                        <!--Ajax content here-->
                                    </span>
                                    </div>
                                </div>
                            </div><br>
                        <span id="price_details">
                                
                        </span>
                    </ul>
                </div>
                <input type="hidden" id="featured-2" name="coupon_id" checked  value="@if(Session::has('coupon_id')){{Session::get('coupon_id')}}@else{{'0'}}@endif">

                <input type="hidden" id="featured-2" name="payment_type" checked  value="1">
                <div class="payment_card ">
                    <button type="submit" class="va_btn" style="border:none;width: 100%;height: 57px;" id="checkoutSubmit">Place Order

                        <pre class="spinner-border spinner-border-sm checkoutloader"
                            style="color:white;font-size: 100%;position:relative;top:6%;display:none"></pre>
                    </button>
                </div>
            </form>  
        </div>
        
    </div>

    @endsection


    @push('custom_js')
    
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        $('input[type=radio][name=address_id]').on('change', function() {
            
            var address_id = this.value;
            $.ajax({
                url: "{{ url('get-shipping-option-using-address') }}",
                data: {
                    "address_id": address_id,
                },
                dataType: 'json',
                type: 'post',
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

                    $('.selectShipping').html(data.html);
                    
                },
                cache: false,
                timeout: 5000
            });
        });

        $("input#sameShppingAddress").click(function(){ 


            $(".billing").attr("required", false);

            if ($("input#sameShppingAddress").is(':checked')){ 

                $("#billing_address").css('display','none');
                $(".billing").attr("required", false);

            }else{

                $(".billing").attr("required", true);
                $("#billing_address").css('display','block');

            } 
        });


        //$('.selectbox').fSelect();
        $('.selectbox').fSelect({
            placeholder: '-- Select -- ',
            numDisplayed: 5,
            overflowText: '{n} selected',
            noResultsText: 'No results found',
            searchText: 'Search',
            showSearch: true
        });

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

        getPriceDetail();

        @if(Session::has('5ferns_user'))

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

                        window.location.reload();

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

                
        $(document).ready(getBillingState);

        var stateId = 0;
        var cityId = 0;
        var countryId = 0;

        function getBillingState() {

            $('.billingcountry').change(function() {

                stateId = parseInt($(this).data('state_id'));
                cityId = parseInt($(this).data('city_id'));
                countryId = $(this).val();

                $.ajax({
                    url: baseUrl + '/get-state?country_id=' + countryId,
                    dataType: 'json',
                    type: 'get',
                    error: function(xhr, textStatus) {

                        if (xhr && xhr.responseJSON.message) {
                            showMsg('error', xhr.responseJSON.message);
                        } else {
                            showMsg('error', xhr.statusText);
                        }
                    },
                    success: function(data) {
                        $('.billingstatehtml').fSelect('destroy')
                        $('.billingstatehtml').html(data.html);

                        $('.billingstatehtml option').each(function() {
                            if (this.value == stateId)
                                $('.billingstatehtml').val(stateId);
                        });

                        $('.billingstatehtml').fSelect('create');

                        if (countryId == 101) {

                            $('.billingpincode').attr('minlength', '6');
                            $('.billingpincode').attr('maxlength', '6');

                        } else {

                            $('.billingpincode').attr('minlength', '5');
                            $('.billingpincode').attr('maxlength', '5');

                        }
                    },
                    cache: false,
                    timeout: 5000
                });

            });

        }


        $(document).ready(getBillingCity);


        function getBillingCity() {

            $('.billingstatehtml').change(function() {

                $.ajax({
                    url: baseUrl + '/get-city?state_id=' + $(this).val(),
                    dataType: 'json',
                    type: 'get',
                    error: function(xhr, textStatus) {

                        if (xhr && xhr.responseJSON.message) {
                            showMsg('error', xhr.responseJSON.message);
                        } else {
                            showMsg('error', xhr.statusText);
                        }
                    },
                    success: function(data) {

                        $('.billingcityHtml').fSelect('destroy');
                        $('.billingcityHtml').html(data.html);

                        $('.billingcityHtml option').each(function() {
                            if (this.value == cityId)
                                $('.billingcityHtml').val(cityId);
                        });


                        $('.billingcityHtml').fSelect('create');
                    },
                    cache: false,
                    timeout: 5000
                });
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