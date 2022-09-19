@if(!empty($data))
	@foreach($data as $value)
	
	<div class="col mb-30">
		<div class="product__items ">
			<div class="product__items--thumbnail">
				<a class="product__items--link" href="{{ url('product-detail/'.$value['slug'] )}}">
					<img class="product__items--img product__primary--img" src="{{ $value['first_image'] }}" alt="product-img">
					<img class="product__items--img product__secondary--img" src="{{ $value['first_image'] }}" alt="product-img">
				</a>
				<div class="product__badge">
					<span class="product__badge--items sale">New</span>
				</div>
				<ul class="product__items--action d-flex justify-content-center">
					<li class="product__items--action__list">
						<a class="product__items--action__btn"  href="javascript:void(0)" class="getProductDetail" data-slug="{{ $value['slug']}}">
							<svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
							<span class="visually-hidden">Quick View</span>
						</a>
					</li>
					<li class="product__items--action__list">
						<a class="product__items--action__btn" href="wishlist.html">
							<svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
								<path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
							</svg>
							<span class="visually-hidden">Wishlist</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="product__items--content text-center">
				
				<h3 class="product__items--content__title h4"><a href="{{ url('product-detail/'.$value['slug'] )}}">{{ $value['name'] }}</a></h3>
				<div class="product__items--price">
					@if($value['discount_amount']>0)
						<span class="current__price">{{ \App\Helpers\commonHelper::getPriceByCountry($value['sale_price']) }}</span>
						<span class="old__price">{{ \App\Helpers\commonHelper::getPriceByCountry($value['offer_price']) }}</span>
					@else
						<span class="current__price">{{ \App\Helpers\commonHelper::getPriceByCountry($value['sale_price']) }}</span>
					@endif
				</div>
				<a class="product__items--action__cart--btn primary__btn" class="addtocart" data-type="addtocart" data-product_id="{{ $value['variant_productid'] }}">
					<svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
						<path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
					</svg>
					<span class="add__to--cart__text"> Add to cart</span>
				</a>
			</div>
		</div>
	</div>

	
            
	@endforeach
@elseif(empty($data) && $offset==0)
	<div class="col-md-5 ">
		<img class="notfoundImage" src="{{ asset('images/product-not-available.jpg') }}" style="width: 100%" />
	</div>
@endif

<script>
	getProductDetail();
	
</script>


