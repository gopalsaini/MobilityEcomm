<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | 4MOBILITY </title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="title" content="@yield('title')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('custom_css')

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/glightbox.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets1/css/jquery-ui.css')}}" />
    
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}" /> -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    <link rel='stylesheet' href='https://unpkg.com/fullpage.js/dist/fullpage.min.css'>
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
         .goog-logo-link{
            display:none;
         }
        div.goog-te-gadget {
            color: transparent !important;
        }
        .language__switcher {
            font-size: 1.6rem;
            line-height: 0px !important;
        }
        .goog-te-combo, .goog-te-banner *, .goog-te-ftab *, .goog-te-menu *, .goog-te-menu2 *, .goog-te-balloon * {
            font-family: arial;
            font-size: 12pt !important;
        }
        .goog-te-gadget .goog-te-combo {
            margin: -2px 0 !important;
        }
        .account__currency--link {
            font-size: 13px;
            line-height: 2rem !important;
        }
        .account__menu--list {
            background-color: #006237;
            padding: 10px;
            color: #fff;
        }

        .account__menu--list a:hover {
            text-decoration: none;
            color: #ffffff;
        }
        .address-box {
            padding: 10px;
            margin: 4px;
            background-color: #a0ffd63d;
        }
        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
             background: #006237 !important;
        }
        .ui-widget-header {
             background: #006237 !important;
        }
        
        </style>

        <!-- dark mode chnage css -->
        <style> 
            
            .change { 
                cursor: pointer; 
                border: 1px solid #555; 
                border-radius: 10%; 
                width: 20px; 
                text-align: center; 
                padding: 8px; 
                margin-left: 8px; 
            } 
            .dark{ 
                background-color: #222; 
                color: #e6e6e6; 
            } 
            .dark .header__sticky.sticky{ 
                background-color: #222; 
                color: #e6e6e6; 
            }
            .dark .header__mega--menu{ 
                background-color: #222; 
                color: #e6e6e6; 
            }
            .dark .shipping__section--inner{ 
                background-color: #222; 
                color: #e6e6e6; 
            }
            .dark .offCanvas__minicart{ 
                background-color: #222; 
                color: #fff; 
            }
            .dark .bg__gray--color{ 
                background-color: #222; 
                color: #fff; 
            }
            .dark .widget__form--check__label{ 
                background-color: #222; 
                color: #fff; 
            }
            .dark .testimonial__bg--two{ 
                background-color: #222; 
                color: #fff; 
            }
            .dark .testimonial__items--style2{ 
                background-color: #222; 
                color: #fff; 
            }
            .dark .contact__form{ 
                background-color: #222; 
                color: #fff; 
            }
            .dark .product__details--tab__section{ 
                background-color: #222; 
                color: #fff; 
            }
            .dark .account__login{ 
                background-color: #000; 
                color: #fff; 
            }
            .dark .footer__bg{ 
                background-color: #222; 
                color: #e6e6e6; 
                background: url(../img/banner/footer-bg.webp);
                background-repeat: no-repeat;
                background-attachment: scroll;
                background-position: center center;
                background-size: cover;
            }
            .dark h1{ 
                color: #fff;         
            } 
            .dark .header__menu--link{ 
                color: #fff;         
            }  
            .dark .header__account--btn{ 
                color: #fff;         
            }  
            .dark .current__price{ 
                color: #fff;         
            }  
            .dark .blog__content--desc{ 
                color: #fff;         
            }  
            .dark .blog__content--meta__text{ 
                color: #fff;         
            }  
            .dark .testimonial__items--desc{ 
                color: #fff;         
            }  
            .dark .footer__widget--title{ 
                color: #fff;         
            }   
            .dark .footer__widget--desc{ 
                color: #fff;         
            }    
            .dark .footer__widget--menu__text{ 
                color: #fff;         
            }    
            .dark .copyright__content{ 
                color: #fff;         
            }    
            .dark .copyright__content--link{ 
                color: #fff;         
            }     
            .dark .footer__newsletter--desc{ 
                color: #fff;         
            }     
            .dark .widget__title{ 
                color: #fff;         
            }     
            .dark .about__content--desc{ 
                color: #fff;         
            }      
            .dark .contact__section--hrading__desc{ 
                color: #fff;         
            }       
            .dark .product__details--info__desc{ 
                color: #fff;         
            }        
            .dark .product__details--tab__list.active{ 
                color: #fff;         
            }
        </style> 
    <!-- end dark mode chnage -->
        
    <script>
        var baseUrl = "{{ url('/') }}";

        var loading_set =
            '<div style="text-align:center;width:100%;height:200px; position:relative;top:100px;"><i style="color:black;font-size:25px;" class="fa fa-refresh fa-spin fa-3x fa-fw"></i><p>Please wait</p></div>';

        var userLogin = "{{ Session::has('5ferns_user') }}";
    </script>
