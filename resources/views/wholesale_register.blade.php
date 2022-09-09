<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | Village Artisan </title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="title" content="@yield('title')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/simple-line-icons/css/simple-line-icons.css') }}">
    @stack('custom_css')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toggle.css')}}" /> 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/camera.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css')}}" />
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png')}}" />

    <link rel="stylesheet" href="{{ asset('css/fSelect.css') }}">

    <script src="https://kit.fontawesome.com/0b8334f960.js" crossorigin="anonymous"></script>
    <style>
        
    </style>
    <style>
        
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
    </style>
    <script>
        var baseUrl = "{{ url('/') }}";

        var loading_set =
            '<div style="text-align:center;width:100%;height:200px; position:relative;top:100px;"><i style="color:black;font-size:25px;" class="fa fa-refresh fa-spin fa-3x fa-fw"></i><p>Please wait</p></div>';

        var userLogin = "{{ Session::has('5ferns_user') }}";
    </script>
</head>

<body>
    <div id="preloader">
        <div id="status">
            <img src="{{ asset('assets/images/loader1.png')}}" alt="" class="logo-icon">
            <img src="{{ asset('assets/images/loader2.png')}}" alt="">
        </div>
    </div>

    <a href="javascript:;" id="return-to-top" class="change-bg2"> <i class="fas fa-angle-double-up"></i></a>
     
    <div class="va-login-page-main-wrapper">
         <div class="login-form-wrapper">
            <div class="login-logo-wrapper">
               <a href="index.html">
                  <img src="{{ asset('assets/images/logo.png')}}" alt="logo">
               </a>
               <h2>Register</h2><br><p class="regemailmsg"></p>
            </div>
            <div class="login-form">
                <form action="{{ url('wholesale-register') }}" method="post" id="regEmail">
                    
                    <input type="hidden" required name="user_type" value="{{$type}}" class="form-control" placeholder="Enter Here">

                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label>First Name <span>*</span></label>
                            <div class="input-box">
                            <input type="text" required name="first_name" onkeypress="return /[A-Za-z ]/i.test(event.key)" class="form-control" placeholder="Enter Here">
                            <span><i class="fas fa-user"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <label>Last Name <span>*</span></label>
                            <div class="input-box">
                            <input type="text" required name="last_name" onkeypress="return /[A-Za-z ]/i.test(event.key)" class="form-control" placeholder="Enter Here">
                            <span><i class="fas fa-user"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Code <span>*</span></label>
                                    <select class="selectbox code-select" name="phone_code" required >
                                        <option value="">Phone Code</option>
                                        @foreach($country as $cont)
                                            <option value="{{ $cont['phonecode'] }}" >+ {{ $cont['phonecode'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8 col-12">
                                    <label>Enter Mobile no. <span>*</span></label>
                                    <div class="input-box">
                                    <input type="tel" required name="mobile" onkeypress="return /[0-9 ]/i.test(event.key)" class="form-control" placeholder="Enter Here">
                                    <span><i class="fa fa-mobile-phone"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <label>Enter Landline <span>*</span></label>
                            <div class="input-box">
                            <input type="text" required name="landline" class="form-control" placeholder="Enter Here">
                            <span><i class="fa fa-phone"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                                <label>Email Address <span>*</span></label>
                            <div class="input-box">
                                <input type="email" name="email" required class="form-control" placeholder="Enter Email">
                                <span>
                                    <span><i class="fas fa-envelope"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                                <label>Select Reference Code (Optional)</label>
                            <div class="input-box">
                            <select class="form-control" name="reference_code" required id="reference_code">
                                <option value="">Select Reference Code</option>
                                @foreach($users as $user)
                                    <option  value="{{$user->reference_code}}">{{$user->reference_code}} ({{$user->name}})</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Select Country <span>*</span></label>
                                <select class="country selectbox" name="country_id" data-state_id="0" data-city_id="0">
                                    <option value="">--Select--</option>
                                    @foreach($country as $con)
                                            <option value="{{ $con['id'] }}" >{{ ucfirst($con['name']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Select State <span>*</span></label>
                                <select class="selectbox statehtml" name="state_id" required >
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Select City <span>*</span></label>
                                <select class="selectbox cityHtml" name="city_id">
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Enter ZIPCODE <span>*</span></label>
                                <input required class="form-control pincodesssss" 
                                placeholder="ZIPCODE*" type="tel" value="" name="postal_code" onkeypress="return /[0-9 ]/i.test(event.key)" minlength="6" maxlength="6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label>Password <span>*</span></label>
                            <div class="input-box">
                            <input type="password" id="pass_log_password" name="password" required class="form-control" placeholder="Enter password">
                            <span>
                                <i class="toggle-password fa fa-fw fa-eye-slash" data-id="password"></i>
                            </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <label>Re-type Password <span>*</span></label>
                            <div class="input-box">
                            <input type="password" id="pass_log_password_confirmation"  name="password_confirmation" required class="form-control" placeholder="Enter password">
                            <span>
                                <i class="toggle-password fa fa-fw fa-eye-slash" data-id="password_confirmation"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group  row">
                        
                        <div class="col-md-12 col-12">
                            <div class="input-box">
                                <label>Enter Address <span>*</span></label>
                                <input required class="form-control" placeholder="Address (House No, Building, Street, Area)*" type="text" value="" name="address">
                                    
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-12">
                            
                            <p>Sign up Newsletter  &nbsp;&nbsp;<input type="checkbox" checked name="newsletter" id="newsletter" value="Yes"></p>
                            
                        </div>                
                    <button type='submit' class="spinner-btn va_btn submit-reg">Register
                        &nbsp;&nbsp;<pre class="spinner-border spinner-border-sm regemailloader sendotploader"
                        style="margin-bottom: 0rem;color:white;font-size: 100%;position:relative;display:none"></pre>
                    </button>
                </form>
                
               <div class="tag-line">
                  <p>Already Have An Account ? <a href="{{url('login')}}">Login</a> </p>
               </div>
            </div>
         </div>
         <div class="back-btn">
            <a href="{{url('/')}}"> <span> <img src="{{ asset('assets/images/left.png')}}" alt="img"> </span> Go To Home</a>
         </div>
    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/wow.js')}}"></script>
    <script src="{{ asset('assets/js/tesi.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/home-js/camera.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/home-js/jquery.easing.1.3.js')}}"></script> 
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    
    <script src="{{ asset('js/common.js')}}"></script>
    
    <script src="{{ asset('js/fSelect.js') }}"></script>
    <script>
        $(document).on('click', '.toggle-password', function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            
            var input = $("#pass_log_"+$(this).data('id'));
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
        });
    </script>
    <script>

         $('.dropdown').on('click', function () {
            $('.dropdown-menu').toggleClass('show')
         })

         
        $('.code-select').fSelect({
            placeholder: 'Phone Code',
            numDisplayed: 3,
            overflowText: '{n} selected',
            noResultsText: 'No results found',
            searchText: 'Search',
            showSearch: true
        });
        
        $('.selectbox').fSelect({
            placeholder: '-- Select -- ',
            numDisplayed: 5,
            overflowText: '{n} selected',
            noResultsText: 'No results found',
            searchText: 'Search',
            showSearch: true
        });
        
      </script>
      <script>
         
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


</body>
</html>
