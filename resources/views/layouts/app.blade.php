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
    
    <link rel='stylesheet' href='https://unpkg.com/fullpage.js/dist/fullpage.min.css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui.css')}}" />
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
         .ui-widget.ui-widget-content {
            
            z-index: 99999999 !important;
         }
         #exampleModal .modal-dialog .modal-body .popup-main-wrap .product-desp .product-cate .quantity input {
            
            width: 64px !important;
         }  
    </style>
    <style>
         
         .toast {
               position: fixed;
               padding: 5px;
               bottom: -100px;
               left: 50%;
               transition: 0.3s;
               transform: translateX(-50%);
               background: #333 !important;
               color: #fff !important;
               font-size: 16px;
               text-align: center;
               width: auto;
               z-index: 9999;
         }
         .toast-body {
               display: flex;
               align-items: center;
         }
         .toast i {
               margin-right: 10px;
               font-size: 20px;
         }
         .toast i.green {
               color: #26bc4e;
         }
         .toast i.red {
               color: #ff4343;
         }
         .toast i.warning {
               color: #f0ad4e;
         }
         .toast.show {
               bottom: 30px;
         }
         .load-btn {
               border: 3px solid #fff;
               -webkit-animation: spin 1s linear infinite;
               animation: spin 1s linear infinite;
               border-top: 3px solid #007bff;
               border-radius: 50%;
               width: 20px;
               height: 20px;
         }
         @-webkit-keyframes spin {
               0% {
                  -webkit-transform: rotate(0deg);
               }
               100% {
                  -webkit-transform: rotate(360deg);
               }
         }

         @keyframes spin {
               0% {
                  transform: rotate(0deg);
               }
               100% {
                  transform: rotate(360deg);
               }
         }
         .load-btn-footer {
               border: 3px solid #fff;
               -webkit-animation: spinfooter 1s linear infinite;
               animation: spinfooter 1s linear infinite;
               border-top: 3px solid #007bff;
               border-radius: 50%;
               width: 12px;
               height: 12px;
         }
         @-webkit-keyframes spinfooter {
               0% {
                  -webkit-transform: rotate(0deg);
               }
               100% {
                  -webkit-transform: rotate(360deg);
               }
         }
         @keyframes spinfooter {
               0% {
                  transform: rotate(0deg);
               }
               100% {
                  transform: rotate(360deg);
               }
         }
         .user_profile {
               position: absolute;
               right: auto;
               left: auto;
               margin-top: -23px;
         }
         #preload {
               display: none;
         }
         .right-side.sign {
               
               border-left: 0px solid #fff;
               border-right: 0px solid #fff;
               width: 162px;
         }
         #header.cloned.sticky .right-side.sign {
               border-left: 0px solid #666;
               border-right: 0px solid #666;
         }

         pre {
            
            margin-top: 4px !important;
            margin-bottom: 0rem !important;
        }
        .va-testimonial-main-wrapper .testimonial-slider .testi-box .testi-img img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
         }
         .main-header-wrapper1 .cart-details .toggle-top-header {
            
            padding: 13px 20px 20px !important;
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
      <!-- header start -->
      <div class="main-header-wrapper1">
         <!--  -->
         <div class="cart-details" id="cart-sidebar">
            <div class="toggle-top-header">
               <p>Shopping Cart (<span class="total_count">0</span>)</p>
               <button class="cart-close"></button>
            </div>
            <div class="toggle-content">
               <span id="headerCartSection">

               </span>
            </div>
         </div>
         <!--  -->
         <div class="sb-main-header1">
            <div class="menu-items-wrapper menu-item-wrapper3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
               <div class="top-header-wrapper">
                  <p>
                     @if(!empty($offerResults))
                        @foreach($offerResults as $offerResult)
                           @if(\Session::get('country_type') == 3 && $offerResult->title == 'Canada Offer')
                              {{$offerResult->description}}
                           @elseif(\Session::get('country_type') == 2 && $offerResult->title == 'USA Offer')
                              {{$offerResult->description}}
                           @elseif(\Session::get('country_type') == 1 && $offerResult->title == 'ROW')
                              {{$offerResult->description}}
                           @endif
                        @endforeach
                     @endif
                  

                  </p>
                  <div class="ps_searc_n_all">
                     <ul>
                        <li>
                           <div class="price-select">
                              <span><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_151_1358)">
                                 <path d="M10 0.09375C7.67936 0.09375 5.45376 1.01562 3.81282 2.65657C2.17187 4.29751 1.25 6.52311 1.25 8.84375C1.25 15.2938 7.73125 19.0313 9.71875 20.025C9.80517 20.0679 9.90037 20.0903 9.99687 20.0903C10.0934 20.0903 10.1886 20.0679 10.275 20.025C12.2688 19.0313 18.75 15.2938 18.75 8.84375C18.75 6.52311 17.8281 4.29751 16.1872 2.65657C14.5462 1.01562 12.3206 0.09375 10 0.09375ZM10 18.7688C7.9125 17.675 2.5 14.3063 2.5 8.84375C2.5 6.85463 3.29018 4.94697 4.6967 3.54045C6.10322 2.13393 8.01088 1.34375 10 1.34375C11.9891 1.34375 13.8968 2.13393 15.3033 3.54045C16.7098 4.94697 17.5 6.85463 17.5 8.84375C17.5 14.3063 12.0875 17.675 10 18.7688Z" fill="white"/>
                                 <path d="M10.3937 3.98086C10.2829 3.89211 10.1451 3.84375 10.0031 3.84375C9.86112 3.84375 9.72335 3.89211 9.6125 3.98086L6.4875 6.48086C6.41384 6.53906 6.35424 6.61311 6.31312 6.69751C6.27201 6.78191 6.25043 6.87448 6.25 6.96836V11.9684C6.25 12.1341 6.31585 12.2931 6.43306 12.4103C6.55027 12.5275 6.70924 12.5934 6.875 12.5934H13.125C13.2908 12.5934 13.4497 12.5275 13.5669 12.4103C13.6842 12.2931 13.75 12.1341 13.75 11.9684V6.96836C13.7503 6.87499 13.7297 6.78273 13.6897 6.69837C13.6497 6.61401 13.5913 6.53968 13.5187 6.48086L10.3937 3.98086ZM12.5 11.3434H11.25V9.46836C11.25 9.3026 11.1842 9.14363 11.0669 9.02642C10.9497 8.90921 10.7908 8.84336 10.625 8.84336H9.375C9.20924 8.84336 9.05027 8.90921 8.93306 9.02642C8.81585 9.14363 8.75 9.3026 8.75 9.46836V11.3434H7.5V7.26836L10 5.26836L12.5 7.26836V11.3434Z" fill="white"/>
                                 </g>
                                 <defs>
                                 <clipPath id="clip0_151_1358">
                                 <rect width="20" height="20" fill="white" transform="translate(0 0.09375)"/>
                                 </clipPath>
                                 </defs>
                                 </svg>
                                 </span>
                                 
                                 <select class="form-select countryType" aria-label="Default select example" id="" name="country_type">
                                    <option @if(Session::get('country_type') == '3') selected @endif value="3">Canada</option>
                                    <option @if(Session::get('country_type') == '2') selected @endif value="2">USA</option>
                                    <option @if(Session::get('country_type') == '1') selected @endif value="1">Rest of the World</option>
                                 </select>
                                 
                           </div>
                        </li>
                        <li>
                           <div class="price-select">
                              <span><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M13.125 7.59375V6.34375H10.625V4.46875H9.375V6.34375H8.125C7.79358 6.34408 7.47583 6.47588 7.24148 6.71023C7.00713 6.94458 6.87533 7.26233 6.875 7.59375V9.46875C6.87533 9.80017 7.00713 10.1179 7.24148 10.3523C7.47583 10.5866 7.79358 10.7184 8.125 10.7188H11.875V12.5938H6.875V13.8438H9.375V15.7188H10.625V13.8438H11.875C12.2064 13.8434 12.5242 13.7116 12.7585 13.4773C12.9929 13.2429 13.1247 12.9252 13.125 12.5938V10.7188C13.1247 10.3873 12.9929 10.0696 12.7585 9.83523C12.5242 9.60088 12.2064 9.46908 11.875 9.46875H8.125V7.59375H13.125Z" fill="white"/>
                                 <path d="M10 2.59375C11.4834 2.59375 12.9334 3.03362 14.1668 3.85773C15.4001 4.68184 16.3614 5.85318 16.9291 7.22362C17.4968 8.59407 17.6453 10.1021 17.3559 11.5569C17.0665 13.0118 16.3522 14.3482 15.3033 15.3971C14.2544 16.4459 12.918 17.1602 11.4632 17.4496C10.0083 17.739 8.50032 17.5905 7.12988 17.0228C5.75943 16.4552 4.58809 15.4939 3.76398 14.2605C2.93987 13.0272 2.5 11.5771 2.5 10.0938C2.50578 8.1064 3.2978 6.2021 4.70308 4.79682C6.10835 3.39155 8.01266 2.59952 10 2.59375ZM10 1.34375C8.26942 1.34375 6.57769 1.85693 5.13876 2.81839C3.69983 3.77985 2.57832 5.14642 1.91606 6.74527C1.25379 8.34412 1.08051 10.1035 1.41813 11.8008C1.75575 13.4981 2.58911 15.0572 3.81282 16.2809C5.03653 17.5046 6.59563 18.338 8.29296 18.6756C9.9903 19.0132 11.7496 18.84 13.3485 18.1777C14.9473 17.5154 16.3139 16.3939 17.2754 14.955C18.2368 13.5161 18.75 11.8243 18.75 10.0938C18.7432 7.77519 17.8192 5.55351 16.1797 3.91403C14.5402 2.27455 12.3186 1.35051 10 1.34375Z" fill="white"/>
                                 </svg>
                                 </span>
                                 
                                 <select class="form-select currency" aria-label="Default select example" id="" name="currency">
                                    <option @if(Session::get('country_id') == '1') selected @endif value="1">INR</option>
                                    <option @if(Session::get('country_id') == '2') selected @endif value="2">USD</option>
                                    <option @if(Session::get('country_id') == '3') selected @endif value="3">CAD</option>

                                 </select>
                                 
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="ps_header_bottom">
                  <ul class="main-menu">
                     <li> <a href="{{ url('/') }}">Home</a> </li>
                     <li class="ps-mega menu-click1 position-relative"> <a href="javascript::">Shop <span><i class="fas fa-chevron-down"></i></span>  </a>
                        @if(!empty($category))
                            <ul class="dropdown-items menu-open1 mega-menus">
                                <li class="">
                                    @foreach($category['result'] as $cat)
                                        <ul>
                                            <li class="menu-heading">{{ ucfirst($cat['name']) }}</li>
                                            @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                                @foreach($cat['child'] as $fchild)
                                                   @if($fchild['business_type'] == 'Other')
                                                    <li><a href="{{ url('product-listing/'.$fchild['slug']) }}">{{ ucfirst($fchild['name'] )}}</a></li>
                                                   @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                        @endforeach
                                    
                                </li>
                            </ul>
                        @endif
                     </li>
                     <li class="menu-click4"> <a href="javascript::">Our Story <span><i class="fas fa-chevron-down"></i></span></a> 
                        <ul class="dropdown-items menu-open4">
                           <li>
                              <a href="{{route('about')}}">About Us </a>
                           </li>
                           <li>
                              <a href="{{url('our-artisan')}}">Meet the Artisans</a>
                           </li>
                        </ul>
                     </li>
                     <li class="menu-click5 "> <a href="javascript:void(0)">Wholesale <span><i class="fas fa-chevron-down"></i></span></a>
                        <ul class="dropdown-items menu-open5">
                           <li>
                              <a href="{{url('wholesale/small-business-owners')}}">Small Business Owners </a>
                           </li>
                           <li>
                              <a href="{{url('wholesale/custom-merchandise')}}">Custom Merchandise</a>
                           </li>
                           <li>
                              <a href="{{url('wholesale/large-distributors')}}">Large distributors</a>
                           </li>
                           <li>
                              <a href="{{url('wholesale/interior-design-studio')}}">Interior Design Studio</a>
                           </li>
                           <li>
                              <a href="{{url('wholesale/faire')}}">Faire</a>
                           </li>
                        </ul> 
                     </li>
                  </ul>
                  <div class="hidden-logo">
                     <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png')}}" alt="Logo"></a>
                  </div>
                  <ul class="main-menu right-main-menu">
                     <li class="menu-click2"> <a href="javascript::" >Social Impact <span><i class="fas fa-chevron-down"></i></span></a> 
                        <ul class="dropdown-items menu-open2">
                           <li>
                              <a href="javascript:;">I love School program </a>
                           </li>
                           <li>
                              <a href="{{route('women_program')}}">The Women's Program</a>
                           </li>
                           <li>
                              <a href="javascript:;"> Preventing Human Trafficking </a>
                           </li>
                           <li>
                              <a href="javascript:;"> Sustainable Practices </a>
                           </li>
                        </ul>
                     </li>
                     <li> <a href="{{route('blogs')}}">Blog</a> </li>
                     <li> <a href="{{route('contact-us')}}">Contact Us</a> </li>
                     
                     <li class="right-menu">
                        <div class="search_bar hidden-xs">
                           <div class="lv_search_bar" id="search_button">
                              <a href="javascript:void(0);">
                                 <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17C11.9333 17 13.6819 16.2176 14.9497 14.9497C16.2176 13.6819 17 11.9333 17 10C17 6.13401 13.866 3 10 3ZM1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10C19 12.1246 18.2628 14.0784 17.0319 15.6176L22.7071 21.2929C23.0976 21.6834 23.0976 22.3166 22.7071 22.7071C22.3166 23.0976 21.6834 23.0976 21.2929 22.7071L15.6176 17.0319C14.0784 18.2628 12.1246 19 10 19C5.02944 19 1 14.9706 1 10Z" fill=""/>
                                    </svg>
                                 </span>
                              </a>
                           </div>
                           <div id="search_open" class="lv_search_box" style="display: none;">
                              <input type="text" placeholder="Search here" class="search">
                              <button><i class="fa fa-search" aria-hidden="true"></i>
                              </button>
                           </div>
                        </div>
                     </li>
                     <li class="right-menu">
                        <a class="cart-toggle" href="javascript:void(0)">
                           <small><span class="total_count">0</span></small>
                           <span>
                              <svg width="27" height="23" viewBox="0 0 27 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M26.4898 5.53765C26.2288 5.20052 25.8932 4.92854 25.5093 4.74309C25.1254 4.55764 24.7037 4.46378 24.2773 4.4689H8.45234L7.08359 1.98452C6.86274 1.59614 6.54196 1.27396 6.15455 1.0514C5.76714 0.828848 5.32723 0.714041 4.88047 0.718898H1.68359C1.43495 0.718898 1.1965 0.81767 1.02068 0.993486C0.844866 1.1693 0.746094 1.40776 0.746094 1.6564C0.746094 1.90504 0.844866 2.14349 1.02068 2.31931C1.1965 2.49513 1.43495 2.5939 1.68359 2.5939H4.88047C4.99142 2.58915 5.10169 2.61347 5.20035 2.66444C5.29901 2.71542 5.38265 2.79128 5.44297 2.88452L6.98984 5.69702L7.79609 14.4345C7.90416 15.3392 8.35122 16.1692 9.04714 16.7573C9.74306 17.3454 10.6361 17.6477 11.5461 17.6033H21.268C22.0719 17.6236 22.8603 17.3797 23.5122 16.9089C24.1642 16.4381 24.6437 15.7665 24.8773 14.997L26.9117 7.66577C27.012 7.3027 27.026 6.92123 26.9528 6.55176C26.8795 6.18229 26.721 5.83503 26.4898 5.53765ZM25.1211 7.15015L23.0867 14.4908C22.96 14.8665 22.7134 15.1902 22.3848 15.412C22.0562 15.6339 21.6638 15.7417 21.268 15.7189H11.5086C11.0704 15.751 10.6358 15.6191 10.2893 15.3489C9.94284 15.0786 9.70914 14.6893 9.63359 14.2564L8.93047 6.3439H24.2773C24.4143 6.34252 24.55 6.37119 24.6747 6.42788C24.7994 6.48457 24.9102 6.56791 24.9992 6.67202C25.0552 6.73685 25.0953 6.81377 25.1164 6.89674C25.1376 6.97971 25.1392 7.06646 25.1211 7.15015Z" fill=""/>
                                 <path d="M11.9961 22.2812C13.0316 22.2812 13.8711 21.4418 13.8711 20.4062C13.8711 19.3707 13.0316 18.5312 11.9961 18.5312C10.9606 18.5312 10.1211 19.3707 10.1211 20.4062C10.1211 21.4418 10.9606 22.2812 11.9961 22.2812Z" fill=""/>
                                 <path d="M21.3711 22.2812C22.4066 22.2812 23.2461 21.4418 23.2461 20.4062C23.2461 19.3707 22.4066 18.5312 21.3711 18.5312C20.3356 18.5312 19.4961 19.3707 19.4961 20.4062C19.4961 21.4418 20.3356 22.2812 21.3711 22.2812Z" fill=""/>
                              </svg>
                           </span>
                        </a>
                     </li>
                     <li class="right-menu  menu-click3">
                        <a href="javascript::">
                           <span>
                              <svg enable-background="new 0 0 500 500" width="34" height="34" id="Layer_1" version="1.1" viewBox="0 0 500 500" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M250,291.6c-52.8,0-95.8-43-95.8-95.8s43-95.8,95.8-95.8s95.8,43,95.8,95.8S302.8,291.6,250,291.6z M250,127.3    c-37.7,0-68.4,30.7-68.4,68.4s30.7,68.4,68.4,68.4s68.4-30.7,68.4-68.4S287.7,127.3,250,127.3z"/></g><g><path d="M386.9,401.1h-27.4c0-60.4-49.1-109.5-109.5-109.5s-109.5,49.1-109.5,109.5h-27.4c0-75.5,61.4-136.9,136.9-136.9    S386.9,325.6,386.9,401.1z"/></g></g></svg>
                           </span>
                        </a>
                        <ul class="login-drop dropdown-items menu-open3">
                        @if(Session::has('5ferns_user'))
                        
                           <li>
                              <a href="{{ url('dashboard') }}"> <span>
                                 <svg id="Layer_1" width="35" height="25" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><title>Trade_Icons</title><polygon points="10.95 15.84 -0.05 15.84 -0.05 0.17 10.95 0.17 10.95 4.05 9.95 4.05 9.95 1.17 0.95 1.17 0.95 14.84 9.95 14.84 9.95 12.01 10.95 12.01 10.95 15.84"/><rect x="5" y="8" width="6" height="1"/><polygon points="11 5.96 15.4 8.5 11 11.04 11 5.96"/></svg></span> User Dashboard</a>
                           </li>
                           <li>
                              <a href="{{ url('logout') }}"> <span><svg id="Layer_1" width="35" height="25" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><title>Trade_Icons</title><polygon points="10.95 15.84 -0.05 15.84 -0.05 0.17 10.95 0.17 10.95 4.05 9.95 4.05 9.95 1.17 0.95 1.17 0.95 14.84 9.95 14.84 9.95 12.01 10.95 12.01 10.95 15.84"/><rect x="5" y="8" width="6" height="1"/><polygon points="11 5.96 15.4 8.5 11 11.04 11 5.96"/></svg></span> Logout</a>
                           </li>
                        @else
                           <li>
                              <a href="{{ url('login') }}"> <span> <svg enable-background="new 0 0 500 500" width="34" height="34" id="Layer_1" version="1.1" viewBox="0 0 500 500" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M250,291.6c-52.8,0-95.8-43-95.8-95.8s43-95.8,95.8-95.8s95.8,43,95.8,95.8S302.8,291.6,250,291.6z M250,127.3    c-37.7,0-68.4,30.7-68.4,68.4s30.7,68.4,68.4,68.4s68.4-30.7,68.4-68.4S287.7,127.3,250,127.3z"/></g><g><path d="M386.9,401.1h-27.4c0-60.4-49.1-109.5-109.5-109.5s-109.5,49.1-109.5,109.5h-27.4c0-75.5,61.4-136.9,136.9-136.9    S386.9,325.6,386.9,401.1z"/></g></g></svg></span> Login</a>
                           </li>
                        @endif
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
            <!-- responsive menu bar start -->
            <div class="mobile-menu-wrapper d-xl-none d-lg-none d-md-block d-sm-block">
               <div class="container custom-container">
                  <div class="row">
                     <div class=" col-md-4 col-sm-4 col-6">
                        <div class="mobile-logo">
                           <a href="{{ url('/') }}">
                           <img src="{{ asset('assets/images/logo.png')}}" alt="logo">
                           </a>
                        </div>
                     </div>
                     <div class="col-md-8 col-sm-8 col-6">
                        <div class="d-flex  justify-content-end">
                           <div class="social-media-icons">
                              <ul class="main-menu">
                                 <li class="right-menu">
                                    <div class="search_bar hidden-xs">
                                       <div class="lv_search_bar" id="search_button1">
                                          <a href="javascript:;">
                                             <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17C11.9333 17 13.6819 16.2176 14.9497 14.9497C16.2176 13.6819 17 11.9333 17 10C17 6.13401 13.866 3 10 3ZM1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10C19 12.1246 18.2628 14.0784 17.0319 15.6176L22.7071 21.2929C23.0976 21.6834 23.0976 22.3166 22.7071 22.7071C22.3166 23.0976 21.6834 23.0976 21.2929 22.7071L15.6176 17.0319C14.0784 18.2628 12.1246 19 10 19C5.02944 19 1 14.9706 1 10Z" fill=""></path>
                                                </svg>
                                             </span>
                                          </a>
                                       </div>
                                       <div id="search_open1" class="lv_search_box" style="display: block;">
                                          <input type="text" placeholder="Search here" class="search">
                                          <button><i class="fa fa-search" aria-hidden="true"></i>
                                          </button>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="right-menu">
                                    <a class="cart-toggle" href="javascript::">
                                       <small><span class="total_count">0</span></small>
                                       <span>
                                          <svg width="27" height="23" viewBox="0 0 27 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M26.4898 5.53765C26.2288 5.20052 25.8932 4.92854 25.5093 4.74309C25.1254 4.55764 24.7037 4.46378 24.2773 4.4689H8.45234L7.08359 1.98452C6.86274 1.59614 6.54196 1.27396 6.15455 1.0514C5.76714 0.828848 5.32723 0.714041 4.88047 0.718898H1.68359C1.43495 0.718898 1.1965 0.81767 1.02068 0.993486C0.844866 1.1693 0.746094 1.40776 0.746094 1.6564C0.746094 1.90504 0.844866 2.14349 1.02068 2.31931C1.1965 2.49513 1.43495 2.5939 1.68359 2.5939H4.88047C4.99142 2.58915 5.10169 2.61347 5.20035 2.66444C5.29901 2.71542 5.38265 2.79128 5.44297 2.88452L6.98984 5.69702L7.79609 14.4345C7.90416 15.3392 8.35122 16.1692 9.04714 16.7573C9.74306 17.3454 10.6361 17.6477 11.5461 17.6033H21.268C22.0719 17.6236 22.8603 17.3797 23.5122 16.9089C24.1642 16.4381 24.6437 15.7665 24.8773 14.997L26.9117 7.66577C27.012 7.3027 27.026 6.92123 26.9528 6.55176C26.8795 6.18229 26.721 5.83503 26.4898 5.53765ZM25.1211 7.15015L23.0867 14.4908C22.96 14.8665 22.7134 15.1902 22.3848 15.412C22.0562 15.6339 21.6638 15.7417 21.268 15.7189H11.5086C11.0704 15.751 10.6358 15.6191 10.2893 15.3489C9.94284 15.0786 9.70914 14.6893 9.63359 14.2564L8.93047 6.3439H24.2773C24.4143 6.34252 24.55 6.37119 24.6747 6.42788C24.7994 6.48457 24.9102 6.56791 24.9992 6.67202C25.0552 6.73685 25.0953 6.81377 25.1164 6.89674C25.1376 6.97971 25.1392 7.06646 25.1211 7.15015Z" fill=""></path>
                                             <path d="M11.9961 22.2812C13.0316 22.2812 13.8711 21.4418 13.8711 20.4062C13.8711 19.3707 13.0316 18.5312 11.9961 18.5312C10.9606 18.5312 10.1211 19.3707 10.1211 20.4062C10.1211 21.4418 10.9606 22.2812 11.9961 22.2812Z" fill=""></path>
                                             <path d="M21.3711 22.2812C22.4066 22.2812 23.2461 21.4418 23.2461 20.4062C23.2461 19.3707 22.4066 18.5312 21.3711 18.5312C20.3356 18.5312 19.4961 19.3707 19.4961 20.4062C19.4961 21.4418 20.3356 22.2812 21.3711 22.2812Z" fill=""></path>
                                          </svg>
                                       </span>
                                    </a>
                                 </li>
                                 <li class="right-menu">
                                    <a href="javascript::">
                                       <span>
                                          <svg enable-background="new 0 0 500 500" width="34" height="34" id="Layer_1" version="1.1" viewBox="0 0 500 500" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M250,291.6c-52.8,0-95.8-43-95.8-95.8s43-95.8,95.8-95.8s95.8,43,95.8,95.8S302.8,291.6,250,291.6z M250,127.3    c-37.7,0-68.4,30.7-68.4,68.4s30.7,68.4,68.4,68.4s68.4-30.7,68.4-68.4S287.7,127.3,250,127.3z"></path></g><g><path d="M386.9,401.1h-27.4c0-60.4-49.1-109.5-109.5-109.5s-109.5,49.1-109.5,109.5h-27.4c0-75.5,61.4-136.9,136.9-136.9    S386.9,325.6,386.9,401.1z"></path></g></g></svg>
                                       </span>
                                    </a>
                                    <ul class="login-drop">
                                       @if(Session::has('5ferns_user'))
                        
                                          <li>
                                             <a href="{{ url('dashboard') }}"> <span>
                                                <svg id="Layer_1" width="35" height="25" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><title>Trade_Icons</title><polygon points="10.95 15.84 -0.05 15.84 -0.05 0.17 10.95 0.17 10.95 4.05 9.95 4.05 9.95 1.17 0.95 1.17 0.95 14.84 9.95 14.84 9.95 12.01 10.95 12.01 10.95 15.84"/><rect x="5" y="8" width="6" height="1"/><polygon points="11 5.96 15.4 8.5 11 11.04 11 5.96"/></svg></span> Dashboard</a>
                                          </li>
                                          <li>
                                             <a href="{{ url('logout') }}"> <span><svg id="Layer_1" width="35" height="25" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><title>Trade_Icons</title><polygon points="10.95 15.84 -0.05 15.84 -0.05 0.17 10.95 0.17 10.95 4.05 9.95 4.05 9.95 1.17 0.95 1.17 0.95 14.84 9.95 14.84 9.95 12.01 10.95 12.01 10.95 15.84"/><rect x="5" y="8" width="6" height="1"/><polygon points="11 5.96 15.4 8.5 11 11.04 11 5.96"/></svg></span> Logout</a>
                                          </li>
                                       @else
                                          <li>
                                             <a href="{{ url('login') }}"> <span> <svg enable-background="new 0 0 500 500" width="34" height="34" id="Layer_1" version="1.1" viewBox="0 0 500 500" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M250,291.6c-52.8,0-95.8-43-95.8-95.8s43-95.8,95.8-95.8s95.8,43,95.8,95.8S302.8,291.6,250,291.6z M250,127.3    c-37.7,0-68.4,30.7-68.4,68.4s30.7,68.4,68.4,68.4s68.4-30.7,68.4-68.4S287.7,127.3,250,127.3z"/></g><g><path d="M386.9,401.1h-27.4c0-60.4-49.1-109.5-109.5-109.5s-109.5,49.1-109.5,109.5h-27.4c0-75.5,61.4-136.9,136.9-136.9    S386.9,325.6,386.9,401.1z"/></g></g></svg></span> Login</a>
                                          </li>
                                       @endif
                                       
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                           <div class="d-flex align-items-center">
                              <div class="toggle-main-wrapper" id="sidebar-toggle">
                                 <span class="line"></span>
                                 <span class="line"></span>
                                 <span class="line"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar">
               <div class="sidebar_logo">
                  <a href="{{ url('/') }}"><img src="{{ asset('assets/images/white-logo.png')}}" alt=""></a>
                  </div>
               <div id="toggle_close">&times;</div>
               <div id='cssmenu'>
                  <ul class="float_left">
                     <li><a href="{{ url('/') }}">Home</a></li>
                     <li><a href="javascript:;">Shop</a></li>
                     <li class="has-sub"><a href="javascript:;">Our Story</a>
                        <ul>
                           <li><a href="{{url('about')}}">About Us</a></li>
                           <li><a href="{{url('our-artisan')}}">Meet the Artisans</a></li>
                        </ul>
                     </li>
                     <li class="has-sub"> <a href="javascript:void(0)">Wholesale </a>
                        <ul >
                           <li>
                              <a href="{{url('wholesale/small-business-owners')}}">Small Business Owners </a>
                           </li>
                           <li>
                              <a href="{{url('wholesale/custom-merchandise')}}">Custom Merchandise</a>
                           </li>
                           <li>
                              <a href="{{url('wholesale/large-distributors')}}">Large distributors</a>
                           </li>
                           <li>
                              <a href="{{url('wholesale/interior-design-studio')}}">Interior Design Studio</a>
                           </li>
                           <li>
                              <a href="{{url('wholesale/faire')}}">Faire</a>
                           </li>
                        </ul> 
                     </li>
                     <li class="has-sub">
                        <a href="">Social Impact</a>
                        <ul>
                           <li><a href="javascript:;">I love School program</a></li>
                           <li><a href="{{route('women_program')}}">The Women's Program</a></li>
                           <li><a href="javascript:;">Preventing Human Trafficking</a></li>
                           <li><a href="javascript:;">Sustainable Practices</a></li>
                        </ul>
                     </li>
                     <li><a href="{{route('blogs')}}">Blog</a></li>
                     <li class="border-none"><a href="{{route('contact-us')}}">Contact Us</a></li>
                    
                  </ul>
                  
               </div>
               <div class="language-category-wrapper">
                  <ul>
                     <li>
                        <div class="price-select">
                           <span><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_151_1358)">
                              <path d="M10 0.09375C7.67936 0.09375 5.45376 1.01562 3.81282 2.65657C2.17187 4.29751 1.25 6.52311 1.25 8.84375C1.25 15.2938 7.73125 19.0313 9.71875 20.025C9.80517 20.0679 9.90037 20.0903 9.99687 20.0903C10.0934 20.0903 10.1886 20.0679 10.275 20.025C12.2688 19.0313 18.75 15.2938 18.75 8.84375C18.75 6.52311 17.8281 4.29751 16.1872 2.65657C14.5462 1.01562 12.3206 0.09375 10 0.09375ZM10 18.7688C7.9125 17.675 2.5 14.3063 2.5 8.84375C2.5 6.85463 3.29018 4.94697 4.6967 3.54045C6.10322 2.13393 8.01088 1.34375 10 1.34375C11.9891 1.34375 13.8968 2.13393 15.3033 3.54045C16.7098 4.94697 17.5 6.85463 17.5 8.84375C17.5 14.3063 12.0875 17.675 10 18.7688Z" fill="white"></path>
                              <path d="M10.3937 3.98086C10.2829 3.89211 10.1451 3.84375 10.0031 3.84375C9.86112 3.84375 9.72335 3.89211 9.6125 3.98086L6.4875 6.48086C6.41384 6.53906 6.35424 6.61311 6.31312 6.69751C6.27201 6.78191 6.25043 6.87448 6.25 6.96836V11.9684C6.25 12.1341 6.31585 12.2931 6.43306 12.4103C6.55027 12.5275 6.70924 12.5934 6.875 12.5934H13.125C13.2908 12.5934 13.4497 12.5275 13.5669 12.4103C13.6842 12.2931 13.75 12.1341 13.75 11.9684V6.96836C13.7503 6.87499 13.7297 6.78273 13.6897 6.69837C13.6497 6.61401 13.5913 6.53968 13.5187 6.48086L10.3937 3.98086ZM12.5 11.3434H11.25V9.46836C11.25 9.3026 11.1842 9.14363 11.0669 9.02642C10.9497 8.90921 10.7908 8.84336 10.625 8.84336H9.375C9.20924 8.84336 9.05027 8.90921 8.93306 9.02642C8.81585 9.14363 8.75 9.3026 8.75 9.46836V11.3434H7.5V7.26836L10 5.26836L12.5 7.26836V11.3434Z" fill="white"></path>
                              </g>
                              <defs>
                              <clipPath id="clip0_151_1358">
                              <rect width="20" height="20" fill="white" transform="translate(0 0.09375)"></rect>
                              </clipPath>
                              </defs>
                              </svg>
                              </span>
                              
                              <select class="form-select countryType" aria-label="Default select example" id="" name="country_type">
                                 <option @if(Session::get('country_type') == '3') selected @endif value="3">Canada</option>
                                 <option @if(Session::get('country_type') == '2') selected @endif value="2">USA</option>
                                 <option @if(Session::get('country_type') == '1') selected @endif value="1">Rest of the World</option>
                              </select>
                           
                        </div>
                     </li>
                     <li>
                        <div class="price-select">
                           <span><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M13.125 7.59375V6.34375H10.625V4.46875H9.375V6.34375H8.125C7.79358 6.34408 7.47583 6.47588 7.24148 6.71023C7.00713 6.94458 6.87533 7.26233 6.875 7.59375V9.46875C6.87533 9.80017 7.00713 10.1179 7.24148 10.3523C7.47583 10.5866 7.79358 10.7184 8.125 10.7188H11.875V12.5938H6.875V13.8438H9.375V15.7188H10.625V13.8438H11.875C12.2064 13.8434 12.5242 13.7116 12.7585 13.4773C12.9929 13.2429 13.1247 12.9252 13.125 12.5938V10.7188C13.1247 10.3873 12.9929 10.0696 12.7585 9.83523C12.5242 9.60088 12.2064 9.46908 11.875 9.46875H8.125V7.59375H13.125Z" fill="white"></path>
                              <path d="M10 2.59375C11.4834 2.59375 12.9334 3.03362 14.1668 3.85773C15.4001 4.68184 16.3614 5.85318 16.9291 7.22362C17.4968 8.59407 17.6453 10.1021 17.3559 11.5569C17.0665 13.0118 16.3522 14.3482 15.3033 15.3971C14.2544 16.4459 12.918 17.1602 11.4632 17.4496C10.0083 17.739 8.50032 17.5905 7.12988 17.0228C5.75943 16.4552 4.58809 15.4939 3.76398 14.2605C2.93987 13.0272 2.5 11.5771 2.5 10.0938C2.50578 8.1064 3.2978 6.2021 4.70308 4.79682C6.10835 3.39155 8.01266 2.59952 10 2.59375ZM10 1.34375C8.26942 1.34375 6.57769 1.85693 5.13876 2.81839C3.69983 3.77985 2.57832 5.14642 1.91606 6.74527C1.25379 8.34412 1.08051 10.1035 1.41813 11.8008C1.75575 13.4981 2.58911 15.0572 3.81282 16.2809C5.03653 17.5046 6.59563 18.338 8.29296 18.6756C9.9903 19.0132 11.7496 18.84 13.3485 18.1777C14.9473 17.5154 16.3139 16.3939 17.2754 14.955C18.2368 13.5161 18.75 11.8243 18.75 10.0938C18.7432 7.77519 17.8192 5.55351 16.1797 3.91403C14.5402 2.27455 12.3186 1.35051 10 1.34375Z" fill="white"></path>
                              </svg>
                              </span>
                              
                              <select class="form-select currency" aria-label="Default select example" id="" name="currency">
                                 <option @if(Session::get('country_id') == '1') selected @endif value="1">INR</option>
                                 <option @if(Session::get('country_id') == '2') selected @endif value="2">USD</option>
                                 <option @if(Session::get('country_id') == '3') selected @endif value="3">CAD</option>

                              </select>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            <!-- responsive menu End -->
         </div>
      </div>
      <!-- header end -->


    @yield('content')

    <footer class="va-footer-wrapper">
         <div class="footer-top" id="Subscribe_Section">
            <div class="post-icon">
               <span>
                  <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M47.1175 4.90039H8.35355C6.78578 4.90619 5.28388 5.53155 4.17529 6.64014C3.06671 7.74872 2.44134 9.25062 2.43555 10.8184V38.5824C2.44134 40.1502 3.06671 41.6521 4.17529 42.7606C5.28388 43.8692 6.78578 44.4946 8.35355 44.5004H13.4355V52.2224C13.435 52.4372 13.5001 52.647 13.6219 52.8239C13.7438 53.0008 13.9167 53.1363 14.1175 53.2124C14.2551 53.2436 14.398 53.2436 14.5355 53.2124C14.8217 53.2096 15.0964 53.0998 15.3055 52.9044L24.1055 44.4124H47.2055C48.7429 44.3842 50.2095 43.7609 51.2968 42.6736C52.384 41.5863 53.0073 40.1198 53.0355 38.5824V10.8184C53.0298 9.25062 52.4044 7.74872 51.2958 6.64014C50.1872 5.53155 48.6853 4.90619 47.1175 4.90039ZM50.8355 38.5824C50.8355 39.0706 50.7394 39.5541 50.5525 40.0052C50.3657 40.4563 50.0918 40.8662 49.7466 41.2114C49.4013 41.5567 48.9915 41.8305 48.5404 42.0174C48.0893 42.2042 47.6058 42.3004 47.1175 42.3004H23.5555C23.2694 42.3031 22.9947 42.413 22.7855 42.6084L15.6355 49.6264V43.3784C15.6356 43.235 15.607 43.093 15.5514 42.9607C15.4959 42.8285 15.4145 42.7086 15.3121 42.6082C15.2096 42.5079 15.0882 42.4289 14.9548 42.376C14.8215 42.3232 14.679 42.2975 14.5355 42.3004H8.35355C7.36747 42.3004 6.42178 41.9087 5.72452 41.2114C5.02726 40.5142 4.63555 39.5685 4.63555 38.5824V10.8184C4.63555 9.83232 5.02726 8.88663 5.72452 8.18937C6.42178 7.49211 7.36747 7.10039 8.35355 7.10039H47.1175C47.6058 7.10039 48.0893 7.19656 48.5404 7.38341C48.9915 7.57025 49.4013 7.84412 49.7466 8.18937C50.0918 8.53462 50.3657 8.94448 50.5525 9.39557C50.7394 9.84666 50.8355 10.3301 50.8355 10.8184V38.5824Z" fill="#296769"/>
                     <path d="M48.4587 9.78455C48.2934 9.54192 48.0395 9.37378 47.7516 9.3162C47.4637 9.25861 47.1647 9.31618 46.9187 9.47655L27.7347 22.2806L8.55073 9.47655C8.30567 9.31318 8.00575 9.25385 7.71694 9.31161C7.42814 9.36937 7.17411 9.53949 7.01073 9.78455C6.84736 10.0296 6.78803 10.3295 6.84579 10.6183C6.90355 10.9071 7.07367 11.1612 7.31873 11.3246L27.1187 24.5246C27.3036 24.6396 27.517 24.7006 27.7347 24.7006C27.9525 24.7006 28.1659 24.6396 28.3507 24.5246L48.1507 11.3246C48.3934 11.1592 48.5615 10.9053 48.6191 10.6174C48.6767 10.3295 48.6191 10.0305 48.4587 9.78455Z" fill="#296769"/>
                     <path d="M20.2995 22.8744L7.09952 38.2744C6.89657 38.4837 6.78308 38.7638 6.78308 39.0554C6.78308 39.347 6.89657 39.6271 7.09952 39.8364C7.32285 40.0253 7.61111 40.1195 7.90289 40.0989C8.19466 40.0784 8.46687 39.9447 8.66152 39.7264L21.8615 24.3264C22.0504 24.1031 22.1446 23.8148 22.1241 23.523C22.1035 23.2313 21.9698 22.9591 21.7515 22.7644C21.536 22.607 21.2714 22.5317 21.0053 22.5519C20.7391 22.572 20.4889 22.6864 20.2995 22.8744Z" fill="#296769"/>
                     <path d="M35.1716 22.8744C34.9769 22.6561 34.7047 22.5224 34.4129 22.5019C34.1212 22.4813 33.8329 22.5755 33.6096 22.7644C33.3912 22.959 33.2576 23.2313 33.237 23.523C33.2165 23.8148 33.3107 24.1031 33.4996 24.3264L46.6996 39.7264C46.8942 39.9447 47.1664 40.0784 47.4582 40.0989C47.75 40.1195 48.0382 40.0253 48.2616 39.8364C48.4799 39.6417 48.6136 39.3695 48.6341 39.0778C48.6546 38.786 48.5604 38.4977 48.3716 38.2744L35.1716 22.8744Z" fill="#296769"/>
                  </svg>
               </span>
               <div class="footer-get">
                  <h4>Get Your Latest Update</h4>
                  <p>Subscribe now to get 15% off on any product</p>
               </div>
            </div>
            <div class="input-box">
               <form action="{{ route('subscribe') }}" method="post"  id="newsletterSubscribe" class="formsubmit">
                                @csrf
                  <input type="email" name="email"  required class="form-control" placeholder="Your Mail Address">
                  <span style="top: 27px;"> <button id="newsletterSubscribeSubmit">Subscribe
                                            <pre
                                                class="spinner-border spinner-border-sm newsletterSubscribeLoader" style="display:none"></pre></button> </span>
               </form>
            </div>
         </div>
         <div class="footer-content">
            <div class="footerlinks logo-footer-links">
               <div class="logo-footer">
                  <a href="javascript:;"><img src="{{ asset('assets/images/white-logo.png')}}" alt="img"></a>
               </div>
               <p> <span>Join the tribe..</span>
                  Find us on our socials  to connect and stay in the loop. 
               </p>
               <div class="social-footer">
                  <a href="javascript:;"> <span><svg width="18" height="18" viewBox="0 0 266 513" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M172.7 512.1C141.5 512.1 110.3 512.1 79.0002 512.1C78.9002 510 78.6002 507.8 78.6002 505.7C78.6002 432.5 78.6002 359.3 78.6002 286.1C78.6002 284 78.6002 281.8 78.6002 279.1C52.2002 279.1 26.4002 279.1 0.700195 279.1C0.700195 248.4 0.700195 218.4 0.700195 187.9C26.7002 187.9 52.4002 187.9 78.6002 187.9C78.6002 185.5 78.6002 183.5 78.6002 181.6C78.6002 162.8 78.2003 144 78.8003 125.2C79.2003 112.5 79.8003 99.4998 82.4003 87.0998C91.8003 43.1998 118.4 15.2997 162.3 4.69974C182.7 -0.300258 203.5 0.799767 224.2 1.59977C237.9 2.09977 251.7 3.19979 265.4 3.99979C265.4 31.2998 265.4 58.5998 265.4 85.8998C245.7 86.1998 225.9 86.1998 206.2 86.8998C189.4 87.3998 178.2 96.4998 174.3 112.4C173.3 116.5 172.8 120.9 172.7 125.2C172.5 144.7 172.6 164.1 172.6 183.6C172.6 185 172.8 186.4 172.9 188.3C202.8 188.3 232.3 188.3 262.2 188.3C258.3 218.9 254.4 248.9 250.4 279.5C224.3 279.5 198.6 279.5 172.5 279.5C172.5 282 172.5 283.9 172.5 285.9C172.5 351.4 172.5 416.9 172.5 482.4C172.6 492.2 172.7 502.2 172.7 512.1Z" fill=""></path>
                     </svg></span> </a>
                  <a href="javascript:;"> <span><svg width="18" height="18" viewBox="0 0 513 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M512.9 129.5C512.9 214 512.9 298.5 512.9 383C512 388 511.4 393.1 510.2 398.1C496.8 455.1 461.9 491.7 405.4 507.6C398.4 509.6 391.1 510.4 383.9 511.8C299.2 511.8 214.6 511.8 129.9 511.8C124.8 510.9 119.7 510.3 114.7 509.1C57.5999 495.7 20.8999 460.9 5.09991 404.4C3.09991 397.4 2.2999 390.2 0.899902 383C0.899902 298.5 0.899902 214 0.899902 129.5C1.7999 124.5 2.59991 119.4 3.59991 114.4C17.2999 47.8999 74.4999 0.899943 142.5 0.799943C218.8 0.599943 295.1 0.699919 371.4 0.899919C380.7 0.899919 390.2 1.49987 399.1 3.59987C456.2 16.7999 492.9 51.6999 508.7 108.1C510.6 115.1 511.5 122.3 512.9 129.5ZM46.6999 255.7C46.5999 255.7 46.4999 255.7 46.4999 255.7C46.4999 293 46.4999 330.2 46.4999 367.5C46.4999 378.9 47.6999 390 51.2999 400.9C63.5999 437.9 99.3999 466.7 144.8 466.4C219.5 465.9 294.1 466.3 368.8 466.3C380 466.3 391 465 401.7 461.5C438.9 449.2 467.6 413.5 467.3 368.1C466.8 293.6 467.2 219.1 467.2 144.5C467.2 133.3 465.9 122.3 462.4 111.6C450 74.3999 414.2 45.7999 368.9 46.0999C294.2 46.5999 219.6 46.2998 144.9 46.1998C132.1 46.1998 119.8 48.0999 107.7 52.4999C73.0999 65.2999 47.3999 100.1 46.8999 136.9C46.2999 176.5 46.6999 216.1 46.6999 255.7Z" fill=""></path>
                     <path d="M388.8 256.3C388.8 328.8 329.5 387.9 256.9 388C184.1 388 124.7 328.6 124.9 256C125.1 183.5 184.5 124.5 257 124.6C329.6 124.6 388.8 183.8 388.8 256.3ZM343.1 256.4C343.3 208.7 304.8 170.2 256.9 170.1C209.3 170 171 208 170.6 255.7C170.2 303.3 208.6 342 256.5 342.2C304.2 342.6 342.9 304.2 343.1 256.4Z" fill=""></path>
                     <path d="M394.2 152.5C375.8 152.4 360.8 137.3 360.9 119.1C361.1 101.1 376.1 86.1996 394.2 86.0996C412.3 85.8996 427.7 101.2 427.7 119.4C427.8 137.6 412.6 152.6 394.2 152.5Z" fill=""></path>
                     </svg></span> </a>
                  <a href="javascript:;"> <span><svg width="18" height="18" viewBox="0 0 395 326" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M113.7 255.5C107.8 254.2 101.8 253.1 95.9002 251.4C76.2002 245.6 61.4002 233.4 50.5002 216.3C47.8002 212.1 45.7002 207.6 43.8002 203C42.0002 198.5 43.0002 197.6 47.9002 197.7C54.7002 197.8 61.5002 197.7 68.3002 197.5C69.8002 197.5 71.3002 197 74.2002 196.5C67.5002 193.5 62.1002 191.6 57.1002 188.9C35.9002 177.4 21.9002 160 15.9002 136.5C14.7002 131.7 13.9002 126.8 13.3002 121.8C12.6002 116.2 14.8002 114.7 19.9002 117.4C27.1002 121.2 34.8002 122.9 42.7002 123.8C43.4002 123.9 44.2002 123.6 46.1002 123.4C44.3002 121.4 43.2002 119.9 41.8002 118.6C27.2002 105.5 18.4002 89.5 15.2002 70C12.3002 52.5 15.8002 36.5 22.7002 20.7C24.3002 17 26.7002 16.6 29.4002 19.9C42.6002 35.8999 58.1002 49.3999 75.2002 61.0999C92.4002 72.8999 110.8 82 130.6 88.8C148.6 95 167.1 98.7 186 100.5C193.5 101.2 193.8 100.8 192.7 93.4C187.5 59.4 206.8 25.2999 236.5 9.89995C253.3 1.19995 270.8 -1.10005 288.8 1.39995C297.5 2.59995 305.8 7.49995 313.8 11.7C319.6 14.7 324.8 19.0999 329.8 23.2999C332.7 25.7999 335.5 26.2 338.9 25.2C352.6 21.3 366.2 17 378.7 9.99995C380.1 9.19995 382 9.09995 383.6 8.69995C383.4 10.6 383.7 12.6 383 14.2C377.1 27.9 368.4 39.3999 356.1 48C355.7 48.2999 355.5 48.7999 354.5 50.2C368.7 49.5 380.7 44 393.2 40.5C393.5 40.9 393.8 41.2999 394.1 41.7C393.4 43.1 392.8 44.7 391.9 46C382.8 58.3999 372 69.2 360 78.7C357.1 81 356.1 83.7 356.2 87.3C357 118.3 351.4 148.2 340.1 176.9C323.9 218.4 298.5 253.5 262.7 280.5C246.1 293 228.1 303.1 208.4 310.4C192.3 316.4 175.6 319.6 158.9 323.2C138.5 327.6 118.3 324.9 98.1002 325.3C92.8002 325.4 87.4002 323.1 82.1002 322.1C62.1002 318.3 42.9002 312.3 24.4002 303.8C17.8002 300.8 11.5002 297 5.10019 293.5C3.50019 292.6 2.1002 291.1 0.700195 289C42.5002 291.1 80.6002 281.8 114.1 256.8C114.1 256.5 113.9 256 113.7 255.5Z" fill=""></path>
                     </svg></span> </a>
               </div>
            </div>
            <div class="footerlinks">
               <h4>About Us</h4>
               <ul>
                  <li>
                     <a href="javascript:;">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Our Story
                     </a>
                  </li>
                  <li>
                     <a href="javascript:;">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Social Impact
                     </a>
                  </li>
                  <li>
                     <a href="{{route('blogs')}}">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Blog
                     </a>
                  </li>
                 
               </ul>
            </div>
            <div class="footerlinks">
               <h4>Our Tribe</h4>
               <ul>
                  <li>
                     <a href="javascript:;">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                       Our Stores
                     </a>
                  </li>
                  <li>
                     <a href="javascript:;">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Meet the Team
                     </a>
                  </li>
                  <li>
                     <a href="javascript:;">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Meet the Artisans
                     </a>
                  </li>
                  <li>
                     <a href="{{url('term-condition')}}">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Term & Condition
                     </a>
                  </li>
                  <li>
                     <a href="{{url('privacy-policy')}}">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Privacy & Policy
                     </a>
                  </li>
                  
               </ul>
            </div>
            <div class="footerlinks">
               <h4>Meet the Artisans</h4>
               <ul>
                  <li>
                     <a href="javascript:;">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Joint the Movement
                     </a>
                  </li>
                  <li>
                     <a href="javascript:;">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        My Account
                     </a>
                  </li>
                  <li>
                     <a href="javascript:;">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Contact Sales Team
                     </a>
                  </li>
                  <li>
                     <a href="{{route('login')}}">
                        <span>
                           <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0705 6.09264L6.46838 0.49054C6.39265 0.414815 6.29331 0.377703 6.19435 0.378453C6.19135 0.378453 6.1891 0.376953 6.1861 0.376953H0.56301C0.35608 0.376953 0.188137 0.544896 0.188137 0.751826C0.188137 0.754825 0.189637 0.757074 0.189637 0.760073C0.189262 0.859039 0.226374 0.958381 0.301724 1.03411L5.64216 6.37454L0.290477 11.7262C0.140153 11.8765 0.140153 12.1202 0.290477 12.2705C0.379697 12.3598 0.500781 12.3894 0.616617 12.3729H6.13137C6.2472 12.3894 6.36829 12.3598 6.45751 12.2705L12.0701 6.65795C12.1481 6.57997 12.1837 6.47726 12.1807 6.37492C12.1837 6.27333 12.1481 6.17061 12.0705 6.09264ZM6.01666 11.6231H1.4822L6.44701 6.65832C6.52498 6.58035 6.5606 6.47763 6.5576 6.37529C6.5606 6.27333 6.52498 6.17061 6.44701 6.09264L1.48145 1.1267H6.01778L11.2656 6.37454L6.01666 11.6231Z" fill="white"/>
                           </svg>
                        </span>
                        Login
                     </a>
                  </li>
                  
               </ul>
            </div>
            <div class="footerlinks">
               <!-- <h4>News Letter</h4>
               <p>Wants to get latest updates! Sign up a for free. get started with store.</p> -->
               <h4>Lets Connect</h4>
              
               <div class="footer-addres-wrapper">
                  <div class="footer-icon">
                     <span>
                        <img src="{{ asset('assets/images/main.png')}}" alt="img">
                        </span>
                  </div>
                  <div class="footer-text">
                     <p><a href = "mailto: abc@example.com">transformation@villageartisan.com</a></p>
                  </div>
               </div>
               <div class="footer-addres-wrapper">
                  <div class="footer-icon">
                     <span>
                       <img src="{{ asset('assets/images/main-open.png')}}" alt="img">
                           
                        </span>
                  </div>
                  <div class="footer-text">
                     <p><a href="#Subscribe_Section">News Letter</a></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom-line-wrapper">
            <div class="bottom-text">
               <p>Together writing a global story of change</p>
            </div>
         </div>
      </footer>
      <div class="copy-right-wrapper">
         <div class="container custom-container">
            <div class="bottom-footer">
               <p>Copyright © 2022 - Village Artisian. All rights reserved.</p>
            </div>
         </div>
      </div>
      <!-- footer section end -->
               <!-- Modal -->
     

   <script src="{{ asset('js/jquery.min.js') }}"></script>
    
    <script>
         $(window).scroll(function () {
               if ($(window).scrollTop() >= 200) {
                  $('.main-header').addClass('header-fixed');
               } else {
                  $('.main-header').removeClass('header-fixed');
               }
         });

         $(document).ready(function() {
            
               $('.currency').on('change', function() {
                 
                  $.ajax({
                     type: "POST",
                     dataType: "json",
                     url: baseUrl +'/',
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     data: { "currency": $(this).val() },
                     beforeSend:function(){
                        
                     },
                     error:function(xhr,textStatus){
                        
                        if(xhr && xhr.responseJSON.message){
                           showMsg('error', xhr.responseJSON.message);
                        }else{
                           showMsg('error', xhr.statusText);
                        }
                     },
                     success: function(data){
                        if(data.reset){
                           window.location.reload();
                        }
                     }
                  });

               });
         });

         
            $('.countryType').on('change', function() {
                
                 $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: baseUrl +'/',
                    headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { "country_type": $(this).val() },
                    beforeSend:function(){
                       
                    },
                    error:function(xhr,textStatus){
                       
                       if(xhr && xhr.responseJSON.message){
                          showMsg('error', xhr.responseJSON.message);
                       }else{
                          showMsg('error', xhr.statusText);
                       }
                    },
                    success: function(data){
                       if(data.reset){
                          window.location.reload();
                       }
                    }
               });
            });
    </script>


    <div style='z-index:1051;' class="toast" data-autohide="true">
        <div class="toast-body">

        </div>
    </div>

    <div class="modal fade" id="notify" tabindex="-1" role="dialog" aria-labelledby="notifyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notifyModalLabel">Notify</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('notify-product') }}" method="post" id="notify" class="">
                    @csrf
                    <input type='email' value="@if(Session::has('5ferns_result')){{ (Session::get('5ferns_result'))['email'] }}@endif"  name='email' class="form-control mb-ctm" required placeholder="Enter Email"/>
                   <button type='submit' class="modal-form-btn subs-btn spinner-btn btn" id="notifySubmit">Submit
                        <pre class="spinner-border spinner-border-sm " id="notifyLoader"></pre>
                    </button>

                </form>
            </div>
            </div>
        </div>
    </div>


      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="productDetail">
               
            </div>
         </div>
      </div>

    <script src="{{ asset('js/common.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/wow.js')}}"></script>
    <script src="{{ asset('assets/js/tesi.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/home-js/camera.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/home-js/jquery.easing.1.3.js')}}"></script> 
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>
    
    <script src="{{ asset('js/fSelect.js') }}"></script>
    <script>


        $(document).ready(function () {
            @if(Session::has('5fernsuser_error'))
            showMsg('error', "{{ Session::get('5fernsuser_error') }}");
            @elseif(Session::has('5fernsuser_success'))
            showMsg('success', "{{ Session::get('5fernsuser_success') }}");
            @endif

            addToCart();
            getProductDetail();

            getTotalCartProduct();
        });
    </script>
    <script>

            
      $(document).ready(function () {
         $(".menu-click5").click(function () {
            $(".menu-open5").slideToggle();
         });
         $('body').on('click', function (e) {
            if (!$('.menu-click5').is(e.target)
                  && $('.menu-click5').has(e.target).length === 0
                  && $('.open').has(e.target).length === 0
            ) {
                  $('.menu-open5').slideUp();
            }
         });
      });

      $('#search_button').on("click", function(e) {
         $('#search_open').slideToggle();
         e.stopPropagation(); 
      });
      
      $(document).on("click", function(e){
         if(!(e.target.closest('#search_open'))){  
            $("#search_open").slideUp();        
         }
      });
   </script>
   <script>
      $('#search_button1').on("click", function(e) {
         $('#search_open1').slideToggle();
         e.stopPropagation(); 
      });

      $(document).on("click", function(e){
         if(!(e.target.closest('#search_open1'))){  
            $("#search_open1").slideUp();        
         }
      });
