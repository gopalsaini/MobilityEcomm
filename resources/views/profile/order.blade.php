@extends('layouts.app')

@push('custom_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')
    <div class="va-page-strip-tag">
        <ul>
            <li> <a href="{{url('/')}}">Home</a> </li>
            <li>/ &nbsp; Order List </li>
        </ul>
    </div>

    <div class="dasboard-main-wrap">
         <div class="container-fluid pd-50">
            <div class="row">

                @include('profile.sidebar')

                <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                  <div class="history-table">
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
                                    <td>
                                       <span>
                                          <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M2.09307 9.03708H16.5197M6.60141 13.8454H12.0114M5.69974 1.34375L5.69974 5.19042M12.9131 1.34375L12.9131 5.19042M6.0003 18.6537H12.6125C14.8794 18.6537 16.0129 18.6537 16.7172 17.9026C17.4214 17.1515 17.4214 15.9426 17.4214 13.5249V9.35764C17.4214 6.93986 17.4214 5.73097 16.7172 4.97986C16.0129 4.22875 14.8794 4.22875 12.6125 4.22875H6.0003C3.73336 4.22875 2.5999 4.22875 1.89565 4.97986C1.19141 5.73097 1.19141 6.93986 1.19141 9.35764V13.5249C1.19141 15.9426 1.19141 17.1515 1.89565 17.9026C2.5999 18.6537 3.73336 18.6537 6.0003 18.6537Z" stroke="#A56852" stroke-width="1.4" stroke-linecap="round"/>
                                          </svg>                                       
                                       </span>
                                       {{$data['created_at']}}
                                    </td>
                                    <td>{{$data['paymentType']}}</td>
                                    <td><strong>{{ \App\Helpers\commonHelper::getPriceByCountry( $data['amount']) }}</strong></td>
                                    <td><a href="javascript:;" class="va_btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$data['id']}}">View</a></td>
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


   @if(!empty($resultData['result']))
    @foreach($resultData['result'] as $key => $sales)
		<div class="modal fade" id="exampleModal{{$sales['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5> VIEW SALE DETAIL</h5>
					
				</div>
				<div class="modal-body">
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
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btnClose" data-id="{{$sales['id']}}" data-dismiss="modal" >Close</button>
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