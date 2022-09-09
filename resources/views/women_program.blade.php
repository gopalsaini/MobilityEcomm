@extends('layouts.app')

@section('title','The Womens Program')
@section('meta_keywords','The Womens Program')
@section('meta_description','The Womens Program')

@section('content')
   <style>
      .social-women{
        .va-box{
            height: 100%;
         }
      }
      .va-women-program-wrap .women-cont .para {
         letter-spacing: 0 !important;
      }
    
   </style>
   <div class="va-page-strip-tag">
      <ul>
         <li> <a href="{{url('/')}}">Home</a> </li>
         <li>/ &nbsp; Social Impacts (The Women's Program) </li>
      </ul>
   </div>

   <div class="va-social-imapact-inner-content-wrapper">
      <div class="inner-social-impact-box">
         <div class="social-impact-img">
            <img src="{{ asset('assets/images/impact-banner.png')}}" alt="img">
            <div class="social-impact-text">
               <h2>OUR WOMEN'S
                  PROGRAM</h2>
            </div>
         </div>
      </div>
   </div>
   
   <!-- womens program -->
   <div class="va-women-program-wrap">
      <div class="container-fluid pd-75">
         <div class="row align-items-center">
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 order-xl-1 order-lg-2 order-2">
               <div class="women-cont">
                  <h3>Our Women’s Program</h3>
                  <p class="para">Space to give a general description
                     and mission of the
                     program with
                     photo collage</p>
                  <h4>“What We Do”</h4>
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
               </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-1 order-1">
               <ul>
                  <li class="img1"><img src="{{ asset('assets/images/image1.png')}}" alt=""></li>
                  <li class="img2"><img src="{{ asset('assets/images/image2.png')}}" alt=""></li>
                  <li class="img3"><img src="{{ asset('assets/images/image3.png')}}" alt=""></li>
                  <li class="img4"><img src="{{ asset('assets/images/image4.png')}}" alt=""></li>
                  <li class="img5"><img src="{{ asset('assets/images/image5.png')}}" alt=""></li>
               </ul>
            </div>
         </div>
      </div>
   </div>

   <!-- description program start-->
   <div class="va-dscp-wrap">
      <div class="container-fluid">
         <div class="category-heading">
            <h2>OUR WOMEN'S PROGRAM</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking
               at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
               letters, as opposed to using 'Content here, content.</p>
            <small>“Why We Do It”</small>
         </div>
      </div>   
   </div>
   <!-- description program end-->

   <!-- how we do it -->
   <div class="va-women-do social-women">
      <div class="container-fluid pd-75">
         <div class="va-heading">
            <h2 class="text-center">How We Do It</h2>
         </div>
         <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
               <div class="va-box">
                  <h5>Quality</h5>
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
               <div class="va-box">
                  <h5>Relationships</h5>
                  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
               <div class="va-box">
                  <h5>EMPOWERMENT</h5>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
               </div>
            </div>
         </div>
      </div>

   </div>

   <!-- our womens program -->
   <div class="va-our-program">
      <div class="container-fluid pd-75">
         <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
               <div class="text-icon">
                  <div class="icon">
                     <svg width="61" height="61" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.5004 7.89453C15.5004 7.49671 15.3424 7.11518 15.061 6.83387C14.7797 6.55257 14.3982 6.39453 14.0004 6.39453C13.6026 6.39453 13.221 6.55257 12.9397 6.83387C12.6584 7.11518 12.5004 7.49671 12.5004 7.89453C12.4736 12.4362 13.8306 16.8782 16.3906 20.6297C18.9507 24.3811 22.5925 27.2639 26.8314 28.8945C22.5925 30.5252 18.9507 33.408 16.3906 37.1594C13.8306 40.9108 12.4736 45.3529 12.5004 49.8945C12.5004 50.2924 12.6584 50.6739 12.9397 50.9552C13.221 51.2365 13.6026 51.3945 14.0004 51.3945C14.3982 51.3945 14.7797 51.2365 15.061 50.9552C15.3424 50.6739 15.5004 50.2924 15.5004 49.8945C15.5004 39.0225 24.1284 30.3945 35.0004 30.3945H37.3794L33.9384 33.8325C33.7989 33.972 33.6883 34.1376 33.6128 34.3198C33.5373 34.502 33.4985 34.6973 33.4985 34.8945C33.4985 35.0918 33.5373 35.2871 33.6128 35.4693C33.6883 35.6515 33.7989 35.8171 33.9384 35.9565C34.0779 36.096 34.2434 36.2066 34.4256 36.2821C34.6079 36.3576 34.8032 36.3964 35.0004 36.3964C35.1976 36.3964 35.3929 36.3576 35.5751 36.2821C35.7574 36.2066 35.9229 36.096 36.0624 35.9565L42.0624 29.9565C42.2021 29.8172 42.3129 29.6517 42.3885 29.4694C42.4641 29.2872 42.5031 29.0918 42.5031 28.8945C42.5031 28.6972 42.4641 28.5019 42.3885 28.3196C42.3129 28.1374 42.2021 27.9719 42.0624 27.8325L36.0624 21.8325C35.9229 21.6931 35.7574 21.5824 35.5751 21.507C35.3929 21.4315 35.1976 21.3926 35.0004 21.3926C34.8032 21.3926 34.6079 21.4315 34.4256 21.507C34.2434 21.5824 34.0779 21.6931 33.9384 21.8325C33.7989 21.972 33.6883 22.1376 33.6128 22.3198C33.5373 22.502 33.4985 22.6973 33.4985 22.8945C33.4985 23.0918 33.5373 23.2871 33.6128 23.4693C33.6883 23.6515 33.7989 23.8171 33.9384 23.9565L37.3794 27.3945H35.0004C32.4348 27.4117 29.8914 26.919 27.5178 25.9451C25.1442 24.9712 22.9878 23.5355 21.1736 21.7213C19.3594 19.9072 17.9237 17.7507 16.9498 15.3771C15.9759 13.0035 15.4832 10.4601 15.5004 7.89453V7.89453ZM26.0004 12.3945C25.6026 12.3945 25.221 12.5526 24.9397 12.8339C24.6584 13.1152 24.5004 13.4967 24.5004 13.8945C24.5004 14.2924 24.6584 14.6739 24.9397 14.9552C25.221 15.2365 25.6026 15.3945 26.0004 15.3945H45.5004C47.0724 15.3945 48.5004 16.8225 48.5004 18.3945V39.3945C48.5004 40.9665 47.0724 42.3945 45.5004 42.3945H26.0004C25.6026 42.3945 25.221 42.5526 24.9397 42.8339C24.6584 43.1152 24.5004 43.4967 24.5004 43.8945C24.5004 44.2924 24.6584 44.6739 24.9397 44.9552C25.221 45.2365 25.6026 45.3945 26.0004 45.3945H45.5004C48.7284 45.3945 51.5004 42.6225 51.5004 39.3945V18.3945C51.5004 15.1665 48.7284 12.3945 45.5004 12.3945H26.0004Z" fill="#A56852"/>
                        </svg>                        
                  </div>
                  <h3>Our Women’s Program</h3>
               </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
               <a href="{{url('product-listing')}}" class="va_btn">Support Women’s Program</a>
            </div>
         </div>
      </div>
   </div>

   <div class="va-women-slider">
      <div class="container-fluid pd-75">
         <div class="women-slider">
            <div class="owl-carousel owl-theme">
               <div class="item">
                  <img src="images/women-slide1.png" alt="">
                  <p>The Women's Program</p>
               </div>
               <div class="item">
                  <img src="images/women-slide1.png" alt="">
                  <p>The Women's Program</p>
               </div>
               <div class="item">
                  <img src="images/women-slide1.png" alt="">
                  <p>The Women's Program</p>
               </div>
               <div class="item">
                  <img src="images/women-slide1.png" alt="">
                  <p>The Women's Program</p>
               </div>
            </div>
         </div>
      </div>
   </div>

<!-- 

   <div class="va-blog-post">
      <div class="container-fluid pd-75">
         <div class="va-heading">
            <h2>Blog Posts</h2>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
               <div class="va-imapact-program me-1">
                  <div class="imapact-img">
                     <img src="{{ asset('assets/images/impact.png')}}" alt="img">
                  </div>
                  <div class="imapact-text">
                     <a href="blog-single.html">Fashion and interior design are
                        one and the same.</a>
                        <p class="date"> <span> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M16.4193 2.66634H14.5859V1.74967C14.5859 1.50656 14.4894 1.2734 14.3175 1.10149C14.1455 0.929585 13.9124 0.833008 13.6693 0.833008C13.4262 0.833008 13.193 0.929585 13.0211 1.10149C12.8492 1.2734 12.7526 1.50656 12.7526 1.74967V2.66634H7.2526V1.74967C7.2526 1.50656 7.15603 1.2734 6.98412 1.10149C6.81221 0.929585 6.57905 0.833008 6.33594 0.833008C6.09282 0.833008 5.85966 0.929585 5.68776 1.10149C5.51585 1.2734 5.41927 1.50656 5.41927 1.74967V2.66634H3.58594C2.85659 2.66634 2.15712 2.95607 1.64139 3.4718C1.12567 3.98752 0.835938 4.687 0.835938 5.41634V16.4163C0.835938 17.1457 1.12567 17.8452 1.64139 18.3609C2.15712 18.8766 2.85659 19.1663 3.58594 19.1663H16.4193C17.1486 19.1663 17.8481 18.8766 18.3638 18.3609C18.8795 17.8452 19.1693 17.1457 19.1693 16.4163V5.41634C19.1693 4.687 18.8795 3.98752 18.3638 3.4718C17.8481 2.95607 17.1486 2.66634 16.4193 2.66634ZM17.3359 16.4163C17.3359 16.6595 17.2394 16.8926 17.0675 17.0645C16.8955 17.2364 16.6624 17.333 16.4193 17.333H3.58594C3.34282 17.333 3.10966 17.2364 2.93776 17.0645C2.76585 16.8926 2.66927 16.6595 2.66927 16.4163V9.99967H17.3359V16.4163ZM17.3359 8.16634H2.66927V5.41634C2.66927 5.17323 2.76585 4.94007 2.93776 4.76816C3.10966 4.59625 3.34282 4.49967 3.58594 4.49967H5.41927V5.41634C5.41927 5.65946 5.51585 5.89261 5.68776 6.06452C5.85966 6.23643 6.09282 6.33301 6.33594 6.33301C6.57905 6.33301 6.81221 6.23643 6.98412 6.06452C7.15603 5.89261 7.2526 5.65946 7.2526 5.41634V4.49967H12.7526V5.41634C12.7526 5.65946 12.8492 5.89261 13.0211 6.06452C13.193 6.23643 13.4262 6.33301 13.6693 6.33301C13.9124 6.33301 14.1455 6.23643 14.3175 6.06452C14.4894 5.89261 14.5859 5.65946 14.5859 5.41634V4.49967H16.4193C16.6624 4.49967 16.8955 4.59625 17.0675 4.76816C17.2394 4.94007 17.3359 5.17323 17.3359 5.41634V8.16634Z" fill="#AA6953"></path>
                           </svg>
                            </span> 22 June 2022</p>
                        <p>As we all search for ways to come to terms with our new "global nornal", so many of us are looking for ways to help. One Friend reached out with this above message today.. simply saying that our VA lantern on her mantle reminds her to pray for India.</p>
                        <a class="line-btn" href="blog-single.html">
                          Read More
                           <span>
                              <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""></path>
                              </svg>
                           </span>
                        </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
               <div class="va-imapact-program ms-1">
                  <div class="imapact-img">
                     <img src="{{ asset('assets/images/impact.png')}}" alt="img">
                  </div>
                  <div class="imapact-text">
                     <a href="blog-single.html">Fashion and interior design are
                        one and the same.</a>
                        <p class="date"> <span> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M16.4193 2.66634H14.5859V1.74967C14.5859 1.50656 14.4894 1.2734 14.3175 1.10149C14.1455 0.929585 13.9124 0.833008 13.6693 0.833008C13.4262 0.833008 13.193 0.929585 13.0211 1.10149C12.8492 1.2734 12.7526 1.50656 12.7526 1.74967V2.66634H7.2526V1.74967C7.2526 1.50656 7.15603 1.2734 6.98412 1.10149C6.81221 0.929585 6.57905 0.833008 6.33594 0.833008C6.09282 0.833008 5.85966 0.929585 5.68776 1.10149C5.51585 1.2734 5.41927 1.50656 5.41927 1.74967V2.66634H3.58594C2.85659 2.66634 2.15712 2.95607 1.64139 3.4718C1.12567 3.98752 0.835938 4.687 0.835938 5.41634V16.4163C0.835938 17.1457 1.12567 17.8452 1.64139 18.3609C2.15712 18.8766 2.85659 19.1663 3.58594 19.1663H16.4193C17.1486 19.1663 17.8481 18.8766 18.3638 18.3609C18.8795 17.8452 19.1693 17.1457 19.1693 16.4163V5.41634C19.1693 4.687 18.8795 3.98752 18.3638 3.4718C17.8481 2.95607 17.1486 2.66634 16.4193 2.66634ZM17.3359 16.4163C17.3359 16.6595 17.2394 16.8926 17.0675 17.0645C16.8955 17.2364 16.6624 17.333 16.4193 17.333H3.58594C3.34282 17.333 3.10966 17.2364 2.93776 17.0645C2.76585 16.8926 2.66927 16.6595 2.66927 16.4163V9.99967H17.3359V16.4163ZM17.3359 8.16634H2.66927V5.41634C2.66927 5.17323 2.76585 4.94007 2.93776 4.76816C3.10966 4.59625 3.34282 4.49967 3.58594 4.49967H5.41927V5.41634C5.41927 5.65946 5.51585 5.89261 5.68776 6.06452C5.85966 6.23643 6.09282 6.33301 6.33594 6.33301C6.57905 6.33301 6.81221 6.23643 6.98412 6.06452C7.15603 5.89261 7.2526 5.65946 7.2526 5.41634V4.49967H12.7526V5.41634C12.7526 5.65946 12.8492 5.89261 13.0211 6.06452C13.193 6.23643 13.4262 6.33301 13.6693 6.33301C13.9124 6.33301 14.1455 6.23643 14.3175 6.06452C14.4894 5.89261 14.5859 5.65946 14.5859 5.41634V4.49967H16.4193C16.6624 4.49967 16.8955 4.59625 17.0675 4.76816C17.2394 4.94007 17.3359 5.17323 17.3359 5.41634V8.16634Z" fill="#AA6953"></path>
                           </svg>
                            </span> 22 June 2022</p>
                        <p>As we all search for ways to come to terms with our new "global nornal", so many of us are looking for ways to help. One Friend reached out with this above message today.. simply saying that our VA lantern on her mantle reminds her to pray for India.</p>
                        <a class="line-btn" href="blog-single.html">
                          Read More
                           <span>
                              <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""></path>
                              </svg>
                           </span>
                        </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
               <div class="va-imapact-program me-1">
                  <div class="imapact-img">
                     <img src="{{ asset('assets/images/impact.png')}}" alt="img">
                  </div>
                  <div class="imapact-text">
                     <a href="blog-single.html">Fashion and interior design are
                        one and the same.</a>
                        <p class="date"> <span> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M16.4193 2.66634H14.5859V1.74967C14.5859 1.50656 14.4894 1.2734 14.3175 1.10149C14.1455 0.929585 13.9124 0.833008 13.6693 0.833008C13.4262 0.833008 13.193 0.929585 13.0211 1.10149C12.8492 1.2734 12.7526 1.50656 12.7526 1.74967V2.66634H7.2526V1.74967C7.2526 1.50656 7.15603 1.2734 6.98412 1.10149C6.81221 0.929585 6.57905 0.833008 6.33594 0.833008C6.09282 0.833008 5.85966 0.929585 5.68776 1.10149C5.51585 1.2734 5.41927 1.50656 5.41927 1.74967V2.66634H3.58594C2.85659 2.66634 2.15712 2.95607 1.64139 3.4718C1.12567 3.98752 0.835938 4.687 0.835938 5.41634V16.4163C0.835938 17.1457 1.12567 17.8452 1.64139 18.3609C2.15712 18.8766 2.85659 19.1663 3.58594 19.1663H16.4193C17.1486 19.1663 17.8481 18.8766 18.3638 18.3609C18.8795 17.8452 19.1693 17.1457 19.1693 16.4163V5.41634C19.1693 4.687 18.8795 3.98752 18.3638 3.4718C17.8481 2.95607 17.1486 2.66634 16.4193 2.66634ZM17.3359 16.4163C17.3359 16.6595 17.2394 16.8926 17.0675 17.0645C16.8955 17.2364 16.6624 17.333 16.4193 17.333H3.58594C3.34282 17.333 3.10966 17.2364 2.93776 17.0645C2.76585 16.8926 2.66927 16.6595 2.66927 16.4163V9.99967H17.3359V16.4163ZM17.3359 8.16634H2.66927V5.41634C2.66927 5.17323 2.76585 4.94007 2.93776 4.76816C3.10966 4.59625 3.34282 4.49967 3.58594 4.49967H5.41927V5.41634C5.41927 5.65946 5.51585 5.89261 5.68776 6.06452C5.85966 6.23643 6.09282 6.33301 6.33594 6.33301C6.57905 6.33301 6.81221 6.23643 6.98412 6.06452C7.15603 5.89261 7.2526 5.65946 7.2526 5.41634V4.49967H12.7526V5.41634C12.7526 5.65946 12.8492 5.89261 13.0211 6.06452C13.193 6.23643 13.4262 6.33301 13.6693 6.33301C13.9124 6.33301 14.1455 6.23643 14.3175 6.06452C14.4894 5.89261 14.5859 5.65946 14.5859 5.41634V4.49967H16.4193C16.6624 4.49967 16.8955 4.59625 17.0675 4.76816C17.2394 4.94007 17.3359 5.17323 17.3359 5.41634V8.16634Z" fill="#AA6953"></path>
                           </svg>
                            </span> 22 June 2022</p>
                        <p>As we all search for ways to come to terms with our new "global nornal", so many of us are looking for ways to help. One Friend reached out with this above message today.. simply saying that our VA lantern on her mantle reminds her to pray for India.</p>
                        <a class="line-btn" href="blog-single.html">
                          Read More
                           <span>
                              <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""></path>
                              </svg>
                           </span>
                        </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
               <div class="va-imapact-program ms-1">
                  <div class="imapact-img">
                     <img src="{{ asset('assets/images/impact.png')}}" alt="img">
                  </div>
                  <div class="imapact-text">
                     <a href="blog-single.html">Fashion and interior design are
                        one and the same.</a>
                        <p class="date"> <span> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M16.4193 2.66634H14.5859V1.74967C14.5859 1.50656 14.4894 1.2734 14.3175 1.10149C14.1455 0.929585 13.9124 0.833008 13.6693 0.833008C13.4262 0.833008 13.193 0.929585 13.0211 1.10149C12.8492 1.2734 12.7526 1.50656 12.7526 1.74967V2.66634H7.2526V1.74967C7.2526 1.50656 7.15603 1.2734 6.98412 1.10149C6.81221 0.929585 6.57905 0.833008 6.33594 0.833008C6.09282 0.833008 5.85966 0.929585 5.68776 1.10149C5.51585 1.2734 5.41927 1.50656 5.41927 1.74967V2.66634H3.58594C2.85659 2.66634 2.15712 2.95607 1.64139 3.4718C1.12567 3.98752 0.835938 4.687 0.835938 5.41634V16.4163C0.835938 17.1457 1.12567 17.8452 1.64139 18.3609C2.15712 18.8766 2.85659 19.1663 3.58594 19.1663H16.4193C17.1486 19.1663 17.8481 18.8766 18.3638 18.3609C18.8795 17.8452 19.1693 17.1457 19.1693 16.4163V5.41634C19.1693 4.687 18.8795 3.98752 18.3638 3.4718C17.8481 2.95607 17.1486 2.66634 16.4193 2.66634ZM17.3359 16.4163C17.3359 16.6595 17.2394 16.8926 17.0675 17.0645C16.8955 17.2364 16.6624 17.333 16.4193 17.333H3.58594C3.34282 17.333 3.10966 17.2364 2.93776 17.0645C2.76585 16.8926 2.66927 16.6595 2.66927 16.4163V9.99967H17.3359V16.4163ZM17.3359 8.16634H2.66927V5.41634C2.66927 5.17323 2.76585 4.94007 2.93776 4.76816C3.10966 4.59625 3.34282 4.49967 3.58594 4.49967H5.41927V5.41634C5.41927 5.65946 5.51585 5.89261 5.68776 6.06452C5.85966 6.23643 6.09282 6.33301 6.33594 6.33301C6.57905 6.33301 6.81221 6.23643 6.98412 6.06452C7.15603 5.89261 7.2526 5.65946 7.2526 5.41634V4.49967H12.7526V5.41634C12.7526 5.65946 12.8492 5.89261 13.0211 6.06452C13.193 6.23643 13.4262 6.33301 13.6693 6.33301C13.9124 6.33301 14.1455 6.23643 14.3175 6.06452C14.4894 5.89261 14.5859 5.65946 14.5859 5.41634V4.49967H16.4193C16.6624 4.49967 16.8955 4.59625 17.0675 4.76816C17.2394 4.94007 17.3359 5.17323 17.3359 5.41634V8.16634Z" fill="#AA6953"></path>
                           </svg>
                            </span> 22 June 2022</p>
                        <p>As we all search for ways to come to terms with our new "global nornal", so many of us are looking for ways to help. One Friend reached out with this above message today.. simply saying that our VA lantern on her mantle reminds her to pray for India.</p>
                        <a class="line-btn" href="blog-single.html">
                          Read More
                           <span>
                              <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""></path>
                              </svg>
                           </span>
                        </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
    -->

      
      

@endsection

@push('custom_js')

<script>
    $("form#trackform").submit(function(e) {

        e.preventDefault();

        var formId = $(this).attr('id');
        var formAction = $(this).attr('action');

        var form_data = new FormData(this);

        $.ajax({
            url: formAction,
            data: new FormData(this),
            async: false,
            dataType: 'json',
            type: 'post',
            beforeSend: function() {
                $('#' + formId + 'Loader').css('display', 'inline-block');
                $('#' + formId + 'Submit').prop('disabled', true);
            },
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                }

                $('#' + formId + 'Loader').css('display', 'none');
                $('#' + formId + 'Submit').prop('disabled', false);
            },
            success: function(data) {
                showMsg('success', data.message);
                $('.order_fatch').html(data.html);
                $('#' + formId + 'Loader').css('display', 'none');
                $('#' + formId + 'Submit').prop('disabled', false);
            },
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000
        });
    });

</script>
@endpush