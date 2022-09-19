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
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        <img src="{{asset('images/Login-illustration.svg')}}" style="    max-width: 83%;">
                    </div>
                    <div class="col">
                        <div class="account__login">
                            <p class="regemailmsg"></p>
                            <div class="account__login--header mb-25">
                                <h3 class="account__login--header__title mb-10">Login</h3>
                                <p class="account__login--header__desc">Login if you area a returning customer.</p>
                            </div>
                            <form action="{{ url('login-with-email') }}" method="post" id="loginEmail">
                                @csrf
                                <div class="account__login--inner">
                                    <label>
                                        <input class="account__login--input" placeholder="Email Addres" type="email" required name="email" >
                                    </label>
                                    <label>
                                        <input class="account__login--input" placeholder="Password" type="password" id="pass_log_password" required name="password">
                                    </label>
                                    <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        
                                        <button class="account__login--forgot" type="button"><a href="{{ url('forgot-password') }}">Forgot Password?</a></button>
                                    </div>
                                    <button class="account__login--btn primary__btn submit-reg" type="submit">Login &nbsp;&nbsp;<pre style="margin-bottom: 0rem;display:none" class="spinner-border  spinner-border-sm loginloader"></pre></button>
                                    <div class="account__login--divide">
                                        <span class="account__login--divide__text">OR</span>
                                    </div>
                                    <div class="account__social d-flex justify-content-center mb-15">
                                        <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com">Facebook</a>
                                        <a class="account__social--link google" target="_blank" href="{{ url('auth/google') }}">Google</a>
                                    </div>
                                    <p class="account__login--signup__text">Don,t Have an Account? <button type="button"><a href="{{ url('register') }}">Sign Up now</a></button></p>
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

@endpush
