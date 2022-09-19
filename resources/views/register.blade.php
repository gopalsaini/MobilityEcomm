@extends('layouts.app')



@push('custom_css')

@endpush

@section('content')


<main class="main__content_wrapper">
        
    
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Account Login</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Login</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="login__section section--padding">
        <div class="container">
            
            <div class="login__section--inner">
                <div class="row ">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="account__login register">
                            <p class="regemailmsg"></p>
                            <div class="account__login--header mb-25">
                                <h3 class="account__login--header__title mb-10">Create an Account</h3>
                                <p class="account__login--header__desc">Register here if you are a new customer</p>
                            </div>
                            
                            <form action="{{ route('register-by-email') }}" method="post" id="regEmail">
                        
                                <div class="account__login--inner row">
                                    <div class="col-md-6 col-12">
                                        <label>First Name</label>
                                        <div class="input-box">
                                            <input type="text" required name="first_name" class="form-control account__login--input" placeholder="Enter Here">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Last Name</label>
                                        <div class="input-box">
                                            <input type="text" required name="last_name" class="form-control account__login--input" placeholder="Enter Here">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Email Address</label>
                                        <div class="input-box">
                                            <input type="email" name="email" required class="account__login--input form-control" placeholder="Enter Email">
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Password</label>
                                        <div class="input-box">
                                            <input type="password" id="pass_log_password" name="password" required class="account__login--input form-control" placeholder="Enter password">
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <label>Re-type Password</label>
                                        <div class="input-box">
                                            <input type="password" id="pass_log_password_confirmation" name="password_confirmation" required class="account__login--input form-control" placeholder="Enter password">
                                        
                                        </div>
                                    </div>
                                    <div class="account__login--remember position__relative">
                                        <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check2">
                                            I have read and agree to the terms & conditions</label>
                                    </div>
                                    <br><br>
                                    <button class="account__login--btn primary__btn submit-reg" type="submit">Register &nbsp;&nbsp;<pre style="margin-bottom: 0rem;display:none" class="spinner-border  spinner-border-sm loginloader"></pre></button>
                                    <div class="account__login--divide">
                                        <span class="account__login--divide__text">OR</span>
                                    </div>
                                    <div class="account__social d-flex justify-content-center mb-15">
                                        <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com">Facebook</a>
                                        <a class="account__social--link google" target="_blank" href="{{ url('auth/google') }}">Google</a>
                                    </div>
                                    <p class="account__login--signup__text">Already Have an Account? <button type="button"><a href="{{ url('login') }}">Sign In now</a></button></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
    </div>

</main>

@endsection