</head>

<body class="mode">
         

   
   <header class="header__section header__transparent">

        <!-- Start top header area -->
        <div class="header__topbar " style="background: #006237;">
            <div class="container-fluid">
                <div class="header__topbar--inner d-flex align-items-center justify-content-between">
                    <div class="header__shipping">
                        <ul class="d-flex align-items-center">
                            <li class="language__currency--list">
                                <a class="account__currency--link text-white" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="currentColor" width="15px">
                                        <path d="M50 8.1c23.2 0 41.9 18.8 41.9 41.9 0 23.2-18.8 41.9-41.9 41.9C26.8 91.9 8.1 73.2 8.1 50S26.8 8.1 50 8.1M50 0C22.4 0 0 22.4 0 50s22.4 50 50 50 50-22.4 50-50S77.6 0 50 0zm0 11.3c-21.4 0-38.7 17.3-38.7 38.7S28.6 88.7 50 88.7 88.7 71.4 88.7 50 71.4 11.3 50 11.3zm0 8.9c4 0 7.3 3.2 7.3 7.3S54 34.7 50 34.7s-7.3-3.2-7.3-7.3 3.3-7.2 7.3-7.2zm23.7 19.7c-5.8 1.4-11.2 2.6-16.6 3.2.2 20.4 2.5 24.8 5 31.4.7 1.9-.2 4-2.1 4.7-1.9.7-4-.2-4.7-2.1-1.8-4.5-3.4-8.2-4.5-15.8h-2c-1 7.6-2.7 11.3-4.5 15.8-.7 1.9-2.8 2.8-4.7 2.1-1.9-.7-2.8-2.8-2.1-4.7 2.6-6.6 4.9-11 5-31.4-5.4-.6-10.8-1.8-16.6-3.2-1.7-.4-2.8-2.1-2.4-3.9.4-1.7 2.1-2.8 3.9-2.4 19.5 4.6 25.1 4.6 44.5 0 1.7-.4 3.5.7 3.9 2.4.7 1.8-.3 3.5-2.1 3.9z"></path>
                                    </svg>
                                    <span>Accessibility</span> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.797" height="9.05" viewBox="0 0 9.797 6.05">
                                        <path  d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                    </svg>
                                </a>
                                <div class="dropdown__currency" style="width: 144px;">
                                    <ul style="width: 159px;padding: 10px;"> 
                                        <li class="currency__items">
                                            <a class="zoomin"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1em" viewBox="0 0 448 448"><path fill="currentColor" d="M256 200v16c0 4.25-3.75 8-8 8h-56v56c0 4.25-3.75 8-8 8h-16c-4.25 0-8-3.75-8-8v-56h-56c-4.25 0-8-3.75-8-8v-16c0-4.25 3.75-8 8-8h56v-56c0-4.25 3.75-8 8-8h16c4.25 0 8 3.75 8 8v56h56c4.25 0 8 3.75 8 8zM288 208c0-61.75-50.25-112-112-112s-112 50.25-112 112 50.25 112 112 112 112-50.25 112-112zM416 416c0 17.75-14.25 32-32 32-8.5 0-16.75-3.5-22.5-9.5l-85.75-85.5c-29.25 20.25-64.25 31-99.75 31-97.25 0-176-78.75-176-176s78.75-176 176-176 176 78.75 176 176c0 35.5-10.75 70.5-31 99.75l85.75 85.75c5.75 5.75 9.25 14 9.25 22.5z"></path></svg>
                                                Increase Text
                                            </a>
                                        </li>
                                        
                                        <li class="currency__items"><a class="zoomout">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1em" viewBox="0 0 448 448"><path fill="currentColor" d="M256 200v16c0 4.25-3.75 8-8 8h-144c-4.25 0-8-3.75-8-8v-16c0-4.25 3.75-8 8-8h144c4.25 0 8 3.75 8 8zM288 208c0-61.75-50.25-112-112-112s-112 50.25-112 112 50.25 112 112 112 112-50.25 112-112zM416 416c0 17.75-14.25 32-32 32-8.5 0-16.75-3.5-22.5-9.5l-85.75-85.5c-29.25 20.25-64.25 31-99.75 31-97.25 0-176-78.75-176-176s78.75-176 176-176 176 78.75 176 176c0 35.5-10.75 70.5-31 99.75l85.75 85.75c5.75 5.75 9.25 14 9.25 22.5z"></path></svg>
                                            Decrease Text</a>
                                        </li>
                                            
                                        <li class="currency__items"><a class="high-contrast" >
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1em" viewBox="0 0 448 448"><path fill="currentColor" d="M192 360v-272c-75 0-136 61-136 136s61 136 136 136zM384 224c0 106-86 192-192 192s-192-86-192-192 86-192 192-192 192 86 192 192z"></path></svg>
                                            High Constract</a>
                                        </li class="currency__items">
                                            <li class="currency__items"><a class="links-underline">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1em" viewBox="0 0 448 448"><path fill="currentColor" d="M416 240c-23.75-36.75-56.25-68.25-95.25-88.25 10 17 15.25 36.5 15.25 56.25 0 61.75-50.25 112-112 112s-112-50.25-112-112c0-19.75 5.25-39.25 15.25-56.25-39 20-71.5 51.5-95.25 88.25 42.75 66 111.75 112 192 112s149.25-46 192-112zM236 144c0-6.5-5.5-12-12-12-41.75 0-76 34.25-76 76 0 6.5 5.5 12 12 12s12-5.5 12-12c0-28.5 23.5-52 52-52 6.5 0 12-5.5 12-12zM448 240c0 6.25-2 12-5 17.25-46 75.75-130.25 126.75-219 126.75s-173-51.25-219-126.75c-3-5.25-5-11-5-17.25s2-12 5-17.25c46-75.5 130.25-126.75 219-126.75s173 51.25 219 126.75c3 5.25 5 11 5 17.25z"></path></svg>
                                            Links Underline</a></li>
                                            <li class="currency__items"><a class="readable-font">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1em" viewBox="0 0 448 448"><path fill="currentColor" d="M364 304c0-6.5-2.5-12.5-7-17l-52-52c-4.5-4.5-10.75-7-17-7-7.25 0-13 2.75-18 8 8.25 8.25 18 15.25 18 28 0 13.25-10.75 24-24 24-12.75 0-19.75-9.75-28-18-5.25 5-8.25 10.75-8.25 18.25 0 6.25 2.5 12.5 7 17l51.5 51.75c4.5 4.5 10.75 6.75 17 6.75s12.5-2.25 17-6.5l36.75-36.5c4.5-4.5 7-10.5 7-16.75zM188.25 127.75c0-6.25-2.5-12.5-7-17l-51.5-51.75c-4.5-4.5-10.75-7-17-7s-12.5 2.5-17 6.75l-36.75 36.5c-4.5 4.5-7 10.5-7 16.75 0 6.5 2.5 12.5 7 17l52 52c4.5 4.5 10.75 6.75 17 6.75 7.25 0 13-2.5 18-7.75-8.25-8.25-18-15.25-18-28 0-13.25 10.75-24 24-24 12.75 0 19.75 9.75 28 18 5.25-5 8.25-10.75 8.25-18.25zM412 304c0 19-7.75 37.5-21.25 50.75l-36.75 36.5c-13.5 13.5-31.75 20.75-50.75 20.75-19.25 0-37.5-7.5-51-21.25l-51.5-51.75c-13.5-13.5-20.75-31.75-20.75-50.75 0-19.75 8-38.5 22-52.25l-22-22c-13.75 14-32.25 22-52 22-19 0-37.5-7.5-51-21l-52-52c-13.75-13.75-21-31.75-21-51 0-19 7.75-37.5 21.25-50.75l36.75-36.5c13.5-13.5 31.75-20.75 50.75-20.75 19.25 0 37.5 7.5 51 21.25l51.5 51.75c13.5 13.5 20.75 31.75 20.75 50.75 0 19.75-8 38.5-22 52.25l22 22c13.75-14 32.25-22 52-22 19 0 37.5 7.5 51 21l52 52c13.75 13.75 21 31.75 21 51z"></path></svg>
                                            Links without Underline</a></li>
                                            
                                    </ul>
                                </div>
                            </li>
                            <li class="language__currency--list">
                                <a class="language__switcher google-trans-element text-white" href="#" id="google_translate_element_2">
                                    
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start main header area -->
        <div class="main__header header__sticky">
            <div class="container-fluid">
                <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                            <span class="visually-hidden">Menu Open</span>
                        </a>
                    </div>
                    <div class="main__logo">
                        <h1 class="main__logo--title"><a class="main__logo--link descktopview" href="{{url('/')}}"><img class="main__logo--img" src="{{ asset('assets/img/logo/nav-log.png')}}" alt="logo-img" style="max-width: 39%;"></a></h1>
                    </div>
                    <div class="header__menu d-none d-lg-block">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                 <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{url('/')}}">Home </a>
                                </li>
                                <li class="header__menu--items mega__menu--items">
                                    <a class="header__menu--link" href="javascript:void(0)">Shop <span class="menu__plus--icon">+</span></a>
                                    
                                       @if(!empty($category))
                                          <ul class="header__mega--menu d-flex">
                                                @foreach($category['result'] as $cat)
                                                   <li class="header__mega--menu__li">
                                                         <span class="header__mega--subtitle"><a href="{{ url('product-listing/'.$cat['slug']) }}">{{ ucfirst($cat['name']) }}</a></span>
                                                         @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                                            <ul class="header__mega--sub__menu">
                                                               @foreach($cat['child'] as $fchild)
                                                                  <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="{{ url('product-listing/'.$fchild['slug']) }}">{{ ucfirst($fchild['name'] )}}</a></li>
                                                               @endforeach
                                                            </ul>
                                                         @endif
                                                   </li>
                                                @endforeach  
                                          </ul>
                                       @endif
                                    
                                </li>
                                <li class="header__menu--items mega__menu--items">
                                    <a class="header__menu--link" href="javascript:void(0)">Hire <span class="menu__plus--icon">+</span></a>
                                    
                                       @if(!empty($category))
                                          <ul class="header__mega--menu d-flex">
                                                @foreach($category['result'] as $cat)
                                                   <li class="header__mega--menu__li">
                                                         <span class="header__mega--subtitle"><a href="{{ url('product-listing/'.$cat['slug'].'?type=hire') }}">{{ ucfirst($cat['name']) }}</a></span>
                                                         @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                                            <ul class="header__mega--sub__menu">
                                                               @foreach($cat['child'] as $fchild)
                                                                  <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="{{ url('product-listing/'.$fchild['slug'].'?type=hire') }}">{{ ucfirst($fchild['name'] )}}</a></li>
                                                               @endforeach
                                                            </ul>
                                                         @endif
                                                   </li>
                                                @endforeach  
                                          </ul>
                                       @endif
                                    
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{ url('about')}}">About US </a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{url('blogs')}}">Blogs</a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{ url('contact-us')}}">Contact </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header__account">
                        <ul class="d-flex">
                            <li class="header__account--items  header__account--search__items d-md-none">
                                <a class="header__account--btn search__open--btn" href="javascript:void(0)">
                                    <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  
                                    <span class="visually-hidden">Search</span>
                                </a>
                            </li>
                            @if(Session::has('5ferns_user'))
                              <li class="header__account--items">
                                 <a class="header__account--btn" href="{{ url('dashboard') }}">
                                       <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                                       <span class="visually-hidden">My Account</span>
                                 </a>
                              </li>
                              
                              <li class="header__account--items">
                                 <a class="header__account--btn" href="{{ url('logout') }}"> <span><svg id="Layer_1" width="25" height="20" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><title>Trade_Icons</title><polygon points="10.95 15.84 -0.05 15.84 -0.05 0.17 10.95 0.17 10.95 4.05 9.95 4.05 9.95 1.17 0.95 1.17 0.95 14.84 9.95 14.84 9.95 12.01 10.95 12.01 10.95 15.84"/><rect x="5" y="8" width="6" height="1"/><polygon points="11 5.96 15.4 8.5 11 11.04 11 5.96"/></svg></span> </a>
                              </li>
                           @else
                              <li class="header__account--items">
                                 <a class="header__account--btn" href="{{ url('login') }}"> <span> 
                                       <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                                       <span class="visually-hidden">My Account</span>
                                 </span> </a>
                              </li>
                           @endif
                            
                            <!-- <li class="header__account--items d-md-none">
                                <a class="header__account--btn" href="wishlist.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.526" height="21.82" viewBox="0 0 24.526 21.82">
                                        <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"/>
                                    </svg>
                                      
                                    <span class="items__count wishlist">02</span> 
                                </a>
                            </li> -->
                            <li class="header__account--items">
                                <a class="header__account--btn minicart__open--btn" href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.897" height="21.565" viewBox="0 0 18.897 21.565">
                                        <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"/>
                                    </svg>
                                    <span class="items__count total_count">0</span> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start category header area -->
        @if(!empty($category))
        <div class="header__topbar bg__primary d-none d-lg-block" style="background: #006237;">
            <div class="container-fluid">
                <div class="header__topbar--inner d-flex align-items-center justify-content-between">
                    
                    <div class="language__currency d-none d-lg-block">
                        
                        <ul class="d-flex align-items-center">
                            @foreach($category['result'] as $cat)
                                <li class="language__currency--list">
                                    <a class="account__currency--link text-white" href="#">
                                        <img class="language__switcher--icon__img" src="{{ asset('uploads/category/'.$cat['image']) }}" alt="{{ ucfirst($cat['name']) }}" style="width: 26px;">
                                        <span>{{ ucfirst($cat['name']) }}</span> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11.797" height="9.05" viewBox="0 0 9.797 6.05">
                                            <path  d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                        </svg>
                                    </a>
                                    <div class="dropdown__currency">
                                        <ul>
                                            <li class="currency__items"><a class="currency__text" href="#">CAD</a></li>
                                            <li class="currency__items"><a class="currency__text" href="#">CNY</a></li>
                                            <li class="currency__items"><a class="currency__text" href="#">EUR</a></li>
                                            <li class="currency__items"><a class="currency__text" href="#">GBP</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <div class="offcanvas-header" tabindex="-1">
            <div class="offcanvas__inner">
                <div class="offcanvas__logo">
                    <a class="offcanvas__logo_link" href="{{url('/')}}">
                        <img src="assets/img/logo/nav-log.png" alt="Furea Logo" style="max-width: 39%;">
                    </a>
                    <button class="offcanvas__close--btn" aria-label="offcanvas close btn">close</button>
                </div>
                <nav class="offcanvas__menu">
                    <ul class="offcanvas__menu_ul">
                        
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{ url('/')}}">Home</a></li>
                        <li class="offcanvas__menu_li">
                           <a class="offcanvas__menu_item" href="javascript:void(0)">Shop </a>
                           
                              @if(!empty($category))
                                 <ul class="offcanvas__sub_menu">
                                       @foreach($category['result'] as $cat)
                                          <li class="offcanvas__sub_menu_li">
                                                <span class="offcanvas__sub_menu_item">{{ ucfirst($cat['name']) }}</span>
                                                @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                                   <ul class="offcanvas__sub_menu">
                                                      @foreach($cat['child'] as $fchild)
                                                         <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"  href="{{ url('product-listing/'.$fchild['slug']) }}">{{ ucfirst($fchild['name'] )}}</a></li>
                                                      @endforeach
                                                   </ul>
                                                @endif
                                          </li>
                                       @endforeach  
                                 </ul>
                              @endif
                           
                        </li>
                        <li class="offcanvas__menu_li">
                           <a class="offcanvas__menu_item" href="javascript:void(0)">Hire </a>
                           
                              @if(!empty($category))
                                 <ul class="offcanvas__sub_menu">
                                       @foreach($category['result'] as $cat)
                                          <li class="offcanvas__sub_menu_li">
                                                <span class="offcanvas__sub_menu_item">{{ ucfirst($cat['name']) }}</span>
                                                @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                                   <ul class="offcanvas__sub_menu">
                                                      @foreach($cat['child'] as $fchild)
                                                         <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"  href="{{ url('product-listing/'.$fchild['slug']) }}">{{ ucfirst($fchild['name'] )}}</a></li>
                                                      @endforeach
                                                   </ul>
                                                @endif
                                          </li>
                                       @endforeach  
                                 </ul>
                              @endif
                           
                        </li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{ url('about')}}">About</a></li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{ url('blogs')}}">Blogs</a></li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{ url('contact-us')}}">Contact</a></li>
                    </ul>
                    <div class="offcanvas__account--items">
                        <a class="offcanvas__account--items__btn d-flex align-items-center" href="{{ url('login')}}">
                        <span class="offcanvas__account--items__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                            </span>
                        <span class="offcanvas__account--items__label">Login / Register</span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        
        <div class="offcanvas__stikcy--toolbar" tabindex="-1">
            <ul class="d-flex justify-content-between">
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{url('/')}}">
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443" viewBox="0 0 22 17"><path fill="currentColor" d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z"></path></svg>
                              </span>
                        <span class="offcanvas__stikcy--toolbar__label">Home</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{ url('products')}}">
                    <span class="offcanvas__stikcy--toolbar__icon"> 
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="18.51" height="17.443" viewBox="0 0 448 512"><path d="M416 32H32A32 32 0 0 0 0 64v384a32 32 0 0 0 32 32h384a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32zm-16 48v152H248V80zm-200 0v152H48V80zM48 432V280h152v152zm200 0V280h152v152z"></path></svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Shop</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list ">
                    <a class="offcanvas__stikcy--toolbar__btn search__open--btn" href="javascript:void(0)">
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>   
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Search</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn minicart__open--btn" href="javascript:void(0)">
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.51" height="15.443" viewBox="0 0 18.51 15.443">
                            <path  d="M79.963,138.379l-13.358,0-.56-1.927a.871.871,0,0,0-.6-.592l-1.961-.529a.91.91,0,0,0-.226-.03.864.864,0,0,0-.226,1.7l1.491.4,3.026,10.919a1.277,1.277,0,1,0,1.844,1.144.358.358,0,0,0,0-.049h6.163c0,.017,0,.034,0,.049a1.277,1.277,0,1,0,1.434-1.267c-1.531-.247-7.783-.55-7.783-.55l-.205-.8h7.8a.9.9,0,0,0,.863-.651l1.688-5.943h.62a.936.936,0,1,0,0-1.872Zm-9.934,6.474H68.568c-.04,0-.1.008-.125-.085-.034-.118-.082-.283-.082-.283l-1.146-4.037a.061.061,0,0,1,.011-.057.064.064,0,0,1,.053-.025h1.777a.064.064,0,0,1,.063.051l.969,4.34,0,.013a.058.058,0,0,1,0,.019A.063.063,0,0,1,70.03,144.853Zm3.731-4.41-.789,4.359a.066.066,0,0,1-.063.051h-1.1a.064.064,0,0,1-.063-.051l-.789-4.357a.064.064,0,0,1,.013-.055.07.07,0,0,1,.051-.025H73.7a.06.06,0,0,1,.051.025A.064.064,0,0,1,73.76,140.443Zm3.737,0L76.26,144.8a.068.068,0,0,1-.063.049H74.684a.063.063,0,0,1-.051-.025.064.064,0,0,1-.013-.055l.973-4.357a.066.066,0,0,1,.063-.051h1.777a.071.071,0,0,1,.053.025A.076.076,0,0,1,77.5,140.448Z" transform="translate(-62.393 -135.3)" fill="currentColor"/>
                            </svg> 
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Cart</span>
                        <span class="items__count total_count">0</span> 
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="wishlist.html">
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.541" height="15.557" viewBox="0 0 18.541 15.557">
                            <path  d="M71.775,135.51a5.153,5.153,0,0,1,1.267-1.524,4.986,4.986,0,0,1,6.584.358,4.728,4.728,0,0,1,1.174,4.914,10.458,10.458,0,0,1-2.132,3.808,22.591,22.591,0,0,1-5.4,4.558c-.445.282-.9.549-1.356.812a.306.306,0,0,1-.254.013,25.491,25.491,0,0,1-6.279-4.8,11.648,11.648,0,0,1-2.52-4.009,4.957,4.957,0,0,1,.028-3.787,4.629,4.629,0,0,1,3.744-2.863,4.782,4.782,0,0,1,5.086,2.447c.013.019.025.034.057.076Z" transform="translate(-62.498 -132.915)" fill="currentColor"/>
                            </svg> 
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Wishlist</span>
                        <span class="items__count wishlist__count">0</span> 
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="offCanvas__minicart" tabindex="-1">
            <div class="minicart__header ">
                <div class="minicart__header--top d-flex justify-content-between align-items-center">
                    <h3 class="minicart__title"> Shopping Cart</h3>
                    <button class="minicart__close--btn" aria-label="minicart close btn">
                        <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
                    </button>
                </div>
                <!-- <p class="minicart__header--desc">The organic foods products are limited</p> -->
            </div>
            <span id="headerCartSection">

            </span>
            
        </div>
       
        <div class="predictive__search--box " tabindex="-1">
            <div class="predictive__search--box__inner">
                <h2 class="predictive__search--title">Search Products</h2>
                <form class="predictive__search--form" action="#">
                    <label>
                        <input class="predictive__search--input search" placeholder="Search Here" type="text">
                    </label>
               </form>
            </div>
            <button class="predictive__search--close__btn" aria-label="search close btn">
                <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51" height="30.443"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
            </button>
        </div>
      
    </header>
   

    @yield('content')

    <footer class="footer__section footer__bg">
        <div class="container-fluid">
            <div class="main__footer">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title d-none d-md-block">About Us <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__widget--inner">
                                <a class="footer__logo" href="{{url('/')}}"><img src="{{ asset('assets/img/logo/nav-log.png')}}" alt="footer-logo" style="max-width: 39%;"></a>
                                <p class="footer__widget--desc">Ut enim ad minim veniam, quis <br> nostrud exercitation ullamco laboris <br> nisi ut aliquip ex ea commodo.</p>
                                <div class="footer__social">
                                    <ul class="social__shear d-flex">
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" target="_blank" href="https://www.facebook.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.239" height="20.984" viewBox="0 0 11.239 20.984">
                                                    <path id="Icon_awesome-facebook-f" data-name="Icon awesome-facebook-f" d="M11.575,11.8l.583-3.8H8.514V5.542A1.9,1.9,0,0,1,10.655,3.49h1.657V.257A20.2,20.2,0,0,0,9.371,0c-3,0-4.962,1.819-4.962,5.112V8.006H1.073v3.8H4.409v9.181H8.514V11.8Z" transform="translate(-1.073)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" target="_blank" href="https://twitter.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19.492" viewBox="0 0 24 19.492">
                                                    <path id="Icon_awesome-twitter" data-name="Icon awesome-twitter" d="M21.533,7.112c.015.213.015.426.015.64A13.9,13.9,0,0,1,7.553,21.746,13.9,13.9,0,0,1,0,19.538a10.176,10.176,0,0,0,1.188.061,9.851,9.851,0,0,0,6.107-2.1,4.927,4.927,0,0,1-4.6-3.411,6.2,6.2,0,0,0,.929.076,5.2,5.2,0,0,0,1.294-.167A4.919,4.919,0,0,1,.975,9.168V9.107A4.954,4.954,0,0,0,3.2,9.731,4.926,4.926,0,0,1,1.675,3.152,13.981,13.981,0,0,0,11.817,8.3,5.553,5.553,0,0,1,11.7,7.173a4.923,4.923,0,0,1,8.513-3.365A9.684,9.684,0,0,0,23.33,2.619,4.906,4.906,0,0,1,21.167,5.33,9.861,9.861,0,0,0,24,4.569a10.573,10.573,0,0,1-2.467,2.543Z" transform="translate(0 -2.254)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" target="_blank" href="https://www.instagram.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19.497" height="19.492" viewBox="0 0 19.497 19.492">
                                                    <path id="Icon_awesome-instagram" data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Instagram</span>
                                            </a>
                                        </li>
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" target="_blank" href="https://www.linkedin.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19.419" height="19.419" viewBox="0 0 19.419 19.419">
                                                    <path id="Icon_awesome-linkedin-in" data-name="Icon awesome-linkedin-in" d="M4.347,19.419H.321V6.454H4.347ZM2.332,4.686A2.343,2.343,0,1,1,4.663,2.332,2.351,2.351,0,0,1,2.332,4.686ZM19.415,19.419H15.4V13.108c0-1.5-.03-3.433-2.093-3.433-2.093,0-2.414,1.634-2.414,3.325v6.42H6.869V6.454H10.73V8.223h.056A4.23,4.23,0,0,1,14.6,6.129c4.075,0,4.824,2.683,4.824,6.168v7.122Z" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Linkedin</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Quick Links <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('about')}}">About Us</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('contact')}}">Contact Us</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{url('term-condition')}}">Term & Condition</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Account Info <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('blogs')}}">Blogs</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="cart.html">Shopping Cart</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('login')}}">Login</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{url('register')}}">Register</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Newsletter <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__newsletter footer__widget--inner">
                                <p class="footer__newsletter--desc">Get updates by subscribe our weekly newsletter</p>
                                <form action="{{ route('subscribe') }}" method="post"  id="newsletterSubscribe" class="formsubmit newsletter__subscribe--form__style position__relative" >
                                    <label>
                                        <input class="footer__newsletter--input newsletter__subscribe--input" placeholder="Enter your email address" type="email" name="email">
                                    </label>
                                    <button class="footer__newsletter--button newsletter__subscribe--button primary__btn" type="submit" id="newsletterSubscribeSubmit">Subscribe
                                        <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg" width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                            <path  data-name="Icon material-send" d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z" transform="translate(-3 -4.5)" fill="currentColor"/>
                                        </svg> <pre
                                                class="spinner-border spinner-border-sm newsletterSubscribeLoader" style="display:none"></pre>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom d-flex justify-content-between align-items-center">
                <p class="copyright__content  m-0">Copyright © 2022 <a class="copyright__content--link" href="{{url('/')}}">MobilityEcom</a> . All Rights Reserved.Design By Gopal Saini</p>
                <div class="footer__payment text-right">
                    <img class="footer__payment--visa__card display-block" src="assets/img/other/payment-visa-card.webp" alt="visa-card">
                </div>
            </div>
        </div>
    </footer>



    <script src="{{ asset('js/jquery.min.js') }}"></script>
    
    <div style='z-index:1051;' class="toast" data-autohide="true">
        <div class="toast-body">

        </div>
    </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="productDetail">
               
            </div>
         </div>
      </div>

      <button aria-label="scroll top btn" id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>


      <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js')}}" defer="defer"></script>
    <script src="{{ asset('assets/js/plugins/glightbox.min.js')}}" defer="defer"></script>
    <script src="{{ asset('assets/js/script.js')}}" defer="defer"></script>
    <script src="{{ asset('js/fSelect.js') }}"></script>
    
    <script src="{{ asset('assets/js/rangeSlider.js')}}"></script>
    
    <script src="{{ asset('assets/js/range.js')}}"></script>
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
    
    @stack('custom_js')

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

    <script type="text/javascript">
        function googleTranslateElementInit2() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element_2');
        var removePopup = document.getElementById('goog-gt-tt');
        removePopup.parentNode.removeChild(removePopup);
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

    <script src="https://www.accessfoundation.com.au/js/vendors/color-switcher.js"></script>
    <script src="https://www.accessfoundation.com.au/js/fontsize.js?v=0.1121"></script>
    <script>
        $(document).ready(function(){
        
        $(".zoomout").css("pointer-events", "none");
        $(".high-contrast").click(function(){
                $('section,footer,body,.container-fluid.back-header').toggleClass('high-contrast-color');
                $('.accessibility-tool-constract').toggleClass('high-contrast-color');
            

        });
        $(".links-underline").click(function(){
                $('a').toggleClass('underline');
        });
        $(".readable-font").click(function(){
            $('option,select,button,a,span,p,h1,h2,h3,h4,h5,h6,span,section,footer,body,div').toggleClass("ubuntu-font-family");
        });
        $(".reset-accessibility").click(function(){
            $('section,footer,body,.container-fluid.back-header').removeClass('high-contrast-color');
                $('.accessibility-tool-constract').removeClass('high-contrast-color');
            $('a').removeClass('underline');
            $('option,select,button,a,span,p,h1,h2,h3,h4,h5,h6,span,section,footer,body,div').css("font-size","");
            $(".zoomout").css("pointer-events", "none");
            $('option,select,button,a,span,p,h1,h2,h3,h4,h5,h6,span,section,footer,body,div').removeClass("ubuntu-font-family");
            $('a').removeClass("negative-contrast-color");
            $('section,footer,body,.container-fluid.back-header,.dropdownemail,.dropdownphone').removeClass('negative-contrast-color-bg');
            $('.accessibility-tool-constract').removeClass('negative-contrast-color-bg');

        });
        $(".zoomin").click(function(){
                $(".zoomout").removeAttr("disabled");
                $(".zoomout").css("pointer-events", "");
                
        });
        $(".negative-contrast").click(function(){
            
                $('a').toggleClass("negative-contrast-color");
                // $('section,footer,body').toggleClass('negative-contrast-color-bg');
                $('section,footer,body,.container-fluid.back-header,.dropdownemail,.dropdownphone').toggleClass('negative-contrast-color-bg');
                $('.accessibility-tool-constract').toggleClass('negative-contrast-color-bg');
                
        });
        });
        $('#wrap').FontSize({
                    increaseTimes: 10, 
                    reduceTimes: 10,
                });
    </script>

    <script> 
        $( ".high-contrast" ).on("click", function() { 
            if( $( "body" ).hasClass( "dark" )) { 
                $( "body" ).removeClass( "dark" );
            } else { 
                $( "body" ).addClass( "dark" );
            } 
        });  

        $( ".zoomin" ).on("click", function() { 

            $('a').css("font-size", "25px"); 
            $('body').css("font-size", "25px"); 
            $('div').css("font-size", "25px"); 
            $('p').css("font-size", "25px"); 
            $('span').css("font-size", "25px");
        });

        $( ".zoomout" ).on("click", function() { 

            $('a').css("font-size", ""); 
            $('body').css("font-size", ""); 
            $('div').css("font-size", ""); 
            $('p').css("font-size", ""); 
            $('span').css("font-size", "");
        }); 
       
        
        $( ".links-underline" ).on("click", function() { 

            $('a').css("text-decoration", "underline");  
            $('p').css("text-decoration", "underline"); 
        });

        $( ".readable-font" ).on("click", function() { 

            $('a').css("text-decoration", "");  
            $('p').css("text-decoration", ""); 
        });
         
    </script> 
</body>

</html>