@extends('layouts.app')



@push('custom_css')

@endpush

@section('content')
	
	@if($slider->status==200)
		@php
			$sliderResult=(json_decode(($slider->content),true));
			
		@endphp

		<div class="va-banner-wrapper">
       
			<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
				@foreach($sliderResult['result'] as $key=>$slider)
					<div data-src="{{ $slider['image'] }}">
						
						<div class="camera_caption fadeFromBottom">
							<p> <a style="color:#fff" target="_blank" href="{{ $slider['href'] }}">{{ $slider['title'] }}</a></p>
						</div>
						
					</div>
					
				@endforeach
				
			</div>
		</div>

	@endif
	
	<div class="va-freedom-main-wrapper">
		<div class="freedom-text">
		<h3>Empowering women and bringing dignified work to men</h3>
		<div class="title-heading">
			<h2>FREEDOM BUSINESS</h2>
			<a class="line-btn" href="{{url('product-listing?collection=1')}}">
				See Whole Collection 
				<span>
					<svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""/>
					</svg>
				</span>
			</a>
		</div>
		</div>
		<div class="circle-img">
		<img src="{{ asset('assets/images/circle.png')}}" alt="img">
		</div>
	</div>
	<div class="va-mordern-main-wraaper">
		<div class="va-img-sec-wrapper">
		<h3>Modern Meets</h3>
		<span>Tradition</span>
		<a class="line-btn" href="{{url('product-listing?collection=2')}}">
			See Whole Collection 
			<span>
				<svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""/>
				</svg>
			</span>
		</a>
		<div class="modern-img">
			<img src="{{ asset('assets/images/modern-slider1.webp')}}" alt="img">
		</div>
		</div>
		<div class="va-modern-slider-wrapper">
		<div class="modern-slider">
			<div class="owl-carousel owl-theme">
				<div class="item">
					<div class="va-item">
					<img src="{{ asset('assets/images/modern-slider2.webp')}}" alt="img">
					<div class="modern-caption">
						<h3>Uzma</h3>
						<span>Rising to new levels</span>
					</div>
					<div class="bottom-img">
						<p>Meet the artisans</p>
					</div>
					</div>
				</div>
				<div class="item">
					<div class="va-item">
					<img src="{{ asset('assets/images/modern-slider3.webp')}}" alt="img">
					<div class="modern-caption">
						<h3>Uzma</h3>
						<span>Rising to new levels</span>
					</div>
					<div class="bottom-img">
						<p>Meet the artisans</p>
					</div>
					</div>
				</div>
				<div class="item">
					<div class="va-item">
					<img src="{{ asset('assets/images/modern-slider4.webp')}}" alt="img">
					<div class="modern-caption">
						<h3>Uzma</h3>
						<span>Rising to new levels</span>
					</div>
					<div class="bottom-img">
						<p>Meet the artisans</p>
					</div>
					</div>
				</div>
				<div class="item">
					<div class="va-item">
					<img src="{{ asset('assets/images/modern-slider3.webp')}}" alt="img">
					<div class="modern-caption">
						<h3>Uzma</h3>
						<span>Rising to new levels</span>
					</div>
					<div class="bottom-img">
						<p>Meet the artisans</p>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		
	</div>
   
   <div class="va-blog-main-wrapper">
	  <div class="va-blog-main-box">
		 <div class="va-blog-text">
			<h3>Elegant and Stylish Look</h3>
			<span>Handcrafted Housewares</span>
			<p>From city centres into distant rural villages come our unique, handcrafted housewares. Each purchase supports the artisans and their families whose hands made built this collection.</p>
			<a class="va_btn" href="{{url('product-listing?collection=3')}}">Shop Now</a>
		 </div>
		 <div class="va-blog-img">
			<img src="{{ asset('assets/images/blog1.png')}}" alt="img">
		 </div>
	  </div>
	  <div class="va-blog-main-box">
		 <div class="va-blog-img">
			<img src="{{ asset('assets/images/blog2.png')}}" alt="img">
		 </div>
		 <div class="va-blog-text">
			<h3>Elegant and Stylish Look</h3>
			<span>Handcrafted Housewares</span>
			<p>From city centres into distant rural villages come our unique, handcrafted housewares. Each purchase supports the artisans and their families whose hands made built this collection.</p>
			<a class="va_btn" href="{{url('product-listing?collection=3')}}">Shop Now</a>
		 </div>
	  </div>
   </div>
   @if($newProduct->status==200)
		@php
			$newProduct=(json_decode(($newProduct->content),true));
		@endphp
		<div class="va-product-main-wrapper">
			<h3>New Products</h3>
			<span>Quality that can be felt</span>
			<a class="line-btn" href="{{url('product-listing?collection=4')}}">
				See Whole Collection 
				<span>
					<svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""/>
					</svg>
				</span>
			</a>

			<div class="va-product-main-box ">
				
				<input type="hidden" id="number" class="qty" value="1" />
				@foreach($newProduct['result'] as $topselling)
					<div class="product-box">
					
						<div class="product-img">
							<img src="{{ $topselling['first_image'] }}" alt="img">
							<div class="social-icon">
								<a href="javascript:;" class="getProductDetail" data-slug="{{ $topselling['slug']}}">
									<span class="IconCart">
										<svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.9036 21.0002C13.9745 20.9997 15.9856 20.3065 17.6168 19.0308L22.7455 24.1595L24.3951 22.5098L19.2665 17.3812C20.5428 15.7498 21.2365 13.7382 21.237 11.6668C21.237 6.52066 17.0498 2.3335 11.9036 2.3335C6.75748 2.3335 2.57031 6.52066 2.57031 11.6668C2.57031 16.813 6.75748 21.0002 11.9036 21.0002ZM11.9036 4.66683C15.7641 4.66683 18.9036 7.80633 18.9036 11.6668C18.9036 15.5273 15.7641 18.6668 11.9036 18.6668C8.04315 18.6668 4.90365 15.5273 4.90365 11.6668C4.90365 7.80633 8.04315 4.66683 11.9036 4.66683Z" fill="#A56852"/>
										<path d="M13.5498 10.0171C13.992 10.4604 14.2358 11.0461 14.2358 11.6668H16.5691C16.5702 11.0536 16.4497 10.4463 16.2146 9.88C15.9795 9.31369 15.6345 8.7996 15.1995 8.36743C13.4331 6.60343 10.3706 6.60343 8.60547 8.36743L10.2528 10.0194C11.1395 9.1351 12.6678 9.13743 13.5498 10.0171Z" fill="#A56852"/>
										</svg>
									</span>&nbsp;<pre class="spinner-border spinner-border-sm loaderView" style="color:#a56852;font-size: 100%;position:relative;margin:0;display:none"></pre>
								</a>
								<a href="javascript:;" class="addtocart" data-type="addtocart" data-product_id="{{ $topselling['variant_productid'] }}">
									<span class="IconCart">
										<svg width="27" height="22" viewBox="0 0 27 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M25.8531 5.03765C25.5921 4.70052 25.2565 4.42854 24.8726 4.24309C24.4886 4.05764 24.0669 3.96378 23.6406 3.9689H7.81563L6.44688 1.48452C6.22602 1.09614 5.90524 0.773955 5.51783 0.551402C5.13042 0.328848 4.69051 0.214041 4.24375 0.218898H1.04688C0.798235 0.218898 0.559778 0.31767 0.383962 0.493486C0.208147 0.669301 0.109375 0.907757 0.109375 1.1564C0.109375 1.40504 0.208147 1.64349 0.383962 1.81931C0.559778 1.99513 0.798235 2.0939 1.04688 2.0939H4.24375C4.3547 2.08915 4.46497 2.11347 4.56363 2.16444C4.66229 2.21542 4.74593 2.29128 4.80625 2.38452L6.35313 5.19702L7.15938 13.9345C7.26744 14.8392 7.7145 15.6692 8.41042 16.2573C9.10634 16.8454 9.99935 17.1477 10.9094 17.1033H20.6313C21.4352 17.1236 22.2235 16.8797 22.8755 16.4089C23.5275 15.9381 24.007 15.2665 24.2406 14.497L26.275 7.16577C26.3752 6.8027 26.3893 6.42123 26.3161 6.05176C26.2428 5.68229 26.0843 5.33503 25.8531 5.03765ZM24.4844 6.65015L22.45 13.9908C22.3233 14.3665 22.0767 14.6902 21.7481 14.912C21.4195 15.1339 21.0271 15.2417 20.6313 15.2189H10.8719C10.4336 15.251 9.99909 15.1191 9.65261 14.8489C9.30612 14.5786 9.07242 14.1893 8.99687 13.7564L8.29375 5.8439H23.6406C23.7776 5.84252 23.9132 5.87119 24.038 5.92788C24.1627 5.98457 24.2735 6.06791 24.3625 6.17202C24.4184 6.23685 24.4586 6.31377 24.4797 6.39674C24.5009 6.47971 24.5025 6.56646 24.4844 6.65015Z" fill="#A56852"/>
										<path d="M11.3594 21.7814C12.3949 21.7814 13.2344 20.9419 13.2344 19.9064C13.2344 18.8709 12.3949 18.0314 11.3594 18.0314C10.3238 18.0314 9.48438 18.8709 9.48438 19.9064C9.48438 20.9419 10.3238 21.7814 11.3594 21.7814Z" fill="#A56852"/>
										<path d="M20.7344 21.7814C21.7699 21.7814 22.6094 20.9419 22.6094 19.9064C22.6094 18.8709 21.7699 18.0314 20.7344 18.0314C19.6988 18.0314 18.8594 18.8709 18.8594 19.9064C18.8594 20.9419 19.6988 21.7814 20.7344 21.7814Z" fill="#A56852"/>
										</svg>
									</span> &nbsp;
									<pre class="spinner-border spinner-border-sm loader" style="color:#a56852;font-size: 100%;position:relative;margin:0;display:none"></pre>
								</a>
								<a href="{{ url('product-detail/'.$topselling['slug'] )}}">
									<span>
										<svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.2646 11.8755C23.7781 12.5472 23.7781 13.4539 23.2646 14.1245C21.6471 16.2359 17.7666 20.5833 13.2361 20.5833C8.70564 20.5833 4.82514 16.2359 3.20772 14.1245C2.95789 13.8029 2.82227 13.4072 2.82227 13C2.82227 12.5927 2.95789 12.1971 3.20772 11.8755C4.82514 9.76407 8.70564 5.41666 13.2361 5.41666C17.7666 5.41666 21.6471 9.76407 23.2646 11.8755V11.8755Z" stroke="#A56852" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M13.2363 16.25C15.0313 16.25 16.4863 14.7949 16.4863 13C16.4863 11.2051 15.0313 9.75 13.2363 9.75C11.4414 9.75 9.98633 11.2051 9.98633 13C9.98633 14.7949 11.4414 16.25 13.2363 16.25Z" stroke="#A56852" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="product-text">
							<span>{{ $topselling['category'] }}</span>
							<a href="{{ url('product-detail/'.$topselling['slug'] )}}">{{ $topselling['name'] }}</a>
							<h5><small>
								@if($topselling['discount_amount']>0)
									<del>{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</del>{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['offer_price']) }}
								@else
									{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}
								@endif
							</small> </h5>
						</div>
					</div>
				@endforeach
				
			</div>
		</div>

	@endif
   <div class="va-our-story-main-wrapper">
	  <h3>The Heart Of Va</h3>
	  <span>Our Story</span>
	  <div class="left-img">
		 <img src="{{ asset('assets/images/circle.png')}}" alt="img">
	  </div>
	  <div class="right-img">
		 <img src="{{ asset('assets/images/circle.png')}}" alt="img">
	  </div>
   </div>
   <div class="vedio-main-wrapper">
	  <div class="vedio-img">
		 <img src="http://img.youtube.com/vi/_YvE9D6eozM/maxresdefault.jpg" alt="img">
		 <div class="play-btn">
			<div class="wrapper">
			   <span class="waves"></span>
			   <span class="wave-1"></span>
			   <span class="wave-2"></span>
			   <span class="wave-3"></span>
			</div>
			<a class="test-popup-link popup-youtube" href="https://www.youtube.com/watch?v=_YvE9D6eozM"><i class="fas fa-play"></i></a>
		 </div>
	  </div>
	  <p class="vedio-text">
		 Trade handmade ethically sourced quality goods
	  </p>
	  <p class="vedio-text-right">
		 fair trade handmade ethically sourced qual
	  </p>
   </div>
   <div class="va-post-banner-main-wrapper">
	  <div class="post-text">
		 <div class="post-icon">
			<span>
			   <svg width="45" height="44" viewBox="0 0 45 44" fill="none" xmlns="http://www.w3.org/2000/svg">
				  <path d="M4.57096 35.5832V12.6665H37.9043V19.5207C39.4043 19.979 40.821 20.6457 42.071 21.5415V12.6665C42.071 10.354 40.2168 8.49984 37.9043 8.49984H29.571V4.33317C29.571 2.02067 27.7168 0.166504 25.4043 0.166504H17.071C14.7585 0.166504 12.9043 2.02067 12.9043 4.33317V8.49984H4.57096C2.25846 8.49984 0.42513 10.354 0.42513 12.6665L0.404297 35.5832C0.404297 37.8957 2.25846 39.7498 4.57096 39.7498H20.571C19.946 38.4582 19.5293 37.0623 19.321 35.5832H4.57096ZM17.071 4.33317H25.4043V8.49984H17.071V4.33317Z" fill="#296769"/>
				  <path d="M33.735 23.0835C27.985 23.0835 23.3184 27.7502 23.3184 33.5002C23.3184 39.2502 27.985 43.9168 33.735 43.9168C39.485 43.9168 44.1517 39.2502 44.1517 33.5002C44.1517 27.7502 39.485 23.0835 33.735 23.0835ZM37.1725 38.396L32.6934 33.9168V27.2502H34.7767V33.0627L38.6309 36.9168L37.1725 38.396Z" fill="#296769"/>
			   </svg>
			</span>
			<h4>Collaberation Touches <br> The Heart of What We Do</h4>
		 </div>
		 <p>Through wholesale partnerships we're able to keep our commitment to provide streams of consistent work and opportunity to our artisans and their communities.</p>
		 <a class="va_btn" href="javascript:;">See all Stories</a>
	  </div>
	  <div class="post-img">
		 <img src="{{ asset('assets/images/post.png')}}" alt="post">
	  </div>
   </div>
   <div class="va-service-main-wrapper">
	  <div class="va-service-box-wrapper">
		 <div class="service-box">
			<span> <img src="{{ asset('assets/images/service1.png')}}" alt="img"> </span>
			<a href="{{url('wholesale/small-business-owners')}}">Small Business <br> Owners</a>
		 </div>
		 <div class="service-box">
			<span> <img src="{{ asset('assets/images/service2.png')}}" alt="img"> </span>
			<a href="{{url('wholesale/custom-merchandise')}}">Custom <br> Merchandise</a>
		 </div>
		 <div class="service-box">
			<span> <img src="{{ asset('assets/images/service3.png')}}" alt="img"> </span>
			<a href="{{url('wholesale/large-distributors')}}">Whole <br> Sale</a>
		 </div>
		 <div class="service-box">
			<span> <img src="{{ asset('assets/images/service4.png')}}" alt="img"> </span>
			<a href="{{url('wholesale/faire')}}">Faire</a>
		 </div>
		 <div class="service-box">
			<span> <img src="{{ asset('assets/images/service5.png')}}" alt="img"> </span>
			<a href="{{url('wholesale/interior-design-studio')}}">Interior Design <br> Studio</a>
		 </div>
	  </div>
   </div>
   @if($testimonial->status==200)
		@php
			$testimonialResult=(json_decode(($testimonial->content),true));
		@endphp
		<div class="va-testimonial-main-wrapper">
			<h3>OUR TESTIMONIALS</h3>
			<span>FROM OUR BUYERS</span>
			<div class="testimonial-slider">
				<div class="owl-carousel owl-theme">
					@foreach($testimonialResult['result'] as $key=>$testimonial)
						<div class="item">
							<div class="testi-box">
								<div class="testi-img">
									<img src="{{ $testimonial['image'] }}" alt="img">
								</div>
								<div class="testi-text">
									<a href="javascript:;">{{ $testimonial['name'] }}</a>
									<!-- <ul class="star">
										<li> <span> <i class="fas fa-star"></i> </span> </li>
										<li> <span> <i class="fas fa-star"></i> </span> </li>
										<li> <span> <i class="fas fa-star"></i> </span> </li>
										<li> <span> <i class="fas fa-star"></i> </span> </li>
										<li> <span> <i class="far fa-star"></i> </span> </li>
									</ul> -->
									<p>{{ $testimonial['description'] }}
									</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
   
	@endif

	@if($topSelling->status==200)
		@php
			$topSellingResult=(json_decode(($topSelling->content),true));
		@endphp
		<div class="va-feature-main-wrapper">
			<div class="feature-text">
				<h3>Best of The Week</h3>
				<span>Featured Products</span>
				<p>From city centers to distant rural villages come our unique, handcrafted homewares. Each purchase supports the artisans and their families whose hands built this collection</p>
				<a class="line-btn" href="{{url('product-listing?collection=5')}}">
					See Whole Collection 
					<span>
					<svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""></path>
					</svg>
					</span>
				</a>
			</div>
			<div class="feature-slide">
				@foreach($topSellingResult['result'] as $topselling)
					<div class="product-box">
					
						<div class="product-img">
							<img src="{{ $topselling['first_image'] }}" alt="img">
							<div class="social-icon">
								<a href="javascript:;" class="getProductDetail" data-slug="{{ $topselling['slug']}}">
									<span class="IconCart">
										<svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.9036 21.0002C13.9745 20.9997 15.9856 20.3065 17.6168 19.0308L22.7455 24.1595L24.3951 22.5098L19.2665 17.3812C20.5428 15.7498 21.2365 13.7382 21.237 11.6668C21.237 6.52066 17.0498 2.3335 11.9036 2.3335C6.75748 2.3335 2.57031 6.52066 2.57031 11.6668C2.57031 16.813 6.75748 21.0002 11.9036 21.0002ZM11.9036 4.66683C15.7641 4.66683 18.9036 7.80633 18.9036 11.6668C18.9036 15.5273 15.7641 18.6668 11.9036 18.6668C8.04315 18.6668 4.90365 15.5273 4.90365 11.6668C4.90365 7.80633 8.04315 4.66683 11.9036 4.66683Z" fill="#A56852"/>
										<path d="M13.5498 10.0171C13.992 10.4604 14.2358 11.0461 14.2358 11.6668H16.5691C16.5702 11.0536 16.4497 10.4463 16.2146 9.88C15.9795 9.31369 15.6345 8.7996 15.1995 8.36743C13.4331 6.60343 10.3706 6.60343 8.60547 8.36743L10.2528 10.0194C11.1395 9.1351 12.6678 9.13743 13.5498 10.0171Z" fill="#A56852"/>
										</svg>
									</span>&nbsp;<pre class="spinner-border spinner-border-sm loaderView" style="color:#a56852;font-size: 100%;position:relative;margin:0;display:none"></pre>
								</a>
								<a href="javascript:;" class="addtocart" data-type="addtocart" data-product_id="{{ $topselling['variant_productid'] }}">
									<span class="IconCart">
										<svg width="27" height="22" viewBox="0 0 27 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M25.8531 5.03765C25.5921 4.70052 25.2565 4.42854 24.8726 4.24309C24.4886 4.05764 24.0669 3.96378 23.6406 3.9689H7.81563L6.44688 1.48452C6.22602 1.09614 5.90524 0.773955 5.51783 0.551402C5.13042 0.328848 4.69051 0.214041 4.24375 0.218898H1.04688C0.798235 0.218898 0.559778 0.31767 0.383962 0.493486C0.208147 0.669301 0.109375 0.907757 0.109375 1.1564C0.109375 1.40504 0.208147 1.64349 0.383962 1.81931C0.559778 1.99513 0.798235 2.0939 1.04688 2.0939H4.24375C4.3547 2.08915 4.46497 2.11347 4.56363 2.16444C4.66229 2.21542 4.74593 2.29128 4.80625 2.38452L6.35313 5.19702L7.15938 13.9345C7.26744 14.8392 7.7145 15.6692 8.41042 16.2573C9.10634 16.8454 9.99935 17.1477 10.9094 17.1033H20.6313C21.4352 17.1236 22.2235 16.8797 22.8755 16.4089C23.5275 15.9381 24.007 15.2665 24.2406 14.497L26.275 7.16577C26.3752 6.8027 26.3893 6.42123 26.3161 6.05176C26.2428 5.68229 26.0843 5.33503 25.8531 5.03765ZM24.4844 6.65015L22.45 13.9908C22.3233 14.3665 22.0767 14.6902 21.7481 14.912C21.4195 15.1339 21.0271 15.2417 20.6313 15.2189H10.8719C10.4336 15.251 9.99909 15.1191 9.65261 14.8489C9.30612 14.5786 9.07242 14.1893 8.99687 13.7564L8.29375 5.8439H23.6406C23.7776 5.84252 23.9132 5.87119 24.038 5.92788C24.1627 5.98457 24.2735 6.06791 24.3625 6.17202C24.4184 6.23685 24.4586 6.31377 24.4797 6.39674C24.5009 6.47971 24.5025 6.56646 24.4844 6.65015Z" fill="#A56852"/>
										<path d="M11.3594 21.7814C12.3949 21.7814 13.2344 20.9419 13.2344 19.9064C13.2344 18.8709 12.3949 18.0314 11.3594 18.0314C10.3238 18.0314 9.48438 18.8709 9.48438 19.9064C9.48438 20.9419 10.3238 21.7814 11.3594 21.7814Z" fill="#A56852"/>
										<path d="M20.7344 21.7814C21.7699 21.7814 22.6094 20.9419 22.6094 19.9064C22.6094 18.8709 21.7699 18.0314 20.7344 18.0314C19.6988 18.0314 18.8594 18.8709 18.8594 19.9064C18.8594 20.9419 19.6988 21.7814 20.7344 21.7814Z" fill="#A56852"/>
										</svg>
									</span> &nbsp;
									<pre class="spinner-border spinner-border-sm loader" style="color:#a56852;font-size: 100%;position:relative;margin:0;display:none"></pre>
								</a>
								<a href="{{ url('product-detail/'.$topselling['slug'] )}}">
									<span>
										<svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.2646 11.8755C23.7781 12.5472 23.7781 13.4539 23.2646 14.1245C21.6471 16.2359 17.7666 20.5833 13.2361 20.5833C8.70564 20.5833 4.82514 16.2359 3.20772 14.1245C2.95789 13.8029 2.82227 13.4072 2.82227 13C2.82227 12.5927 2.95789 12.1971 3.20772 11.8755C4.82514 9.76407 8.70564 5.41666 13.2361 5.41666C17.7666 5.41666 21.6471 9.76407 23.2646 11.8755V11.8755Z" stroke="#A56852" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M13.2363 16.25C15.0313 16.25 16.4863 14.7949 16.4863 13C16.4863 11.2051 15.0313 9.75 13.2363 9.75C11.4414 9.75 9.98633 11.2051 9.98633 13C9.98633 14.7949 11.4414 16.25 13.2363 16.25Z" stroke="#A56852" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="product-text">
							<span>{{ $topselling['category'] }}</span>
							<a href="{{ url('product-detail/'.$topselling['slug'] )}}">{{ $topselling['name'] }}</a>
							<h5> <small>
								@if($topselling['discount_amount']>0)
									<del>{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</del>{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['offer_price']) }}
								@else
									{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}
								@endif
							</small> </h5>
						</div>
					</div>
				@endforeach
			</div>
		</div>

	@endif
   @if($blogs->status==200)
		@php
			$blogResult=(json_decode(($blogs->content),true));
		@endphp
		<div class="va-latest-news-main-wrapper">
			<h3>On Our Blog</h3>
			<span>Get the Latest News </span>
			<div class="news-main-box-wrapper">
				@foreach($blogResult['result'] as $key=>$blog)
					<div class="news-box-wrapper">
						<div class="news-img">
						<img src="{{ $blog['image'] }}" alt="img">
						</div>

						<div class="news-text">
						<p>
							<span>
								<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.4173 3.66634H15.584V2.74967C15.584 2.50656 15.4874 2.2734 15.3155 2.10149C15.1436 1.92958 14.9104 1.83301 14.6673 1.83301C14.4242 1.83301 14.191 1.92958 14.0191 2.10149C13.8472 2.2734 13.7507 2.50656 13.7507 2.74967V3.66634H8.25065V2.74967C8.25065 2.50656 8.15407 2.2734 7.98217 2.10149C7.81026 1.92958 7.5771 1.83301 7.33398 1.83301C7.09087 1.83301 6.85771 1.92958 6.6858 2.10149C6.51389 2.2734 6.41732 2.50656 6.41732 2.74967V3.66634H4.58398C3.85464 3.66634 3.15517 3.95607 2.63944 4.4718C2.12372 4.98752 1.83398 5.687 1.83398 6.41634V17.4163C1.83398 18.1457 2.12372 18.8452 2.63944 19.3609C3.15517 19.8766 3.85464 20.1663 4.58398 20.1663H17.4173C18.1467 20.1663 18.8461 19.8766 19.3619 19.3609C19.8776 18.8452 20.1673 18.1457 20.1673 17.4163V6.41634C20.1673 5.687 19.8776 4.98752 19.3619 4.4718C18.8461 3.95607 18.1467 3.66634 17.4173 3.66634ZM18.334 17.4163C18.334 17.6595 18.2374 17.8926 18.0655 18.0645C17.8936 18.2364 17.6604 18.333 17.4173 18.333H4.58398C4.34087 18.333 4.10771 18.2364 3.9358 18.0645C3.76389 17.8926 3.66732 17.6595 3.66732 17.4163V10.9997H18.334V17.4163ZM18.334 9.16634H3.66732V6.41634C3.66732 6.17323 3.76389 5.94007 3.9358 5.76816C4.10771 5.59625 4.34087 5.49967 4.58398 5.49967H6.41732V6.41634C6.41732 6.65946 6.51389 6.89261 6.6858 7.06452C6.85771 7.23643 7.09087 7.33301 7.33398 7.33301C7.5771 7.33301 7.81026 7.23643 7.98217 7.06452C8.15407 6.89261 8.25065 6.65946 8.25065 6.41634V5.49967H13.7507V6.41634C13.7507 6.65946 13.8472 6.89261 14.0191 7.06452C14.191 7.23643 14.4242 7.33301 14.6673 7.33301C14.9104 7.33301 15.1436 7.23643 15.3155 7.06452C15.4874 6.89261 15.584 6.65946 15.584 6.41634V5.49967H17.4173C17.6604 5.49967 17.8936 5.59625 18.0655 5.76816C18.2374 5.94007 18.334 6.17323 18.334 6.41634V9.16634Z" fill="#A56852"/>
								</svg>
							</span>
							{{ date('d M Y',strtotime($blog['date'])) }}
						</p>
						<a href="{{ url('blog/'.$blog['slug'])}}">{{$blog['title']}}</a>
						<a class="line-btn" href="{{ url('blog/'.$blog['slug'])}}">
							Read More 
							<span>
								<svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""></path>
								</svg>
							</span>
						</a>
						</div>
					</div>
				@endforeach
			</div>
			<div class="view-btn-wrapper">
				<a class="line-btn" href="{{url('blogs')}}">
					View All Blog
					<span>
					<svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""></path>
					</svg>
					</span>
				</a>
			</div>
		</div>
	@endif
   <!-- <div class="va-client-main-wrapper">
	  <div class="client-slider">
		 <div class="owl-carousel owl-theme">
			<div class="item">
			   <div class="client-box">
				  <img src="{{ asset('assets/images/client1.png')}}" alt="">
			   </div>
			</div>
			<div class="item">
			   <div class="client-box">
				  <img src="{{ asset('assets/images/client2.png')}}" alt="">
			   </div>
			</div>
			<div class="item">
			   <div class="client-box">
				  <img src="{{ asset('assets/images/client3.png')}}" alt="">
			   </div>
			</div>
			<div class="item">
			   <div class="client-box">
				  <img src="{{ asset('assets/images/client4.png')}}" alt="">
			   </div>
			</div>
			<div class="item">
			   <div class="client-box">
				  <img src="{{ asset('assets/images/client5.png')}}" alt="">
			   </div>
			</div>
		 </div>
	  </div>
   </div> -->
@endsection

@push('custom_js')

@endpush