@push('custom_js')
    <script>
        $(document).on('click', '.toggle-password', function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            
            var input = $("#pass_log_"+$(this).data('id'));
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
        });
    </script>
    <script>
        $("form#regEmail").submit(function (e) {
            var mobile=$("input[name=mobile]").val();
            $('.regemailmsg').html('');

            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            $.ajax({
                url: formAction,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(this),
                dataType: 'json',
                type: 'post',
                async: false,
                beforeSend: function () {
                    $('.regemailloader').css('display', 'inline-block');
                },
                error: function (xhr, textStatus) {

                    if(xhr && xhr.responseJSON.message){
                        $('.regemailmsg').html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> '+xhr.responseJSON.message+'</p>');
                    }else{

                        $('.regemailmsg').html('<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> '+xhr.statusText+'</p>');
                    }

                    $('.regemailloader').css('display', 'none');
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                success: function (data) {
                    
                    location.href="{{ url('/') }}";

                    // $('.emailverifyHtml').html(data.html);
                    // $('#last4digit').html(mobile.substring(6,10));
                    // $('.resend-code').show();
                    // $('#timer_left').css('display','inline-block');
                    // $('.otp_registration_resend').css('display','none');
                    // var resendOtpTime=30;
                    // interval= setInterval(() => {
                    //     if(resendOtpTime>0){
                    //         resendOtpTime--;
                    //         $('#timer_left').html("00:"+("0" + resendOtpTime).slice(-2));
                    //     }else{
                            
                    //         $('#timer_left').css('display','none');
                    //         $('.otp_registration_resend').css('display','inline-block');
                    //         clearInterval(interval);
                    //     }
                    // }, 1000);

                    // setTimeout(() => {
                        
                    //     $('.firstotp').focus();

                    //     initilizeVerify();

                    // }, 100);

                    $('.regemailmsg').html('<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> '+data.message+'</p>');

                    $('.regemailloader').css('display', 'none');
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });

        });

        $("form#regMobile").submit(function (e) {
            var mobile=$("input[name=mobile]").val();
                    
            $('.regmobilemsg').html('');

            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            $.ajax({
                url: formAction,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(this),
                dataType: 'json',
                type: 'post',
                async: false,
                beforeSend: function () {
                    $('.regmobileloader').css('display', 'inline-block');
                },
                error: function (xhr, textStatus) {

                    if(xhr && xhr.responseJSON.message){
                        $('.regmobilemsg').html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> '+xhr.responseJSON.message+'</p>');
                    }else{

                        $('.regmobilemsg').html('<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> '+xhr.statusText+'</p>');
                    }

                    $('.regmobileloader').css('display', 'none');
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                success: function (data) {
                    
                    $('.mobileverifyHtml').html(data.html);

                    $('#last4digit').html(mobile.substring(6,10));
                    $('.resend-code').show();
                    $('#timer_left').css('display','inline-block');
                    $('.otp_registration_resend').css('display','none');
                    var resendOtpTime=30;
                    interval= setInterval(() => {
                        if(resendOtpTime>0){
                            resendOtpTime--;
                            $('#timer_left').html("00:"+("0" + resendOtpTime).slice(-2));
                        }else{
                            
                            $('#timer_left').css('display','none');
                            $('.otp_registration_resend').css('display','inline-block');
                            clearInterval(interval);
                        }
                    }, 1000);

                    setTimeout(() => {
                        
                        $('.firstotp').focus();

                        initilizeVerify();

                    }, 100);

                    $('.regmobilemsg').html('<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> '+data.message+'</p>');

                    $('.regmobileloader').css('display', 'none');
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });

        });

        function sendOtp(){

            $(".send-otp").click(function (e) {

                var type=$(this).data('type');
                var phoneCode=$(this).data('phone_code');
                var typeValue=$(this).data('value');
                var showmsg=$(this).data('showmsg');

                $('.'+showmsg).html('');

                e.preventDefault();

                if(typeValue.length==''){

                    $('.'+showmsg).html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> Pleaes enter first your mobile to get the OTP.</p>');

                }else{

                    $.ajax({
                        url: "{{ url('getotp') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'type' : type,
                            'phone_code':phoneCode,
                            'type_value': typeValue
                        },
                        dataType: 'json',
                        type: 'POST',
                        async: false,
                        beforeSend: function () {
                            $('.sendotploader').css('display', 'inline-block');
                        },
                        error: function (xhr, textStatus) {

                            if(xhr && xhr.responseJSON.message){
                                $('.'+showmsg).html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> '+xhr.responseJSON.message+'</p>');
                            }else{

                                $('.'+showmsg).html('<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> '+xhr.statusText+'</p>');
                            }

                            $('.sendotploader').css('display', 'none');
                            window.scrollTo({top: 0, behavior: 'smooth'});
                        },
                        success: function (data, typeValue) {
                            
                            $('.'+showmsg).html('<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> '+data.message+'</p>');
                            $('.sendotploader').css('display', 'none');
                            $('#last4digit').html(typeValue.substring(6,10));
                            $('.resend-code').show();
                            $('#timer_left').css('display','inline-block');
                            $('.otp_registration_resend').css('display','none');
                            var resendOtpTime=30;
                            interval= setInterval(() => {
                                if(resendOtpTime>0){
                                    resendOtpTime--;
                                    $('#timer_left').html("00:"+("0" + resendOtpTime).slice(-2));
                                }else{
                                    
                                    $('#timer_left').css('display','none');
                                    $('.otp_registration_resend').css('display','inline-block');
                                    clearInterval(interval);
                                }
                            }, 1000);
                            setTimeout(() => {
                        
                                $('.firstotp').focus();

                            }, 100);

                            window.scrollTo({top: 0, behavior: 'smooth'});
                        },
                        cache: false,
                        timeout: 5000
                    });
                }

            });
        }

        function initilizeVerify(){

            autoOtpFocus();

            sendOtp();

            $("form#verify").submit(function (e) {

                $('.verifymsg').html('');

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
                        $('.verifyloader').css('display', 'inline-block');
                    },
                    error: function (xhr, textStatus) {

                        if(xhr && xhr.responseJSON.message){
                            $('.verifymsg').html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> '+xhr.responseJSON.message+'</p>');
                        }else{

                            $('.verifymsg').html('<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> '+xhr.statusText+'</p>');
                        }

                        $('.verifyloader').css('display', 'none');
                        window.scrollTo({top: 0, behavior: 'smooth'});
                    },
                    success: function (data) {

                        location.href="{{ url('myprofile') }}";

                        $('.verifymsg').html('<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> '+data.message+'</p>');

                        $('.verifyloader').css('display', 'none');

                        window.scrollTo({top: 0, behavior: 'smooth'});
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    timeout: 5000
                });

            });

        }

        function autoOtpFocus(){

            $(".otp").keyup(function () {
                if (this.value.length == this.maxLength) {
                $(this).next('.otp').focus();
                }
            });
        }

        $(document).ready(function(){
            
            autoOtpFocus();

            sendOtp();
        });
    </script>


@endpush

       