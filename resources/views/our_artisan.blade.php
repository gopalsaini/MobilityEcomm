@extends('layouts.app')

@section('title','The Womens Program')
@section('meta_keywords','The Womens Program')
@section('meta_description','The Womens Program')

@section('content')

   <div class="va-page-strip-tag">
      <ul>
         <li> <a href="{{url('/')}}">Home</a> </li>
         <li>/ &nbsp;  Our Artisan </li>
      </ul>
   </div>

   <div class="our-artisan-wrap">
         <div class="container-fluid p-0">
            <div id="fullpage">
               <div class="section bg-1">
                  <div class="pd-100 cont">
                     <h3>Nazia</h3>
                     <p>is a determined and spunky young artisan who began learning jewelry making techniques and business skills after her Father left her family at the age of 19.</p>
                  </div>
               </div>
               <div class="section bg-2">
                  <div class="pd-100 cont position-relative">
                     <p>As the oldest  of 6 kids she rose to the challenge to learn how to bead,  source raw materials, and eventually to train other young women, including her younger sisters, who needed the same support she once did.</p>
                  </div>
               </div>
               <div class="section bg-3">
                  <div class="pd-100 pb-0">
                     <h3>Nazia</h3>
                  </div>
                  <div class="pd-100 cont position-relative">
                     <h4>Business with Village Artisan’s</h4>
                     <p>As the oldest  of 6 kids she rose to the challenge to learn how to bead,  source raw materials, and eventually to train other young women, including her younger sisters, who needed the same support she once did.</p>
                  </div>
               </div>
               <div class="section bg-4">
                  <div class="container-fluid">
                     <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6 col-sm-12 col-12 ps-0">
                           <img src="{{ asset('assets/images/our-art.png')}}" alt="" class="w-100 img">
                        </div>   
                        <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                           <div class="artisan-con">
                              <h2>Business with Village Artisan’s</h2>
                              <p>Nazia is a spunky, determined young artisan.  Abandoned by their father, Nazia’s family struggled for survival amidst disgrace and poverty.  Nazia, then 19, grasped the opportunity provided by Village Artisan to learn new skills and support her mother and 5 younger siblings. he learned to bead, source raw materials, and make beautiful jewelry.  With the help of Village Artisan, she developed business know-how and passed her skills and knowledge on to her younger sisters. </p>
                           </div>
                        </div>   
                   </div>
                  </div>
               </div>
               <div class="section bg-5">
                  <div class="container-fluid">
                     <p>Nazia’s Work</p>
                     <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="artisan-image">
                              <img src="{{ asset('assets/images/artisan1.png')}}" alt="artisan" class="w-100">
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="artisan-image">
                              <img src="{{ asset('assets/images/artisan2.png')}}" alt="artisan" class="w-100">
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="artisan-image">
                              <img src="{{ asset('assets/images/artisan3.png')}}" alt="artisan" class="w-100">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <div class="section">Three</div>
               <div class="section">Four</div>
               <div class="section ">
                  <div class="slide" data-anchor="slide1">Two 1</div>
                  <div class="slide" data-anchor="slide2">Two 2</div>
              </div> -->
           </div>   
         </div>
      </div>
      
      

@endsection

@push('custom_js')

<script src='https://unpkg.com/fullpage.js/dist/fullpage.min.js'></script>
<script>
         $('.dropdown').on('click', function () {
            $('.dropdown-menu').toggleClass('show')
         })
      </script>
        <script>
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
         // new fullpage('#fullpage', {
         //    licenseKey: 'YOUR_KEY_HERE',
         // // sectionsColor: ['yellow', 'orange', '#C0C0C0', '#ADD8E6'],
         // menu: '#myMenu',
         // navigation: true,
         //    navigationPosition: 'right',
         //    navigationTooltips: ['firstSlide', 'secondSlide'],
         // });
         $('#fullpage').fullpage({
            menu: '#myMenu',
         navigation: true,
            navigationPosition: 'right',
            navigationTooltips: ['firstSlide', 'secondSlide'],
         });
      </script>
      <script>
         $(document).ready(function(){
            $(".header").click(function(){
               $(".one-page-header").toggleClass("main");
            });
         });
      </script>
      <script>
         $(document).ready(function(){
            $(".header").click(function(){
               $(".our-artisan-wrap").toggleClass("mr-top");
            });
         });
      </script>
@endpush