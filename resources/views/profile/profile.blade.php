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
                     <h1 class="breadcrumb__content--title text-white mb-10">My Account</h1>
                     <ul class="breadcrumb__content--menu d-flex">
                           <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                           <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
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

                  <div class="col-lg-8 col-md-12 col-sm-12 col-12  ">
                     <div class="profile-sec contact__form">
                        <h3>Personal Information</h3>
                        <form action="{{ url('update-profile') }}" method="Post" class="m-0" id="checkout" autocomplete="off">
                           @csrf
                           <div class="form-group row mb-10">
                              <div class="col-md-6 col-12 mb-10">
                                 <label>Name <span>*</span></label>
                                 <input type="text" class="form-control contact__form--input" placeholder="Enter Here" value="{{$resultData['data']['name']}}" required="" name="name" onkeypress="return /[A-Za-z ]/i.test(event.key)">
                              </div>
                              
                              <div class="col-md-6 col-12 mb-10">
                              
                                 <label>Gender</label>
                                 <div class="switchToggle" style="display:flex">
                                    <span style="display:flex">
                                       <input type="radio" style="height: 28px;" id="male" name="gender" class="" value="1" @if($resultData['data']['gender'] == '1') checked @endif>
                                       <label class="" for="male">&nbsp;&nbsp;Male</label>
                                    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style="display:flex">
                                       <input type="radio" style="height: 28px;"  id="female" name="gender" class="" value="2" @if($resultData['data']['gender'] == '2') checked @endif>
                                       <label class="" for="female">&nbsp;&nbsp;Female</label>
                                    </span>
                                 </div>
                              </div>
                              
                           </div>
                           
                           <div class="form-group row">
                              <!-- <div class="col-md-6 col-12">
                                 <label>Display Name<span>*</span></label>
                                 <input type="text" class="form-control" placeholder="Enter Here">
                              </div> -->
                              <div class="col-md-6 col-12 mb-10">
                                 <label>Email Address<span>*</span></label>
                                 <input type="email" value="{{$resultData['data']['email']}}" readonly class="form-control contact__form--input" placeholder="Enter Here">
                              </div>
                              <div class="col-md-6 col-12 mb-10">
                                 <label>Mobile Number *<span>*</span></label>
                                 <input type="tel" value="{{$resultData['data']['mobile']}}" class="form-control contact__form--input" placeholder="Enter Here">
                              </div>
                           </div>
                           <br>
                           <button type="submit" class="cart-pr-btn va_btn primary__btn" id="checkoutSubmit" style="border: navajowhite;">Update
                           &nbsp;&nbsp; <i class="fa fa-spinner fa-spin loading checkoutloader" style="font-size:16px;line-height: 2;display:none"></i>
                           </button>
                                                            
                        </form>
                        <br><br>
                        <h3 class="mt-5">Change Password</h3>
                        <form action="{{ url('update-password') }}" method="Post" class="m-0" id="password" autocomplete="off">
                           @csrf
                           <div class="form-group row">
                              <div class="col-md-6 col-12">
                                 <label>Current Password<span>*</span></label>
                                 <div class="position-relative hide-password">
                                    <input type="password" required class="form-control contact__form--input" placeholder="Enter Here" name="old_password">
                                    
                                 </div>
                              </div>
                              <div class="col-md-6 col-12">
                                 <label>New Password <span>*</span></label>
                                 <div class="position-relative hide-password">
                                    <input type="password" required  class="form-control contact__form--input" placeholder="Enter Here" name="password">
                                    
                                 </div>
                              </div>
                           </div>
                           <br>
                           <div class="form-group row">
                              <div class="col-md-6 col-12">
                                 <label>Confirm Password<span>*</span></label>
                                 <div class="position-relative hide-password">
                                    <input type="password" required class="form-control contact__form--input" placeholder="Enter Here" name="confirm_password">
                                    
                                 </div>
                              </div>
                           </div>
                           <br>
                           <button type="submit" class="cart-pr-btn btn-primary va_btn  primary__btn"  style="border: navajowhite;" id="passwordSubmit">Update
                              &nbsp;&nbsp; <i class="fa fa-spinner fa-spin loading passwordloader" style="font-size:16px;line-height: 2;display:none"></i> 
                           </button>
                        </form>
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