@extends('layouts.app')

@push('custom_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')


<main class="main__content_wrapper">

      <!-- Start breadcrumb section -->
      <section class="breadcrumb__section breadcrumb__bg">
         <div class="container">
            <div class="row row-cols-1">
                     <div class="col">
                     <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Wishlist Product</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                                 <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                                 <li class="breadcrumb__content--menu__items"><span class="text-white">Wishlist Product</span></li>
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
                        <div class="wishlist-main-wrap">
                           <div class="row">
                           @php
                                 $resultData=json_decode($wishlist->content,true);
                              @endphp

                              @if($wishlist->status==200)
                              @foreach($resultData['result'] as $result)
                              <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                 <div class="product-box">
                                    <div class="product-img">
                                       <img src="{{ $result['first_image']}}" alt="img">
                                       <input type="hidden" id="number" class="qty" value="1" />
                                       <div class="social-icon">
                                          <a href="{{ url('product-detail/'.$result['slug']) }}" >
                                             <span>
                                                <svg width="27" height="22" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M11.9036 21.0002C13.9745 20.9997 15.9856 20.3065 17.6168 19.0308L22.7455 24.1595L24.3951 22.5098L19.2665 17.3812C20.5428 15.7498 21.2365 13.7382 21.237 11.6668C21.237 6.52066 17.0498 2.3335 11.9036 2.3335C6.75748 2.3335 2.57031 6.52066 2.57031 11.6668C2.57031 16.813 6.75748 21.0002 11.9036 21.0002ZM11.9036 4.66683C15.7641 4.66683 18.9036 7.80633 18.9036 11.6668C18.9036 15.5273 15.7641 18.6668 11.9036 18.6668C8.04315 18.6668 4.90365 15.5273 4.90365 11.6668C4.90365 7.80633 8.04315 4.66683 11.9036 4.66683Z" fill="#A56852"/>
                                                   <path d="M13.5498 10.0171C13.992 10.4604 14.2358 11.0461 14.2358 11.6668H16.5691C16.5702 11.0536 16.4497 10.4463 16.2146 9.88C15.9795 9.31369 15.6345 8.7996 15.1995 8.36743C13.4331 6.60343 10.3706 6.60343 8.60547 8.36743L10.2528 10.0194C11.1395 9.1351 12.6678 9.13743 13.5498 10.0171Z" fill="#A56852"/>
                                                </svg>
                                             </span>&nbsp;
                                             <pre class="spinner-border spinner-border-sm loader" style="color:#a56852;font-size: 100%;position:relative;margin:0;display:none"></pre>
                                          </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a href="#" class="addtocart" data-type="addtocart" data-product_id="{{ $result['variant_productid'] }}">
                                             <span>
                                                <svg width="27" height="22" viewBox="0 0 27 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M25.8531 5.03765C25.5921 4.70052 25.2565 4.42854 24.8726 4.24309C24.4886 4.05764 24.0669 3.96378 23.6406 3.9689H7.81563L6.44688 1.48452C6.22602 1.09614 5.90524 0.773955 5.51783 0.551402C5.13042 0.328848 4.69051 0.214041 4.24375 0.218898H1.04688C0.798235 0.218898 0.559778 0.31767 0.383962 0.493486C0.208147 0.669301 0.109375 0.907757 0.109375 1.1564C0.109375 1.40504 0.208147 1.64349 0.383962 1.81931C0.559778 1.99513 0.798235 2.0939 1.04688 2.0939H4.24375C4.3547 2.08915 4.46497 2.11347 4.56363 2.16444C4.66229 2.21542 4.74593 2.29128 4.80625 2.38452L6.35313 5.19702L7.15938 13.9345C7.26744 14.8392 7.7145 15.6692 8.41042 16.2573C9.10634 16.8454 9.99935 17.1477 10.9094 17.1033H20.6313C21.4352 17.1236 22.2235 16.8797 22.8755 16.4089C23.5275 15.9381 24.007 15.2665 24.2406 14.497L26.275 7.16577C26.3752 6.8027 26.3893 6.42123 26.3161 6.05176C26.2428 5.68229 26.0843 5.33503 25.8531 5.03765ZM24.4844 6.65015L22.45 13.9908C22.3233 14.3665 22.0767 14.6902 21.7481 14.912C21.4195 15.1339 21.0271 15.2417 20.6313 15.2189H10.8719C10.4336 15.251 9.99909 15.1191 9.65261 14.8489C9.30612 14.5786 9.07242 14.1893 8.99687 13.7564L8.29375 5.8439H23.6406C23.7776 5.84252 23.9132 5.87119 24.038 5.92788C24.1627 5.98457 24.2735 6.06791 24.3625 6.17202C24.4184 6.23685 24.4586 6.31377 24.4797 6.39674C24.5009 6.47971 24.5025 6.56646 24.4844 6.65015Z" fill="#A56852"/>
                                                   <path d="M11.3594 21.7814C12.3949 21.7814 13.2344 20.9419 13.2344 19.9064C13.2344 18.8709 12.3949 18.0314 11.3594 18.0314C10.3238 18.0314 9.48438 18.8709 9.48438 19.9064C9.48438 20.9419 10.3238 21.7814 11.3594 21.7814Z" fill="#A56852"/>
                                                   <path d="M20.7344 21.7814C21.7699 21.7814 22.6094 20.9419 22.6094 19.9064C22.6094 18.8709 21.7699 18.0314 20.7344 18.0314C19.6988 18.0314 18.8594 18.8709 18.8594 19.9064C18.8594 20.9419 19.6988 21.7814 20.7344 21.7814Z" fill="#A56852"/>
                                                </svg>
                                             </span>
                                          </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a href="{{ url('delete-wishlist-product/'.$result['wishlistid']) }}" onclick="return confirm('Are you sure? You want to Remove this product.')">
                                             <span>
                                                <svg width="20" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M0.610188 15.3415C-0.203396 14.528 -0.203396 13.2088 0.610188 12.3953L12.3953 0.610203C13.2089 -0.203401 14.528 -0.203401 15.3416 0.610203C16.1551 1.42379 16.1551 2.74289 15.3416 3.55647L3.55646 15.3415C2.74288 16.1553 1.42379 16.1553 0.610188 15.3415Z" fill="#A56852"/>
                                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M0.610188 0.610188C1.42379 -0.203396 2.74287 -0.203396 3.55648 0.610188L15.3416 12.3952C16.1551 13.209 16.1551 14.5279 15.3416 15.3417C14.5281 16.1552 13.2089 16.1552 12.3954 15.3417L0.610188 3.55648C-0.203396 2.74287 -0.203396 1.42379 0.610188 0.610188Z" fill="#A56852"/>
                                                </svg>                                             
                                             </span>
                                          </a>
                                       </div>
                                    </div>
                                    <div class="product-text">
                                       <!-- <span>TERRACOTTA</span> -->
                                       <h4><a href="{{ url('product-detail/'.$result['slug']) }}">{{ $result['name'] }}</a></h4>
                                       <h5>From 
                                          @if($result['discount_amount']>0)
                                                <span class="value"><del>{{  \App\Helpers\commonHelper::getPriceByCountry($result['sale_price']) }}</del> ??? {{  \App\Helpers\commonHelper::getPriceByCountry($result['offer_price']) }}</span>
                                          @else
                                                <span class="value"> {{  \App\Helpers\commonHelper::getPriceByCountry($result['sale_price']) }}</span>
                                          @endif
                                       </h5>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                              @else
                                 <p style="margin-top:10px;text-align:center"><b>{{ $resultData['message'] }}</b></p>
                              @endif

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </section>
   
   </main>





@endsection


@push('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script>
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