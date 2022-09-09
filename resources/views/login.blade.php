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
        html {
            scroll-behavior: smooth;
        }
        @media only screen and ( min-width:320px) and (max-width:767px){
            .main-header form{
               display: block !important; 
               top: 0 !important;
               margin-top: 2px;
               margin-bottom: 3px;
            }
            .main-header .search-box{
               z-index: -1;
            }
            .b{
               width: 80px !important;
            }
            .searchbarcategory {
               margin-top: -7px;
            }
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
     
    <div class="va-login-page-main-wrapper ">
        <div class="login-form-wrapper">
            <div class="login-logo-wrapper">
               <a href="{{url('/')}}">
                  <img src="{{ asset('assets/images/logo.png')}} " alt="logo">
               </a>
               <h2>Login</h2>
               <br>
               <p class="regemailmsg"></p>
            </div>
            <div class="login-form">
                <form action="{{ url('login-with-email') }}" method="post" id="loginEmail">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12 col-12">
                            <label>Email ID</label>
                            <div class="input-box">
                            <input type="email" required name="email" class="form-control" placeholder="Enter Here">
                            <span><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 col-12">
                            <label>Password</label>
                            <div class="input-box">
                            <input type="password" id="pass_log_password" required class="form-control" name="password" placeholder="Enter password">
                            <span>
                                <i class="toggle-password fa fa-fw fa-eye-slash" data-id="password"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="forgot-pass">
                        <div class="check-box-wrapper">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember Me
                            </label>
                            </div>
                        </div>
                        <div class="check-box-wrapper">
                            <a href="{{ url('forgot-password') }}">Forgot Password?</a>
                        </div>
                    </div>
                    <button type='submit' class="va_btn submit-reg">Login
                        &nbsp;&nbsp;<pre style="margin-bottom: 0rem;display:none" class="spinner-border  spinner-border-sm loginloader"></pre>
                    </button>
                </form>
               <div class="strip"><p>Or</p></div>
               <div class="form-btn">
                  <a href="{{ url('auth/google') }}"> <span> <img src="{{ asset('assets/images/goggle.png')}}" alt="goggle"> </span> Sign In With Goggle </a>
                  
               </div>
               <div class="tag-line">
                  <p>Don’t Have An Account ?  <a href="{{ url('register') }}">Sign Up</a> </p>
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
    <script>
         $('.dropdown').on('click', function () {
            $('.dropdown-menu').toggleClass('show')
         })
      </script>
      
      <script>
            $(document).on('click', '.toggle-password', function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                
                var input = $("#pass_log_"+$(this).data('id'));
                input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
            });
        </script>
    <script>
        $("form#loginEmail").submit(function (e) {
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
                    $('.loginloader').css('display', 'inline-block');
                },
                error: function (xhr, textStatus) {
                    if (xhr && xhr.responseJSON.message) {
                        $('.regemailmsg').html(
                            '<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> ' +
                            xhr.responseJSON.message + '</p>');
                    } else {
                        $('.regemailmsg').html(
                            '<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> ' +
                            xhr.statusText + '</p>');
                    }
                    $('.loginloader').css('display', 'none');
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                },
                success: function (data) {
                    if (data.verfiy) {
                        location.href = "{{ url('/') }}";
                    } else {
                        $('.emailverifyHtml').html(data.html);
                        setTimeout(() => {
                            $('.firstotp').focus();
                            initilizeVerify();
                        }, 100);
                        $('.regemailmsg').html(
                            '<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> ' +
                            data.message + '</p>');
                    }
                    $('.loginloader').css('display', 'none');
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });
        });
        $("form#mobileEmail").submit(function (e) {
            $('.msg').html('');
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
                    $('.loader').css('display', 'inline-block');
                },
                error: function (xhr, textStatus) {
                    if (xhr && xhr.responseJSON.message) {
                        $('.msg').html(
                            '<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> ' +
                            xhr.responseJSON.message + '</p>');
                    } else {
                        $('.msg').html(
                            '<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> ' +
                            xhr.statusText + '</p>');
                    }
                    $('.loader').css('display', 'none');
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                },
                success: function (data) {
                    if (data.verify) {
                        location.href = "{{ url('myprofile') }}";
                    } else {
                        $('.msg').html(
                            '<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> ' +
                            data.message + '</p>');
                    }
                    $('.loader').css('display', 'none');
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });
        });
        function sendOtp() {
            $(".send-otp").click(function (e) {
                var phoneCode = '0';
                var type = $(this).data('type');
                var typeValue = $(this).data('value');
                if (typeValue == 'mannual') {
                    phoneCode = $('select[name=phone_code]').val();
                    typeValue = $('#mobileno').val();
                }
                var showmsg = $(this).data('showmsg');
                $('.' + showmsg).html('');
                e.preventDefault();
                if (typeValue == 0) {
                    $('.' + showmsg).html(
                        '<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> Pleaes enter first your mobile to get the OTP.</p>'
                    );
                } else {
                    $.ajax({
                        url: "{{ url('getotp') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'type': type,
                            'type_value': typeValue,
                            'phone_code': phoneCode
                        },
                        dataType: 'json',
                        type: 'POST',
                        async: false,
                        beforeSend: function () {
                            $('.sendotploader').css('display', 'inline-block');
                        },
                        error: function (xhr, textStatus) {
                            if (xhr && xhr.responseJSON.message) {
                                $('.' + showmsg).html(
                                    '<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> ' +
                                    xhr.responseJSON.message + '</p>');
                            } else {
                                $('.' + showmsg).html(
                                    '<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> ' +
                                    xhr.statusText + '</p>');
                            }
                            $('.sendotploader').css('display', 'none');
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        },
                        success: function (data) {
                            $('.' + showmsg).html(
                                '<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> ' +
                                data.message + '</p>');
                            $('.sendotploader').css('display', 'none');
                            setTimeout(() => {
                                $('.firstotp').focus();
                            }, 100);
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        },
                        cache: false,
                        timeout: 5000
                    });
                }
            });
        }
        function initilizeVerify() {
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
                        if (xhr && xhr.responseJSON.message) {
                            $('.verifymsg').html(
                                '<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> ' +
                                xhr.responseJSON.message + '</p>');
                        } else {
                            $('.verifymsg').html(
                                '<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> ' +
                                xhr.statusText + '</p>');
                        }
                        $('.verifyloader').css('display', 'none');
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    },
                    success: function (data) {
                        $('.verifymsg').html(
                            '<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> ' +
                            data.message + '</p>');
                        $('.verifyloader').css('display', 'none');
                        location.href = "{{ url('myprofile') }}";
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    timeout: 5000
                });
            });
        }
        function autoOtpFocus() {
            $(".otp").keyup(function () {
                if (this.value.length == this.maxLength) {
                    $(this).next('.otp').focus();
                }
            });
        }
        $(document).ready(function () {
            autoOtpFocus();
            sendOtp();
        });
    </script>


</body>
</html>