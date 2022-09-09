<!DOCTYPE html>
<html lang="zxx" dir="ltr">
   <!--[endif]-->
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Village Artisan</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <!--Template style -->
      
      <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/animate.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/fonts.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/font-awesome.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/toggle.css')}}" /> 
      <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/owl.carousel.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/owl.theme.default.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/bootstrap.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/style.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('landingPage/css/responsive.css')}}" />
      <!--favicon-->
      <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
   </head>
   <body>
      <div id="preloader">
         <div id="status">
            <img src="{{ asset('landingPage/images/loader1.png')}}" alt="" class="logo-icon">
            <img src="{{ asset('landingPage/images/loader2.png')}}" alt="">
         </div>
      </div>
      <!-- top to return -->
      <a href="javascript::void(0);" id="return-to-top" class="change-bg2"> <i class="fas fa-angle-double-up"></i></a>

      <!-- Login start -->

      <div class="va-login-page-main-wrapper">
         <div class="login-form-wrapper country-wrap">
            <div class="login-logo-wrapper">
               <a href="url('/')">
                  <img src="{{ asset('assets/images/logo.png')}}" alt="logo">
               </a>
               <h2>Select Country</h2>
            </div>
            <div class="coutrySelect">
               <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                     <a href="javascript:void(0)" class="country-box selectCountry" data-id="2">
                        <img src="{{ asset('landingPage/images/usa.png')}}" alt="country-flag" style="width: 96px;">
                        <span>USA</span>
                        <small><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5002 1.98438C6.42524 1.98438 1.50024 6.90938 1.50024 12.9844C1.50024 19.0594 6.42524 23.9844 12.5002 23.9844C18.5752 23.9844 23.5002 19.0594 23.5002 12.9844C23.5002 6.90938 18.5752 1.98438 12.5002 1.98438ZM17.2682 11.1244C17.356 11.024 17.4229 10.9071 17.4648 10.7805C17.5068 10.654 17.523 10.5203 17.5125 10.3874C17.502 10.2544 17.4651 10.1249 17.4038 10.0065C17.3426 9.88807 17.2582 9.78308 17.1558 9.69772C17.0534 9.61235 16.9349 9.54834 16.8073 9.50944C16.6798 9.47054 16.5458 9.45754 16.4131 9.4712C16.2805 9.48487 16.1519 9.52492 16.035 9.58901C15.9181 9.65309 15.8151 9.73992 15.7322 9.84437L11.4322 15.0034L9.20724 12.7774C9.01864 12.5952 8.76604 12.4944 8.50384 12.4967C8.24165 12.499 7.99083 12.6041 7.80543 12.7896C7.62002 12.975 7.51485 13.2258 7.51257 13.488C7.51029 13.7502 7.61109 14.0028 7.79324 14.1914L10.7932 17.1914C10.8915 17.2896 11.0091 17.3662 11.1387 17.4164C11.2682 17.4666 11.4067 17.4893 11.5455 17.483C11.6843 17.4767 11.8202 17.4416 11.9447 17.3798C12.0691 17.3181 12.1793 17.2311 12.2682 17.1244L17.2682 11.1244Z" fill="#00C013"/>
                           </svg>
                           </small>
                     </a>
                  </div>
                  <div  class="col-lg-4 col-md-6 col-sm-12 col-12">
                     <a href="javascript:void(0)" class="country-box selectCountry" data-id="3">
                        <img src="{{ asset('landingPage/images/country-flag1.png')}}" alt="country-flag">
                        <span>Canada</span>
                        <small><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5002 1.98438C6.42524 1.98438 1.50024 6.90938 1.50024 12.9844C1.50024 19.0594 6.42524 23.9844 12.5002 23.9844C18.5752 23.9844 23.5002 19.0594 23.5002 12.9844C23.5002 6.90938 18.5752 1.98438 12.5002 1.98438ZM17.2682 11.1244C17.356 11.024 17.4229 10.9071 17.4648 10.7805C17.5068 10.654 17.523 10.5203 17.5125 10.3874C17.502 10.2544 17.4651 10.1249 17.4038 10.0065C17.3426 9.88807 17.2582 9.78308 17.1558 9.69772C17.0534 9.61235 16.9349 9.54834 16.8073 9.50944C16.6798 9.47054 16.5458 9.45754 16.4131 9.4712C16.2805 9.48487 16.1519 9.52492 16.035 9.58901C15.9181 9.65309 15.8151 9.73992 15.7322 9.84437L11.4322 15.0034L9.20724 12.7774C9.01864 12.5952 8.76604 12.4944 8.50384 12.4967C8.24165 12.499 7.99083 12.6041 7.80543 12.7896C7.62002 12.975 7.51485 13.2258 7.51257 13.488C7.51029 13.7502 7.61109 14.0028 7.79324 14.1914L10.7932 17.1914C10.8915 17.2896 11.0091 17.3662 11.1387 17.4164C11.2682 17.4666 11.4067 17.4893 11.5455 17.483C11.6843 17.4767 11.8202 17.4416 11.9447 17.3798C12.0691 17.3181 12.1793 17.2311 12.2682 17.1244L17.2682 11.1244Z" fill="#00C013"/>
                           </svg>
                           </small>
                     </a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                     <a href="javascript:void(0)" class="country-box selectCountry" data-id="1">
                        <img src="{{ asset('landingPage/images/country-flag1.png')}}" alt="country-flag">
                        <span>Rest of the world</span>
                        <small><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5002 1.98438C6.42524 1.98438 1.50024 6.90938 1.50024 12.9844C1.50024 19.0594 6.42524 23.9844 12.5002 23.9844C18.5752 23.9844 23.5002 19.0594 23.5002 12.9844C23.5002 6.90938 18.5752 1.98438 12.5002 1.98438ZM17.2682 11.1244C17.356 11.024 17.4229 10.9071 17.4648 10.7805C17.5068 10.654 17.523 10.5203 17.5125 10.3874C17.502 10.2544 17.4651 10.1249 17.4038 10.0065C17.3426 9.88807 17.2582 9.78308 17.1558 9.69772C17.0534 9.61235 16.9349 9.54834 16.8073 9.50944C16.6798 9.47054 16.5458 9.45754 16.4131 9.4712C16.2805 9.48487 16.1519 9.52492 16.035 9.58901C15.9181 9.65309 15.8151 9.73992 15.7322 9.84437L11.4322 15.0034L9.20724 12.7774C9.01864 12.5952 8.76604 12.4944 8.50384 12.4967C8.24165 12.499 7.99083 12.6041 7.80543 12.7896C7.62002 12.975 7.51485 13.2258 7.51257 13.488C7.51029 13.7502 7.61109 14.0028 7.79324 14.1914L10.7932 17.1914C10.8915 17.2896 11.0091 17.3662 11.1387 17.4164C11.2682 17.4666 11.4067 17.4893 11.5455 17.483C11.6843 17.4767 11.8202 17.4416 11.9447 17.3798C12.0691 17.3181 12.1793 17.2311 12.2682 17.1244L17.2682 11.1244Z" fill="#00C013"/>
                           </svg>
                           </small>
                     </a>
                  </div>
               </div>
            </div>
         </div>

      </div>
 
      <!-- Side Panel -->
      <script src="{{ asset('landingPage/js/jquery-3.6.0.min.js')}}"></script>
      <script src="{{ asset('landingPage/js/bootstrap.min.js')}}"></script>
      <script src="{{ asset('landingPage/js/wow.js')}}"></script>
      <script src="{{ asset('landingPage/js/tesi.js')}}"></script>
      <script src="{{ asset('landingPage/js/owl.carousel.min.js')}}"></script>
      <script src="{{ asset('landingPage/js/jquery.magnific-popup.min.js')}}"></script>
     
    <script src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>
      <script src="{{ asset('landingPage/js/custom.js')}}"></script>
      <script>
         $('.dropdown').on('click', function () {
            $('.dropdown-menu').toggleClass('show')
         })
      </script>
      <script>
         $(".toggle-password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        
            $(".selectCountry").click(function () {
                
                 $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{url('country-set-landing-page-ajax')}}",
                    headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { "country_type": $(this).data('id') },
                    beforeSend:function(){
                       
                    },
                    error:function(xhr,textStatus){
                       
                    },
                    success: function(data){
                       if(data.reset){
                          window.location.reload();
                       }
                    }
               });
            });
      </script>
       
   </body>
</html>