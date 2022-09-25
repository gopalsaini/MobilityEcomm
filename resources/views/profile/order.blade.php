@extends('layouts.app')

@push('custom_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
     
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
@endpush

@section('content')
  
  
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                    <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Order List</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Order List</span></li>
                        </ul>
                    </div>
                    </div>
            </div>
        </div>
    </section>

    <section class="my__account--section section--padding">

        <div class="dasboard-main-wrap">
            <div class="container-fluid pd-50">
                <div class="row">

                    @include('profile.sidebar')

                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="history-table table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Payment Type</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($resultData['result']))  

                                    @foreach($resultData['result'] as $data)
                                        <tr>
                                            <td><a href="javascript:;">{{$data['order_id']}}</a></td>
                                            <td> {{date('d M Y',strtotime($data['created_at']))}} </td>
                                            <td>{{$data['paymentType']}}</td>
                                            <td><strong>{{ \App\Helpers\commonHelper::getPriceByCountry( $data['amount']) }}</strong></td>
                                            <td><a href="javascript:;" class="va_btn" data-open="modal{{$data['id']}}" >View</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

    

   @if(!empty($resultData['result']))
    @foreach($resultData['result'] as $key => $sales)
        <div class="modal" id="modal{{$sales['id']}}" data-animation="slideInUp">
            <div class="modal-dialog quickview__main--wrapper">
                <header class="modal-header quickview__header">
                    <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
                </header>
                <div class="quickview__inner">
                    <div class="row row-cols-lg-2 row-cols-md-2">
                        <h2 class="product__details--info__title mb-15">VIEW SALE DETAIL</h2>
                        
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover cw-cart-table">
                                    <thead class="cw-cart-table">
                                        <tr class="cw-cart-table">
                                            <th class="product-price  cw-align has-title">S.N.</th>
                                            <th class="product-price  cw-align has-title">Image</th>
                                            <th class="product-price  cw-align has-title">Product</th>
                                            <th class="product-price  cw-align has-title">Quantity</th>
                                            <th class="product-price  cw-align has-title">Order Status</th>
                                            <th class="product-price  cw-align has-title">Payment Status</th>
                                            <th class="product-price  cw-align has-title">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="cw-cart-table">
                                        @php 
                                            $count="1"; 
                                            $total ="0";
                                            $saledetails = \App\Models\Sales_detail::where('sale_id',$sales['id'])->get();
                                        @endphp
                                        @foreach($saledetails as $key => $saledetail)
                                        @if($sales['order_id'] == $saledetail['order_id'])
                                        <tr class="product-price  cw-align has-title">
                                            <td>{{$count}}</td>
                                            <td>
                                                @php $vedios = explode(',',$saledetail->product_image); @endphp
                                                <img style="height:50px" src="{{ $vedios[0]}}" class="img-fluid" alt="{{$saledetail['product_name']}}">
                                                        
                                            </td>
                                            <td>{{$saledetail['product_name']}}</td>
                                            <td>{{$saledetail['qty']}}</td>
                                            <td>
                                                
                                                {{\App\Helpers\commonHelper::getOrderStatusName($saledetail['order_status'])}}
                                                
                                                
                                            </td>
                                            <td>{{\App\Helpers\commonHelper::getPaymentStatusName($saledetail['payment_status'])}}</td>
                                            <td>{{\App\Helpers\commonHelper::getPriceByCountry($saledetail['sub_total'])}}</td>
                                        </tr>
                                        
                                        
                                        @php 
                                        $count++; 
                                        $total += $saledetail['sub_total'];
                                        @endphp
                                        @endif
                                        @endforeach
                                        </tbody>
                                        <tfoot class="product-price  cw-align has-title">
                                            <tr class="product-price  cw-align has-title">
                                                <th colspan="5"></th>
                                                <th class="product-price  cw-align has-title">Sub Total</th>
                                                <th class="product-price  cw-align has-title">{{\App\Helpers\commonHelper::getPriceByCountry( $total)}}</th>
                                            </tr>
                                            <tr class="product-price  cw-align has-title">
                                                <th colspan="5"></th>
                                                <th class="product-price  cw-align has-title">Shipping Charge</th>
                                                <th class="product-price  cw-align has-title">{{\App\Helpers\commonHelper::getPriceByCountry( $sales['shipping'])}}</th>
                                            </tr>
                                            <tr class="product-price  cw-align has-title">
                                                <th colspan="5"></th>
                                                <th class="product-price  cw-align has-title">Discount Amount</th>
                                                <th class="product-price  cw-align has-title">{{\App\Helpers\commonHelper::getPriceByCountry( $sales['discount'])}}</th>
                                            </tr>
                                            <tr class="product-price  cw-align has-title">
                                                <th colspan="5"></th>
                                                <th class="product-price  cw-align has-title">Coupon Discount Amount</th>
                                                <th class="product-price  cw-align has-title">{{\App\Helpers\commonHelper::getPriceByCountry( $sales['couponcode_amount'])}}</th>
                                            </tr>
                                            <tr class="product-price  cw-align has-title">
                                                <th colspan="5"></th>
                                                <th class="product-price  cw-align has-title">Final Amount</th>
                                                <th>
                                                
                                                {{ \App\Helpers\commonHelper::getPriceByCountry( $sales['amount']) }}</th>
                                            </tr>
                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
	@endforeach
@endif



@endsection


@push('custom_js')

<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script>

    $(".btnClose").click(function () {
        $("#exampleModal"+$(this).data('id')).modal('toggle');
    });

    $("form#checkout").submit(function (e) {

        e.preventDefault();

        var formId = $(this).attr('id');
        var formAction = $(this).attr('action');

        $.ajax({
            url: formAction,
            data: new FormData(this),
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                $('.checkoutloader').css('display', 'inline-block');
                $('#'+formId+'Submit').prop('disabled',true);
            },
            error: function (xhr, textStatus) {

                if(xhr && xhr.responseJSON.message){

                    showMsg('error',xhr.responseJSON.message);

                }else{

                    showMsg('error',xhr.statusText);
                
                }
                showMsg('success',data.message);
                $('.checkoutloader').css('display', 'none');
                $('#'+formId+'Submit').prop('disabled',false);
            },
            success: function (data) {
                showMsg('success',data.message);
                $('.checkoutloader').css('display', 'none');
                $('#'+formId+'Submit').prop('disabled',false);


            },
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000
        });

    });




    $("form#password").submit(function (e) {

        e.preventDefault();

        var formId = $(this).attr('id');
        var formAction = $(this).attr('action');

        $.ajax({
            url: formAction,
            data: new FormData(this),
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                $('.passwordloader').css('display', 'inline-block');
                $('#'+formId+'Submit').prop('disabled',true);
            },
            error: function (xhr, textStatus) {

                if(xhr && xhr.responseJSON.message){

                    showMsg('error',xhr.responseJSON.message);

                }else{

                    showMsg('error',xhr.statusText);
                
                }
                showMsg('success',data.message);
                $('.passwordloader').css('display', 'none');
                $('#'+formId+'Submit').prop('disabled',false);
            },
            success: function (data) {
                showMsg('success',data.message);
                $('.passwordloader').css('display', 'none');
                $('#'+formId+'Submit').prop('disabled',false);


            },
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000
        });

    });
</script>

@endpush