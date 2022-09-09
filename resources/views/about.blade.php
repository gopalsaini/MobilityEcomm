@extends('layouts.app')

@section('title','The womens Program')
@section('meta_keywords','The Womens Program')
@section('meta_description','The Womens Program')

@section('content')
   <style>
      
      .va-women-do .core-value-slider .owl-dots button span {
         width: 25px;
         height: 25px;
         border-radius: 50%;
         opacity: 1;
         background-color: transparent;
         border: 1px solid #ffffff;
         display: inline-block;
         margin-right: 8px;
      }
      .va-staff-wrap.va-tribe-wrap .staff-box.green-box a {
        
         transform: translateY(5%) !important;
      }

      @media screen and (min-device-width: 300px) and (max-device-width: 768px) { 
         .va-staff-wrap.va-tribe-wrap .staff-box.green-box {
            width: 351px;
            min-height: 351px;
            margin-top: 51px !important;
            display: flex;
            justify-content: center;
            align-items: center;
         }
         .va-staff-wrap.va-tribe-wrap .staff-box.green-box a {
            font-size: 30px;
            line-height: 43px;
         }
      }

      @media screen and (min-device-width: 768px) and (max-device-width: 1180px) { 
         .va-staff-wrap.va-tribe-wrap .staff-box.green-box {
            width: 216px;
            min-height: 216px;
            margin-top: 51px !important;
            display: flex;
            justify-content: center;
            align-items: center;
         }
      }
     
   </style>
   <div class="va-page-strip-tag">
      <ul>
         <li> <a href="{{url('/')}}">Home</a> </li>
         <li>/ &nbsp;  Our Story </li>
      </ul>
   </div>

   <div class="va-social-imapact-inner-content-wrapper va-our-story-wrap">
      <div class="inner-social-impact-box">
         <div class="social-impact-img">
            <img src="{{ asset('assets/images/impact-banner.png')}}" alt="img">
            <div class="social-impact-text mission-statement">
               <h4>AT VILLAGE ARTISAN</h4>
               <p>OUR MISSION STATEMENT</p>
               <span>hope - empowerment - and dignity</span>
            </div>
         </div>
      </div>
   </div>
   
   <!-- womens program -->
   <div class="va-women-program-wrap va-story-wrap">
      <div class="container-fluid pd-75">
         <div class="row align-items-center">
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
               <ul>
                  <li class="img1"><img src="{{ asset('assets/images/image1.png')}}" alt=""></li>
                  <li class="img2"><img src="{{ asset('assets/images/image2.png')}}" alt=""></li>
                  <li class="img3"><img src="{{ asset('assets/images/image3.png')}}" alt=""></li>
                  <li class="img4"><img src="{{ asset('assets/images/image4.png')}}" alt=""></li>
                  <li class="img5"><img src="{{ asset('assets/images/image5.png')}}" alt=""></li>
               </ul>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
               <div class="women-cont">
                  <h3>Our Women’s Program</h3>
                  <span>Village Artisan</span>
                  <p class="about-story">
                     Every person has a story:  The story of Village Artisan is about empowering women, giving dignified work to men and delivering fashionable quality products to you, the discerning and socially conscious buyer.
                  </p>
                  <p class="descipt">
                     Village Artisan is about creating stories of change and transformation in the lives of a growing number of families and communities in North India by training artisans, designing great products and connecting their work to the global market.  Every person who is involved from around the world has a unique story - from the artisans who produce beautiful handcrafted products, to the consumers on the other side of the globe who enjoy, appreciate and share them.
                  </p>
                  <div class="women-work-wrap">
                     <div class="name-icon-wrap">
                        <div>
                           <h5>Tasha</h5>
                           <small>FOUNDER / CEO</small>
                        </div>
                        <div class="social-icon">
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
                     <p>A young couple set out from their native Canada in 1999, full of youthful enthusiasm and a spirit of adventure.  Bound for the exotic sub-continent with two small kids in tow, they were driven by a dream to do something meaningful with their lives.</p>
                  </div>
                  <!-- <p class="about-story">
                     Every person has a story:  The story of Village Artisan is about empowering women, giving dignified work to men and delivering fashionable quality products to you, the discerning and socially conscious buyer.
                  </p>
                  <p class="descipt">
                     Village Artisan is about creating stories of change and transformation in the lives of a growing number of families and communities in North India by training artisans, designing great products and connecting their work to the global market.
                  </p> -->
               </div>
            </div>

         </div>
      </div>
   </div>

   @if($staffs->status==200)
		@php
			$staffResult=(json_decode(($staffs->content),true));
        
		@endphp
         <!-- our staff section start-->
      <div class="va-staff-wrap ">
         <div class="container">
            <div class="va-heading">
               <h2>Our Core Staff</h2>
            </div>
            <div class="row">
               @foreach($staffResult['result'] as $key=>$staff)
                  <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                     <div class="staff-box">
                        <a href="javascript:;">
                           <img src="{{ $staff['image'] }}" alt="">
                           <div class="overlay-cont">
                              <div class="cont">
                                 <span class="name">{{ $staff['name'] }}</span>
                                 <small>{{ $staff['designation'] }}</small>
                                 <strong>{{ $staff['location'] }}</strong>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               @endforeach
               
            </div>
         </div>
      </div>
      <!-- our staff section  end-->
   @endif

   <!-- how we do it -->
   <div class="va-women-do">
      <div class="container-fluid pd-75">
         <div class="va-heading mb-4">
            <h2 class="text-center">Our Core Values</h2>
         </div>
         <div class="core-value-slider">
            <div class="owl-carousel owl-theme">
              
               <!--  -->
               <div class="item">
                  <div class="va-box">
                     <h5>Quality</h5>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                  </div>
               </div>
               <div class="item">
                  <div class="va-box">
                     <h5>Relationships</h5>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                  </div>
               </div>
               <div class="item">
                  <div class="va-box">
                     <h5>Empowerment</h5>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  </div>
               </div>
               <div class="item">
                  <div class="va-box">
                     <h5>Relationships</h5>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                  </div>
               </div>
               <div class="item">
                  <div class="va-box">
                     <h5>Quality</h5>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                  </div>
               </div>
               <!--  -->
            </div>
         </div>
        
      </div>

   </div>

   @if($artisans->status==200)
		@php
			$artisans=(json_decode(($artisans->content),true));
        
		@endphp
         <!-- our staff section start-->
         <div class="va-staff-wrap va-tribe-wrap position-relative">
            <div class="tribe-img">
               <img src="images/map-bg.png" alt="" class="w-100">
            </div>
            <div class="container">
               <div class="va-heading">
                  <h2>Our Tribe</h2>
               </div>
               <div class="row">
                  @foreach($artisans['result'] as $key=>$art)
                     <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="staff-box">
                           <a href="javascript:;">
                              <img src="{{ $art['image'] }}" alt="">
                              <div class="overlay-cont">
                                 <div class="cont">
                                    <span class="name">{{ $art['name'] }}</span>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </div>
                  @endforeach
                  
                  <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                     <div class="staff-box green-box">
                        <a href="javascript:;">
                           THIS<br>
                           COULD<br>
                           BE YOU !                     
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- our staff section  end-->
      @endif
   <!-- behind product section start-->
   <div class="va-begind-product">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0">
               <div class="img-sec">
                  <img src="{{ asset('assets/images/meet-artisan1.png')}}" alt="" class="w-100">
               </div>
            </div>   
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0">
               <div class="product-detail">
                  <div class="cont-area">
                     <h3>INVITATION TO JOIN THE TRIBE</h3>
                     <p>When you make a purchase and represent VA
                        with the earrings you wear or bag you carry,  you become part of
                        the “VA TRIBE” and contribute to</p>
                     <span class="head">a global story of change</span>
                     <a class="line-btn" href="javascript:">
                        See Whole Collection 
                        <span>
                           <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill="#ffffff"></path>
                           </svg>
                        </span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0 order-lg-1 order-md-2 order-2 ">
               <div class="product-detail ma-box">
                  <div class="cont-area">
                     <h3>Meet The Artisans</h3>
                     <p>BEHIND OUR PRODUCTS</p>
                     <a class="va_btn" href="{{url('our-artisan')}}">
                        Learn More 
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0 order-lg-2 order-md-1 order-1">
               <div class="img-sec">
                  <img src="{{ asset('assets/images/meet-artisan2.png')}}" alt="" class="w-100">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- behind product section end-->
   
   <div class="va-insta-story va-pd">
      <div class="container-fluid pd-75">
         <div class="va-heading">
            <h2>Our Instagram Stories</h2>
            <p>@village_artisan</p>
         </div>
         <ul>
            @if(!empty($stories) && count($stories)>0)
                  @foreach($stories as $key=>$instagram_photo)
                                             
                     @php
                       
                        $image=$instagram_photo->getthumbnails()
                     @endphp
                     @if(($key+1) <=4 )
                        <li>
                              <a target="_blank" href="{{$image[4]->src}}">
                                    <img  src="<?php echo 'data:image/jpg;base64,'.base64_encode(file_get_contents($image[4]->src))?>" alt="Image" class="img-responsive" /></a>
                                    <span><svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4391 2.1725C14.3941 2.0825 15.0174 2.0625 19.9974 2.0625C24.9774 2.0625 25.6007 2.08417 27.5541 2.1725C29.5074 2.26083 30.8407 2.5725 32.0074 3.02417C33.2291 3.48583 34.3374 4.2075 35.2541 5.14083C36.1874 6.05583 36.9074 7.1625 37.3674 8.38583C37.8207 9.5525 38.1307 10.8858 38.2207 12.8358C38.3107 14.7942 38.3307 15.4175 38.3307 20.3958C38.3307 25.3758 38.3091 25.9992 38.2207 27.9542C38.1324 29.9042 37.8207 31.2375 37.3674 32.4042C36.9074 33.6277 36.1862 34.7362 35.2541 35.6525C34.3374 36.5858 33.2291 37.3058 32.0074 37.7658C30.8407 38.2192 29.5074 38.5292 27.5574 38.6192C25.6007 38.7092 24.9774 38.7292 19.9974 38.7292C15.0174 38.7292 14.3941 38.7075 12.4391 38.6192C10.4891 38.5308 9.15573 38.2192 7.98906 37.7658C6.7656 37.3058 5.6571 36.5846 4.74073 35.6525C3.80803 34.7369 3.08625 33.629 2.62573 32.4058C2.17406 31.2392 1.86406 29.9058 1.77406 27.9558C1.68406 25.9975 1.66406 25.3742 1.66406 20.3958C1.66406 15.4158 1.68573 14.7925 1.77406 12.8392C1.8624 10.8858 2.17406 9.5525 2.62573 8.38583C3.08693 7.16264 3.80926 6.05469 4.7424 5.13917C5.65746 4.20667 6.76485 3.48491 7.9874 3.02417C9.15406 2.5725 10.4874 2.2625 12.4374 2.1725H12.4391ZM27.4057 5.4725C25.4724 5.38417 24.8924 5.36583 19.9974 5.36583C15.1024 5.36583 14.5224 5.38417 12.5891 5.4725C10.8007 5.55417 9.83073 5.8525 9.18406 6.10417C8.32906 6.4375 7.7174 6.8325 7.07573 7.47417C6.46747 8.06592 5.99936 8.7863 5.70573 9.5825C5.45406 10.2292 5.15573 11.1992 5.07406 12.9875C4.98573 14.9208 4.9674 15.5008 4.9674 20.3958C4.9674 25.2908 4.98573 25.8708 5.07406 27.8042C5.15573 29.5925 5.45406 30.5625 5.70573 31.2092C5.99906 32.0042 6.4674 32.7258 7.07573 33.3175C7.6674 33.9258 8.38906 34.3942 9.18406 34.6875C9.83073 34.9392 10.8007 35.2375 12.5891 35.3192C14.5224 35.4075 15.1007 35.4258 19.9974 35.4258C24.8941 35.4258 25.4724 35.4075 27.4057 35.3192C29.1941 35.2375 30.1641 34.9392 30.8107 34.6875C31.6657 34.3542 32.2774 33.9592 32.9191 33.3175C33.5274 32.7258 33.9957 32.0042 34.2891 31.2092C34.5407 30.5625 34.8391 29.5925 34.9207 27.8042C35.0091 25.8708 35.0274 25.2908 35.0274 20.3958C35.0274 15.5008 35.0091 14.9208 34.9207 12.9875C34.8391 11.1992 34.5407 10.2292 34.2891 9.5825C33.9557 8.7275 33.5607 8.11583 32.9191 7.47417C32.3273 6.86595 31.6069 6.39785 30.8107 6.10417C30.1641 5.8525 29.1941 5.55417 27.4057 5.4725ZM17.6557 26.0475C18.9635 26.5919 20.4197 26.6654 21.7756 26.2554C23.1315 25.8454 24.3031 24.9774 25.0901 23.7996C25.8771 22.6218 26.2308 21.2073 26.0908 19.7977C25.9508 18.3881 25.3257 17.0708 24.3224 16.0708C23.6828 15.4316 22.9094 14.9422 22.058 14.6377C21.2065 14.3333 20.2981 14.2214 19.3982 14.3102C18.4983 14.399 17.6293 14.6861 16.8537 15.1511C16.0782 15.616 15.4153 16.2471 14.9129 16.9989C14.4105 17.7508 14.081 18.6046 13.9483 19.4991C13.8155 20.3936 13.8826 21.3063 14.145 22.1717C14.4073 23.0371 14.8582 23.8335 15.4653 24.5037C16.0723 25.1739 16.8204 25.7011 17.6557 26.0475ZM13.3341 13.7325C14.2091 12.8575 15.2479 12.1633 16.3912 11.6898C17.5345 11.2162 18.7599 10.9725 19.9974 10.9725C21.2349 10.9725 22.4603 11.2162 23.6036 11.6898C24.7469 12.1633 25.7857 12.8575 26.6607 13.7325C27.5358 14.6075 28.2299 15.6464 28.7035 16.7897C29.177 17.933 29.4208 19.1583 29.4208 20.3958C29.4208 21.6333 29.177 22.8587 28.7035 24.002C28.2299 25.1453 27.5358 26.1841 26.6607 27.0592C24.8935 28.8264 22.4966 29.8192 19.9974 29.8192C17.4982 29.8192 15.1013 28.8264 13.3341 27.0592C11.5668 25.2919 10.574 22.8951 10.574 20.3958C10.574 17.8966 11.5668 15.4997 13.3341 13.7325ZM31.5107 12.3758C31.7276 12.1713 31.9012 11.9253 32.0212 11.6525C32.1413 11.3796 32.2054 11.0854 32.2098 10.7874C32.2141 10.4893 32.1586 10.1934 32.0465 9.91718C31.9345 9.64095 31.7681 9.39002 31.5573 9.17923C31.3465 8.96845 31.0956 8.8021 30.8194 8.69003C30.5432 8.57796 30.2472 8.52246 29.9492 8.52681C29.6511 8.53115 29.357 8.59526 29.0841 8.71533C28.8113 8.8354 28.5653 9.00899 28.3607 9.22583C27.9629 9.64755 27.7451 10.2077 27.7536 10.7874C27.762 11.3671 27.9961 11.9206 28.406 12.3306C28.8159 12.7405 29.3695 12.9745 29.9492 12.983C30.5289 12.9914 31.089 12.7737 31.5107 12.3758Z" fill="white"></path>
                                       </svg>
                                    </span>
                              </a>
                        </li>
                     @endif
                     
                  @endforeach
            @endif
            
         </ul>

      </div>
   </div>

      
      

@endsection

@push('custom_js')

@endpush