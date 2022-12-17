@if(!empty($data))
	@foreach($data as $value)

	@php $typeVal = ''; @endphp
	@if(isset($type) && $type != '')
		@php $typeVal = '?type='.$type; @endphp
	@endif
	<div class="col mb-30">
		<div class="product__items ">
			<div class="product__items--thumbnail">
				<a class="product__items--link" href="{{ url('product-detail/'.$value['slug'].$typeVal)}}">
					<img class="product__items--img product__primary--img" src="{{ $value['first_image'] }}" alt="product-img">
					<img class="product__items--img product__secondary--img" src="{{ $value['first_image'] }}" alt="product-img">
				</a>
				<div class="product__badge">
					<span class="product__badge--items sale">New</span>
				</div>
				
			</div>
			<div class="product__items--content text-center">
				
				<h3 class="product__items--content__title h4"><a href="{{ url('product-detail/'.$value['slug'].$typeVal)}}">{{ $value['name'] }}</a></h3>
				<div class="product__items--price">
					@if($value['discount_amount']>0)
						<span class="current__price">{{ \App\Helpers\commonHelper::getPriceByCountry($value['sale_price']) }}</span>
						<span class="old__price">{{ \App\Helpers\commonHelper::getPriceByCountry($value['offer_price']) }}</span>
					@else
						<span class="current__price">{{ \App\Helpers\commonHelper::getPriceByCountry($value['sale_price']) }}</span>
					@endif
				</div>
				@if(isset($type) && $type != '')
					<a class="product__items--action__cart--btn primary__btn addtocart" data-type="addtocart" data-product_id="{{ $value['variant_productid'] }}">
						<svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
							<path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
						</svg>
						<span class="add__to--cart__text"> Add to cart <i class="fa fa-spinner fa-spin loading" style="font-size:16px;line-height: 2;display:none"></i></span>
					</a>
				@else
					<a class="product__items--action__cart--btn primary__btn " href="{{ url('product-detail/'.$value['slug'].$typeVal)}}">
						
						<span class="add__to--cart__text"> View <i class="fa fa-eye fa-spin " style="font-size:16px;line-height: 2;display:none"></i></span>
					</a>
				@endif
				
				
				<a class="product__items--action__cart--btn primary__btn  " href="javascript:void(0)" >
					<i class="fa @if(\App\Helpers\commonHelper::checkWishlistProduct($value['variant_productid'])) fa-heart @else fa-heart-o @endif wishlist" data-productid="{{ $value['variant_productid'] }}" style="font-size:16px;line-height: 2;"></i>
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