</script>
    <script>
        $(document).ready(function () {
            $(".mobile-search").click(function () {
                $(".search-box").toggle();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".mob-menu").click(function () {
                $(".categories").toggle();
            });
        });
    </script>
    <script>
        //test for getting url value from attr
        // var img1 = $('.test').attr("data-thumbnail");
        // console.log(img1);

        //test for iterating over child elements
        var langArray = [];
        $('.vodiapicker option').each(function () {
            var img = $(this).attr("data-thumbnail");
            var text = this.innerText;
            var value = $(this).val();
            var item = '<li><img src="' + img + '" alt="" value="' + value + '"/><span>' + text +
            '</span></li>';
            langArray.push(item);
        })

        $('#a').html(langArray);

        //Set the button value to the first el of the array
        $('.btn-select').html(langArray["{{Session::get('country_id')-1}}"]);
        $('.btn-select').attr('value', 'en');

        //change button stuff on click
        $('#a li').click(function () {
            var img = $(this).find('img').attr("src");
            var value = $(this).find('img').attr('value');
            var text = this.innerText;
            var item = '<li><img src="' + img + '" alt="" /><span>' + text + '</span></li>';
            $('.btn-select').html(item);
            $('.btn-select').attr('value', value);
            $('#currency').val(value);
            $(".b").toggle();
            $(this).closest('form').submit();
            //console.log(value);
        });

        $(".btn-select").click(function () {
            $(".b").toggle();
        });

        //check local storage for the lang
        var sessionLang = localStorage.getItem('lang');
        if (sessionLang) {
            //find an item with value of sessionLang
            var langIndex = langArray.indexOf(sessionLang);
            $('.btn-select').html(langArray[langIndex]);
            $('.btn-select').attr('value', sessionLang);
        } else {
            var langIndex = langArray.indexOf('ch');
            console.log(langIndex);
            $('.btn-select').html(langArray[langIndex]);
            //$('.btn-select').attr('value', 'en');
        }
    </script>


    @stack('custom_js')

    <script>
         $('.dropdown').on('click', function () {
            $('.dropdown-menu').toggleClass('show')
         })
      </script>
      <script>
         $(document).ready(function() {
              $('.popup-youtube').magnificPopup({
              type: 'iframe'
            });
          });
      </script>
      <!-- cart toggle -->

   <script>
      $(document).ready(function () {
         $(".cart-toggle").click(function () {
            
            $(".cart-details").addClass("open");
         }); 
         
         $(".cart-close").click(function () {
            
            $(".cart-details").removeClass("open");
         });
      });
   </script>
  
   <script>
      $(document).ready(function(){
        $(".search-box").click(function(){
              if($(this).hasClass('search-input')) {
              $(this).removeClass('search-input');
          } else {
              $(this).addClass('search-input');
          }
        });
      });
   </script>
      <!-- slider -->

     <script>
      jQuery(function(){
			
			jQuery('#camera_wrap_1').camera({
				thumbnails: true,
				height: '40%'
			});

			
		});
   </script>

   <script>
        function increaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
            }

            function decreaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('number').value = value;
            }
   </script>


   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
   <script>
        $(document).ready(function () {

            $(".search").autocomplete({
               source: "{{ route('searchproduct-byname') }}",
               minLength: 2,
               select: function (event, ui) {
                  if (ui.item.value != 'no') {
                        location.href = ui.item.link;
                  }
                  return false;
               }
            });
            
        });
    </script>

    
   <script>
      function sharePost(type,url){ 

         if(type=='facebook'){
         window.open( 
            "https://www.facebook.com/sharer/sharer.php?u="+url, 
            "_blank", "width=600, height=450"); 
         }else if(type=='twitter'){
         window.open( 
            "https://twitter.com/intent/tweet?url="+url, 
            "_blank", "width=600, height=450"); 
         }else if(type=='linkedin'){
         window.open( 
            "https://www.linkedin.com/shareArticle?mini=true&url="+url, 
            "_blank", "width=600, height=450"); 
         }else if(type=='pinterest'){
         window.open( 
            "https://pinterest.com/pin/create/button/?url="+url, 
            "_blank", "width=600, height=450"); 
         }
         else if(type=='instagram'){
         window.open( 
            "https://www.instagram.com/?url="+url, 
            "_blank", "width=600, height=450"); 
         }
         else if(type=='google'){
         window.open( 
            'https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=&su=Propira&body=http://www.rajasthansainikschool.com/&ui=2&tf=1&pli=1?', 
            "_blank", "width=600, height=450"); 
         }else if(type=='whatsup'){
         var number = '+919694097243';
         var message = url.split(' ').join('%20');
         window.open( 
            "https://api.whatsapp.com/send?text=%20" + ''+message, 
            "_blank", "width=600, height=450"); 
         }
      }

      
   </script>
</body>

</html>